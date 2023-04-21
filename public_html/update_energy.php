<?php
$hostname = 'localhost';
$username = 'id20155404_root';
$password = 'Abrakadabra@123';
$database = 'id20155404_energy';
$conn = mysqli_connect($hostname,$username,$password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
                
                $sql = "UPDATE `energy_consumption`,`user_balance` SET energy_consumption.`energy`=energy_consumption.`energy`+1, user_balance.`energy_balance`=user_balance.`energy_balance`-1  WHERE energy_consumption.`date`='2023-04-21'";
                if ($conn->query($sql) === TRUE) 
                {
                echo json_encode(json_decode ("{Record}"));
                } 
                else 
                {
                echo json_encode(json_decode ("{}"));
                }             
              
                 
             

/* close connection */
mysqli_close($conn);

?>