<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->model('M_Login');
			$this->load->model('M_AdminMaster');
			$this->load->helper(array('form', 'url'));
			if($this->session->userdata('token') != TOKEN){
			redirect(base_url("Admin/Login"));
			}	
		}

	function log_activity($idModule)
	{
			$log = array(
				'username' => $this->session->userdata('username'),
				'idModule' => $idModule,
				'accessTime' => date("Y-m-d H:i:s")
			);
			$this->M_Login->input_log($log,'trans_activitylog');
	}

	public function pelanggan()
	{
		$this->log_activity(MSTRPLNGGN);

		$where = array();
		$data['pelanggan'] = $this->M_AdminMaster->tampil_data_all('m_customer')->result();	
		$this->load->view('admin/master-pelanggan',$data);
	}
	public function tambah_pelanggan()
	{
		$nama = $this->input->post('customerName');
		$alamat = $this->input->post('customerAddress');
		$kontak = $this->input->post('customerContact');
		$customerWebsite = $this->input->post('customerWebsite');
		$customerPIC = $this->input->post('customerPIC');
 		$password = $this->input->post('password');
 		$customerUsername = $this->input->post('customerUsername');

			$idCustomer = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idCustomer,11,15)) as akhir from m_customer");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idCustomer = "10001";
				}
				else{
					$idCustomer = $a->akhir+1;
				}
			}


				$config['upload_path']          = CUSTOMERPHOTOPATH;
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = CUSTOMERPHOTOSIZE;
				$config['max_width']            = CUSTOMERPHOTOWIDTH;
				$config['max_height']           = CUSTOMERPHOTOHEIGHT;
				$config['encrypt_name']			= TRUE;

				$new_name = $idCustomer."-LOGO";
				$config['file_name'] = $new_name;

			 	$filename= $_FILES["file"]["name"];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);

				$this->load->library('upload', $config);
			 
				if ( ! $this->upload->do_upload('customerLogo')){
					$this->session->set_flashdata('error_upload',$this->upload->display_errors());
					redirect('Admin/Master/Pelanggan');
				}else{
					$data = array('upload_data' => $this->upload->data());
					$saved_file_name = $this->upload->data('file_name');

				
					$data = array(
							'idCustomer' => CUSTOMER.date("Ymd").$idCustomer,
							'customerName' => $nama,
							'customerAddress' => $alamat,
							'customerUsername' => $customerUsername,
							'customerWebsite' => $customerWebsite,
							'customerPIC' => $customerPIC,
							'customerContact' => $kontak,
							'password' => md5($customerUsername),
							'fgActiveYN' => 'Y',
							'customerLogo' => CUSTOMERPHOTOPATH.$saved_file_name,
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username')
							);
						$this->M_AdminMaster->input_data($data,'m_customer');
						redirect('Admin/Master/Pelanggan');
				}
	}
	

	public function update_pelanggan()
	{
		$idCustomer = $this->input->post('idCustomer');
		$nama = $this->input->post('customerName');
		$alamat = $this->input->post('customerAddress');
		$kontak = $this->input->post('customerContact');
		$fgactiveyn = $this->input->post('fgActiveYN');
			$customerWebsite = $this->input->post('customerWebsite');
		$customerPIC = $this->input->post('customerPIC');
		$customerLogoLama = $this->input->post('customerLogoLama');
		$customerUsername = $this->input->post('customerUsername');


				$config['upload_path']          = CUSTOMERPHOTOPATH;
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = CUSTOMERPHOTOSIZE;
				$config['max_width']            = CUSTOMERPHOTOWIDTH;
				$config['max_height']           = CUSTOMERPHOTOHEIGHT;
				$config['encrypt_name']			= TRUE;

				$new_name = $idCustomer."-LOGO";
				$config['file_name'] = $new_name;

			 	$filename= $_FILES["file"]["name"];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);

				$this->load->library('upload', $config);
			 
				if (empty($_FILES['customerLogo']['name'])) {

						$where = array('idCustomer' => $idCustomer);

							$data = array(
								'customerName' => $nama,
								'customerAddress' => $alamat,
								'customerContact' => $kontak,
								//'password' => md5($customerUsername),
								'customerWebsite' => $customerWebsite,
								'customerPIC' => $customerPIC,
								'customerUsername' => $customerUsername,
								'fgActiveYN' => $fgactiveyn,
								'updDate' => date("Y-m-d H:i:s"),
								'updUser' => $this->session->userdata('username')
								);
							$this->M_AdminMaster->update_data($where,$data,'m_customer');
							redirect('Admin/Master/Pelanggan');

				}
				else{
						if ( ! $this->upload->do_upload('customerLogo')){
							$this->session->set_flashdata('error_upload',$this->upload->display_errors());
							redirect('Admin/Master/Pelanggan');
						}
						else{
							$data = array('upload_data' => $this->upload->data());


							unlink('.'.$customerLogoLama);
							$saved_file_name = $this->upload->data('file_name');
							
							$where = array('idCustomer' => $idCustomer);

							$data = array(
								'customerName' => $nama,
								'customerAddress' => $alamat,
								'customerContact' => $kontak,
								//'password' => md5($customerUsername),
								'customerUsername' => $customerUsername,
								'customerWebsite' => $customerWebsite,
								'customerPIC' => $customerPIC,
								'customerLogo' => CUSTOMERPHOTOPATH.$saved_file_name,
								'fgActiveYN' => $fgactiveyn,
								'updDate' => date("Y-m-d H:i:s"),
								'updUser' => $this->session->userdata('username')
								);
							$this->M_AdminMaster->update_data($where,$data,'m_customer');
							redirect('Admin/Master/Pelanggan');
						}
				}

			}

	public function hapus_pelanggan($idCustomer)
	{
		$where = array('idCustomer' => $idCustomer);
		$data['data'] = $this->M_AdminMaster->tampil_data('m_customer',$where)->result();
		unlink('.'.$data['data'][0]->customerLogo);
		$this->M_AdminMaster->hapus_data($where,'m_customer');
		redirect('Admin/Master/Pelanggan');
	}


function reset_password_pelanggan($customerUsername){
						$data = array(
				'password' => md5($customerUsername),
				'updDate' => date("Y-m-d H:i:s"),
				'updUser' => $this->session->userdata('username')
				);
			$where = array(
			'customerUsername' => $customerUsername,
			);

			$this->M_AdminMaster->update_data($where, $data,'m_customer');
		redirect('Admin/Master/Pelanggan');

	}


	public function dc()
	{
		$this->log_activity(MSTRDC);
		$where = array();
		$data['dc'] = $this->M_AdminMaster->jalankan_query_manual('select a.fgActiveYN as fgActive,a.*,b.*,c.* from m_dc a left join trans_dc b on a.idDC = b.idDC left join m_customer c on b.idCustomer = c.idCustomer where a.fgActiveYN="Y" and b.fgActiveYN="Y" order by descDC')->result();	
		$data['customer'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_customer where fgActiveYN="Y" order by customerName')->result();	
		$this->load->view('admin/master-dc',$data);
	}

	public function tambah_dc()
	{
		$DCname = $this->input->post('DCname');
		$idCustomer = $this->input->post('idCustomer');
 
			$idDC = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idDC,12,16)) as akhir from m_dc");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idDC = "10001";
				}
				else{
					$idDC = $a->akhir+1;
				}
			}

		$data = array(
			'idDC' => DC.date("Ymd").$idDC,
			'descDC' => $DCname,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_dc');

		$dataTrans = array(
			'idDC' => DC.date("Ymd").$idDC,
			'idCustomer' => $idCustomer,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);

		$this->M_AdminMaster->input_data($dataTrans,'trans_dc');

		redirect('Admin/Master/dc');
	} 

	public function update_dc()
	{
		$idDC = $this->input->post('idDC');
		$DCname = $this->input->post('DCname');
		$idCustomer = $this->input->post('idCustomer');
		$idCustomerLama = $this->input->post('idCustomerLama');
		$fgActiveYN = $this->input->post('fgActiveYN');

		//=====  Master  ============================
		$data = array(
			'descDC' => $DCname,
			'fgActiveYN' => $fgActiveYN,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array('idDC' => $idDC);
		$this->M_AdminMaster->update_data($where,$data,'m_dc');
		//====================================

 	if($idCustomerLama != $idCustomer){

		$dataTrans = array(
			'idDC' => $idDC,
			'idCustomer' => $idCustomer,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($dataTrans,'trans_dc');

		$whereTrans2 = array('idCustomer' => $idCustomerLama,'idDC'=>$idDC);
		$dataTrans2 = array('fgActiveYN' => 'N','updDate'=>date("Y-m-d H:i:s"),'updUser'=>$this->session->userdata('username'));
		$this->M_AdminMaster->update_data($whereTrans2,$dataTrans2,'trans_dc');
		}
		redirect('Admin/Master/dc');
	}
	public function hapus_dc($idDC,$idCustomer)
	{
		$where = array('idDC' => $idDC);
		$this->M_AdminMaster->hapus_data($where,'m_dc');

		$whereTrans = array('idCustomer' => $idCustomer,'idDC'=>$idDC);
		$dataTrans = array('fgActiveYN' => 'N','updDate'=>date("Y-m-d H:i:s"),'updUser'=>$this->session->userdata('username'));
		$this->M_AdminMaster->update_data($whereTrans,$dataTrans,'trans_dc');

		redirect('Admin/Master/dc');
	}

	public function pattern()
	{
		$this->log_activity(MSTRPTTR);
		$data['pattern'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_pattern')->result();	
		$this->load->view('admin/master-pattern',$data);
	}

	public function tambah_pattern()
	{
		$pattern = $this->input->post('pattern');
 
			$idPattern = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idPattern,12,16)) as akhir from m_pattern");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idPattern = "10001";
				}
				else{
					$idPattern = $a->akhir+1;
				}
			}

		$data = array(
			'idPattern' => PATTERN.date("Ymd").$idPattern,
			'pattern' => $pattern,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_pattern');
		redirect('Admin/Master/pattern');
	}

	public function update_pattern()
	{
		$idPattern = $this->input->post('idPattern');
		$pattern = $this->input->post('pattern');
		$fgActiveYN = $this->input->post('fgActiveYN');
 
		$data = array(
			'pattern' => $pattern,
			'fgActiveYN' => $fgActiveYN,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array('idPattern' => $idPattern);
		$this->M_AdminMaster->update_data($where,$data,'m_pattern');
		redirect('Admin/Master/pattern');
	}

	public function hapus_pattern($idPattern)
	{
		$where = array('idPattern' => $idPattern);
		$this->M_AdminMaster->hapus_data($where,'m_pattern');
		redirect('Admin/Master/pattern');
	}


	public function axle()
	{
		$this->log_activity(MSTRAXL);
		$data['axle'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_axle')->result();	
		$this->load->view('admin/master-axle',$data);
	}

	public function tambah_axle()
	{
		$jenisKendaraan = $this->input->post('jenisKendaraan');
		$jumlahAxle = $this->input->post('jumlahAxle');
		$jumlahRoda = $this->input->post('jumlahRoda');
		$keterangan = $this->input->post('keterangan');

			$idAxle = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idAxle,12,16)) as akhir from m_axle");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idAxle = "10001";
				}
				else{
					$idAxle = $a->akhir+1;
				}
			}


				$config['upload_path']          = AXLEPHOTOPATH;
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = AXLEPHOTOSIZE;
				$config['max_width']            = AXLEPHOTOWIDTH;
				$config['max_height']           = AXLEPHOTOHEIGHT;
				$config['encrypt_name']			= TRUE;

				$new_name = $idAxle."-AXLE";
				$config['file_name'] = $new_name;

			 	$filename= $_FILES["file"]["name"];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);

				$this->load->library('upload', $config);
			 
				if ( ! $this->upload->do_upload('gambarAxle')){
					$this->session->set_flashdata('error_upload',$this->upload->display_errors());
					redirect('Admin/Master/axle');
				}else{
					$data = array('upload_data' => $this->upload->data());
					$saved_file_name = $this->upload->data('file_name');

				
					$data = array(
							'idAxle' => AXLE.date("Ymd").$idAxle,
							'jenisKendaraan' => $jenisKendaraan,
							'jumlahAxle' => $jumlahAxle,
							'jumlahRoda' => $jumlahRoda,
							'keterangan' => $keterangan,
							'fgActiveYN' => 'Y',
							'gambarAxle' => AXLEPHOTOPATH.$saved_file_name,
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username')
							);
						$this->M_AdminMaster->input_data($data,'m_axle');
						redirect('Admin/Master/axle');
				}
	}

	public function update_axle()
	{
		$idAxle = $this->input->post('idAxle');
		$jenisKendaraan = $this->input->post('jenisKendaraan');
		$jumlahAxle = $this->input->post('jumlahAxle');
		$jumlahRoda = $this->input->post('jumlahRoda');
		$keterangan = $this->input->post('keterangan');
		$gambarAxleLama = $this->input->post('gambarAxleLama');
		$fgactiveyn = $this->input->post('fgActiveYN');


				$config['upload_path']          = AXLEPHOTOPATH;
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = AXLEPHOTOSIZE;
				$config['max_width']            = AXLEPHOTOWIDTH;
				$config['max_height']           = AXLEPHOTOSIZE;
				$config['encrypt_name']			= TRUE;

				$new_name = $idAxle."-AXLE";
				$config['file_name'] = $new_name;

			 	$filename= $_FILES["file"]["name"];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);

				$this->load->library('upload', $config);
			 
				if (empty($_FILES['gambarAxle']['name'])) {

						$where = array('idAxle' => $idAxle);

							$data = array(
								'jenisKendaraan' => $jenisKendaraan,
								'jumlahAxle' => $jumlahAxle,
								'jumlahRoda' => $jumlahRoda,
								'keterangan' => $keterangan,
								'fgActiveYN' => $fgactiveyn,
								'updDate' => date("Y-m-d H:i:s"),
								'updUser' => $this->session->userdata('username')
								);
							$this->M_AdminMaster->update_data($where,$data,'m_axle');
							redirect('Admin/Master/axle');

				}
				else{
						if ( ! $this->upload->do_upload('gambarAxle')){
							$this->session->set_flashdata('error_upload',$this->upload->display_errors());
							redirect('Admin/Master/axle');
						}
						else{
							$data = array('upload_data' => $this->upload->data());


							unlink('.'.$gambarAxleLama);
							$saved_file_name = $this->upload->data('file_name');
							
							$where = array('idAxle' => $idAxle);

							$data = array(
								'jenisKendaraan' => $jenisKendaraan,
								'jumlahAxle' => $jumlahAxle,
								'jumlahRoda' => $jumlahRoda,
								'keterangan' => $keterangan,
								'fgActiveYN' => $fgactiveyn,
								'gambarAxle' =>AXLEPHOTOPATH.$saved_file_name,
								'fgActiveYN' => $fgactiveyn,
								'updDate' => date("Y-m-d H:i:s"),
								'updUser' => $this->session->userdata('username')
								);
							$this->M_AdminMaster->update_data($where,$data,'m_axle');
							redirect('Admin/Master/axle');
						}
				}

	}

	public function hapus_axle($idAxle)
	{
		$where = array('idAxle' => $idAxle);
		$data['data'] = $this->M_AdminMaster->tampil_data('m_axle',$where)->result();
		unlink('.'.$data['data'][0]->gambarAxle);
		$this->M_AdminMaster->hapus_data($where,'m_axle');
		redirect('Admin/Master/axle');
	}

	public function role()
	{
		$this->log_activity(MSTRUSR);
		$data['role'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_role')->result();	
		$this->load->view('admin/master-role',$data);
	}

	public function tambah_role()
	{
		$descRole = $this->input->post('descRole');
		$idRole = $this->input->post('idRole');

			

		$data = array(
			'idRole' => $idRole,
			'descRole' => $descRole,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_role');
		redirect('Admin/Master/role');
	}
public function  update_role()
	{
		$descRole = $this->input->post('descRole');
 		$idRole = $this->input->post('idRole');
		$FGActiveYN = $this->input->post('fgActiveYN');

		$data = array(
			'descRole' => $descRole,
			'fgActiveYN' => $FGActiveYN,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where=array('idRole'=>$idRole);
		$this->M_AdminMaster->update_data($where,$data,'m_role');
		redirect('Admin/Master/role');
	}

public function hapus_role($idRole)
	{
		$where = array('idRole' => $idRole);
		$this->M_AdminMaster->hapus_data($where,'m_role');
		redirect('Admin/Master/role');
	}

	public function user()
	{
		$this->log_activity(MSTRUSR);
		$data['user'] = $this->M_AdminMaster->jalankan_query_manual('select a.*, b.descRole as descRole from m_user a left join m_role b on a.idRole = b.idRole')->result();
		$data['role'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_role where fgActiveYN="Y"')->result();	
		$this->load->view('admin/master-user',$data);
	}

	function reset_password_user($Username){
			
			$data = array(
				'password' => md5($Username),
				'updDate' => date("Y-m-d H:i:s"),
				'updUser' => $this->session->userdata('username')
				);
			$where = array(
			'username' => $Username,
			);

			$this->M_AdminMaster->update_data($where, $data,'m_user');
		redirect('Admin/Master/user');

	}


	public function tambah_user()
	{
		$Username = $this->input->post('Username');
 		$idRole = $this->input->post('idRole');

			$idUser = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idUser,11,15)) as akhir from m_user");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idUser = "10001";
				}
				else{
					$idUser = $a->akhir+1;
				}
			}

		$data = array(
			'idUser' => USER.date("Ymd").$idUser,
			'Username' => $Username,
			'password' => md5($Username),
			'idRole' =>$idRole,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_user');
		redirect('Admin/Master/user');
	}
public function  update_user()
	{
		$Username = $this->input->post('Username');
 		$idRole = $this->input->post('idRole');
		$FGActiveYN = $this->input->post('fgActiveYN');
		$idUser = $this->input->post('idUser');

		$data = array(
			'Username' => $Username,
			'idRole' =>$idRole,
			'fgActiveYN' => $fgActiveYN,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where=array('idUser'=>$idUser);
		$this->M_AdminMaster->update_data($where,$data,'m_user');
		redirect('Admin/Master/user');
	}

	public function hapus_user($idUser)
	{
		$where = array('idUser' => $idUser);
		$this->M_AdminMaster->hapus_data($where,'m_user');
		redirect('Admin/Master/user');
	}

	public function merekban()
	{
		$this->log_activity(MSTRMRKBN);
		$data['merekban'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_merkban')->result();	
		$this->load->view('admin/master-merek-ban',$data);
	}

	public function tambah_merekban()
	{
		$merekBan = $this->input->post('merekBan');
 
			$idMerekBan = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idMerekBan,12,16)) as akhir from m_merkban");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idMerekBan = "10001";
				}
				else{
					$idMerekBan = $a->akhir+1;
				}
			}

		$data = array(
			'idMerekBan' => MEREKBAN.date("Ymd").$idMerekBan,
			'merekBan' => $merekBan,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_merkban');
		redirect('Admin/Master/merekban');
	}

	public function update_merekban()
	{
		$idMerekBan = $this->input->post('idMerekBan');
		$merekBan = $this->input->post('merekBan');
		$fgActiveYN = $this->input->post('fgActiveYN');
 
		$data = array(
			'merekBan' => $merekBan,
			'fgActiveYN' => $fgActiveYN,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array('idMerekBan' => $idMerekBan);
		$this->M_AdminMaster->update_data($where,$data,'m_merkban');
		redirect('Admin/Master/merekban');
	}

	public function hapus_merekban($idmerekban)
	{
		$where = array('idMerekBan' => $idmerekban);
		$this->M_AdminMaster->hapus_data($where,'m_merkban');
		redirect('Admin/Master/merekban');
	}

	public function ban()
	{
		$this->log_activity(MSTRBN);
		$where = array();
		$data['pattern'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_pattern where fgActiveYN="Y" order by pattern')->result();	
		$data['ukuranBan'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_ukuranban where fgActiveYN="Y" order by ukuranBan')->result();	
		$data['merekBan'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_merkban where fgActiveYN="Y" order by merekBan')->result();
		$data['customer'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_customer where fgActiveYN="Y" order by idCustomer')->result();	
		$data['ban'] = $this->M_AdminMaster->jalankan_query_manual('select a.*,b.idMerekBan, b.merekBan,c.idUkuranBan,e.*, c.ukuranBan from m_ban a left join m_merkban b on a.idMerekBan = b.idMerekBan left join m_ukuranban c on a.idUkuranban = c.idUkuranBan left join trans_ban d on a.idBan = d.idBan left join m_customer e on d.idCustomer = e.idCustomer left join m_pattern f on a.idPattern = f.idPattern where b.fgActiveYN="Y" and c.fgActiveYN="Y" and d.fgActiveYN="Y" and e.fgActiveYN="Y" and f.fgActiveYN="Y"')->result();	
		$this->load->view('admin/master-ban', $data);
	}

	public function tambah_ban()
	{
		$tanggalProduksi = $this->input->post('tanggalProduksi');
		$idCustomer = $this->input->post('idCustomer');
		$serialNo = $this->input->post('serialNo');
		$idMerekBan = $this->input->post('idMerekBan');
		$idPattern = $this->input->post('idPattern');
		$tanggalProduksi = $this->input->post('tanggalProduksi');
		$idukuranBan = $this->input->post('idUkuranBan');
		$tt = $this->input->post('tt');
		$statusVulkan = $this->input->post('statusVulkan');
		$plyRating = $this->input->post('plyRating');
 
			$idBan = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idBan,13,17)) as akhir from m_ban");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idBan = "10001";
				}
				else{
					$idBan = $a->akhir+1;
				}
			}

		$data = array(
			'idban' => BAN.date("Ymd").$idBan,
			'serialNo' => $serialNo,
			'idMerekBan' => $idMerekBan,
			'idPattern' => $idPattern,
			'idukuranBan' => $idukuranBan,
			'tanggalProduksi' => $tanggalProduksi,
			'TT' => $tt,
			'statusVulkan' => $statusVulkan,
			'PR' => $plyRating,
			'fgActiveYN' => 'Y',
			'tanggalProduksi' => $tanggalProduksi,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_ban');


		$dataTrans = array(
			'idban' => BAN.date("Ymd").$idBan,
			'idCustomer' => $idCustomer,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($dataTrans,'trans_ban');


		redirect('Admin/Master/ban');
	}
	public function update_ban()
	{
		$idCustomerLama = $this->input->post('idCustomerLama');
		$idPattern = $this->input->post('idPattern');
		$idCustomer = $this->input->post('idCustomer');
		$idBan = $this->input->post('idBan');
		$tanggalProduksi = $this->input->post('tanggalProduksi');
		$serialNo = $this->input->post('serialNo');
		$idMerekBan = $this->input->post('idMerekBan');
		$idukuranBan = $this->input->post('idUkuranBan');
		$tt = $this->input->post('tt');
		$statusVulkan = $this->input->post('statusVulkan');
		$plyRating = $this->input->post('plyRating');
 
 	if($idCustomerLama != $idCustomer){}
		
		$data = array(
			'serialNo' => $serialNo,
			'idPattern' => $idPattern,
			'idMerekBan' => $idMerekBan,
			'idukuranBan' => $idukuranBan,
			//'tanggalProduksi' => $tanggalProduksi,
			'TT' => $tt,
			'tanggalProduksi' => $tanggalProduksi,
			'statusVulkan' => $statusVulkan,
			'PR' => $plyRating,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array('idBan' => $idBan);
		$this->M_AdminMaster->update_data($where,$data,'m_ban');


 	if($idCustomerLama != $idCustomer){

		$dataTrans = array(
			'idBan' => $idBan,
			'idCustomer' => $idCustomer,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($dataTrans,'trans_ban');

		$whereTrans2 = array('idCustomer' => $idCustomerLama,'idBan'=>$idBan);
		$dataTrans2 = array('fgActiveYN' => 'N','updDate'=>date("Y-m-d H:i:s"),'updUser'=>$this->session->userdata('username'));
		$this->M_AdminMaster->update_data($whereTrans2,$dataTrans2,'trans_ban');
		}

		redirect('Admin/Master/ban');
	}
	public function hapus_ban($idBan,$idCustomer)
	{
		$where = array('idBan' => $idBan);
		$this->M_AdminMaster->hapus_data($where,'m_ban');

		$whereTrans = array('idCustomer' => $idCustomer,'idBan'=>$idBan);
		$dataTrans = array('fgActiveYN' => 'N','updDate'=>date("Y-m-d H:i:s"),'updUser'=>$this->session->userdata('username'));
		$this->M_AdminMaster->update_data($whereTrans,$dataTrans,'trans_ban');

		redirect('Admin/Master/ban');
	}

	public function dealer()
	{
		$this->log_activity(MSTRDLR);
		$this->load->view('admin/master-dealer');
	}
	public function fleet()
	{
		$this->log_activity(MSTRFLT);
		$this->load->view('admin/master-fleet');
	}
	public function kendaraan()
	{
		$this->log_activity(MSTRKNDRN);
		$data['ukuranBan'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_ukuranban where fgActiveYN="Y"')->result();
		$data['customer'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_customer where fgActiveYN="Y"')->result();
		$data['axle'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_axle where fgActiveYN="Y"')->result();
		$data['dc'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_dc where fgActiveYN="Y" order by descDC')->result();
		$data['kendaraan'] = $this->M_AdminMaster->jalankan_query_manual('select a.fgActiveYN as fgActive, a.*,b.*,c.*,d.*,e.*,f.idCustomer from m_kendaraan a left join trans_kendaraan b on a.noKendaraan = b.noKendaraan left join m_dc c on b.idDC = c.idDC left join m_axle d on a.idAxle = d.idAxle left join m_ukuranban e on e.idUkuranBan = a.idUkuranBan left join trans_dc f on f.idDC=b.idDC where b.fgActiveYN="Y" and c.fgActiveYN="Y" and d.fgActiveYN="Y"')->result();

		$this->load->view('admin/master-kendaraan',$data);
	}

	public function tambah_kendaraan()
	{
		$idDC = $this->input->post('idDC');
		$idAxle = $this->input->post('idAxle');
		$noLambung = $this->input->post('noLambung');
		$noKendaraan = $this->input->post('noKendaraan');
		$idUkuranBan = $this->input->post('idUkuranBan');
		$lainnya = $this->input->post('lainnya');

			$idkendaraan = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idkendaraan,13,17)) as akhir from m_kendaraan");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idkendaraan = "10001";
				}
				else{
					$idkendaraan = $a->akhir+1;
				}
			}



		$data = array(
			'noLambung' => $noLambung,
			'idkendaraan' => KENDARAAN.date("Ymd").$idkendaraan,
			'noKendaraan' => $noKendaraan,
			'idAxle' => $idAxle,
			'idUkuranBan' => $idUkuranBan,
			'lainnya' => $lainnya,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);

		$this->M_AdminMaster->input_data($data,'m_kendaraan');


		$dataTrans = array(
			'idDC' => $idDC,
			'noKendaraan' => $noKendaraan,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($dataTrans,'trans_kendaraan');

		redirect('Admin/Master/kendaraan');
	}

public function update_kendaraan()
	{
		$idDCLama = $this->input->post('idDCLama');
		$idDC = $this->input->post('idDC');
		$noLambung = $this->input->post('noLambung');
		$idAxle = $this->input->post('idAxle');
		$noKendaraan = $this->input->post('noKendaraan');
		$idUkuranBan = $this->input->post('idUkuranBan');
		$lainnya = $this->input->post('lainnya');
		$fgActiveYN = $this->input->post('fgActiveYN');

		$data = array(
			'noLambung' => $noLambung,
			'idAxle' => $idAxle,
			'idUkuranBan' => $idUkuranBan,
			'lainnya' => $lainnya,
			'fgActiveYN' => $fgActiveYN,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);

		$where = array(
			'noKendaraan' => $noKendaraan
			);
		$this->M_AdminMaster->update_data($where,$data,'m_kendaraan');

		if($idDC!=$idDCLama){

		$dataTrans = array(
			'idDC' => $idDC,
			'noKendaraan' => $noKendaraan,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($dataTrans,'trans_kendaraan');

		$whereTrans2 = array('idDC' => $idDCLama,'noKendaraan'=>$noKendaraan);
		$dataTrans2 = array('fgActiveYN' => 'N','updDate'=>date("Y-m-d H:i:s"),'updUser'=>$this->session->userdata('username'));
		$this->M_AdminMaster->update_data($whereTrans2,$dataTrans2,'trans_kendaraan');
		}
		redirect('Admin/Master/kendaraan');
	}
	public function hapus_kendaraan($idDC,$noKendaraan)
	{
		$where = array('noKendaraan' => $noKendaraan);
		$this->M_AdminMaster->hapus_data($where,'m_kendaraan');

		// $whereTrans = array('idDC' => $idDC,'noKendaraan'=>$noKendaraan);
		// $dataTrans = array('fgActiveYN' => 'N','updDate'=>date("Y-m-d H:i:s"),'updUser'=>$this->session->userdata('username'));
		// $this->M_AdminMaster->update_data($whereTrans,$dataTrans,'trans_kendaraan');

		redirect('Admin/Master/kendaraan');
	}



public function tekananangin()
	{
		$this->log_activity(MSTRTKNAGN);
		$data['tekananangin'] = $this->M_AdminMaster->jalankan_query_manual('select a.tekananAngin, a.idTekananAngin,a.idUkuranBan,a.fgActiveYN,b.ukuranBan from m_tekananangin a left join m_ukuranban b on a.idUkuranBan=b.idUkuranBan')->result();	
		$data['ukuranban'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_ukuranban')->result();	
		$this->load->view('admin/master-tekanan-angin',$data);
	}

		public function tambah_tekananangin()
	{
		$idUkuranBan = $this->input->post('idUkuranBan');
 		$tekananAngin = $this->input->post('tekananAngin');

			$idTekananAngin = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idTekananAngin,12,16)) as akhir from m_tekananangin");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idTekananAngin = "10001";
				}
				else{
					$idTekananAngin = $a->akhir+1;
				}
			}

		$data = array(
			'idTekananAngin' => TEKANANANGIN.date("Ymd").$idTekananAngin,
			'idUkuranBan' => $idUkuranBan,
			'tekananAngin' => $tekananAngin,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_tekananangin');
		redirect('Admin/Master/tekananangin');
	}

	public function update_tekananangin()
	{
		$idTekananAngin = $this->input->post('idTekananAngin');
		$fgActiveYN = $this->input->post('fgActiveYN');
		$idUkuranBan = $this->input->post('idUkuranBan');
 		$tekananAngin = $this->input->post('tekananAngin');

		$data = array(
			'idUkuranBan' => $idUkuranBan,
			'fgActiveYN' => $fgActiveYN,
			'tekananAngin' => $tekananAngin,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array('idTekananAngin' => $idTekananAngin);
		$this->M_AdminMaster->update_data($where,$data,'m_tekananangin');
		redirect('Admin/Master/tekananangin');
	}

	public function hapus_tekananangin($idtekananangin)
	{
		$where = array('idTekananAngin' => $idtekananangin);
		$this->M_AdminMaster->hapus_data($where,'m_tekananangin');
		redirect('Admin/Master/tekananangin');
	}


	public function ukuranban()
	{
		$this->log_activity(MSTRUKBN);
		$data['ukuranban'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_ukuranban')->result();	
		$this->load->view('admin/master-ukuran-ban',$data);
	}

		public function tambah_ukuranban()
	{
		$ukuranBan = $this->input->post('ukuranBan');
 		$ukuranRing = $this->input->post('ukuranRing');

			$idUkuranBan = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idUkuranBan,12,16)) as akhir from m_ukuranban");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idUkuranBan = "10001";
				}
				else{
					$idUkuranBan = $a->akhir+1;
				}
			}

		$data = array(
			'idUkuranBan' => UKURANBAN.date("Ymd").$idUkuranBan,
			'ukuranBan' => $ukuranBan,
			'ukuranRing' => $ukuranRing,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_ukuranban');
		redirect('Admin/Master/ukuranban');
	}

	public function update_ukuranban()
	{
		$idUkuranBan = $this->input->post('idUkuranBan');
		$ukuranBan = $this->input->post('ukuranBan');
		$fgActiveYN = $this->input->post('fgActiveYN');
  		$ukuranRing = $this->input->post('ukuranRing');

		$data = array(
			'ukuranBan' => $ukuranBan,
			'fgActiveYN' => $fgActiveYN,
			'ukuranRing' => $ukuranRing,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array('idUkuranBan' => $idUkuranBan);
		$this->M_AdminMaster->update_data($where,$data,'m_ukuranban');
		redirect('Admin/Master/ukuranban');
	}

	public function hapus_ukuranban($idukuranban)
	{
		$where = array('idUkuranBan' => $idukuranban);
		$this->M_AdminMaster->hapus_data($where,'m_ukuranban');
		redirect('Admin/Master/ukuranban');
	}


	public function alasanban()
	{
		$this->log_activity(MSTRALBN);
		$data['alasanban'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_alasanban')->result();	
		$this->load->view('admin/master-alasan-ban',$data);
	}

		public function hapus_alasanban($idAlasanBan)
	{
		$where = array('idAlasan' => $idAlasanBan);
		$this->M_AdminMaster->hapus_data($where,'m_alasanban');

		redirect('Admin/Master/alasanban');
	}

public function tambah_alasanban()
	{
		$cdAlasanBan = $this->input->post('cdAlasanBan');
		$descAlasanBan = $this->input->post('descAlasanBan');
 
			$idAlasanBan = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idAlasan,11,15)) as akhir from m_alasanban");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idAlasanBan = "10001";
				}
				else{
					$idAlasanBan = $a->akhir+1;
				}
			}
		$data = array(
			'idAlasan' => ALASANBAN.date("Ymd").$idAlasanBan,
			'cdAlasan' => $cdAlasanBan,
			'descAlasan' => $descAlasanBan,
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_alasanban');

		redirect('Admin/Master/alasanban');
	}

public function update_alasanban()
	{
		$idAlasanBan = $this->input->post('idAlasanBan');
				$fgActiveYN = $this->input->post('fgActiveYN');
		$cdAlasanBan = $this->input->post('cdAlasanBan');
		$descAlasanBan = $this->input->post('descAlasanBan');
 
		$data = array(
			'cdAlasan' => $cdAlasanBan,
			'descAlasan' => $descAlasanBan,
			'fgActiveYN' => $fgActiveYN,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array(
			'idAlasan' => $idAlasanBan,
			);
		$this->M_AdminMaster->update_data($where,$data,'m_alasanban');

		redirect('Admin/Master/alasanban');
	}


	public function harga()
	{
		$this->log_activity(MSTRHRG);
		$data['ukuran'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_ukuranban where fgActiveYN="Y" order by ukuranBan')->result();	
		$data['merek'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_merkban where fgActiveYN="Y" order by merekBan')->result();
		$data['customer'] = $this->M_AdminMaster->jalankan_query_manual('select * from m_customer where fgActiveYN="Y" order by idCustomer')->result();
		$data['harga'] = $this->M_AdminMaster->jalankan_query_manual('select a.fgActiveYN as fgActive, a.*,b.*,c.*,d.* from m_harga a left join m_ukuranban b on a.idUkuranBan = b.idUkuranBan left join m_merkban c on a.idMerekBan = c.idMerekBan left join m_customer d on a.idCustomer = d.idcustomer  order by a.idHarga')->result();	
	
		$this->load->view('admin/master-harga',$data);
	}

	public function tambah_harga()
	{
		$idCustomer = $this->input->post('idCustomer');
		$idMerekBan = $this->input->post('idMerekBan');
		$idUkuranBan = $this->input->post('idUkuranBan');
		$statusVulkan = $this->input->post('statusVulkan');
		$harga = $this->input->post('harga');
 
			$idHarga = "";
			$q = $this->M_AdminMaster->jalankan_query_manual("select MAX(substring(idHarga,11,15)) as akhir from m_harga");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$idHarga = "10001";
				}
				else{
					$idHarga = $a->akhir+1;
				}
			}
		$data = array(
			'idHarga' => HARGA.date("Ymd").$idHarga,
			'idMerekBan' => $idMerekBan,
			'statusVulkan' => $statusVulkan,
			'idUkuranBan' => $idUkuranBan,
			'idCustomer' => $idCustomer,
			'fgActiveYN' => 'Y',
			'harga' => $harga,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminMaster->input_data($data,'m_harga');

		redirect('Admin/Master/harga');
	}


	public function update_harga()
	{
		$idHarga = $this->input->post('idHarga');
		$statusVulkan = $this->input->post('statusVulkan');
		$idCustomer = $this->input->post('idCustomer');
		$idMerekBan = $this->input->post('idMerekBan');
		$idUkuranBan = $this->input->post('idUkuranBan');
		$fgActiveYN = $this->input->post('fgActiveYN');
		$harga = $this->input->post('harga');

		$data = array(
			'idMerekBan' => $idMerekBan,
			'idUkuranBan' => $idUkuranBan,
			'idCustomer' => $idCustomer,
			'statusVulkan' => $statusVulkan,
			'fgActiveYN' => $fgActiveYN,
			'harga' => $harga,
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$where = array('idHarga' => $idHarga);
		$this->M_AdminMaster->update_data($where, $data,'m_harga');


		redirect('Admin/Master/harga');
	}

		public function hapus_harga($idHarga)
	{
		$where = array('idHarga' => $idHarga);
		$this->M_AdminMaster->hapus_data($where,'m_harga');

		redirect('Admin/Master/harga');
	}



// =================== AJAX CALL ===========================================================

function check_availability_username_customer(){
		$username = $this->input->post('username');
		if($username != ""){
			$where = array(
			'customerUsername' => $username
			);
		  $user_count = $this->M_AdminMaster->tampil_data("m_customer",$where)->num_rows();

		if($user_count > 0) {
		     //s $this->session->set_flashdata('usrnm_msg','Username Sudah Ada!!!');
		      echo "<span class='status-not-available' style='color:red' > Username Sudah Digunakan.</span>";
		     //redirect(base_url("students_register"));
		  }
		else{
		      //$this->session->set_flashdata('usrnm_msg','Username Tersedia!!!');
		      echo "<span class='status-available' style='color:green' > Username Tersedia!.</span>";
		      //redirect(base_url("students_register"));
		  }
		}
		else{
			//echo "<span class='status-available' style='color:green' > Email Kosong!.</span>";
		}
	}

function check_availability_username(){
		$username = $this->input->post('username');
		if($username != ""){
			$where = array(
			'Username' => $username
			);
		  $user_count = $this->M_AdminMaster->tampil_data("m_user",$where)->num_rows();

		if($user_count > 0) {
		     //s $this->session->set_flashdata('usrnm_msg','Username Sudah Ada!!!');
		      echo "<span class='status-not-available' style='color:red' > Username Sudah Digunakan.</span>";
		     //redirect(base_url("students_register"));
		  }
		else{
		      //$this->session->set_flashdata('usrnm_msg','Username Tersedia!!!');
		      echo "<span class='status-available' style='color:green' > Username Tersedia!.</span>";
		      //redirect(base_url("students_register"));
		  }
		}
		else{
			//echo "<span class='status-available' style='color:green' > Email Kosong!.</span>";
		}
	}

	function check_availability_role(){
		$idRole = $this->input->post('idRole');
		if($idRole != ""){
			$where = array(
			'idRole' => $idRole
			);
		  $user_count = $this->M_AdminMaster->tampil_data("m_role",$where)->num_rows();

		if($user_count > 0) {
		     //s $this->session->set_flashdata('usrnm_msg','Username Sudah Ada!!!');
		      echo "<span class='status-not-available' style='color:red' > ID Role Sudah Digunakan.</span>";
		     //redirect(base_url("students_register"));
		  }
		else{
		      //$this->session->set_flashdata('usrnm_msg','Username Tersedia!!!');
		      echo "<span class='status-available' style='color:green' > ID Role Tersedia!.</span>";
		      //redirect(base_url("students_register"));
		  }
		}
		else{
			//echo "<span class='status-available' style='color:green' > Email Kosong!.</span>";
		}
	}		


	 public function getdc(){ 
	    // POST data 
	    $postData = $this->input->post("idCustomer");

		$data= $this->M_AdminMaster->jalankan_query_manual('select a.idDC,b.descDC from trans_dc a left join m_dc b on a.idDc = b.idDC where a.idCustomer = "'.$postData.'" and  b.fgActiveYN="Y" and a.fgActiveYN="Y" order by b.descDC')->result();
		 echo json_encode($data); 
	  }

	  	 public function getkendaraan(){ 
	    // POST data 
	    $postData = $this->input->post("idDC");

		$data= $this->M_AdminMaster->jalankan_query_manual('select noKendaraan from trans_kendaraan where fgActiveYN="Y" and idDC="'.$postData.'"')->result();
		 echo json_encode($data); 
	  }
	   public function getban(){ 
	    // POST data 
	    $postData = $this->input->post("idCustomer");

		$data= $this->M_AdminMaster->jalankan_query_manual('select a.idBan, b.* from trans_ban a left join m_ban b on a.idBan=b.idBan where b.fgActiveYN="Y" and a.fgActiveYN="Y" and a.idCustomer="'.$postData.'"')->result();
		 echo json_encode($data); 
	  }


	  public function getdcDikirim(){ 
	    // POST data 
	    $postData = $this->input->post("idCustomer");

		$data= $this->M_AdminMaster->jalankan_query_manual('select a.idDC, b.* from trans_kendaraan_dikirim a left join m_dc b on a.idDC = b.idDC where a.fgActiveYN="Y" and a.idCustomer="'.$postData.'"')->result();
		 echo json_encode($data); 
	  }

	  public function getkendaraanDikirim(){ 
	    // POST data 
	    $postData = $this->input->post("idDC");
		$role = $this->input->post("role");
	    $data= $this->M_AdminMaster->jalankan_query_manual('select a.noKendaraan, b.* from trans_kendaraan_dikirim a left join m_kendaraan b on a.noKendaraan = b.noKendaraan where a.fgActiveYN="Y" and a.idDC="'.$postData.'" and a.statusKirim="0"')->result();
		 echo json_encode($data); 

		
	  }
	public function getbanDikirim(){ 
	    // POST data 
	    $postData = $this->input->post("idDC");
	    $role = $this->input->post("role");
	    $statusKirim=0;

		$data= $this->M_AdminMaster->jalankan_query_manual('select a.*, b.* from trans_ban_dikirim a left join m_ban b on a.idBan = b.idBan where a.fgActiveYN="Y" and a.idDC="'.$postData.'" and a.statusKirim="0"')->result();
		 echo json_encode($data); 
	  }

	public function getaxle(){ 
	    // POST data 
	    $postData = $this->input->post("idAxle");

		$data= $this->M_AdminMaster->jalankan_query_manual('select * from m_axle where idAxle = "'.$postData.'" and  fgActiveYN="Y"')->result();
		 echo json_encode($data); 
	  }

	public function getjumlahRoda(){ 
	    // POST data 
	    $postData = $this->input->post("noKendaraan");

		$data= $this->M_AdminMaster->jalankan_query_manual('select b.jumlahRoda from m_kendaraan a left join m_axle b on a.idAxle = b.idAxle where a.noKendaraan = "'.$postData.'" and  a.fgActiveYN="Y" and b.fgActiveYN="Y"')->result();
		 echo json_encode($data); 
	  }
	   public function gettekananangin(){ 
	    // POST data 
	    $idBan = $this->input->post("idBan");

		$data= $this->M_AdminMaster->jalankan_query_manual('select a.* from m_tekananangin a left join m_ban b on a.idUkuranBan = b.idUkuranBan where b.idBan = "'.$idBan.'" and a.fgActiveYN="Y"')->result();
		 echo json_encode($data); 
	  }

	  public function getdataCheckFleet(){ 
	    // POST data 
	    $postData = $this->input->post("noKendaraan");

		$data= $this->M_AdminMaster->jalankan_query_manual('select a.*,b.idUkuranBan, b.idMerekBan, c.merekBan,d.idPattern,e.tekananAngin,sum(a.odometer) as odometerAkhir from trans_mutasiban a left join m_ban b on a.idbanPasang = b.idBan left join m_merkban c on b.idMerekBan = c.idMerekBan left join m_pattern d on b.idPattern = d.idPattern left join m_tekananangin e on b.idUkuranBan=e.idUkuranBan where a.nokendaraan="'.$postData.'" group by a.id')->result();

		// $data= $this->M_AdminMaster->jalankan_query_manual('select a.*, b.idMerekBan, c.merekBan,d.idPattern,e.tekananAngin,sum(a.odometer) as odometerAkhir from trans_mutasiban a left join m_ban b on a.idbanPasang = b.idBan left join m_merkban c on b.idMerekBan = c.idMerekBan left join m_pattern d on b.idPattern = d.idPattern left join m_tekananangin e on b.idUkuranBan=e.idUkuranBan left join trans_dailycheck f on a.noKendaraan=f.noKendaraan where a.nokendaraan="'.$postData.'" group by a.id')->result();


		 echo json_encode($data); 
	  }
}
