<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Analytic Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/codeigniter/css/style.css" />

    <!-- Pie Chart CSS -->

    <style type="text/css">
  
/* @property --p{
  syntax: '<number>';
  inherits: true;
  initial-value: 0;
} */

.pie {
  --p:20;
  --b:22px;
  --c:darkred;
  --w:150px;
  
  width:var(--w);
  aspect-ratio:1;
  position:relative;
  display:inline-grid;
  margin:5px;
  place-content:center;
  font-size:25px;
  font-weight:bold;
  font-family:sans-serif;
}
.pie:before,
.pie:after {
  content:"";
  position:absolute;
  border-radius:50%;
}
.pie:before {
  inset:0;
  background:
    radial-gradient(farthest-side,var(--c) 98%,#0000) top/var(--b) var(--b) no-repeat,
    conic-gradient(var(--c) calc(var(--p)*1%),#0000 0);
  -webkit-mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
          mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
}
.pie:after {
  inset:calc(50% - var(--b)/2);
  background:var(--c);
  transform:rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
}
.animate {
  animation:p 1s .5s both;
}
.no-round:before {
  background-size:0 0,auto;
}
.no-round:after {
  content:none;
}
@keyframes p {
  from{--p:0}
}

body {
  background:#ddd;
}


</style>
  </head>

  

  <body>
    <!-- Dashboard -->
    <div class="dashboard">
      <!-- Menu -->
      <div class="menu flex-c">
        <div class="logo">
          <div class="icon">
            <ion-icon name="logo-bitbucket"></ion-icon>
          </div>
        </div>

        <div class="navigation">
          <div class="icon">
            <ion-icon name="filter-circle-outline"></ion-icon>
          </div>

          <div class="icon">
            <ion-icon name="file-tray-full-outline"></ion-icon>
          </div>

          <div class="icon">
            <ion-icon name="mail-unread-outline"></ion-icon>
          </div>

          <div class="icon">
            <ion-icon name="pulse-outline"></ion-icon>
          </div>

          <div class="icon">
            <ion-icon name="storefront-outline"></ion-icon>
          </div>
        </div>

        <div class="settings">
          <div class="icon">
            <ion-icon name="settings-outline"></ion-icon>
          </div>
        </div>
      </div>
      <!-- End Menu -->

      <div class="content">
        <!-- Main Content -->
        <div class="main-content">
          <!-- Head -->
          <div class="head flex">
            <!-- <h1>Good Morning 👋</h1> -->

            <div class="box flex time-period">
              Energy Management System
            </div>

            <div>
            <a href="<?php echo base_url('recharge'); ?>" class="btn-lg btn-primary"><strong>Recharge Wallet</strong></a>
            <!-- <button class="btn-lg btn-primary" onclick="connectWeb3();"><strong>Recharge Wallet</strong></button> -->
              <!-- <ion-icon name="search-outline"></ion-icon> -->

            </div>
          </div>
          <!-- End Head -->

          <!-- Stats -->
          <br>
          <div class="stats-box earning">
              <h2 class="heading">Remaining Balance</h2>
              <br>
              <div style="display:flex; justify-content: center;">
            <div class="pie animate" style="--p:90;--c: darkgreen; text-align:center"> 90%</div>
            </div>
              <!-- <canvas id="earning"></canvas> -->
            </div>
          <!-- <br> -->
          <div class="stats flex">
            <div class="stats box sales">
              <h2 class="heading">Electricity Consumption</h2>
              <br>
              <canvas id="sales"></canvas>
            </div>
          </div>

              </div>
        <!-- End Main Content -->

        <!-- Profile -->
        <div class="profile">
          <div class="title flex">
            <h2 class="heading">Profile</h2>
            <div class="icon">
              <ion-icon name="notifications-outline"></ion-icon>
            </div>
          </div>

          <div class="user">
            <img src="#" alt="" />
            <h2>Sneha Sanu Mathew</h2>
            
          </div>

          <div class="activities">
            <div class="title flex">
              <h2 class="heading">Avtivity</h2>
              <p>View All</p>
            </div>
          </div>

          <div class="activity flex">
            <div class="icon">
              <ion-icon name="wallet-outline"></ion-icon>
            </div>

            <div class="task">
              <h2>Earning Widrawal</h2>
              <p>$125</p>
            </div>
            <div class="time">11:30 AM</div>
          </div>

          <div class="activity flex">
            <div class="icon">
              <ion-icon name="wallet-outline"></ion-icon>
            </div>

            <div class="task">
              <h2>Website Taxes</h2>
              <p>$95</p>
            </div>
            <div class="time">12:20 AM</div>
          </div>

          <div class="upgrade flex-c">
            <div class="icon">
              <ion-icon name="albums-outline"></ion-icon>
            </div>

            <p>Unlock more unique features by becoming a <span>PRO</span></p>
          </div>

          <div class="btn flex">Upgrade Now</div>
        </div>
        <!-- End Profile -->
      </div>
    </div>
    
             <!--   Youtube Turorial Link   -->
    <a href="https://www.youtube.com/watch?v=GzthUlrwiJE" class="youtube" target="__blank">
  <!-- <p>Watch Tutorial 🔥</p> -->
</a>
    <!-- End Dashboard -->

<!-- JS Functions for connect wallet button -->
<script type="text/javascript">
  var web3;
  var txnId;
    // window.addEventListener('load', async () => {
    //    if (window.ethereum) {
    //     window.web3 = new Web3(ethereum);
    //     try {
    //       await ethereum.enable();
    //       initPayButton()
    //       initGetButton()
    //     } catch (err) {
    //       $('#status').html('User denied account access', err)
    //     }
    //   } else if (window.web3) {
    //     window.web3 = new Web3(web3.currentProvider)
    //     initPayButton()
    //   } else {
    //     $('#status').html('No Metamask (or other Web3 Provider) installed')
    //   }
    // })

    function connectWeb3(){
       if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
          ethereum.enable().then(function(){
              initPayButton()
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

    const initPayButton = () => {
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




    <!-- Ion Icons Js -->
    <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"
    ></script>
    <script
      nomodule
      src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"
    ></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <!-- Bootstrap link -->
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- JS -->
    <script src="http://localhost/codeigniter/js/script.js"></script>

  </body>
</html>
