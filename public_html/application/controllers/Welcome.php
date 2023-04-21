<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('LoginM');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	
	public function login()
	{
		if(isset($_POST)){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_md5 = md5($password);
			$check = $this->LoginM->checkUser($username,$password_md5);
			if(!empty($check)){
				$_SESSION['user'] = $username;
				// user login
				if($check[0]['isadmin']==0){
					redirect(base_url('Dashboard'));
				}else{
					redirect(base_url('Dashboard/admin_dashboard'));
				}
			}else{
				redirect(base_url('Welcome'));
			}
		}else{
			redirect(base_url('Welcome'));
		}
		
	}
}
