<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_status extends CI_Controller {
    
    
    function __construct() {
        parent::__construct();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
			echo "hello";
			die();
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

	}
