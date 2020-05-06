<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

		function __construct(){
			parent::__construct();	
			$this->load->model('M_Login');
			if($this->session->userdata('token') != UTOKEN){
				redirect(base_url("login"));
			}	
		}
	public function index()
	{
			$this->load->view('user/home');
			$log = array(
				'username' => $this->session->userdata('username'),
				'idModule' => HOME,
				'accessTime' => date("Y-m-d H:i:s")
			);
			$this->M_Login->input_log($log,'trans_activitylog');
	}
}
