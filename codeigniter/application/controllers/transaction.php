<?php    
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('TransactionM');
        $this->load->model('user_balanceM');
    }	 


public function index(){

    if(isset($_GET))
    {
        $sender_id = $_GET['sender_id'];
        $receiver_id = $_GET['receiver_id'];
        $txn_hash = $_GET['txn_hash'];
        $ether_value = floatval($_GET['ether_value']);
        $energy_value = floatval($_GET['energy_value']);
        $gas_price = $_GET['gas_price'];
        $gas_used = $_GET['gas_used'];
        $transaction_fee = floatval($gas_price)*floatval($gas_used);
        
        $username = $_SESSION['user'];

        $insert_txn = $this->TransactionM->insert_txn_data($username,$sender_id,$receiver_id,$txn_hash,$ether_value,$transaction_fee);

        $getUser = $this->user_balanceM->getUser($username);
 
        $prev_ether_balance = $getUser[0]['ether_balance'];
        $prev_energy_balance = $getUser[0]['energy_balance'];

        $new_ether_balance = $prev_ether_balance + $ether_value;
        $new_energy_balance = $prev_energy_balance + $energy_value;

        $update_balance = $this->user_balanceM->updateUserBalance($new_energy_balance,$new_ether_balance,$username);

        if ($insert_txn && $update_balance) 
        {
            $this->session->set_flashdata('Recharge', 'Recharge Successful');
        } 
        else 
        {
            $this->session->set_flashdata('Recharge', 'Error Ocurred');
        }       
        
    }   

}

}            
