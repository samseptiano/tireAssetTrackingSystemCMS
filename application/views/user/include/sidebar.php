<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>User/Home">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url();?>assets/admin/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo APPNAME ?></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()?>User/Home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Main Menu
      </div>
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true"
          aria-controls="collapseTransaksi">
          <i class="fas fa-fw fa-table"></i>
          <span>Report</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Report</h6>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/riwayatban">History Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/dataBanDipakaiDiTruk">Data Ban Dipakai Truk</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/waktuPergantianBan">Waktu Pergantian Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/totalLifeBan">Total Life ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/historyVulkanisir">History Vulkanisir Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/totalCostBan">Total Cost Harga Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/riwayatban">Mileage Ban Terbanyak</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/penyebabKerusakanBan">Penyebab Kerusakan Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/mutasiBan">Mutasi Ban per Periode</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/totalPembelianPerbanPerPeriode">Total Pembelian Ban<br> per Periode</a>
            <a class="collapse-item" href="<?php echo base_url()?>User/Trans/totalCostBanPerUnitPerPeriode">Total Cost Ban per Unit<br> per Periode</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>