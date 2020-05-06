<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AdminTrans extends CI_Model{
	function tampil_data($table,$where){
		return $this->db->get_where($table,$where);
	}
	function tampil_data_all($table){
		return $this->db->get_where($table);
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
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