<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		function __construct(){
			parent::__construct();	
			$this->load->model('M_Login');
			// if($this->session->userdata('token') == TOKEN){
			// redirect(base_url("Admin/Home"));
			// }	
		}

	public function index()
	{
		$where = array(
			'fgActiveYN' => "Y"
			);

		$data['role'] = $this->M_Login->tampil_data_role("m_role",$where)->result();
		$this->load->view('login',$data);
	}

	function process_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$where = array(
			'username' => $username,
			'password' => md5($password),
			'idRole' => $role
			);
		$cek = $this->M_Login->cek_login("m_user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'username' => $username,
				'status' => "login",
				'role' => $role,
				'token' => TOKEN
				);
 
			$log = array(
				'username' => $username,
				'idModule' => LOGIN,
				'accessTime' => date("Y-m-d H:i:s")
			);
		$this->M_Login->input_log($log,'trans_activitylog');

			$this->session->set_userdata($data_session);
			redirect("Admin/Home");
		}
		else{
			$this->session->set_flashdata('error_login', 'Username atau password salah!');
			redirect('Admin/Login');
		}
	}

	function updatepassword(){
		$passwordLama = $this->input->post('passwordLama');
		$passwordBaru = $this->input->post('passwordBaru');
		$where = array(
			'username' => $this->session->userdata('username'),
			'password' => md5($passwordLama)
			);
		$cek = $this->M_Login->cek_login("m_user",$where)->num_rows();
		if($cek > 0){
 
			$data = array(
				'password' => md5($passwordBaru),
				'updDate' => date("Y-m-d H:i:s"),
				'updUser' => $this->session->userdata('username')
				);
			$where = array(
			'username' => $this->session->userdata('username')
						);

			$this->M_Login->update_data($where, $data,'m_user');
			$this->session->set_flashdata('success_update', 'Password berhasil diganti!');
 			redirect("Admin/Home");
		}
		else{
			$this->session->set_flashdata('error_update', 'Password lama anda salah!');
 			redirect("Admin/Home");
		}

	}
 
	function logout(){
			$log = array(
				'username' => $this->session->userdata('username'),
				'idModule' => LOGOUT,
				'accessTime' => date("Y-m-d H:i:s")
			);
		$this->M_Login->input_log($log,'trans_activitylog');
		$this->session->sess_destroy();
		redirect('Admin/Login');
	}

}
