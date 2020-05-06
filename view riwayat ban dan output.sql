
//history per ban 
select a.idDC,a.NoKendaraan,a.posisiBan,a.tglMutasi,b.tglMutasi,a.TTPasang,b.TTLepas,a.odometer,b.odometer,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas,b.vulkbbLepas,b.idAlasanLepas from trans_mutasiban a
inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas where a.idBanPasang='x1'

select f.descDC,a.noLambung,a.idbanPasang,a.posisiBan,a.tglMutasi as tglMutasiPasang ,b.tglMutasi as tglMutasiLepas, abs(datediff(b.tglMutasi, a.tglMutasi)) as umurBan
,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan,c.jumlahRoda,c.ukuranBanAxle1,c.ukuranBanAxle2, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noLambung = b.noLambung
			left join m_kendaraan c on a.noLambung = c.noLambung 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC
where a.idBanPasang='x1'


//data ban yang dipakai di truk 
select a.idBanLepas as IDBAN, c.* from trans_mutasiban a left JOIN m_ban c on a.idBanLepas = c.idBan 
where a.noLambung = 'xx1'
union
select b.idBanpasang as IDBAN, d.* from trans_mutasiban b left JOIN m_ban d on b.idBanPasang = d.idBan 
where b.noLambung = 'xx1'



//Waktu pergantian ban di truk
select f.descDC,a.noKendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi as tglMutasiPasang ,b.tglMutasi as tglMutasiLepas, abs(datediff(b.tglMutasi, a.tglMutasi)) as umurBan
,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan,c.ukuranBanAxle1,c.ukuranBanAxle2, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas
,g.jumlahRoda
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC
            left join m_axle g on c.idAxle = g.idAxle
where a.idBanPasang='x1'

//total Life ban
select f.descDC,a.noKendaraan,a.idbanPasang,a.posisiBan,a.tglMutasi as tglMutasiPasang ,b.tglMutasi as tglMutasiLepas, sum(abs(datediff(b.tglMutasi, a.tglMutasi))) as umurBan
,a.TTPasang,b.TTLepas,a.odometer as odometerPasang,b.odometer as odometerLepas,(b.odometer-a.odometer) as totalKM, a.vulkbbLepas as vulkbbPasang,b.vulkbbLepas,b.idAlasanLepas,c.noKendaraan,g.jumlahRoda,c.ukuranBanAxle1,c.ukuranBanAxle2, d.serialNo as serialNoBanPasang, e.serialNo as serialNoBanLepas
			from trans_mutasiban a
			inner join trans_mutasiban b on a.idBanPasang = b.idBanLepas and a.noKendaraan = b.noKendaraan
			left join m_kendaraan c on a.noKendaraan = c.noKendaraan 
			left join m_ban d on a.idBanPasang = d.idBan 
			left join m_ban e on b.idBanLepas = e.idBan
			left join m_dc f on a.idDC = f.idDC
            left join m_axle g on c.idAxle = g.idAxle
			group by a.idbanPasang

			
//kemampuan divulkanisir terbanyak
SELECT * FROM trans_stempelban WHERE idBan = ''

//Total cost harga ban ?
select a.*, b.harga from m_ban a left join m_harga b on a.idMerekBan = b.idMerekBan and a.idUkuranBan = b.idUkuranBan and a.statusVulkan = b.statusVulkan


//penyebab kerusakan ban terbanyak
SELECT c.*, b.cdAlasan,b.descAlasan FROM trans_mutasiban a left join m_alasanban b on a.idAlasanLepas = b.idAlasan left join m_ban c on a.idBanLepas = c.idBan

//Data Mutasi Ban per Periode
SELECT * FROM trans_mutasiban WHERE tglMutasi BETWEEN '2020-01-01' and '2020-12-31'

//Masalah Alignment pada truk

//total pembelian Perban per periode
select a.idBanLepas,a.vulkbbPasang,b.serialNo,b.series,c.harga,d.idCustomer,d.customerName
			FROM trans_mutasiban a left JOIN m_ban b on a.idbanPasang = b.idBan left JOIN m_harga c 
			on b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan and a.vulkbbPasang = c.statusVulkan
			left join m_customer d on c.idCustomer = d.idCustomer where d.idCustomer='' and a.tanggalMasuk BETWEEN '2020-01-01' and '2020-12-31'


//total pembelian Perban per periode
select a.idBanLepas,a.vulkbbPasang,b.serialNo,b.series,c.harga,d.idCustomer,d.customerName
			FROM trans_mutasiban a left JOIN m_ban b on a.idbanPasang = b.idBan left JOIN m_harga c 
			on b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan and a.vulkbbPasang = c.statusVulkan
			left join m_customer d on c.idCustomer = d.idCustomer where d.idCustomer='' and a.tanggalMasuk BETWEEN '2020-01-01' and '2020-12-31'


//total cost ban per unit per periode
SELECT a.idBan,a.statusVulkan,b.serialNo,b.series,c.harga,d.idCustomer,d.customerName
FROM trans_stempelban a left JOIN m_ban b on a.idBan = b.idBan left JOIN m_harga c 
on b.idMerekBan = c.idMerekBan and b.idUkuranBan = c.idUkuranBan and a.statusVulkan = b.statusVulkan
left join m_customer d on c.idCustomer = d.idCustomer where d.idCustomer='' and a.idBan='' and a.tanggalMasuk BETWEEN '2020-01-01' and '2020-12-31'
