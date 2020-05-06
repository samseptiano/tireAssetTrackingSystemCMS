<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->model('M_Login');
			$this->load->model('M_AdminTrans');
			if($this->session->userdata('token') != UTOKEN){
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
	public function riwayatban()
	{
		$data['riwayatban'] = $this->M_AdminTrans->jalankan_query_manual('select g.*,h.*,d.serialNo, f.descDC,a.noKendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi,b.tglMutasi,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan,i.jumlahRoda, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC 
			left join m_merkban g on d.idMerekBan= g.idMerekban 
			left join m_ukuranban h on d.idUkuranBan = h.idUkuranBan
			left join m_axle i on c.idAxle=i.idAxle
			left join trans_ban k on a.idBanPasang = k.idBan or b.idBanLepas = k.idBan
			left join m_customer l on l.idCustomer = k.idCustomer 
			where a.fgActiveYN="Y" and l.idCustomer = "'.$this->session->userdata('idCustomer').'"')->result();


		// $data['riwayatban'] = $this->M_AdminTrans->jalankan_query_manual('select g.*,h.*,d.serialNo, f.descDC,a.noKendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi,b.tglMutasi,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan,i.jumlahRoda, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas
		// 	from trans_mutasiban a
		// 	inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
		// 	left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
		// 	left join m_ban d on a.idBanPasang = d.idBan 
		// 	left join m_ban e on b.idBanLepas = e.idBan
		// 	left join m_dc f on a.idDC = f.idDC 
		// 	left join m_merkban g on d.idMerekBan= g.idMerekban 
		// 	left join m_ukuranban h on d.idUkuranBan = h.idUkuranBan
		// 	left join m_axle i on c.idAxle=i.idAxle
		// 	left join trans_ban j on e.idBan = j.idBan where 
		// 	j.idCustomer = "'.$this->session->userdata('idCustomer').'"')->result();
		
		$this->load->view('user/trans-riwayat-ban',$data);
	}

	public function dataBanDipakaiDiTruk()
	{


		$data['databan'] = $this->M_AdminTrans->jalankan_query_manual('
		 	select a1.idBanpasang as IDBAN
		 	,max(a1.tglMutasi) as tglMutasi
		 	,a1.posisiBan
		 	,a1.noKendaraan
		 	, b1.*
		 	,c1.ukuranBan 
			,f1.descDC
		 	from trans_mutasiban a1 
		 	left JOIN m_ban b1 on a1.idBanPasang = b1.idBan 
		 	left join m_ukuranban c1 on b1.idUkuranBan = c1.idUkuranBan 
		 	left join trans_kendaraan d1 on d1.noKendaraan = a1.noKendaraan
			left join trans_dc e1 on e1.idDC = d1.idDC
			left join m_dc f1 on d1.idDC = f1.idDC
			left join trans_ban k on b1.idBan = k.idBan
			left join m_customer l on l.idCustomer = k.idCustomer 
		 	where a1.fgActiveYN="Y" and l.idCustomer="'.$this->session->userdata('idCustomer').'" and a1.fgActiveYN="Y" and b1.fgActiveYN="Y" GROUP BY(a1.posisiBan) order by a1.tglMutasi desc')->result();	

		// $data['databan'] = $this->M_AdminTrans->jalankan_query_manual('
		// select a1.idBanpasang as IDBAN
		//  	,max(a1.tglMutasi) as tglMutasi
		//  	,a1.posisiBan
		//  	,a1.noKendaraan
		//  	, b1.*
		//  	,c1.ukuranBan 
		// 	,f1.descDC
		//  	from trans_mutasiban a1 
		//  	left JOIN m_ban b1 on a1.idBanPasang = b1.idBan 
		//  	left join m_ukuranban c1 on b1.idUkuranBan = c1.idUkuranBan 
		//  	left join trans_kendaraan d1 on d1.noKendaraan = a1.noKendaraan
		// 	left join trans_dc e1 on e1.idDC = d1.idDC
		// 	left join m_dc f1 on d1.idDC = f1.idDC
		//  	where a1.fgActiveYN="Y" and b1.fgActiveYN="Y" GROUP BY(a1.posisiBan) order by a1.tglMutasi desc
		// 	union
		//  	select a1.idBanpasang as IDBAN
		//  	,a1.noKendaraan
		//  	, b1.*
		//  	,c1.ukuranBan 
		// 	,f1.descDC
		//  	from trans_mutasiban a1 
		//  	left JOIN m_ban b1 on a1.idBanPasang = b1.idBan 
		//  	left join m_ukuranban c1 on b1.idUkuranBan = c1.idUkuranBan 
		//  	left join trans_kendaraan d1 on d1.noKendaraan = a1.noKendaraan
		// 	left join trans_dc e1 on e1.idDC = d1.idDC
		// 	left join m_dc f1 on d1.idDC = f1.idDC
		//  	where a1.fgActiveYN="Y" and b1.fgActiveYN="Y"  GROUP BY(a.posisiBan) order by a.tglMutasi desc')->result();	
		
		$this->load->view('user/trans-data-ban-dipakai-ditruk',$data);
	}


	public function waktuPergantianBan()
	{
		$data['waktuPergantian'] = $this->M_AdminTrans->jalankan_query_manual('
			select f.descDC,a.noKendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi as tglMutasiPasang ,b.tglMutasi as tglMutasiLepas,d.serialNo, abs(datediff(b.tglMutasi, a.tglMutasi)) as umurBan,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas,g.jumlahRoda
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC
			left join trans_ban k on d.idBan = k.idBan or  e.idBan = k.idBan
			left join m_customer l on l.idCustomer = k.idCustomer 
            left join m_axle g on c.idAxle = g.idAxle where a.fgActiveYN="Y" and l.idCustomer="'.$this->session->userdata('idCustomer').'"')->result();	
		
		$this->load->view('user/trans-waktu-pergantian-ban',$data);
	}

	public function totalLifeBan()
	{
		$data['totalLifeBan'] = $this->M_AdminTrans->jalankan_query_manual('
			select f.descDC,a.noKendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi as tglMutasiPasang ,b.tglMutasi as tglMutasiLepas,d.serialNo, abs(datediff(b.tglMutasi, a.tglMutasi)) as umurBan,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas,g.jumlahRoda
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC
            left join m_axle g on c.idAxle = g.idAxle
			left join trans_ban k on d.idBan = k.idBan or  e.idBan = k.idBan
			left join m_customer l on l.idCustomer = k.idCustomer 
			where a.fgActiveYN="Y" and l.idCustomer="'.$this->session->userdata('idCustomer').'"
			group by a.idBanPasang')->result();	
		
		$this->load->view('user/trans-total-life-ban',$data);
	}
	public function historyVulkanisir()
	{

			$data['historyVulkanisir'] = $this->M_AdminTrans->jalankan_query_manual('
			select b.serialNo, a.vulkBBPasang, a.tglMutasi FROM trans_mutasiban a 
			left join m_ban b on a.idBanPasang = b.idBan
			left join trans_ban k on b.idBan = k.idBan
			left join m_customer l on l.idCustomer = k.idCustomer
			where k.fgActiveYN="Y" and l.idCustomer = "'.$this->session->userdata('idCustomerr').'"')->result();	

			// $data['historyVulkanisir'] = $this->M_AdminTrans->jalankan_query_manual('
			// select b.serialNo, count(a.vulkBBPasang) as statusVulkanisir FROM trans_mutasiban a left join m_ban b on a.idBanPasang = b.idBan group by b.serialNo')->result();	

		// $data['historyVulkanisir'] = $this->M_AdminTrans->jalankan_query_manual('
		// 	select * FROM trans_mutasiban WHERE idBan = ""')->result();	
		
		$this->load->view('user/trans-history-vulkanisir',$data);
	}
	public function totalCostBan()
	{
		$data['totalCostBan'] = $this->M_AdminTrans->jalankan_query_manual('select b.serialNo, a.vulkBBPasang, a.tglMutasi,c.harga, d.idCustomer FROM 
			trans_mutasiban a left join m_ban b on a.idBanPasang = b.idBan left join trans_ban d on d.idBan = b.idBan left join m_harga c on  b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan
			left join m_customer l on l.idCustomer = d.idCustomer
			where a.fgActiveYN="Y" and l.idCustomer= "'.$this->session->userdata('idCustomer').'"')->result();	
		
		$this->load->view('user/trans-total-cost-ban',$data);
	}
	public function penyebabKerusakanBan()
	{
		$data['penyebabKerusakanBan'] = $this->M_AdminTrans->jalankan_query_manual('select d.descDC,a.noKendaraan,a.posisiBan,c.*, b.cdAlasan,b.descAlasan FROM trans_mutasiban a 
			left join m_alasanban b on a.idAlasanLepas = b.idAlasan 
			left join m_ban c on a.idBanLepas = c.idBan 
			left join m_dc d on d.idDC = a.idDC
			left join trans_ban k on c.idBan = k.idBan
			left join m_customer l on l.idCustomer = k.idCustomer where a.fgActiveYN="Y" and l.idCustomer = "'.$this->session->userdata('idCustomer').'"')->result();	
		
		$this->load->view('user/trans-penyebab-kerusakan-ban',$data);
	}
	public function mutasiBan()
	{
		$data['customer'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_customer where fgActiveYN="Y"')->result();
		$data['dc'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_dc where fgActiveYN="Y"')->result();
		$data['alasanban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_alasanban where fgActiveYN="Y"')->result();
		$data['nokendaraan'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_kendaraan where fgActiveYN="Y"')->result();
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y"')->result();
		$data['user'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_user where idRole = "'.TEKNISIROLE.'" and fgActiveYN="Y"')->result();
		$data['mutasiban'] = $this->M_AdminTrans->jalankan_query_manual('select a.*,c.descDC,b.cdAlasan from trans_mutasiban a 
			left join m_alasanban b on a.idAlasanLepas = b.idAlasan 
			left join m_dc c on a.idDC=c.idDC 
			left join trans_dc d on d.idDC = c.idDC  where a.fgActiveYN="Y" and d.idCustomer= "'.$this->session->userdata('idCustomer').'" and a.fgActiveYN="Y"')->result();	
		$this->load->view('user/trans-mutasi-ban-periode',$data);
	}

	public function mutasibanPeriode($tglAwal,$tglAkhir)
	{
		$data['dc'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_dc where fgActiveYN="Y"')->result();
		$data['alasanban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_alasanban where fgActiveYN="Y"')->result();
		$data['nokendaraan'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_kendaraan where fgActiveYN="Y"')->result();
		$data['ban'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_ban where fgActiveYN="Y"')->result();
		$data['user'] = $this->M_AdminTrans->jalankan_query_manual(' select * from m_user where idRole = "'.TEKNISIROLE.'" and fgActiveYN="Y"')->result();
		$data['mutasiban'] = $this->M_AdminTrans->jalankan_query_manual('select a.*,c.descDC,b.cdAlasan from trans_mutasiban a left join m_alasanban b on a.idAlasanLepas = b.idAlasan left join m_dc c on a.idDC=c.idDC left join trans_dc d on d.idDC = c.idDC  where d.idCustomer= "'.$this->session->userdata('idCustomer').'" and  a.fgActiveYN="Y" and a.tglMutasi between "'.$tglAwal.'" and "'.$tglAkhir.'"')->result();	
		$this->load->view('user/frag/mutasi-ban-periode',$data);
	}
	public function totalPembelianPerbanPerPeriode()
	{
		$data['totalPembelianPerbanPerPeriode'] = $this->M_AdminTrans->jalankan_query_manual("select a.idBanLepas,a.vulkbbPasang,b.serialNo,c.harga,d.idCustomer,d.customerName
			FROM trans_mutasiban a left JOIN m_ban b on a.idbanPasang = b.idBan left JOIN m_harga c 
			on b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan and a.vulkbbPasang = c.statusVulkan
			left join m_customer d on c.idCustomer = d.idCustomer where a.fgActiveYN='Y' and a.vulkbbPasang='BB' and d.idCustomer='".$this->session->userdata('idCustomer')."'")->result();

		// $data['totalPembelianPerbanPerPeriode'] = $this->M_AdminTrans->jalankan_query_manual("select a.idBanLepas,a.vulkbbPasang,b.serialNo,c.harga,d.idCustomer,d.customerName
		// 	FROM trans_mutasiban a left JOIN m_ban b on a.idbanPasang = b.idBan left JOIN m_harga c 
		// 	on b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan and a.vulkbbPasang = c.statusVulkan
		// 	left join m_customer d on c.idCustomer = d.idCustomer where a.vulkbbPasang='BB' and d.idCustomer='' and a.tglMutasi BETWEEN '2020-01-01' and '2020-12-31'")->result();	
		
		$this->load->view('user/trans-total-pembelian-perban-per-periode',$data);
	}
	public function totalCostBanPerUnitPerPeriode()
	{

		$data['totalCostBanPerUnitPerPeriode'] = $this->M_AdminTrans->jalankan_query_manual("select a.idBanLepas,a.vulkbbPasang,b.serialNo,c.harga,d.idCustomer,d.customerName
			FROM trans_mutasiban a left JOIN m_ban b on a.idbanPasang = b.idBan left JOIN m_harga c 
			on b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan and a.vulkbbPasang = c.statusVulkan
			left join m_customer d on c.idCustomer = d.idCustomer where a.fgActiveYN='Y' and  d.idCustomer = '".$this->session->userdata('idCustomer')."'")->result();		
		

		// $data['totalCostBanPerUnitPerPeriode'] = $this->M_AdminTrans->jalankan_query_manual("select a.idBanLepas,a.vulkbbPasang,b.serialNo,c.harga,d.idCustomer,d.customerName
		// 	FROM trans_mutasiban a left JOIN m_ban b on a.idbanPasang = b.idBan left JOIN m_harga c 
		// 	on b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan and a.vulkbbPasang = c.statusVulkan
		// 	left join m_customer d on c.idCustomer = d.idCustomer where d.idCustomer='' and a.tglMutasi BETWEEN '2020-01-01' and '2020-12-31'")->result();
			
		$this->load->view('user/total-cost-ban-per-unit-per-periode',$data);
	}

	function get_banAutoComplete(){
        $query = $this->input->get('query');
        $this->db->like('serialNo', $query);
        $data = $this->db->get("m_ban")->result();
        echo json_encode( $data);
    }
   

}
