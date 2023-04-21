<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_balanceM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function getUser($username){
    $sql="SELECT * from `user_balance` where `username`='$username'";    
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  function updateUserBalance($energy_balance,$ether_balance,$username){
    $sql="UPDATE `user_balance` SET energy_balance=$energy_balance, ether_balance=$ether_balance,`status`=1 where username='$username'";  
    $query = $this->db->query($sql);
    return 1;
  }


  function updateUserStatus($user_id,$user_name,$status){
 if($status=1)
 {
    $sql="UPDATE `user_balance` SET status=0 where user_id=$user_id and user_name='$username'";    
 }
 else
 {
    $sql="UPDATE `user_balance` SET status=1 where user_id=$user_id and user_name='$username'";    
 }   
    $query = $this->db->query($sql);
    return;
  }

  function insertUserdetail($user_id,$user_name,$balance){
 
    $sql="INSERT INTO `user_balance`(`user_id`, `user_name`, `balance`, `status`) VALUES ($user_id,$user_name,$balance,1)";    
    $query = $this->db->query($sql);
  }

}