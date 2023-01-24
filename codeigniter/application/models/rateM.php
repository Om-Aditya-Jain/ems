<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rateM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function getRate($time){
 
    $sql="SELECT * from `rate` where time='$time'";    
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function updateRate($rate,$time){
 
    $sql="UPDATE `rate` SET rate=$rate where time=$time";    
    $query = $this->db->query($sql);
    return;
  }

  function insertRate($time,$rate,$unit,$gas_fee){
 
    $sql="INSERT INTO `rate`(`time`, `rate`, `unit`, `gas_fee`) VALUES ($time,$rate,$unit,$gas_fee)";    
    $query = $this->db->query($sql);
  }

}