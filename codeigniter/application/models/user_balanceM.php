<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_balanceM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function getUser($user_id,$user_name){
 
    $sql="SELECT * from `user_balance` where user_id='$user_id' and `user_name`='$user_name'";    
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  function updateUserBalance($balance,$user_id,$user_name){
 
    $sql="UPDATE `user_balance` SET balance=$balance where user_id=$user_id and user_name=$username and status=1";    
    $query = $this->db->query($sql);
    return;
  }


  function updateUserStatus($user_id,$user_name,$status){
 if($status=1)
 {
    $sql="UPDATE `user_balance` SET status=0 where user_id=$user_id and user_name=$username";    
 }
 else
 {
    $sql="UPDATE `user_balance` SET status=1 where user_id=$user_id and user_name=$username";    
 }   
    $query = $this->db->query($sql);
    return;
  }

  function insertUserdetail($user_id,$user_name,$balance){
 
    $sql="INSERT INTO `user_balance`(`user_id`, `user_name`, `balance`, `status`) VALUES ($user_id,$user_name,$balance,1)";    
    $query = $this->db->query($sql);
  }

}