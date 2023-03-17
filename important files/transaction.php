<?php
$hostname = 'localhost';
$username = 'id20155404_root';
$password = 'Abrakadabra@123';
$database = 'id20155404_energy';
$conn = mysqli_connect($hostname,$username,$password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

       
if(isset($_POST))
{
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $txn_hash = $_POST['txn_hash'];
    $full_value = $_POST['full_value'];
    $value = $_POST['value'];
    $gas_price = $_POST['gas_price'];
    $gas_used = $_POST['gas_used'];
    $transaction_fee = floatval($gas_price)*floatval($gas_used);
    
    $sql = "INSERT INTO `txn_details` (`sender_id`, `receiver_id`, `txn_hash`, `value`, `transaction_fee`) VALUES ('$sender_id', '$receiver_id', '$txn_hash', '$value', $transaction_fee)";

    if ($conn->query($sql) === TRUE) 
    {
    echo "Record updated successfully";
    } 
    else 
    {
    echo "Error updating record: " . $conn->error;
    }             
}        
              
                 
             

/* close connection */
mysqli_close($conn);

?>