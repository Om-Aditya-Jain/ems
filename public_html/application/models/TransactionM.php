<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransactionM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function insert_txn_data($username,$sender_id,$receiver_id,$txn_hash,$value,$transaction_fee){
 
    $sql = "INSERT INTO `txn_details` (`username`,`sender_id`, `receiver_id`, `txn_hash`, `value`, `transaction_fee`) VALUES ('$username','$sender_id', '$receiver_id', '$txn_hash', $value, $transaction_fee)";    
    $query = $this->db->query($sql);
    return 1;
  }

  function get_txn_details($username){
    $sql="SELECT * FROM `txn_details` WHERE `username` = '$username' ORDER BY `sno` DESC LIMIT 5";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

}