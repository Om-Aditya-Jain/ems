<!DOCTYPE html>
<html>
<head>
 <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div>
    <button class="pay-button">Pay</button>
    <button class="get-button">Get Details</button>
    <div id="status"></div>
  </div>
  <script type="text/javascript">
  var web3;
  var txnId;
    window.addEventListener('load', async () => {
       if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
          await ethereum.enable();
          initPayButton()
          initGetButton()
        } catch (err) {
          $('#status').html('User denied account access', err)
        }
      } else if (window.web3) {
        window.web3 = new Web3(web3.currentProvider)
        initPayButton()
      } else {
        $('#status').html('No Metamask (or other Web3 Provider) installed')
      }
    })

    const initPayButton = () => {
      $('.pay-button').click(() => {
        // paymentAddress is where funds will be send to
        const paymentAddress = '0x7077A01bfaD89871f365BB01815bc517e19Aaf92'
        const amountEth = '0.001'
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
            $('#status').html('Payment successful')
          }
         
        })
        
      })
    }
    const initGetButton = () => {
        $('.get-button').click(() => {
            web3.eth.getTransaction(txnId, function(err, result) {
            if (result) {
            console.log(result)
            console.log(web3.utils.fromWei(result.value, 'ether'))
            const value = web3.utils.fromWei(result.value, 'ether')
            const gas_price = web3.utils.fromWei(result.gasPrice, 'ether')
            const gas = result.gas.toString();
            var base_url = "transaction.php";
      	
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
            
            
        })
    }
  </script>
</body>
</html>