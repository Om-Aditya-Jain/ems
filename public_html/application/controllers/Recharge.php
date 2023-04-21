<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recharge extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('LoginM');
    }	

	public function index()
	{
		$this->load->view('Recharge/recharge_plans');
	}

}
