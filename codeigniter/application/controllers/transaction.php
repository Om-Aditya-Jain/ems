<?php    
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('TransactionM');
    }	 


public function index(){

    if(isset($_POST))
    {
        $sender_id = $_POST['sender_id'];
        $receiver_id = $_POST['receiver_id'];
        $txn_hash = $_POST['txn_hash'];
        $full_value = $_POST['full_value'];
        $value = $_POST['value'];
        $gas_price = $_POST['gas_price'];
        $gas_used = $_POST['gas_used'];
        $transaction_fee = floatval($gas_price)*floatval($gas_used);
        
        $insert_txn = $this->TransactionM->insert_txn_data($sender_id,$receiver_id,$txn_hash,$value,$transaction_fee);

        if ($insert_txn) 
        {
            $this->session->set_flashdata('transaction', 'Transaction Successful');
        } 
        else 
        {
            $this->session->set_flashdata('transaction', 'Error Ocurred');
        }             
    }   

}

}            
