<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('user_balanceM');
        $this->load->model('TransactionM');
    }	

	public function index()
	{
        $username = $_SESSION['user'];
		$data['username'] = $username;
        $data['user_balance'] = $this->user_balanceM->getUser($username);
        $data['transactions'] = $this->TransactionM->get_txn_details($username);
		$this->load->view('dashboard/user_dashboard',$data);
	}

	public function admin_dashboard()
	{
		$this->load->view('dashboard/admin_dashboard');
	}

}
