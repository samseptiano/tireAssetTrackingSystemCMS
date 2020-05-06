<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model{
	function tampil_data_role($table,$where){
		return $this->db->get_where($table,$where);
	}
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
	function input_log($data,$table){
		$this->db->insert($table,$data);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function jalankan_query_manual($datainput)
	{
		$q = $this->db->query($datainput);
		return $q;
	}	
}