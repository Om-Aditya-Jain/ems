<?php
$hostname = 'localhost';
$username = 'id20155404_root';
$password = 'Abrakadabra@123';
$database = 'id20155404_energy';
$conn = mysqli_connect($hostname,$username,$password,$database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isSet($_GET['type']) )
{           
   $device = $_GET['type'];
   $sql = "SELECT * FROM `status`";
               
      if ($result = mysqli_query($conn, $sql)) 
      {			$myObj = new stdClass();;
               /* fetch associative array */
                  while ($row = mysqli_fetch_assoc($result)) 
                  {
                     $myObj->$device = $row[$device];
 
                    //  print_r($json_array);                                               
                     //built in PHP function to encode the data in to JSON format  
                     header('Content-Type: application/json');
                     echo json_encode($myObj);   
                  }                 
                  /* free result set */
                  mysqli_free_result($result);
      }else
      {
                     echo json_encode(json_decode ("{}"));
      }
 
                          
                 
             
}
/* close connection */
mysqli_close($conn);

?>