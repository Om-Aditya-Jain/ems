<?php
$hostname = 'localhost';
$username = 'id20155404_root';
$password = 'Abrakadabra@123';
$database = 'id20155404_energy';
$conn = mysqli_connect($hostname,$username,$password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

       
    if(isset($_GET['d']) && isset($_GET['value']))
    {
        echo $_GET['value'];
                $sql = "UPDATE `status` SET ".$_GET['d']." = ".$_GET['value'];
                //echo $sql;
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