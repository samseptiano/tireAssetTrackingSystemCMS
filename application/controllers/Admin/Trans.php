<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->model('M_Login');
			$this->load->model('M_AdminTrans');
			$this->load->model('M_AdminMaster');
			if($this->session->userdata('token') != TOKEN){
			redirect(base_url("admin/login"));
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
	public function bandikirim()
	{
		$this->log_activity(TRXBNKRM);
		$data['pelanggan'] = $this->M_AdminMaster->tampil_data_all('m_customer')->result();	
		$data['dc'] = $this->M_AdminMaster->tampil_data_all('m_dc')->result();		
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y"')->result();

		$data['kendaraan_dikirim'] = $this->M_AdminTrans->jalankan_query_manual('  select a.statusKirim,a.idCustomer, a.id, a.tanggalKirim, d.customerUsername,b.descDC,b.idDC, c.noKendaraan,c.noLambung, a.fgActiveYN from trans_kendaraan_dikirim a left join m_dc b on a.idDC= b.idDC
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan left join m_customer d on a.idCustomer = d.idCustomer where a.fgActiveYN="Y"')->result();
		$data['ban_dikirim'] = $this->M_AdminTrans->jalankan_query_manual(' select a.idCustomer,a.id,a.tanggalKirim, a.statusKirim, d.customerUsername,b.descDC,b.idDC,c.idBan, c.serialNo, a.fgActiveYN from trans_ban_dikirim a left join m_dc b on a.idDC= b.idDC
			left join m_ban c on a.idBan = c.idBan left join m_customer d on a.idCustomer = d.idCustomer where a.fgActiveYN="Y"')->result();

		$this->load->view('admin/trans-ban-dikirim',$data);
	}

	public function tambah_bandikirim()
	{

		$idDC = $this->input->post('idDC');
		$idCustomer = $this->input->post('idCustomer');
		$tanggalKirim = $this->input->post('tanggalKirim');
		$noKendaraanArr = $_POST['noKendaraan'];
		$idBanArr = $_POST['idBan'];
		foreach($idBanArr as $idBan) {
						$data = array(
							'idBan' => $idBan,
							'idCustomer' => $idCustomer,
							'tanggalKirim' => $tanggalKirim,
							'idDC' => $idDC,
							'fgActiveYN' => 'Y',
							'statusKirim' => '0',
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username'));

							$this->M_AdminTrans->input_data($data,'trans_ban_dikirim');
		}
		foreach($noKendaraanArr as $noKendaraan) {
						$data = array(
							'noKendaraan' => $noKendaraan,
							'idCustomer' => $idCustomer,
							'tanggalKirim' => $tanggalKirim,
							'idDC' => $idDC,
							'fgActiveYN' => 'Y',
							'statusKirim' => '0',
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username'));

							$this->M_AdminTrans->input_data($data,'trans_kendaraan_dikirim');
							}

		redirect('Admin/Trans/bandikirim');

	}

	public function hapus_bandikirim($id)
	{
		$this->M_AdminTrans->jalankan_query_manual('update trans_ban_dikirim set fgActiveYN="N" where id="'.$id.'"');
		redirect('Admin/Trans/bandikirim');
	}
	public function hapus_kendaraandikirim($id)
	{
				$this->M_AdminTrans->jalankan_query_manual('update trans_kendaraan_dikirim set fgActiveYN="N" where id="'.$id.'"');
		redirect('Admin/Trans/bandikirim');
	}

	public function update_kendaraandikirim()
	{

			$id = $this->input->post('id');
		$idDC = $this->input->post('idDC');
		$statusKirim = $this->input->post('statusKirim');
		$idCustomer = $this->input->post('idCustomer');
		$tanggalKirim = $this->input->post('tanggalKirim');
		$noKendaraanArr = $_POST['noKendaraan'];
		foreach($noKendaraanArr as $noKendaraan) {
						$data = array(
							//'noKendaraan' => $noKendaraanArr[$key],
							//'idCustomer' => $idCustomer,
							'tanggalKirim' => $tanggalKirim,
							'statusKirim' => $statusKirim,
							//'idDC' => $idDC,
							'fgActiveYN' => 'Y',
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username'));
	
								$where = array(
									'id' => $id
									);
								$this->M_AdminMaster->update_data($where,$data,'trans_kendaraan_dikirim');

							}
		redirect('Admin/Trans/bandikirim');
	}
	public function update_bandikirim()
	{

			$id = $this->input->post('id');
		$idDC = $this->input->post('idDC');
		$statusKirim = $this->input->post('statusKirim');
		$idCustomer = $this->input->post('idCustomer');
		$tanggalKirim = $this->input->post('tanggalKirim');
		$noKendaraanArr = $_POST['noKendaraan'];
		foreach($noKendaraanArr as $noKendaraan) {
						$data = array(
							//'noKendaraan' => $noKendaraanArr[$key],
							//'idCustomer' => $idCustomer,
							'tanggalKirim' => $tanggalKirim,
							'statusKirim' => $statusKirim,
							//'idDC' => $idDC,
							'fgActiveYN' => 'Y',
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username'));
	
								$where = array(
									'id' => $id
									);
								$this->M_AdminMaster->update_data($where,$data,'trans_ban_dikirim');

							}
		redirect('Admin/Trans/bandikirim');
	}


	public function cekharian()
	{
		$this->log_activity(TRXCKHR);
		$data['noLambung'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_kendaraan where fgActiveYN="Y"')->result();
		$data['user'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_user where idRole = "'.TEKNISIROLE.'" and fgActiveYN="Y"')->result();
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y"')->result();
		$data['pattern'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_pattern where fgActiveYN="Y"')->result();
		$data['merekBan'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_merkban where fgActiveYN="Y"')->result();
		$data['cekHarian'] = $this->M_AdminTrans->jalankan_query_manual(' select a.ID as IDTrans, a.*,b.*,c.merekBan from trans_dailycheck a left join m_ban b on a.idBan = b.idBan left
		 join m_merkban c on a.idMerekban = c.idMerekBan where a.fgActiveYN="Y"')->result();

		$this->load->view('admin/trans-cek-harian',$data);
	}

	public function cekharianperiode($tglAwal,$tglAkhir)
	{
		$this->log_activity(TRXCKHR);
		$data['noLambung'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_kendaraan where fgActiveYN="Y"')->result();
		$data['user'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_user where idRole = "'.TEKNISIROLE.'" and fgActiveYN="Y"')->result();
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y"')->result();
		$data['merekBan'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_merkban where fgActiveYN="Y"')->result();
		$data['cekHarian'] = $this->M_AdminTrans->jalankan_query_manual(' select a.ID as IDTrans, a.*,b.*,c.merekBan from trans_dailycheck a left join m_ban b on a.idBan = b.idBan left
		 join m_merkban c on a.idMerekban = c.idMerekBan where a.fgActiveYN="Y" and a.tglCek between "'.$tglAwal.'" and "'.$tglAkhir.'"')->result();

		$this->load->view('admin/frag/cek-harian',$data);
	}

	public function tambah_cekharian()
	{
	   	
	   	$noKendaraan = $this->input->post("noKendaraan");
	    $tglCek = $this->input->post("tglCek");
	   	$odometer = $this->input->post("odometer");
	    $idTeknisi = $this->input->post("idTeknisi");

	    $posisiBanArr =  $_POST["posisiBan"];
	    $jenisBanArr = $_POST["jenisBan"];
	    $jenisTelapakArr =  $_POST["idPattern"];
	    $TTBaruArr =  $_POST["TTBaru"];
	    $TTSisaArr =  $_POST["TTSisa"];
		$idBanArr =  $_POST["idBan"];
		$idMerekBanArr =  $_POST["idMerekBan"];
	    $statusBanArr = $_POST["statusBan"];

	    $habisTidakRataArr = $_POST["habisTidakRata"];
	    $brakeSkidArr = $_POST["brakeSkid"];
	    $diffLowHighArr = $_POST["diffLowHigh"];
	    $DiameterLuarTidakSamaArr = $_POST["DiameterLuarTidakSama"];
	    $adaTutupPentilArr = $_POST["adaTutupPentil"];
	    $pentilBocorArr = $_POST["pentilBocor"];
	    $pentilTersumbatArr = $_POST["pentilTersumbat"];
	    $berkaratArr = $_POST["berkarat"];
	    $oliBocorArr = $_POST["oliBocor"];
	    $velgRusakArr = $_POST["velgRusak"];
	    $ditundaPenggantianArr = $_POST["ditundaPenggantian"];
	    $dicopotDivulkanisirArr = $_POST["dicopotDivulkanisir"];
	    $dicopotDiperbaikiArr = $_POST["dicopotDiperbaiki"];
	    $segeraDilepasArr = $_POST["segeraDilepas"];
	    $tekananAnginTerukurArr = $_POST["tekananAnginTerukur"];
	    $tekananAnginStdArr = $_POST["tekananAnginStd"];
	    $keteranganArr = $_POST["keterangan"];


	     $i=0;
		foreach( $idBanArr as $key => $n ){

 		$habisTidakRata="N";
	    $brakeSkid = 'N';
	    $diffLowHigh = 'N';
	    $DiameterLuarTidakSama = 'N';
	    $adaTutupPentil = 'N';
	    $pentilBocor = 'N';
	    $pentilTersumbat = "N";
	    $berkarat = 'N';
	    $oliBocor = 'N';
	    $dicopotDivulkanisir = 'N';
	    $velgRusak = 'N';
	    $dicopotDivulkanisir = 'N';
	    $dicopotDiperbaiki = 'N';
	    $segeraDilepas = 'N';

		if($habisTidakRataArr[$key] == 'Y') {
	    $habisTidakRata = $habisTidakRataArr[$key] ;
		}
		else{
	    $habisTidakRata = 'N';
		}

		if($brakeSkidArr[$key] == 'Y') {
	    $brakeSkid = $brakeSkidArr[$key];
		}
		else{
	    $brakeSkid = 'N';
		}

		if($diffLowHighArr[$key] == 'Y') {
	    $diffLowHigh = $diffLowHighArr[$key];
		}
		else{
	    $diffLowHigh = 'N';
		}

		if($DiameterLuarTidakSamaArr[$key] == 'Y') {
	    $DiameterLuarTidakSama = $DiameterLuarTidakSamaArr[$key];
		}
		else{
	    $DiameterLuarTidakSama = 'N';
		}

		if($adaTutupPentilArr[$key] == 'Y') {
	    $adaTutupPentil = $adaTutupPentilArr[$key];
		}
		else{
	    $adaTutupPentil = 'N';
		}

		if($pentilBocorArr[$key] == 'Y') {
	    $pentilBocor = $pentilBocorArr[$key];
		}
		else{
	    $pentilBocor = 'N';
		}

		if($pentilTersumbatArr[$key] == 'Y') {
	    $pentilTersumbat = $pentilTersumbatArr[$key];
		}
		else{
	    $pentilTersumbat = 'N';
		}

		if($berkaratArr[$key] == 'Y') {
	    $berkarat = $berkaratArr[$key];
		}
		else{
	    $berkarat = 'N';
		}

		if($oliBocorArr[$key] == 'Y') {
	    $oliBocor = $oliBocorArr[$key];
		}
		else{
	    $oliBocor = 'N';
		}

		if($velgRusakArr[$key] == 'Y') {
	    $velgRusak = $velgRusakArr[$key];
		}
		else{
	    $velgRusak = 'N';
		}

		if($ditundaPenggantianArr[$key] == 'Y') {
	    $ditundaPenggantian = $ditundaPenggantianArr[$key];
		}
		else{
	    $ditundaPenggantian = 'N';
		}

		if($dicopotDivulkanisirArr[$key] == 'Y') {
	    $dicopotDivulkanisir = $dicopotDivulkanisirArr[$key];
		}
		else{
	    $dicopotDivulkanisir = 'N';
		}

		if($dicopotDiperbaikiArr[$key] == 'Y') {
	    $dicopotDiperbaiki = $dicopotDiperbaikiArr[$key];
		}
		else{
	    $dicopotDiperbaiki = 'N';
		}

		if($segeraDilepasArr[$key]  == 'Y') {
	    $segeraDilepas = $segeraDilepasArr[$key] ;
		}
		else{
	    $segeraDilepas = 'N';
		}
				$config['upload_path']          = DAILYCHECKPHOTOPATH;
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = DAILYCHECKPHOTOSIZE;
				$config['quality']= '10%';
				$config['max_width']            = DAILYCHECKPHOTOWIDTH;
				$config['max_height']           = DAILYCHECKPHOTOHEIGHT;
				$config['encrypt_name']			= TRUE;

				$new_name = date('Ymdhisa')."-DAILY";
				$config['file_name'] = $new_name;

			 	$filename= $_FILES["file"]["name"];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);

					$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fotoBan'.$i)){
					//$this->session->set_flashdata('error_upload',$this->upload->display_errors());
					//redirect('Admin/Trans/cekharian');
							$fgActiveYN="Y";
							if($statusBanArr[$key] == "REJECT"){
								$fgActiveYN="N";	

								$data = array(
									'fgActiveYN' => "N",
									'updDate' => date("Y-m-d H:i:s"),
									'updUser' => $this->session->userdata('username')
									);
								$where = array(
									'idBan' => $idBanArr[$key],
									);
								$this->M_AdminMaster->update_data($where,$data,'m_ban');

							}

							$data = array(
							'idBan' => $idBanArr[$key],
							'idMerekBan' => $idMerekBanArr[$key],
							'noKendaraan' => $noKendaraan,
							'tglCek' => $tglCek,
							'posisiBan' => $posisiBanArr[$key],
							'jenisBan' => $jenisBanArr[$key],
							'idPattern' => $jenisTelapakArr[$key],
							'odometer' => $odometer,
							'TTBaru' => $TTBaruArr[$key],
							'TTSisa' => $TTSisaArr[$key],
							'statusBan' => $statusBanArr[$key],
							'fgHabisTidakRataYN' => $habisTidakRata,
							'fgBrakeSkidYN' => $brakeSkid,
							'fgDiffLowHighYN' => $diffLowHigh,
							'fgDiameterLuarTidakSamaYN' => $DiameterLuarTidakSama,
							'fgAdaTutupPentilYN' => $adaTutupPentil,
							'fgPentilBocorYN' => $pentilBocor,
							'fgPentilTersumbatYN' => $pentilTersumbat,
							'fgBerkaratYN' => $berkarat,
							'fgvelgRusakYN' => $velgRusak,
							'fgOliBocorYN' => $oliBocor,
							'fgDitundaPenggantiannyaYN' => $ditundaPenggantian,
							'fgDicopotDivulkanisirYN' => $dicopotDivulkanisir,
							'fgDicopotDiperbaikiYN' => $dicopotDiperbaiki,
							'fgSegeraDilepasYN' => $segeraDilepas,
							'tekananAnginTerukur' => $tekananAnginTerukurArr[$key],
							'tekananAnginStd' => $tekananAnginStdArr[$key],
							'keterangan' => $keteranganArr[$key],
							'fotoBan' => "",
							'idTeknisi' => $idTeknisi,
							'fgActiveYN' => $fgActiveYN,
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username')
							);
							$this->M_AdminTrans->input_data($data,'trans_dailycheck');




				}else{
					$data = array('upload_data' => $this->upload->data());
					$saved_file_name = $this->upload->data('file_name');
  		
					$config['image_library'] = 'gd2';
				    $config['source_image'] = DAILYCHECKPHOTOPATH.$saved_file_name;
				    $config['create_thumb'] = FALSE;
				    $config['maintain_ratio'] = TRUE;
				    $config['width']     = 1000;
				    $config['height']   = 950;

			 		$this->load->library('image_lib', $config);

				    $this->image_lib->clear();
				    $this->image_lib->initialize($config);
				    $this->image_lib->resize();

							$fgActiveYN="Y";
							if($statusBanArr[$key] == "REJECT"){
								$fgActiveYN="N";	

								$data = array(
									'fgActiveYN' => "N",
									'updDate' => date("Y-m-d H:i:s"),
									'updUser' => $this->session->userdata('username')
									);
								$where = array(
									'idBan' => $idBanArr[$key],
									);
								$this->M_AdminMaster->update_data($where,$data,'m_ban');

							}

					$data = array(
							'idBan' => $idBanArr[$key],
							'idMerekBan' => $idMerekBanArr[$key],
							'noKendaraan' => $noKendaraan,
							'tglCek' => $tglCek,
							'posisiBan' => $posisiBanArr[$key],
							'jenisBan' => $jenisBanArr[$key],
							'idPattern' => $jenisTelapakArr[$key],
							'odometer' => $odometer,
							'TTBaru' => $TTBaruArr[$key],
							'TTSisa' => $TTSisaArr[$key],
							'fgHabisTidakRataYN' => $habisTidakRata,
							'fgBrakeSkidYN' => $brakeSkid,
							'statusBan' => $statusBanArr[$key],
							'fgDiffLowHighYN' => $diffLowHigh,
							'fgDiameterLuarTidakSamaYN' => $DiameterLuarTidakSama,
							'fgAdaTutupPentilYN' => $adaTutupPentil,
							'fgPentilBocorYN' => $pentilBocor,
							'fgPentilTersumbatYN' => $pentilTersumbat,
							'fgBerkaratYN' => $berkarat,
							'fgvelgRusakYN' => $velgRusak,
							'fgOliBocorYN' => $oliBocor,
							'fgDitundaPenggantiannyaYN' => $ditundaPenggantian,
							'fgDicopotDivulkanisirYN' => $dicopotDivulkanisir,
							'fgDicopotDiperbaikiYN' => $dicopotDiperbaiki,
							'fgSegeraDilepasYN' => $segeraDilepas,
							'tekananAnginTerukur' => $tekananAnginTerukurArr[$key],
							'tekananAnginStd' => $tekananAnginStdArr[$key],
							'keterangan' => $keteranganArr[$key],
							'fotoBan' => DAILYCHECKPHOTOPATH.$saved_file_name,
							'idTeknisi' => $idTeknisi,
							'fgActiveYN' => $fgActiveYN,
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username')
							);
							$this->M_AdminTrans->input_data($data,'trans_dailycheck');
				}

			$i++;
		}
		redirect('Admin/Trans/cekharian');
	}

	public function hapus_cekharian($id)
	{
		$this->M_AdminTrans->jalankan_query_manual('update trans_dailycheck set fgActiveYN="N" where ID="'.$id.'"');
		redirect('Admin/Trans/cekharian');
	}

	public function mutasiban()
	{
		$this->log_activity(TRXMTSBN);
				$data['customer'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_customer where fgActiveYN="Y"')->result();
		$data['dc'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_dc where fgActiveYN="Y"')->result();
		$data['alasanban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_alasanban where fgActiveYN="Y"')->result();
		$data['nokendaraan'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_kendaraan where fgActiveYN="Y"')->result();
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y"')->result();
		$data['user'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_user where idRole = "'.TEKNISIROLE.'" or idRole = "'.TRUCKSERVICEROLE.'" and fgActiveYN="Y"')->result();
		$data['mutasiban'] = $this->M_AdminTrans->jalankan_query_manual('select a.*,c.descDC,b.cdAlasan, ifnull(e.serialNo,"") as serialNoPasang,ifnull(d.serialNo,"") as serialNoLepas from trans_mutasiban a left join m_alasanban b on a.idAlasanLepas = b.idAlasan left join m_dc c on a.idDC=c.idDC left join m_ban d on a.idBanLepas = d.idBan left join m_ban e on e.idBan = a.idBanPasang where a.fgActiveYN="Y"')->result();	
		$this->load->view('admin/trans-mutasi-ban',$data);
	}

		public function mutasibanperiode($tglAwal,$tglAkhir)
	{
		$this->log_activity(TRXMTSBN);
		$data['dc'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_dc where fgActiveYN="Y"')->result();
		$data['alasanban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_alasanban where fgActiveYN="Y"')->result();
		$data['nokendaraan'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_kendaraan where fgActiveYN="Y"')->result();
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y"')->result();
		$data['user'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_user where idRole = "'.TEKNISIROLE.'" and fgActiveYN="Y"')->result();
		$data['mutasiban'] = $this->M_AdminTrans->jalankan_query_manual('select a.*,c.descDC,b.cdAlasan, ifnull(e.serialNo,"") as serialNoPasang, ifnull(d.serialNo,"") as serialNoLepas from trans_mutasiban a left join m_alasanban b on a.idAlasanLepas = b.idAlasan left join m_dc c on a.idDC=c.idDC left join m_ban d on a.idBanLepas = d.idBan left join m_ban e on e.idBan = a.idBanPasang where a.fgActiveYN="Y" and a.tglMutasi between "'.$tglAwal.'" and "'.$tglAkhir.'"')->result();	
		$this->load->view('admin/frag/mutasi-ban',$data);
	}

	public function tambah_mutasiban()
	{
		$idCustomer = $this->input->post("idCustomer");
	    $idBanLepasArr = $_POST['idBanLepas'];
	   	$idBanPasangArr = $_POST['idBanPasang'];
	    $idDC = $this->input->post("idDC");
	    $noKendaraan = $this->input->post("noKendaraan");
	    $tglMutasi = $this->input->post("tglMutasi");
	    $idAlasanArr = $_POST['idAlasan'];
	    $posisiBanArr =  $_POST['posisiBan'];
	    $odometer =   $this->input->post("odometer");
	    $waktuMasuk = $this->input->post("waktuMasuk");
	    $waktuKeluar = $this->input->post("waktuKeluar");
	    $TTLepasArr =  $_POST['TTLepas'];
	    $TTPasangArr = $_POST['TTPasang'];
	    $vulkbbLepasArr = $_POST['vulkbbLepas'];
	    $vulkbbPasangArr =  $_POST['vulkbbPasang'];
	    $idTeknisi = $this->input->post("idTeknisi");
	    //$fotoBanLepas =  $_FILES['fotoBanLepas'];
	    $i=0;
		foreach( $idAlasanArr as $key => $n ) {
		// foreach($posisiBanArr as $posisiBan) {
				$config['upload_path']          = MUTASIPHOTOPATH;
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = MUTASIPHOTOSIZE;
				$config['max_width']            = MUTASIPHOTOWIDTH;
				$config['max_height']           = MUTASIPHOTOHEIGHT;
				$config['encrypt_name']			= TRUE;

				$new_name = date('Ymdhisa')."-EVIDENCE";
				$config['file_name'] = $new_name;

			 	$filename= $_FILES["file"]["name"];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);

				$this->load->library('upload', $config);
			 
				if ( ! $this->upload->do_upload('fotoBanLepas'.$i)){
					//$this->session->set_flashdata('error_upload',$this->upload->display_errors());
					//redirect('Admin/Trans/mutasiban');


					$data = array(
							'idBanLepas' => $idBanLepasArr[$key],
							'idBanPasang' => $idBanPasangArr[$key],
							'idDC' => $idDC,
							'noKendaraan' => $noKendaraan,
							'tglMutasi' => $tglMutasi,
							'idAlasanLepas' => $idAlasanArr[$key],
							'posisiBan' => $posisiBanArr[$key],
							'odometer' => $odometer,
							'waktuMasuk' => $waktuMasuk,
							'waktuKeluar' => $waktuKeluar,
							'TTLepas' => $TTLepasArr[$key],
							'TTPasang' => $TTPasangArr[$key],
							'vulkbbLepas' => $vulkbbLepasArr[$key],
							'vulkbbPasang' => $vulkbbPasangArr[$key],
							'fotoBanLepas' => "",
							'idTeknisi' => $idTeknisi,
							'fgActiveYN' => 'Y',
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username')
							);
							$this->M_AdminTrans->input_data($data,'trans_mutasiban');


							$where = array('noKendaraan' => $noKendaraan,'idDC' => $idDC,'idCustomer' => $idCustomer,'fgActiveYN' => 'Y',);
							$where2 = array('idBan' => $idBanPasangArr[$key],'idDC' => $idDC,'idCustomer' => $idCustomer,'fgActiveYN' => 'Y',);
							$dataUpdate = array(
								//'fgActiveYN' => 'Y',
								'statusKirim' => '1',
								'updDate' => date("Y-m-d H:i:s"),
								'updUser' => $this->session->userdata('username')
								);
							$this->M_AdminMaster->update_data($where2,$dataUpdate,'trans_ban_dikirim');
							$this->M_AdminMaster->update_data($where,$dataUpdate,'trans_kendaraan_dikirim');
							
							$i++;


				}else{
					$data = array('upload_data' => $this->upload->data());
					$saved_file_name = $this->upload->data('file_name');

					$config['image_library'] = 'gd2';
				    $config['source_image'] = MUTASIPHOTOPATH.$saved_file_name;
				    $config['create_thumb'] = FALSE;
				    $config['maintain_ratio'] = TRUE;
				    $config['width']     = 1000;
				    $config['height']   = 950;

			 		$this->load->library('image_lib', $config);

				    $this->image_lib->clear();
				    $this->image_lib->initialize($config);
				    $this->image_lib->resize();

					$data = array(
							'idBanLepas' => $idBanLepasArr[$key],
							'idBanPasang' => $idBanPasangArr[$key],
							'idDC' => $idDC,
							'noKendaraan' => $noKendaraan,
							'tglMutasi' => $tglMutasi,
							'idAlasanLepas' => $idAlasanArr[$key],
							'posisiBan' => $posisiBanArr[$key],
							'odometer' => $odometer,
							'waktuMasuk' => $waktuMasuk,
							'waktuKeluar' => $waktuKeluar,
							'TTLepas' => $TTLepasArr[$key],
							'TTPasang' => $TTPasangArr[$key],
							'vulkbbLepas' => $vulkbbLepasArr[$key],
							'vulkbbPasang' => $vulkbbPasangArr[$key],
							'fotoBanLepas' => MUTASIPHOTOPATH.$saved_file_name,
							'idTeknisi' => $idTeknisi,
							'fgActiveYN' => 'Y',
							'updDate' => date("Y-m-d H:i:s"),
							'updUser' => $this->session->userdata('username')
							);
							$this->M_AdminTrans->input_data($data,'trans_mutasiban');


							$where = array('noKendaraan' => $noKendaraan,'idDC' => $idDC,'idCustomer' => $idCustomer,'fgActiveYN' => 'Y',);
							$where2 = array('idBan' => $idBanPasangArr[$key],'idDC' => $idDC,'idCustomer' => $idCustomer,'fgActiveYN' => 'Y');
							$dataUpdate = array(
								//'fgActiveYN' => 'Y',
								'statusKirim' => '1',
								'updDate' => date("Y-m-d H:i:s"),
								'updUser' => $this->session->userdata('username')
								);
							$this->M_AdminMaster->update_data($where2,$dataUpdate,'trans_ban_dikirim');
							$this->M_AdminMaster->update_data($where,$dataUpdate,'trans_kendaraan_dikirim');
							
							$i++;
				}
		}
							redirect('Admin/Trans/mutasiban');

	}
	public function hapus_mutasiban($id)
	{
		$this->M_AdminTrans->jalankan_query_manual('update trans_mutasiban set fgActiveYN="N" where ID="'.$id.'"');
		redirect('Admin/Trans/mutasiban');
	}

	public function riwayatban()
	{
		$this->log_activity(TRXRWTBN);
		$data['riwayatban'] = $this->M_AdminTrans->jalankan_query_manual('select j.*,g.*,h.*,d.serialNo,c.noLambung, f.descDC,a.nokendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi,b.tglMutasi,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC left join m_merkban g on d.idMerekBan= g.idMerekban 
			left join m_ukuranban h on d.idUkuranBan = h.idUkuranBan
			left join trans_dc i on i.idDC = f.idDC
			left join m_customer j on i.idCustomer = j.idCustomer where a.fgActiveYN="Y"')->result();	
		
		$this->load->view('admin/trans-riwayat-ban',$data);
	}

	public function riwayatbanperiode($tglAwal,$tglAkhir)
	{
		$this->log_activity(TRXRWTBN);
		$data['riwayatban'] = $this->M_AdminTrans->jalankan_query_manual('select j.*,g.*,h.*,d.serialNo,c.noLambung, f.descDC,a.noKendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi,b.tglMutasi,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC left join m_merkban g on d.idMerekBan= g.idMerekban 
			left join m_ukuranban h on d.idUkuranBan = h.idUkuranBan 
			left join trans_dc i on i.idDC = f.idDC
			left join m_customer j on i.idCustomer = j.idCustomer
			where a.fgActiveYN="Y" and a.tglMutasi between "'.$tglAwal.'" and "'.$tglAkhir.'" or b.tglMutasi between "'.$tglAwal.'" and "'.$tglAkhir.'"')->result();	
		
		$this->load->view('admin/frag/riwayat-ban',$data);
	}


	public function stempelban()
	{
	    $this->log_activity(TRXSTPBN);

		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y" order by serialNo')->result();
		$data['dc'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_dc where fgActiveYN="Y"')->result();

		$data['stempelBan'] = $this->M_AdminTrans->jalankan_query_manual('select a.ID as idTrans, a.*, b.*,c.*,d.*,e.* from trans_stempelban 
			a left join m_ban b on a.idBan = b.idban left join m_dc c on a.idDC = c.idDC left join m_ukuranban d on
			 b.idUkuranBan = d.idUkuranBan left join m_merkban e on b.idMerekBan = e.idMerekBan where a.fgActiveYN="Y"')->result();	
		$this->load->view('admin/trans-stempel-ban',$data);
	}

	public function stempelbanperiode($tglAwal,$tglAkhir)
	{
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y" order by serialNo')->result();
		$data['dc'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_dc where fgActiveYN="Y"')->result();

		$data['stempelBan'] = $this->M_AdminTrans->jalankan_query_manual('select a.ID as idTrans, a.*, b.*,c.*,d.*,e.* from trans_stempelban 
			a left join m_ban b on a.idBan = b.idban left join m_dc c on a.idDC = c.idDC left join m_ukuranban d on
			 b.idUkuranBan = d.idUkuranBan left join m_merkban e on b.idMerekBan = e.idMerekBan where a.fgActiveYN="Y" and a.tgl_masuk between "'.$tglAwal.'" and "'.$tglAkhir.'"')->result();		
		
		$this->load->view('admin/frag/stempel-ban',$data);
	}


	public function tambah_stempelban()
	{
	    $this->log_activity(TRXSTPBN);

	    $idBan = $this->input->post("idBan");
	    $idDC = $this->input->post("idDC");
	    $keterangan = $this->input->post("keterangan");
	    $statusVulkan = $this->input->post("statusVulkan");


		$data = array(
			'idBan' => $idBan,
			'idDC' => $idDC,
			'keterangan' => $keterangan,
			'statusVulkan' => $statusVulkan,
			'tgl_masuk' => date("Y-m-d H:i:s"),
			'fgActiveYN' => 'Y',
			'updDate' => date("Y-m-d H:i:s"),
			'updUser' => $this->session->userdata('username')
			);
		$this->M_AdminTrans->input_data($data,'trans_stempelban');

		$this->M_AdminTrans->jalankan_query_manual('update m_ban set statusVulkan = "'.$statusVulkan.'" where idBan="'.$idBan.'"');	
		$this->load->view('admin/trans-stempel-ban',$data);

		redirect('Admin/Trans/stempelban');

	}
	public function hapus_stempelban($id)
	{
		$this->M_AdminTrans->jalankan_query_manual('update trans_stempelban set fgActiveYN="N" where ID="'.$id.'"');
		redirect('Admin/Trans/stempelban');
	}
	

	function get_banAutoComplete(){
        $query = $this->input->get('query');
        $this->db->like('serialNo', $query);
        $data = $this->db->get("m_ban")->result();
        echo json_encode( $data);
    }

    
    

}
