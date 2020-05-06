<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>Admin/Home">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url();?>assets/admin/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo APPNAME ?></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()?>Admin/Home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Main Menu
      </div>
      <?php if($this->session->userdata('role') == SUPERADMINROLE){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
          aria-expanded="true" aria-controls="collapseMaster">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Master</span>
        </a>
        <div id="collapseMaster" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master</h6>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/pelanggan">Master Pelanggan</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/dc">Master DC</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/merekban">Master Merek Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/ban">Master Ban</a>
            <!-- <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/dealer">Master Dealer</a> -->
            <!-- <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/fleet">Master Fleet</a> -->
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/kendaraan">Master Kendaraan</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/ukuranban">Master Ukuran Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/alasanban">Master Alasan Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/harga">Master Harga</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/pattern">Master Pattern</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/axle">Master Axle</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/tekananangin">Master Tekanan Angin</a>
          </div>
        </div>
      </li>
      <?php }?>
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true"
          aria-controls="collapseTransaksi">
          <i class="fas fa-fw fa-table"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi</h6>
                  <?php if($this->session->userdata('role') == SUPERADMINROLE || $this->session->userdata('role') == CHECKFLEETROLE){?>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Trans/cekharian">Trans Cek Harian</a>
          <?php }?>
            <?php if($this->session->userdata('role') == SUPERADMINROLE || $this->session->userdata('role') == ADMINROLE){?>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Trans/bandikirim">Trans Ban Dikirim</a>
          <?php } ?>
            <?php if($this->session->userdata('role') == SUPERADMINROLE || $this->session->userdata('role') == TRUCKSERVICEROLE){?>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Trans/mutasiban">Trans Mutasi Ban</a>
          <?php } ?>
            <?php if($this->session->userdata('role') == SUPERADMINROLE || $this->session->userdata('role') == ADMINROLE){?>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Trans/riwayatban">Trans Riwayat Ban</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Trans/stempelban">Trans Stempel Ban</a>
          <?php } ?>
          </div>
        </div>
      </li>
<?php if($this->session->userdata('role') == SUPERADMINROLE){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true"
          aria-controls="collapseSetting">
          <i class="fas fa-fw fa-table"></i>
          <span>Setting</span>
        </a>
        <div id="collapseSetting" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Setting</h6>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/user">User</a>
            <a class="collapse-item" href="<?php echo base_url()?>Admin/Master/role">Hak Akses</a>
          </div>
        </div>
      </li>
    <?php } ?>
        <?php if($this->session->userdata('role') == SUPERADMINROLE){?>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Report
      </div>
 <!--      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Report Transaksi</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Report Transaksi</h6>
            <a class="collapse-item" href="alerts.html">Trans Cek Harian</a>
            <a class="collapse-item" href="buttons.html">Trans Mutasi Ban</a>
            <a class="collapse-item" href="dropdowns.html">Trans Riwayat Ban</a>
            <a class="collapse-item" href="modals.html">Trans Stempel Ban</a>
          </div>
        </div>
      </li> -->
    <?php } ?>
 <?php if($this->session->userdata('role') == SUPERADMINROLE){ ?> 
<!--       <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span>
        </a>
      </li> -->
  <?php } ?> 
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>