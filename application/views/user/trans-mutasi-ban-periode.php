<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo TRXMTSBN ?></title>
    <?php include('include/css.php');?>
  <link href="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
       <?php include('include/sidebar.php');?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
         <?php include('include/topbar.php');?>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DataTables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>User/Home"><?php echo HOME ?></a></li>
              <li class="breadcrumb-item"><?php echo TRX ?></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo TRXMTSBN ?></li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                       <div class="form-group">
                      <label for="exampleInputEmail1">Periode</label>
                      <div class="row">
                        <div class="col-sm-4"><input  id="tglAwal" style="font-size:11px" type="date" class="form-control"></div>
                        <div class="col-sm-2"><center><p style="margin-top:10px">s/d</p></center></div>
                        <div class="col-sm-4">
                      <input  id="tglAkhir" type="date" style="font-size:11px" class="form-control"></div>
                        <div class="col-sm-2">
                        <center><button id="filterButtons" type="button" style="margin-top:5px" class="btn btn-sm btn-primary mb-1">Filter</button></center>
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">Pilih Periode Tanggal Tabel.</small>
                    </div>
                    
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                        <?php if($this->session->flashdata('error_upload')){ ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $this->session->flashdata('error_upload'); ?>
                  </div>
                  <?php } ?>
                <div class="table-responsive p-3" id="tableRefresh">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>DC</th>
                        <th>Tgl Mutasi</th>
                        <th>No Kendaraan</th>
                        <th>Odometer</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>DC</th>
                        <th>Tgl Mutasi</th>
                        <th>No Kendaraan</th>
                        <th>Odometer</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($mutasiban as $m){?>
                      <tr>
                        <td><?php echo $m->descDC?></td>
                        <td><?php echo $m->tglMutasi?></td>
                        <td><?php echo $m->noKendaraan?></td>
                        <td><?php echo $m->odometer?></td>
                         <td> <button type="button" class="btn btn-warning mb-1"  id="viewModal" data-toggle="modal"
                    data-target="#exampleModalScrollableView" id="#modalScroll"
                    data-id="<?php echo $m->ID?>"
                    data-title="<?php echo $m->ID?>"
                    data-fgactiveyn="<?php echo $m->fgActiveYN ?>"
                    data-iddc="<?php echo $m->idDC?>"
                    data-tglmutasi="<?php echo $m->tglMutasi ?>"
                    data-nokendaraan="<?php echo $m->noKendaraan?>"
                    data-odometer="<?php echo $m->odometer ?>"
                    data-posisiban="<?php echo $m->posisiBan?>"
                    data-waktumasuk="<?php echo $m->waktuMasuk ?>"
                    data-waktukeluar="<?php echo $m->waktuKeluar?>"
                    data-idbanlepas="<?php echo $m->idBanLepas ?>"
                    data-idbanpasang="<?php echo $m->idBanPasang?>"
                    data-ttlepas="<?php echo $m->TTLepas ?>"
                    data-ttpasang="<?php echo $m->TTPasang?>"
                    data-vulkbblepas="<?php echo $m->vulkbbLepas ?>"
                    data-vulkbbpasang="<?php echo $m->vulkbbPasang?>"
                    data-fotobanlepas="<?php echo $m->fotoBanLepas ?>"
                    data-idalasanlepas="<?php echo $m->idAlasanLepas?>"
                    data-idteknisi="<?php echo $m->idTeknisi ?>"
                    >View</button>
                          <?php //if($this->session->userdata('role') == ADMINROLE){?>
                          <?php //} ?></td>  
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Yakin Ingin Menghapus ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <a type="button" id="delButton" href="<?php echo base_url()?>admin/trans/hapus_mutasiban/" class="btn btn-primary">Ya</a>
                </div>
              </div>
            </div>
          </div>


          <!-- Modal Scrollable -->
          <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-titlee" id="exampleModalScrollableTitle">Tambah Mutasi Ban</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">  
                  <form method="post" id="formAct" action="<?php echo base_url()?>admin/trans/tambah_mutasiban"  enctype="multipart/form-data">
                      <input type="hidden" name="id" class="form-control" id="id">
                          <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tanggal Mutasi</label>
                              <input type="text" name="tglMutasi" class="form-control" id="tglMutasis" readonly="readonly">
                      </div>
                        <div class="form-group">
		                      <label for="exampleInputEmail1" id="txtidDC" >Customer</label>
		                    <select class="form-control" id="idCustomer" name="idCustomer">
		                      <option value="">-Customer-</option>
		                      <?php foreach($customer as $c){?>
		                        <option value="<?php echo $c->idCustomer?>"><?php echo $c->customerUsername?></option>
		                      <?php }?>
		                      </select>
                      </div> 
                   <div class="form-group">
                      <label for="exampleInputEmail1" id="txtidDC" >DC</label>
                    <!-- <select class="form-control" id="idDC" name="idDC">
                      <option value="">-DC-</option>
                      </select> -->
                      <input id="txtDC" class="txtDC form-control" type="text" name="txtDC" placeholder="txtDC">
                      <input id="idDC" class="idDC form-control" type="hidden" name="idDC" placeholder="idDC">

                      </div> 
                       <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanLepas" >No Kendaraan</label>
                               <!--  <select class="form-control" id="noKendaraan" name="noKendaraan">
                                   <option value="">-KENDARAAN-</option>
                                  </select> -->
                           <input id="noKendaraan" class="noKendaraan form-control" type="text" name="noKendaraan" placeholder="noKendaraan">


                      </div>
                               <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Waktu Masuk</label>
                              <input type="time" name="waktuMasuk" class="form-control" id="waktuMasuk">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Waktu Keluar</label>
                              <input type="time" name="waktuKeluar" class="form-control" id="waktuKeluar">
                      </div>
                        </div>
                      </div>
                        <div class="form-group">
								<label for="exampleInputEmail1" id="txtMerekBan" >Odometer</label>
                              <input type="text" name="odometer" class="form-control" id="odometer">
                      </div>
							<div class="satuBan" id="satuBan">
                             <div class="form-group">
                             <div class="row"><div class="col-md-2"><h5 class="txtBanKe" id="txtBanKe">1.</h5></div>
                             <div class="col-md-10">
							<label for="exampleInputEmail1" id="txtMerekBan" >Posisi Ban</label></div></div>
                             <select class="form-control" id="posisiBan" name="posisiBan[]">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">19</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                            </select>
                      </div>
                      		<div class="form-group">
                      <label for="exampleInputEmail1" id="txtidAlasan" >Alasan Afkir</label>
                    <select class="form-control" id="idAlasan" name="idAlasan[]">
                      <?php foreach($alasanban as $a){?>
                        <option value="<?php echo $a->idAlasan?>"><?php echo $a->descAlasan?></option>
                      <?php }?>
                      </select></div>
                       <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanLepas" >ID Ban Lepas</label>
                              <!--   <select class="form-control" id="idBanLepas" name="idBanLepas[]">
                                  <?php foreach($ban as $n){?>
                                    <option value="<?php echo $n->idBan?>"><?php echo $n->idBan?></option>
                                  <?php }?>
                                  </select> -->
                                  <input id="serialBanLepas" class="serialBanLepas form-control" type="text" name="serialBanLepas[]" placeholder="serialBanLepas">
                                  <input id="idBanLepas" class="idBanLepas form-control" type="hidden" name="idBanLepas[]" placeholder="idBanLepas">


                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanPasang" >ID Ban Pasang</label>
                               <!--  <select class="form-control" id="idBanPasang" name="idBanPasang[]">
                                  <?php foreach($ban as $n){?>
                                    <option value="<?php echo $n->idBan?>"><?php echo $n->idBan?></option>
                                  <?php }?>
                                  </select> -->
                              <input id="serialBanPasang" class="serialBanPasang form-control" type="text" name="serialBanPasang[]" placeholder="serialBanPasang">
                               <input id="idBanPasang" class="idBanPasang form-control" type="hidden" name="idBanPasang[]" placeholder="idBanPasang">
                                </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >TT Lepas</label>
                              <input type="text" name="TTLepas[]" class="form-control" id="TTLepas">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >TT Pasang</label>
                              <input type="text" name="TTPasang[]" class="form-control" id="TTPasang">
                      </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Vulk/BB lepas</label>
                              <select class="form-control" id="vulkbbLepas" name="vulkbbLepas[]">
                              <option value="BB">BB</option>
                              <option value="VULK1">VULK 1</option>
                            <option value="VULK2">VULK 2</option>
                            </select>                      
                          </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Vulk/BB pasang</label>
                              <select class="form-control" id="vulkbbPasang" name="vulkbbPasang[]">
                              <option value="BB">BB</option>
                              <option value="VULK1">VULK 1</option>
                            <option value="VULK2">VULK 2</option>

                            </select> 
                            </div>
                        </div>
                      </div>
                         <div class="form-group">
                          <img id="logo"  class="img-thumbnail"  alt="Italian Trulli">
                      <label for="exampleInputEmail1">Foto Ban Lepas</label>
                      <input type="file" name="fotoBanLepas0" class="form-control" id="fotoBanLepas" placeholder="fotoBanLepas" size="33">
                    </div>
                    </div>
                    <div class="banLainnya" id="banLainnya"></div><br>
                        <a class="extra-fields-customer" id="addBan" href="#">Add Ban</a><br><br>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Teknisi</label>
                              <select class="form-control" id="idTeknisi" name="idTeknisi">
                                <?php foreach($user as $u){?>
                              <option value="<?php echo $u->username?>"><?php echo $u->username?></option>
                            <?php }?>
                            </select>                      
                          </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtfgActiveYN" >FG Aktif</label>
                            <select class="form-control" id="fgActiveYN" name="fgActiveYN">
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                              </select>
                              </div>
                        </div>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button"  id="submitBtn" class="btn btn-primary">Tambah</button>
                </div>
              </div>
            </div>
          </div>



                                      <!-- VIEW DETAIL MODAL -->
          <div class="modal fade" id="exampleModalScrollableView" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-titleeView" id="titleeView">Detail Mutasi Ban</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">  
<!--                   <form method="post" id="formAct" action="<?php echo base_url()?>admin/master/tambah_mutasiban">
 -->                      <input type="hidden" name="id" class="form-control" id="id">
    				<div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tanggal Mutasi</label>
                              <input type="text" name="tglMutasi" class="form-control" id="tglMutasi" readonly="readonly">
                      </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1" id="txtidDC" >DC</label>
                    <select class="form-control" id="idDC" name="idDC" disabled="disabled">
                      <?php foreach($dc as $d){?>
                        <option value="<?php echo $d->idDC?>"><?php echo $d->descDC?></option>
                      <?php }?>
                      </select>
                      </div> 
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanLepas" >No Kendaraan</label>
                                <select class="form-control" id="noKendaraan" name="noKendaraan" disabled="disabled">
                                  <?php foreach($nokendaraan as $n){?>
                                    <option value="<?php echo $n->noKendaraan?>"><?php echo $n->noKendaraan?></option>
                                  <?php }?>
                                  </select>
                      </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1" id="txtidAlasan" >Alasan Afkir</label>
                    <select class="form-control" id="idAlasan" name="idAlasan" disabled="disabled">
                      <?php foreach($alasanban as $a){?>
                        <option value="<?php echo $a->idAlasan?>"><?php echo $a->descAlasan?></option>
                      <?php }?>
                      </select></div>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Posisi Ban</label>
                             <select class="form-control" class="posisiBan" id="posisiBan" name="posisiBan" disabled="disabled">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">19</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                            </select>
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Odometer</label>
                              <input type="text" name="odometer" class="form-control" id="odometer" readonly="readonly">
                      </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Waktu Masuk</label>
                              <input type="time" name="waktuMasuk" class="form-control" id="waktuMasuk"  readonly="readonly">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Waktu Keluar</label>
                              <input type="time" name="waktuKeluar" class="form-control" id="waktuKeluar"  readonly="readonly">
                      </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanLepas" >ID Ban Lepas</label>
                                <select class="form-control" id="idBanLepas" name="idBanLepas" disabled="disabled">
                                  <?php foreach($ban as $n){?>
                                    <option value="<?php echo $n->idBan?>"><?php echo $n->idBan?></option>
                                  <?php }?>
                                  </select>
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanPasang" >ID Ban Pasang</label>
                                <select class="form-control" id="idBanPasang" name="idBanPasang" disabled="disabled">
                                  <?php foreach($ban as $n){?>
                                    <option value="<?php echo $n->idBan?>"><?php echo $n->idBan?></option>
                                  <?php }?>
                                  </select>
                                </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >TT Lepas</label>
                              <input type="text" name="TTLepas" class="form-control" id="TTLepas"  readonly="readonly">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >TT Pasang</label>
                              <input type="text" name="TTPasang" class="form-control" id="TTPasang"  readonly="readonly">
                      </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Vulk/BB lepas</label>
                              <select class="form-control" id="vulkbbLepas" name="vulkbbLepas" disabled="disabled">
                              <option value="BB">BB</option>
                              <option value="VULK">VULK</option>
                            </select>                      
                          </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Vulk/BB pasang</label>
                              <select class="form-control" id="vulkbbPasang" name="vulkbbPasang" disabled="disabled">
                              <option value="BB">BB</option>
                              <option value="VULK">VULK</option>
                            </select> 
                            </div>
                        </div>
                      </div>
                         <div class="form-group">
                        <img id="lfotoMutasi"  class="img-thumbnail"  alt="Italian Trulli">
                      <label for="exampleInputEmail1">Foto Ban Lepas</label>
                      <!-- <input type="file" name="fotoBanLepas" class="form-control" id="fotoBanLepas" placeholder="fotoBanLepas" size="33" disabled="disabled" > -->
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Teknisi</label>
                              <select class="form-control" id="idTeknisi" name="idTeknisi" disabled="disabled">
                                <?php foreach($user as $u){?>
                              <option value="<?php echo $u->username?>"><?php echo $u->username?></option>
                            <?php }?>
                            </select>                      
                          </div>
                        </div>
                      </div>
                  <!-- </form> -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <!-- <button type="button"  id="submitBtn" class="btn btn-primary">Tambah</button> -->
                </div>
              </div>
            </div>
          </div>

      <!-- Footer -->
        <?php include('include/footer.php');?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include('include/js.php');?>
  <!-- Page level plugins -->
  <script src="<?php echo base_url()?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });


    function myFunction() {
        var n =  new Date();
        var y = n.getFullYear();
        var m = n.getMonth() + 1;
        var d = n.getDate();
      document.getElementById("tglMutasis").value = y + "/" + m + "/" + d ;
    }


 $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var id = $(this).data('id');
          var idDC = $(this).data('iddc');
          var tglMutasi = $(this).data('tglmutasi');
          var noKendaraan = $(this).data('nokendaraan');
          var odometer = $(this).data('odometer');
          var posisiBan = $(this).data('posisiban');
          var waktuMasuk = $(this).data('waktumasuk');
          var waktuKeluar = $(this).data('waktukeluar');
          var idBanLepas = $(this).data('idbanlepas');
          var idBanPasang = $(this).data('idbanpasang');
          var TTLepas = $(this).data('ttlepas');
          var TTPasang = $(this).data('ttpasang');
          var vulkbbLepas = $(this).data('vulkbblepas');
          var vulkbbPasang = $(this).data('vulkbbpasang');
          var fotoBanLepas = $(this).data('fotobanlepas');
          var idAlasanLepas = $(this).data('idalasanlepas');
          var idTeknisi = $(this).data('idteknisi');

     $("#titleeView").text( title );
    $(".modal-body #titleeView").val( title );
         $(".modal-body #id").val( id );
     $(".modal-body #waktuMasuk").val( waktuMasuk );
     $(".modal-body #waktuKeluar").val( waktuKeluar );
      $(".modal-body #odometer").val( odometer );
      $(".modal-body #tglMutasi").val( tglMutasi );
      $(".modal-body #TTLepas").val( TTLepas );
      $(".modal-body #TTPasang").val( TTPasang );
    $(" .modal-body #idDC option[value='"+idDC+"']").prop("selected", true);
    $(" .modal-body #posisiBan option[value='"+posisiBan+"']").prop("selected", true);
    $(" .modal-body #idAlasan option[value='"+idAlasanLepas+"']").prop("selected", true);
        $(" .modal-body #vulkbbPasang option[value='"+vulkbbPasang+"']").prop("selected", true);
    $(" .modal-body #vulkbbLepas option[value='"+vulkbbLepas+"']").prop("selected", true);
     $('#lfotoMutasi').attr("src", '<?php echo base_url()?>'+fotoBanLepas);

    $(" .modal-body #noKendaraan option[value='"+noKendaraan+"']").prop("selected", true);
    //$('#formAct').attr('action', '<?php echo base_url()?>admin/trans/update_mutasiban');
    //$('#submitBtn').html('Update');
    });



    $(document).on("click", "#delModal", function () {
      var id = $(this).data('id');
    $('#delButton').attr('href', '<?php echo base_url()?>admin/trans/hapus_mutasiban/'+id);
    });

      $(document).on("click", "#submitBtn", function () {
        $('#formAct').submit();
    });


  $(document).on("click", "#filterButtons", function () {
      var tglAwal = $("#tglAwal").val();
      var tglAkhir = $("#tglAkhir").val();

      var dateAwal = new Date(tglAwal);
      var dateAkhir = new Date(tglAkhir)

      if(dateAwal>dateAkhir){
        alert("Tanggal awal lebih besar dari tanggal akhir!");
      }
      else{
          $("#tableRefresh").load('mutasibanPeriode/'+tglAwal+'/'+tglAkhir)
      }

    });

   var myArray2D = new Array([],[]);
   var myArray = new Array();

  var myArrayLepas2D = new Array([],[]);
 var myArrayLepas = new Array();

   var dcArray2D = new Array([],[]);
  var dcArray = new Array();
 
 var kendaraanArray = new Array();


   $('#idCustomer').change(function(){
      var idCustomer = $(this).val();
      //alert(idCustomer);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Admin/master/getdcDikirim',
        method: 'post',
        data: {idCustomer: idCustomer},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#idDC').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
            dcArray.push(data['descDC'])

            var arr=new Array();
            arr.push(data['idDC']);
            arr.push(data['descDC']);
            dcArray2D.push(arr);
             //$('#idDC').append('<option value="'+data['idDC']+'">'+data['descDC']+'</option>');
          });
        }
     });
   });

 // $('#txtDC').change(function(){
 //        for(var i=0;i<dcArray2D.length;i++){
 //          if(dcArray2D[i][1] === $('#txtDC').val()){
 //              $('#idDC').val(dcArray2D[i][0]);
 //          }
 //        }


 //      var idDC = $('#idDC').val();
 //      // AJAX request
 //      $.ajax({
 //        url:'<?=base_url()?>admin/master/getkendaraanDikirim',
 //        method: 'post',
 //        data: {idDC: idDC,role: "TRUCKSERVICE"},
 //        dataType: 'json',
 //        success: function(response){

 //          // Remove options 
 //          $('#noKendaraan').find('option').not(':first').remove();

 //            kendaraanArray= new Array();;

 //          // Add options
 //          $.each(response,function(index,data){
 //            kendaraanArray.push(data['noKendaraan']);
 //             $('#noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
 //          });
 //        }
 //     });
 //   });


<?php foreach($ban as $n){?>
    myArrayLepas.push('<?php echo $n->serialNo ?>');

     var arr=new Array();
            arr.push('<?php echo $n->idBan ?>');
            arr.push('<?php echo $n->serialNo ?>');
            myArrayLepas2D.push(arr);
<?php }?>


// $('#txtDC').blur(function(){
//       var idDC = $('#idDC').val();
//       // AJAX request
//       $.ajax({
//         url:'<?=base_url()?>admin/master/getbanDikirim',
//         method: 'post',
//         data: {idDC: idDC,role: "TRUCKSERVICE"},
//         dataType: 'json',
//         success: function(response){

//           // Remove options 
//           $('#idBan').find('option').not(':first').remove();
         
//             // myArray2D=new Array();
//             // myArray=new Array();

//           // Add options
//           $.each(response,function(index,data){
//             myArray.push(data['serialNo'])


//             var arr=new Array();
//             arr.push(data['idBan']);
//             arr.push(data['serialNo']);
//             myArray2D.push(arr);

//              //$('#idBanPasang').append('<option value="'+data['idBan']+'">'+data['idBan']+'</option>');
//           });
//         }
//      });
//    });


//======================================================================================================
    // var jQuery_1_12_4 = $.noConflict(true);
function autocomplete(inp, arr,inp2) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/

                  inp.focus();


              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementsByClassName('serialBanPasang')[0], myArray,document.getElementsByClassName('idBanPasang')[0]);

//======================================================================================================

//======================================================================================================
    // var jQuery_1_12_4 = $.noConflict(true);
function autocompleteLepas(inp, arr,inp2) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              inp.focus();

              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocompleteLepas(document.getElementsByClassName('serialBanLepas')[0], myArrayLepas,document.getElementsByClassName('idBanLepas')[0]);

//======================================================================================================


//======================================================================================================
   // var jQuery_1_12_4 = $.noConflict(true);
function autocompleteDC(inp, arr) {

  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/


              for(var i=0;i<dcArray2D.length;i++){
          if(dcArray2D[i][1] === $('#txtDC').val()){
              $('#idDC').val(dcArray2D[i][0]);
          }
        }

           var idDC = $('#idDC').val();


            // AJAX request
            $.ajax({
              url:'<?=base_url()?>Admin/master/getkendaraanDikirim',
              method: 'post',
              data: {idDC: idDC,role: "TRUCKSERVICE"},
              dataType: 'json',
              success: function(response){

                // Remove options 
               // $('#noKendaraan').find('option').not(':first').remove();

                // Add options
                $.each(response,function(index,data){
                  kendaraanArray.push(data['noKendaraan']);
                   //$('#noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
                });
              }
           });


      // var idDC = $('#idDC').val();
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Admin/master/getbanDikirim',
        method: 'post',
        data: {idDC: idDC,role: "TRUCKSERVICE"},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#idBan').find('option').not(':first').remove();
         
            // myArray2D=new Array();
            // myArray=new Array();

          // Add options
          $.each(response,function(index,data){
            myArray.push(data['serialNo'])


            var arr=new Array();
            arr.push(data['idBan']);
            arr.push(data['serialNo']);
            myArray2D.push(arr);

             //$('#idBanPasang').append('<option value="'+data['idBan']+'">'+data['idBan']+'</option>');
          });
        }
     });


              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}



/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocompleteDC(document.getElementsByClassName('txtDC')[0], dcArray);

//======================================================================================================


//======================================================================================================
   // var jQuery_1_12_4 = $.noConflict(true);
function autocompleteKendaraan(inp, arr) {

  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
                  $(".noKendaraan").focus();

              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}



/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocompleteKendaraan(document.getElementsByClassName('noKendaraan')[0], kendaraanArray);

//======================================================================================================


 var maxAddBan=0;
 var xxx=0;
var posisiBan = 0;
var idBanPasang = 1;
var idBanLepas = 1;
var serialBanPasang = 1;
var serialBanLepas = 1;


 $('#serialBanLepas').blur(function(){
  //alert( $(this).val());
                            for(var i=0;i<myArrayLepas2D.length;i++){
                            if(myArrayLepas2D[i][1] === $('#serialBanLepas').val()){
                               $(".idBanLepas").val(myArrayLepas2D[i][0]);
                            }
                          }
                       });
 $('#serialBanPasang').blur(function(){
                            for(var i=0;i<myArray2D.length;i++){
                            if(myArray2D[i][1] === $('#serialBanPasang').val()){
                               $(".idBanPasang").val(myArray2D[i][0]);
                            }
                          }
                       });


 $('#noKendaraan').blur(function(){

     // $('.remove').remove();

      var noKendaraan = $(this).val();
      var jumlahRoda;
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Admin/master/getjumlahRoda',
        method: 'post',
        data: {noKendaraan: noKendaraan},
        dataType: 'json',
        success: function(response){

          // Add options
          $.each(response,function(index,data){

          		if(maxAddBan<data['jumlahRoda']){
          			          		 $('.extra-fields-customer').click(function() {
 	 				$('.satuBan').clone().appendTo('.banLainnya');
				    $('.banLainnya .satuBan').addClass('single remove');
				    $('.single .extra-fields-customer').remove();
				    $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
				    $('.banLainnya > .single').attr("class", "remove");

      					var count = 0;
				      var txtBanKe = 0;
				      var idAlasan = 0;
						var fotoBanLepas = 0;



				    $('.txtBanKe').each(function() {
				      txtBanKe++;
				      $(this).text(txtBanKe+".");
				    });
				      
				    $('.banLainnya #idAlasan').each(function() {
				            idAlasan++;
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "idAlasan[]");
				    });
				    $('.banLainnya #posisiBan').each(function() {
				            posisiBan++;
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "posisiBan[]");
				        $(this).attr('id', "posisiBan"+posisiBan);
				        //alert($( "#posisiBan"+(posisiBan) ).val());
				        //var i=0;
				        //var tempPosisi = posisiBan;

				        // alert(tempPosisi)
				        for(i=0;i<=posisiBan;i++){
				        	$("#posisiBan"+posisiBan+" option[value='"+$( "#posisiBan"+(i) ).val()+"']").remove();
				        	//alert(i);
				       	}
				     	//$("#posisiBan"+posisiBan+" option[value='"+$( "#posisiBan"+(posisiBan--) ).val()+"']").remove();
                xxx++;

				    });
			
				    $('.banLainnya #serialBanLepas').each(function() {
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "serialBanLepas[]");
                $(this).attr('id', "serialBanLepas"+serialBanLepas);
                $(this).attr('class', "serialBanLepas"+serialBanLepas+"  form-control");
                  $(this).val('');
        
                for(i=0;i<=serialBanLepas;i++){

                  if($(this).is('#serialBanLepas1')){
                        const index = myArrayLepas.indexOf($( "#serialBanLepas" ).val());
                              if (index > -1) {
                                myArrayLepas.splice(index, 1);
                              }
                  }
                  else{
                        const index = myArrayLepas.indexOf($( "#serialBanLepas"+(i) ).val());
                              if (index > -1) {
                                myArrayLepas.splice(index, 1);
                              }
                  }

                }


                autocompleteLepas(document.getElementsByClassName("serialBanLepas"+serialBanLepas+"  form-control")[0], myArrayLepas);

            


                if($(this).is('#serialBanLepas')){
              
                  }
                  else{
                       $(this).blur(function(){
                      for(var i=0;i<myArrayLepas2D.length;i++){
                      if(myArrayLepas2D[i][1] === $(this).val()){
                        var aaa=serialBanLepas-1;
                        //alert( myArray2D[i][0] +" "+aaa);
                        //$('.idBanPasang1').attr('value', myArray2D[i][0]);


                          //document.getElementsByClassName("idBanPasang"+serialBanPasang+" form-control").value=myArray2D[i][0];
                         $(".idBanLepas"+aaa).val(myArrayLepas2D[i][0]);
                      }
                    }
                 });
                  }



                
                

                serialBanLepas++;

				    });


            $('.banLainnya #idBanLepas').each(function() {
              var fieldname = $(this).attr("name");
              $(this).attr('name', "idBanLepas[]");
                $(this).attr('id', "idBanLepas"+idBanLepas);
                $(this).attr('class', "idBanLepas"+idBanLepas+"  form-control");
                  $(this).val('');
                idBanLepas++;

            });



             $('.banLainnya #idBanPasang').each(function() {
              var fieldname = $(this).attr("name");
              $(this).attr('name', "idBanPasang[]");
                $(this).attr('id', "idBanPasang"+idBanPasang);
                $(this).attr('class', "idBanPasang"+idBanPasang+"  form-control");
                  $(this).val('');
                idBanPasang++;

            });

				    $('.banLainnya #serialBanPasang').each(function() {
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "serialBanPasang[]");
                $(this).attr('id', "serialBanPasang"+serialBanPasang);
                $(this).attr('class', "serialBanPasang"+serialBanPasang+"  form-control");
                $(this).val('');


                for(i=0;i<=serialBanPasang;i++){

                  if($(this).is('#serialBanPasang1')){
                        const index = myArray.indexOf($( "#serialBanPasang" ).val());
                              if (index > -1) {
                                myArray.splice(index, 1);
                              }
                  }
                  else{
                        const index = myArray.indexOf($( "#serialBanPasang"+(i) ).val());
                              if (index > -1) {
                                myArray.splice(index, 1);
                              }
                  }

                }

                autocomplete(document.getElementsByClassName("serialBanPasang"+serialBanPasang+"  form-control")[0], myArray);


                $(this).blur(function(){
                      for(var i=0;i<myArray2D.length;i++){
                      if(myArray2D[i][1] === $(this).val()){
                        var aaa=serialBanPasang-1;
                        //alert( myArray2D[i][0] +" "+aaa);
                        //$('.idBanPasang1').attr('value', myArray2D[i][0]);


                          //document.getElementsByClassName("idBanPasang"+serialBanPasang+" form-control").value=myArray2D[i][0];
                         $(".idBanPasang"+aaa).val(myArray2D[i][0]);
                      }
                    }
                 });


               serialBanPasang++;


				    });





				    $('.banLainnya #TTLepas').each(function() {
				            count++;
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "TTLepas[]");
				    });
				    $('.banLainnya #TTPasang').each(function() {
				            count++;
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "TTPasang[]");
				    });
				    $('.banLainnya #vulkbblepas').each(function() {
				            count++;
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "vulkbblepas[]");
				    });
				    $('.banLainnya #vulkbbpasang').each(function() {
				            count++;
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "vulkbbpasang[]");
				    });
				    $('.banLainnya #fotoBanLepas').each(function() {
				            fotoBanLepas++;
				      var fieldname = $(this).attr("name");
				      $(this).attr('name', "fotoBanLepas"+fotoBanLepas);
				    });
          			          		
          			maxAddBan++;
          			          		 //alert(maxAddBan+" "+data['jumlahRoda']);
  				});
          	}

			  $(document).on('click', '.remove-field', function(e) {
			    $(this).parent('.remove').remove();
			    e.preventDefault();
			  });
             //$('#noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
          });
        }
     });
   });
  </script>
<!--   <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet"></link>
  <script src=" https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>var $j = jQuery.noConflict(true);</script>
  <script type="text/javascript">

  </script> -->

</body>

</html>