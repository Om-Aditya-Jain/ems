<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransactionM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function insert_txn_data($sender_id,$receiver_id,$txn_hash,$value,$transaction_fee){
 
    $sql = "INSERT INTO `txn_details` (`sender_id`, `receiver_id`, `txn_hash`, `value`, `transaction_fee`) VALUES ('$sender_id', '$receiver_id', '$txn_hash', '$value', $transaction_fee)";    
    $query = $this->db->query($sql);
    return 1;
  }

}