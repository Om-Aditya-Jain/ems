<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function checkUser($username,$password){
 
    $sql="SELECT * from `login` where username='$username' and `password`='$password'";    
    $query = $this->db->query($sql);
    return $query->result_array();
  }

}