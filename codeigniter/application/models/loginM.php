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

  function insert_user($first_name,$last_name,$birthday,$gender,$email,$phone,$username){
    $sql = "INSERT INTO `user_details` (`username`,`first_name`, `last_name`, `gender`, `birthday`, `email`,`phone`) VALUES ('$username','$first_name', '$last_name', '$gender', '$birthday', '$email','$phone')";    
    $query = $this->db->query($sql);
    return 1;
  }

  function insert_login($username,$password){
    $sql = "INSERT INTO `login` (`username`,`password`) VALUES ('$username','$password')";    
    $query = $this->db->query($sql);
    return 1;
  }
}