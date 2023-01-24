<?php if($this->session->flashdata('Recharge')){ ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('Recharge'); ?>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
    .container{
        display:flex;
        flex-direction:column;
        justify-content:center;    
    }
    .plans{
        height:10%;
        width:30%;
        background:red;
        color:white;
        display:flex;
        justify-content:center;
        flex-direction:column;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Recharge Plans</h1>

        <div class="plans">
            <h2>1 Month Plan</h2>
            <h5>Energy : 200 unit</h5>
            <h5>Price : 0.001 ether</h5>
            <button class="btn btn-primary" value="0.001" onclick="connectWeb3(this.value);">Recharge Now</button>
        </div>
        <br>
        <div class="plans">
            <h2>6 Month Plan</h2>
            <h5>Energy : 1200 unit</h5>
            <h5>Price : 0.005 ether</h5>
            <button class="btn btn-primary" value="0.005" onclick="connectWeb3(this.value);">Recharge Now</button>
        </div>
        <br>
        <div class="plans">
            <h2>12 Month Plan</h2>
            <h5>Energy : 2400 unit</h5>
            <h5>Price : 0.010 ether</h5>
            <button class="btn btn-primary" value="0.010" onclick="connectWeb3(this.value);">Recharge Now</button>
        </div>
    </div>

<!-- JS Functions for connect wallet button -->
<script type="text/javascript">
  var web3;
  var txnId;

    function connectWeb3(recharge_value){
        console.log(recharge_value)
       if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
          ethereum.enable().then(function(){
              initPayButton(recharge_value)
            //   initGetButton()
          });
        } catch (err) {
          $('#status').html('User denied account access', err)
        }
      } else if (window.web3) {
        window.web3 = new Web3(web3.currentProvider)
            initPayButton()
      } else {
        $('#status').html('No Metamask (or other Web3 Provider) installed')
      }
    }

    const initPayButton = (recharge_value) => {
        // paymentAddress is where funds will be send to
        const paymentAddress = '0x7077A01bfaD89871f365BB01815bc517e19Aaf92'
        // const amountEth = '0.001'
        const amountEth = recharge_value
        web3.eth.sendTransaction({
          from: web3.currentProvider.selectedAddress,
          to: paymentAddress,
          value: web3.utils.toWei(amountEth, 'ether'),
        }, (err, transactionId) => {
          if  (err) {
            console.log('Payment failed', err)
            $('#status').html('Payment failed')
          } else {

            console.log('Payment successful', transactionId)
            txnId = transactionId;
            async function checkTransactionStatus(txn_hash) {
            // Continuously check the transaction status
            setInterval(async () => {
                // Get the transaction details
                const tx = await web3.eth.getTransaction(txn_hash);
                // Check if the transaction is mined
                if (tx.blockNumber > 0) {
                console.log(`Transaction ${txn_hash} is mined in block number ${tx.blockNumber}`);
                $('#status').html('Payment successful')
                initGetButton()
                location.reload();  
                clearInterval();
                } else {
                console.log(`Transaction ${txn_hash} is not mined yet`);
                }
            }, 1000);  // check the status every 1 second
            }

            // Example usage
            checkTransactionStatus(txnId);

            
          }
         
        })
    }

    const initGetButton = () => {
            web3.eth.getTransaction(txnId, function(err, result) {
            if (result) {
            console.log(result)
            console.log(web3.utils.fromWei(result.value, 'ether'))
            const value = web3.utils.fromWei(result.value, 'ether')
            const gas_price = web3.utils.fromWei(result.gasPrice, 'ether')
            const gas = result.gas.toString();
            var base_url = '<?php echo base_url('/transaction'); ?>';
      	
        	$.ajax({
        		url:base_url,
        		type:"POST",
        		data : {
        			"sender_id" : result.from,
        			"receiver_id" : result.to,
        			"txn_hash" : result.hash,
        			"full_value" : result.value,
        			"value" : value,
        			"gas_price" : gas_price,
        			"gas_used" : gas
        		},
        		datatype : 'json',
        		success: function(data){
        				console.log(data);
        		},
        		error: function(error){
        		    console.log(error);
        		}
        	});
            

                
            }
            });
    }
</script>
<!-- bootstrap JS link  -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>