<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo TRXCKHR ?></title>
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
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/Home"><?php echo HOME ?></a></li>
              <li class="breadcrumb-item"><?php echo TRX ?></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo TRXCKHR ?></li>
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
                        <div class="col-sm-4"><input style="font-size:11px" type="date" id="tglAwal" class="form-control"></div>
                        <div class="col-sm-2"><center><p style="margin-top:10px">s/d</p></center></div>
                        <div class="col-sm-4">
                      <input type="date" id="tglAkhir" style="font-size:11px" class="form-control"></div>
                        <div class="col-sm-2">
                        <center><button type="button" id="filterButtons" style="margin-top:5px" class="btn btn-sm btn-primary mb-1">Filter</button></center>
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">Pilih Periode Tanggal Tabel.</small>
                    </div>
                    
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button type="button" id="addModal" class="btn btn-primary mb-1"   data-toggle="modal"
                    data-target="#exampleModalScrollable" id="addModal"  onclick="myFunction()" id="#modalScroll" >Tambah</button>
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
                        <th>No Kendaraan</th>
                        <th>Posisi Ban</th>
                        <th>Merek Ban</th>
                        <th>Serial</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No Kendaraan</th>
                        <th>Posisi Ban</th>
                        <th>Merek Ban</th>
                        <th>Serial</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                     </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($cekHarian as $c){?>
                      <tr>
                        <td><?php echo $c->noKendaraan ?></td>
                        <td><?php echo $c->posisiBan ?></td>
                        <td><?php echo $c->merekBan ?></td>
                        <td><?php echo $c->serialNo ?></td>
                        <td><?php echo $c->tglCek ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollableView" id="#modalScroll"
                    data-id="<?php echo $c->IDTrans?>"
                     data-nokendaraan="<?php echo $c->noKendaraan?>"
                      data-tglcek="<?php echo $c->tglCek?>"
                       data-idban="<?php echo $c->idBan?>"
                        data-posisiban="<?php echo $c->posisiBan?>"
                         data-jenisban="<?php echo $c->jenisBan?>"
                          data-idpattern="<?php echo $c->idPattern?>"
                         data-idmerekban="<?php echo $c->idMerekBan?>"
                         data-odometer="<?php echo $c->odometer?>"
                         data-ttbaru="<?php echo $c->TTBaru?>"
                         data-ttsisa="<?php echo $c->TTSisa?>"
                         data-habistidakrata="<?php echo $c->fgHabisTidakRataYN?>"
                         data-brakeskid="<?php echo $c->fgBrakeSkidYN?>"
                         data-difflowhigh="<?php echo $c->fgDiffLowHighYN?>"
                         data-diameterluartidaksama="<?php echo $c->fgDiameterLuarTidakSamaYN?>"
                         data-adatutuppentil="<?php echo $c->fgadaTutupPentilYN?>"
                         data-pentilbocor="<?php echo $c->fgPentilBocorYN?>"
                         data-pentiltersumbat="<?php echo $c->fgPentilTersumbatYN?>"
                         data-berkarat="<?php echo $c->fgberkaratYN?>"
                         data-velgrusak="<?php echo $c->fgVelgRusakYN?>"
                         data-olibocor="<?php echo $c->fgOliBocorYN?>"
                         data-ditundapenggantian="<?php echo $c->fgDitundaPenggantiannyaYN?>"
                         data-dicopotdivulkanisir="<?php echo $c->fgDicopotDivulkanisirYN?>"
                         data-dicopotdiperbaiki="<?php echo $c->fgDicopotDiperbaikiYN?>"
                         data-segeradilepas="<?php echo $c->fgSegeraDilepasYN?>"
                         data-tekanananginterukur="<?php echo $c->tekananAnginTerukur?>"
                         data-tekanananginstd="<?php echo $c->tekananAnginStd?>"
                         data-keterangan="<?php echo $c->keterangan?>"
                         data-fotoban="<?php echo $c->fotoBan?>"
                         data-idteknisi="<?php echo $c->idteknisi?>"
                         data-statusban="<?php echo $c->statusBan?>"
                     >View</button>
                           <?php if($this->session->userdata('role') == ADMINROLE){?>
                          <button type="button" id="delModal" data-id="<?php echo $c->IDTrans?>" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">Delete</button>
                    <?php } ?></td>  
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/Trans/hapus_cekharian/" class="btn btn-primary">Ya</a>
                </div>
              </div>
            </div>
          </div>


          <!-- Modal Scrollable View-->
          <div class="modal fade" id="exampleModalScrollableView" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Cek Harian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <input type="hidden" name="id" class="form-control" id="id">
                      <div class="row">
                         <div class="col-md-6">
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanLepas" >No Kendaraan</label>
                                <select class="form-control" id="noKendaraan" name="noKendaraan" disabled="disabled">
                                  <?php foreach($noLambung as $n){?>
                                    <option value="<?php echo $n->noKendaraan?>"><?php echo $n->noKendaraan?></option>
                                  <?php }?>
                                  </select>
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tanggal Cek</label>
                              <input type="text"  name="tglCek" class="form-control" id="tglCek" readonly="readonly">
                      </div>
                    </div>
                    </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1" id="txtidDC" >ID Ban</label>
                    <select class="form-control" id="idBan" name="idBan" disabled="disabled">
                       <option value="">- BAN -</option>
                      <?php foreach($ban as $b){?>
                        <option value="<?php echo $b->idBan?>"><?php echo $b->serialNo?></option>
                      <?php }?>
                      </select>
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan">Posisi Ban</label>
                             <select class="form-control" id="posisiBan" name="posisiBan"  disabled="disabled">
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
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                            </select>
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Jenis Ban</label>
                              <select class="form-control" id="jenisBan" name="jenisBan" disabled="disabled">
                              <option value="">-JENIS BAN -</option>
                              <option value="BIAS">BIAS</option>
                              <option value="RADIAL">RADIAL</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Jenis Telapak</label>
                                <select class="form-control" id="idPattern" name="idPattern" disabled="disabled">
                                   <option value="">-JENIS TELAPAK -</option>
                                  <?php foreach($pattern as $p){?>
                                    <option value="<?php echo $p->idPattern?>"><?php echo $p->pattern?></option>
                                  <?php }?>
                                  </select>          
                                  </div>

                        <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Merek Ban</label>
                                  <select class="form-control" id="idMerekBan" name="idMerekBan" disabled="disabled">
                                    <option value="">-MEREK BAN -</option>
                                    <?php foreach($merekBan as $m){?>
                                      <option value="<?php echo $m->idMerekBan?>"><?php echo $m->merekBan?></option>
                                    <?php } ?>
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
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tebal Telapak Baru</label>
                              <input type="text" name="TTBaru" class="form-control" id="TTBaru" readonly="readonly">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tebal Telapak Sisa</label>
                              <input type="text" name="TTSisa" class="form-control" id="TTSisa" readonly="readonly">
                      </div>
                        </div>
                      </div>
                          <div class="form-group">
                                <label><input type="checkbox" id="habisTidakRata" name="habisTidakRata" value="Y" disabled="disabled">Habis/Tidak Rata</label><br>
                                <label><input type="checkbox" id="brakeSkid" name="brakeSkid" value="Y" disabled="disabled">Brake Skid</label><br>
                                <label><input type="checkbox" id="diffLowHigh" name="diffLowHigh" value="Y" disabled="disabled">Difference - lowHigh (31nds)</label><br>
                                <label><input type="checkbox" id="DiameterLuarTidakSama" name="DiameterLuarTidakSama" value="Y" disabled="disabled">Diameter Luar Tidak Sama</label><br>
                                <label><input type="checkbox" id="adaTutupPentil" name="adaTutupPentil" value="Y" disabled="disabled">Ada Tutup Pentil</label><br>
                                <label><input type="checkbox" id="pentilBocor" name="pentilBocor" value="Y" disabled="disabled">Pentil Bocor</label><br>
                                <label><input type="checkbox" id="pentilTersumbat" name="pentilTersumbat" value="Y" disabled="disabled">Pentil Tersumbat</label><br>
                                <label><input type="checkbox" id="berkarat" name="berkarat" value="Y" disabled="disabled">Berkarat</label><br>
                                <label><input type="checkbox" id="velgRusak" name="velgRusak" value="Y" disabled="disabled">Velg Rusak</label><br>
                                <label><input type="checkbox" id="oliBocor" name="oliBocor" value="Y" disabled="disabled">Oli Bocor</label><br>
                                <label><input type="checkbox" id="ditundaPenggantian" name="ditundaPenggantian" value="Y" disabled="disabled">Ditunda Penggantiannya</label><br>
                                <label><input type="checkbox" id="dicopotDivulkanisir" name="dicopotDivulkanisir" value="Y" disabled="disabled">Dicopot Untuk Divulkanisir</label><br>
                                <label><input type="checkbox" id="dicopotDiperbaiki" name="dicopotDiperbaiki" value="Y" disabled="disabled">Dicopot Untuk Diperbaiki</label><br>
                                <label><input type="checkbox" id="segeraDilepas" name="segeraDilepas" value="Y" disabled="disabled">Segera Dilepas</label>

                          </div>
                          <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tekanan Angin Terukur</label>
                              <input type="text" name="tekananAnginTerukur" class="form-control" id="tekananAnginTerukur" readonly="readonly">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tekanan Angin Standard</label>
                              <input type="text" name="tekananAnginStd" class="form-control" id="tekananAnginStd" readonly="readonly">
                      </div>
                        </div>
                      </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="keterangan" readonly="readonly">
                      </div>
                        <select class="form-control" id="statusBan" name="statusBan" readonly="readonly">
                              <option value="OK">OK</option>
                              <option value="REJECT">REJECT</option>
                            </select>
                         <div class="form-group">
                          <img id="logo"  class="img-thumbnail"  alt="Italian Trulli">
                      <label for="exampleInputEmail1">Foto Ban</label>
                    </div>

                      <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Teknisi</label>
                              <select class="form-control" id="idTeknisi" name="idTeknisi"  disabled="disabled">
                                <?php foreach($user as $u){?>
                              <option value="<?php echo $u->username?>"><?php echo $u->username?></option>
                            <?php }?>
                            </select>                      
                          </div>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>



            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Cek Harian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form method="post" id="formAct" action="<?php echo base_url()?>Admin/Trans/tambah_cekharian"  enctype="multipart/form-data">
                      <input type="hidden" name="id" class="form-control" id="id">
                      <div class="row">
                         <div class="col-md-6">
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtidBanLepas" >No Kendaraan</label>
                                <select class="form-control noKendaraan" id="noKendaraan" name="noKendaraan">
                                  <option value="">- No Kendaraan -</option>
                                  <?php foreach($noLambung as $n){?>
                                    <option value="<?php echo $n->noKendaraan?>"><?php echo $n->noKendaraan?></option>
                                  <?php }?>
                                  </select>
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tanggal Cek</label>
                              <input type="text" name="tglCek" class="form-control" id="tglCeks" readonly="readonly">
                      </div>
                    </div>
                    </div>
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Odometer</label>
                              <input type="text" name="odometer" autocomplete="off" class="form-control nilaiOdometer" id="odometer">
                              <h7 class="txtOdometer" id="txtOdometer">###</h7></center>
                      </div>
                    <div class="satuBan" id="satuBan">
                      <br><br>
                      <div class="col-md-12"><center><h5 class="txtBanKe" id="txtBanKe">===== 1. =====</h5></center>
                      </div>
                      <div class="col-md-12"><button type="button" style="float: right" class="btn btn-sm btn-light" id="btnCollapse" data-toggle="collapse" data-target="#demo">Expand</button><br><br><br></div>
                       <div id="demo" class="collapse">
                       <div class="form-group">
                      <label for="exampleInputEmail1" id="txtidDC" >ID Ban</label>
                          <input type="text" autocomplete="off" name="idBan[]" class="form-control idBan" id="idBan" readonly="readonly">
               <!--      <select class="form-control idBan" id="idBan" name="idBan[]">
                        <option value="">- BAN -</option>
                      <?php foreach($ban as $b){?>
                        <option value="<?php echo $b->idBan?>"><?php echo $b->serialNo?></option>
                      <?php }?>
                      </select> -->
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Posisi Ban</label>
                             <select class="form-control posisiBan" id="posisiBan" name="posisiBan[]">
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
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                            </select>
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Jenis Ban</label>
                              <select class="form-control" id="jenisBan" name="jenisBan[]">
                               <option value="">-JENIS BAN -</option>
                              <option value="BIAS">BIAS</option>
                              <option value="RADIAL">RADIAL</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                              <label for="exampleInputEmail1" id="txtPattern" >Jenis Telapak</label>
                                  <select class="form-control idPattern" id="idPattern" name="idPattern[]">
                                   <option value="">-JENIS TELAPAK -</option>
                                  <?php foreach($pattern as $p){?>
                                    <option value="<?php echo $p->idPattern?>"><?php echo $p->pattern?></option>
                                  <?php }?>
                                  </select>                      
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Merek Ban</label>
                                  <select class="form-control idMerekBan" id="idMerekBan" name="idMerekBan[]">
                                     <option value="">-MEREK BAN -</option>
                                    <?php foreach($merekBan as $m){?>
                                      <option value="<?php echo $m->idMerekBan?>"><?php echo $m->merekBan?></option>
                                    <?php } ?>
                                    </select>   
                            </div>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tebal Telapak Baru</label>
                              <input type="text" autocomplete="off" name="TTBaru[]" class="form-control" id="TTBaru">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tebal Telapak Sisa</label>
                              <input type="text" autocomplete="off" name="TTSisa[]" class="form-control" id="TTSisa">
                      </div>
                        </div>
                      </div>
                          <div class="form-group">
                                <label><input type="checkbox" id="habisTidakRata" name="habisTidakRata[]" value="Y">Habis/Tidak Rata</label><br>
                                <label><input type="checkbox" id="brakeSkid" name="brakeSkid[]" value="Y">Brake Skid</label><br>
                                <label><input type="checkbox" id="diffLowHigh" name="diffLowHigh[]" value="Y">Difference - lowHigh (31nds)</label><br>
                                <label><input type="checkbox" id="DiameterLuarTidakSama" name="DiameterLuarTidakSama[]" value="Y">Diameter Luar Tidak Sama</label><br>
                                <label><input type="checkbox" id="adaTutupPentil" name="adaTutupPentil[]" value="Y">Ada Tutup Pentil</label><br>
                                <label><input type="checkbox" id="pentilBocor" name="pentilBocor[]" value="Y">Pentil Bocor</label><br>
                                <label><input type="checkbox" id="pentilTersumbat" name="pentilTersumbat[]" value="Y">Pentil Tersumbat</label><br>
                                <label><input type="checkbox" id="berkarat" name="berkarat[]" value="Y">Berkarat</label><br>
                                <label><input type="checkbox" id="velgRusak" name="velgRusak[]" value="Y">Velg Rusak</label><br>
                                <label><input type="checkbox" id="oliBocor" name="oliBocor[]" value="Y">Oli Bocor</label><br>
                                <label><input type="checkbox" id="ditundaPenggantian" name="ditundaPenggantian[]" value="Y">Ditunda Penggantiannya</label><br>
                                <label><input type="checkbox" id="dicopotDivulkanisir" name="dicopotDivulkanisir[]" value="Y">Dicopot Untuk Divulkanisir</label><br>
                                <label><input type="checkbox" id="dicopotDiperbaiki" name="dicopotDiperbaiki[]" value="Y">Dicopot Untuk Diperbaiki</label><br>
                                <label><input type="checkbox" id="segeraDilepas" name="segeraDilepas[]" value="Y">Segera Dilepas</label>

                          </div>
                          <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tekanan Angin Terukur</label>
                              <input type="text" name="tekananAnginTerukur[]" class="form-control" id="tekananAnginTerukur">
                      </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Tekanan Angin Standard</label>
                              <input type="text" name="tekananAnginStd[]" class="form-control tekananAnginStd" id="tekananAnginStd" readonly="readonly">
                      </div>
                        </div>
                      </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="keterangan">
                            </div>
                               <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Status Ban</label>
                              <select class="form-control" id="statusBan" name="statusBan[]">
                              <option value="OK">OK</option>
                              <option value="REJECT">REJECT</option>
                            </select>                      
                          </div>
                         <div class="form-group">
                          <img id="logo"  class="img-thumbnail"  alt="Italian Trulli">
                      <label for="exampleInputEmail1">Foto Ban</label>
                      <input type="file" name="fotoBan0" class="form-control" id="fotoBan" placeholder="fotoBan" size="33">
                    </div>
                  </div>
                  </div>
                   <div class="banLainnya" id="banLainnya"></div><br>
                        <!-- <a class="extra-fields-customer" href="#">Add Ban</a><br><br> -->
                      <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                              <label for="exampleInputEmail1" id="txtMerekBan" >Teknisi</label>
                              <select class="form-control" id="idTeknisi" name="idTeknisi">
                                <?php foreach($user as $u){?>
                              <option value="<?php echo $u->username?>"><?php echo $u->username?></option>
                            <?php }?>
                            </select>                      
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="button" id="submitBtn" class="btn btn-primary">Tambah</button>
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
      document.getElementById("tglCeks").value = y + "/" + m + "/" + d ;
    }

     $(document).on("click", "#submitBtn", function () {
        $('#formAct').submit();
    });

      $(document).on("click", "#delModal", function () {
      var id = $(this).data('id');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Trans/hapus_cekharian/'+id);
    });

      $(document).on("click", "#viewModal", function () {
          var id = $(this).data('id');
           var noKendaraan = $(this).data('nokendaraan');
          var tglCek = $(this).data('tglcek');
          var idBan = $(this).data('idban');
          var posisiBan = $(this).data('posisiban');
          var jenisBan = $(this).data('jenisban');
           var jenisTelapak = $(this).data('jenistelapak');
          var idMerekBan = $(this).data('idmerekban');
          var idPattern = $(this).data('idpattern');
          var odometer = $(this).data('odometer');
          var TTBaru = $(this).data('ttbaru');
          var TTSisa = $(this).data('ttsisa');
          var habistidakrata = $(this).data('habistidakrata');
          var brakeskid = $(this).data('brakeskid');
          var difflowhigh = $(this).data('difflowhigh');
          var diameterluartidaksama = $(this).data('diameterluartidaksama');
          var adatutuppentil = $(this).data('adatutuppentil');
          var pentilbocor = $(this).data('pentilbocor');
          var pentiltersumbat = $(this).data('pentiltersumbat');
          var berkarat = $(this).data('berkarat');
          var velgrusak = $(this).data('velgrusak');
          var olibocor = $(this).data('olibocor');
          var ditundapenggantian = $(this).data('ditundapenggantian');
          var dicopotdivulkanisir = $(this).data('dicopotdivulkanisir');
          var dicopotdiperbaiki = $(this).data('dicopotdiperbaiki');
          var tekanananginterukur = $(this).data('tekanananginterukur');
          var segeradilepas = $(this).data('segeradilepas');
          var tekanananginstd = $(this).data('tekanananginstd');
          var keterangan = $(this).data('keterangan');
          var fotoban = $(this).data('fotoban');
          var idTeknisi = $(this).data('idteknisi');
          var statusBan = $(this).data('statusban');


     $(".modal-body #id").val( id );
     $(".modal-body #noKendaraan").val( noKendaraan );
     $(".modal-body #tglCek").val( tglCek );
    $(" .modal-body #idBan option[value='"+idBan+"']").prop("selected", true);
    $(" .modal-body #posisiBan option[value='"+posisiBan+"']").prop("selected", true);
     $(".modal-body #jenisBan").val( jenisBan );
     $(".modal-body #jenisTelapak").val( jenisTelapak );
    $(" .modal-body #idMerekBan option[value='"+idMerekBan+"']").prop("selected", true);
     $(".modal-body #TTBaru").val( TTBaru );
     $(".modal-body #TTSisa").val( TTSisa );
     $(".modal-body #odometer").val( odometer );
      $('#logo').attr("src", '<?php echo base_url()?>'+fotoban);
    $(" .modal-body #idTeknisi option[value='"+idTeknisi+"']").prop("selected", true);
        $(" .modal-body #idPattern option[value='"+idPattern+"']").prop("selected", true);
    $(" .modal-body #statusBan option[value='"+statusBan+"']").prop("selected", true);
     $(".modal-body #keterangan").val( keterangan );
     $(".modal-body #tekananAnginTerukur").val( tekanananginterukur );
     $(".modal-body #tekananAnginStd").val( tekanananginstd );

          
        if(habistidakrata == 'Y'){
         $( "#habisTidakRata" ).prop( "checked", true );
         }
           if(brakeskid == 'Y'){
         $( "#brakeSkid" ).prop( "checked", true );
         }
           if(difflowhigh == 'Y'){
         $( "#diffLowHigh" ).prop( "checked", true );
         }
           if(diameterluartidaksama == 'Y'){
         $( "#DiameterLuarTidakSama" ).prop( "checked", true );
         }
           if(adatutuppentil == 'Y'){
         $( "#adaTutupPentil" ).prop( "checked", true );
         }
           if(pentilbocor == 'Y'){
         $( "#pentilBocor" ).prop( "checked", true );
         }
           if(pentiltersumbat == 'Y'){
         $( "#pentilTersumbat" ).prop( "checked", true );
         }
           if(berkarat == 'Y'){
         $( "#berkarat" ).prop( "checked", true );
         }
           if(velgrusak == 'Y'){
         $( "#velgRusak" ).prop( "checked", true );
         }
           if(olibocor == 'Y'){
         $( "#oliBocor" ).prop( "checked", true );
         }
           if(ditundapenggantian == 'Y'){
         $( "#ditundaPenggantian" ).prop( "checked", true );
         }
           if(dicopotdivulkanisir == 'Y'){
         $( "#dicopotDivulkanisir" ).prop( "checked", true );
         }
           if(dicopotdiperbaiki == 'Y'){
         $( "#dicopotDiperbaiki" ).prop( "checked", true );
         }
        if(segeradilepas == 'Y'){
         $( "#segeraDilepas" ).prop( "checked", true );
         }

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
          $("#tableRefresh").load('cekharianperiode/'+tglAwal+'/'+tglAkhir)
      }

    });



var tekananAnginStd=0;
var idPattern=0;
var idBan=0;
var idMerekBan=0;
var posisiBan=0;
var maxAddBan=0;
var btnCollapse = 0;
var demo=0;
var odometer=0;

$(".nilaiOdometer").attr('readonly', true);


 $('.noKendaraan').change(function(){
      odometer=0;
      var noKendaraan = $(this).val();
      var jumlahRoda;

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Admin/Master/getdataCheckFleet',
        method: 'post',
        data: {noKendaraan: noKendaraan},
        dataType: 'json',
        success: function(response){
          // Add options
          $(".nilaiOdometer").attr('readonly', false);


          $.each(response,function(index,data){

              odometer += parseInt(data['odometerAkhir'])
                   $('#txtOdometer').text("Odometer Terakhir: "+odometer+"km");


          if (index === 0){
                $(".posisiBan option[value='"+data["posisiBan"]+"']").prop("selected", true);
                $('.idBan').val(data['idBanPasang']);
                $("#idPattern option[value='"+data["idPattern"]+"']").prop("selected", true);
                $("#idMerekBan option[value='"+data["idMerekBan"]+"']").prop("selected", true);
               $('.tekananAnginStd').val(data['tekananAngin']);
                $('#btnCollapse').attr('data-target', "#demo");

                $('.posisiBan').change(function(){
                          //alert(my_condition);
                            $(".posisiBan option[value='"+data["posisiBan"]+"']").prop("selected", true);

                });
                $('.idPattern').change(function(){
                          //alert(my_condition);
                            $(".idPattern option[value='"+data["idPattern"]+"']").prop("selected", true);

                });
                 $('.idMerekBan').change(function(){
                          //alert(my_condition);
                            $(".idMerekBan option[value='"+data["idMerekBan"]+"']").prop("selected", true);

                });

          }
          else{
                    // $('.extra-fields-customer').click(function() {
                  $('.satuBan').clone().appendTo('.banLainnya');
                    $('.banLainnya .satuBan').addClass('single remove');
                    $('.single .extra-fields-customer').remove();
                   // $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
                    $('.banLainnya > .single').attr("class", "remove");


                        var count = 0;
                      var txtBanKe = 0;
                      var jenisBan = 0;
                    var fotoBan = 0;

                    $('.txtBanKe').each(function() {
                      txtBanKe++;
                      $(this).text("===== "+txtBanKe+". =====");
                    });
                    
                     $('.banLainnya #btnCollapse').each(function() {
                      btnCollapse++;
                      $(this).attr('id', "btnCollapse"+btnCollapse);
                      $(this).attr('data-target', "#demo"+btnCollapse);

                    });
                    $('.banLainnya #demo').each(function() {
                      demo++;
                      $(this).attr('id', "demo"+demo);

                    });

                    $('.banLainnya #jenisBan').each(function() {
                            jenisBan++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "jenisBan[]");
                    });
                    $('.banLainnya #posisiBan').each(function() {
                      posisiBan++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "posisiBan[]");
                        $(this).attr('id', "posisiBan"+posisiBan);

                        $("#posisiBan"+posisiBan+" option[value='"+data["posisiBan"]+"']").prop("selected", true);

                        var tempPosisi = posisiBan;
                        var my_condition = data["posisiBan"];
                        //var lastSel = $("#posisiBan"+posisiBan+" option:selected");
                        $(this).change(function(){
                          //alert(my_condition);
                            $("#posisiBan"+tempPosisi+" option[value='"+my_condition+"']").prop("selected", true);

                        });


                    });
              
                    $('.banLainnya #idBan').each(function() {
                            idBan++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "idBan[]");
                      $(this).attr('id', "idBan"+idBan);

                       $(this).val(data['idBanPasang']);
                       
                    });
                    $('.banLainnya #TTBaru').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "TTBaru[]");
                    });
                    $('.banLainnya #TTSisa').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "TTSisa[]");
                    });
                    $('.banLainnya #idPattern').each(function() {
                        idPattern++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "idPattern[]");
                        $(this).attr('id', "idPattern"+idPattern);
                        $("#idPattern"+idPattern+" option[value='"+data["idPattern"]+"']").prop("selected", true);

                         var tempPattern = idPattern;
                        var my_condition = data["idPattern"];
                        //var lastSel = $("#posisiBan"+posisiBan+" option:selected");
                        $(this).change(function(){
                          //alert(my_condition);
                            $("#idPattern"+tempPattern+" option[value='"+my_condition+"']").prop("selected", true);

                        });

                    });
                    $('.banLainnya #idMerekBan').each(function() {
                            idMerekBan++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "idMerekBan[]");
                        $(this).attr('id', "idMerekBan"+idMerekBan);
                        $("#idMerekBan"+idMerekBan+" option[value='"+data["idMerekBan"]+"']").prop("selected", true);

                         var tempMerekBann = idMerekBan;
                        var my_condition = data["idMerekBan"];
                        //var lastSel = $("#posisiBan"+posisiBan+" option:selected");
                        $(this).change(function(){
                          //alert(my_condition);
                            $("#idMerekBan"+tempMerekBann+" option[value='"+my_condition+"']").prop("selected", true);

                        });

                    });
                    $('.banLainnya #fotoBan').each(function() {
                            fotoBan++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "fotoBan"+fotoBan);
                    });
                        


                       $('.banLainnya #habisTidakRata').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "habisTidakRata[]");
                    });
                        $('.banLainnya #brakeSkid').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "brakeSkid[]");
                    });
                         $('.banLainnya #diffLowHigh').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "diffLowHigh[]");
                    });
                          $('.banLainnya #DiameterLuarTidakSama').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "DiameterLuarTidakSama[]");
                    });
                           $('.banLainnya #adaTutupPentil').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "adaTutupPentil[]");
                    });
                            $('.banLainnya #pentilBocor').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "pentilBocor[]");
                    });
                             $('.banLainnya #pentilTersumbat').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "pentilTersumbat[]");
                    });
                              $('.banLainnya #berkarat').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "berkarat[]");
                    });
                               $('.banLainnya #velgRusak').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "velgRusak[]");
                    });
                                $('.banLainnya #oliBocor').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "oliBocor[]");
                    });
                                 $('.banLainnya #ditundaPenggantian').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "ditundaPenggantian[]");
                    });
                                  $('.banLainnya #dicopotDivulkanisir').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "dicopotDivulkanisir[]");
                    });
                    $('.banLainnya #dicopotDiperbaiki').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "dicopotDiperbaiki[]");
                    });             

                  $('.banLainnya #segeraDilepas').each(function() {
                            count++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "segeraDilepas[]");
                    });  

                     $('.banLainnya #tekananAnginStd').each(function() {
                            tekananAnginStd++;
                      var fieldname = $(this).attr("name");
                      $(this).attr('name', "tekananAnginStd[]");
                         $(this).attr('id', "tekananAnginStd"+tekananAnginStd);

                       $(this).val(data['tekananAngin']);
                    });   


                  // });
                    

                $(document).on('click', '.remove-field', function(e) {
                  $(this).parent('.remove').remove();
                     //  count = 0;
                     //   txtBanKe = 0;
                     //   jenisBan = 0;
                     // fotoBan = 0;

                  e.preventDefault();
                });
          }
          
             //$('#noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
          });
        }
     });
   });

$('.idBan').change(function(){
      var idBan = $(this).val();
      // AJAX request
            //alert(idBan);

      $.ajax({
        url:'<?=base_url()?>Admin/Master/gettekananangin',
        method: 'post',
        data: {idBan: idBan},
        dataType: 'json',
        success: function(response){

          // Remove options 
          //$('#noKendaraan').find('option').not(':first').remove();
              $('.tekananAnginStd').val("");

          // Add options
          $.each(response,function(index,data){
            if(data==null){
              $('.tekananAnginStd').val("");
            }
            else{
                $('.tekananAnginStd').val(data['tekananAngin']);
            }
            //alert(data['tekananAngin']);
             //$('#noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
          });
        }
     });
   });



 $(".nilaiOdometer").blur(function() {   
    var inputValue = this.value;
    if(inputValue<odometer){
      alert("odometer yang diisi tidak boleh lebih kecil dari odometer yang terakhir");
      this.value="";
    }
 });


  </script>

</body>

</html>