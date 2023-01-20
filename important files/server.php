<?php 

$status = $_POST['status'];

$hostname = 'localhost';
$username = 'id20155404_root';
$password = 'Abrakadabra@123';
$database = 'id20155404_energy';

$conn = mysqli_connect($hostname,$username,$password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($status=='ON 😄'){
    $sql = 'UPDATE `status` SET device1 = 1';
}else{
    $sql = 'UPDATE `status` SET device1 = 0';
}

if (mysqli_query($conn, $sql)) {
    // echo "Data updated successfully";
  } else {
    echo "Error updating data: " . mysqli_error($conn);
}

header("Location: https://energyefficient.000webhostapp.com/");
exit;

?>