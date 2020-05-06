<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRAXL ?></title>
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
              <li class="breadcrumb-item"><?php echo MSTR ?></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRAXL ?></li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">   
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6> -->
                       <button type="button" class="btn btn-primary mb-1"  data-toggle="modal"
                    data-target="#exampleModalScrollable" id="addModal" id="#modalScroll" >Tambah</button>
                </div>
                    <?php if($this->session->flashdata('error_upload')){ ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $this->session->flashdata('error_upload'); ?>
                  </div>
                  <?php } ?>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Jenis Kendaraan</th>
                        <th>Jumlah Axle</th>
                        <th>keterangan</th>
                        <th>Jumlah Ban</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Jenis Kendaraan</th>
                        <th>Jumlah Axle</th>
                         <th>Jumlah Ban</th>
                        <th>keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($axle as $p){ ?>
                      <tr>
                        <td><?php echo $p->idAxle ?></td>
                        <td><?php echo  substr($p->jenisKendaraan,0,10)."..." ?></td>
                        <td><?php echo $p->jumlahAxle ?></td>
                        <td><?php echo $p->jumlahRoda ?></td>
                        <td><?php echo $p->keterangan ?></td>
                        <td><?php echo $p->fgActiveYN ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                                    data-target="#exampleModalScrollable"id="#modalScroll"
                                    data-title="<?php echo $p->idAxle ?>" 
                                    data-id="<?php echo $p->idAxle ?>" 
                                    data-jeniskendaraan="<?php echo $p->jenisKendaraan ?>" 
                                     data-jumlahroda="<?php echo $p->jumlahRoda ?>" 
                                    data-keterangan="<?php echo $p->keterangan ?>" 
                                    data-jumlahaxle="<?php echo $p->jumlahAxle ?>"
                                    data-gambaraxle="<?php echo $p->gambarAxle ?>"
                                    data-fgactiveyn="<?php echo $p->fgActiveYN ?>"
                                    >View</button>
                          <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal" data-idaxle="<?php echo $p->idAxle ?>"
                    id="#myBtn">Delete</button>
                      </td>
                        <?php } ?>  
                      </tr>
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/Master/hapus_axle/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-title" id="titlee">Tambah Axle Kendaraan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                	<form method="post" id="formAct" action="<?php echo base_url()?>Admin/Master/tambah_axle" enctype="multipart/form-data">
                     <div class="form-group">
                      <input type="hidden" name="idAxle" class="form-control" id="idAxle">
                      <label for="exampleInputEmail1">Jenis kendaraan</label>
                      <input type="text" name="jenisKendaraan" class="form-control" id="jenisKendaraan" placeholder="Jenis Kendaraan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Axle</label>
                              <select class="form-control" id="jumlahAxle" name="jumlahAxle">
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
                              <option value="23">23</option>

                            </select>
                           </div>
                           <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Roda</label>
                              <select class="form-control" id="jumlahRoda" name="jumlahRoda">
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
                              <option value="23">23</option>

                            </select>
                           </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="keterangan">
                    </div>
                      <div class="form-group">
                      	 <input type="hidden" name="gambarAxleLama" class="form-control" id="gambarAxleLama">
                      	<img id="logo"  class="img-thumbnail"  alt="Italian Trulli">
                      <label for="exampleInputEmail1">Gambar Axle</label>
                      <input type="file" name="gambarAxle" class="form-control" id="gambarAxle" placeholder="gambar Axle" size="33">
                    </div>
                    <label for="exampleInputEmail1" id="txtfgActiveYN" >FGActive</label>
                    <select class="form-control" id="fgActiveYN" name="fgActiveYN">
                        <option value="Y">Y</option>
                        <option value="N">N</option>
                      </select>
                 </form>      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" id="submitBtn" class="btn btn-primary">Tambah</button>
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

    $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var jenisKendaraan = $(this).data('jeniskendaraan');
          var jumlahAxle = $(this).data('jumlahaxle');
          var keterangan = $(this).data('keterangan');
          var fgActiveYN = $(this).data('fgactiveyn');
          var gambarAxle = $(this).data('gambaraxle');
          var jumlahRoda = $(this).data('jumlahroda');

     $("#titlee").text( title );
     $('#logo').attr("src", '<?php echo base_url()?>'+gambarAxle);
    $(".modal-body #idAxle").val( title );
    $(".modal-body #gambarAxleLama").val( gambarAxle );
     $(".modal-body #jenisKendaraan").val( jenisKendaraan );
          $(".modal-body #keterangan").val( keterangan );

    $(" .modal-body #jumlahRoda option[value='"+jumlahRoda+"']").prop("selected", true);

    $(" .modal-body #jumlahAxle option[value='"+jumlahAxle+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Master/update_axle');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    });

    $(document).on("click", "#delModal", function () {
      var idAxle = $(this).data('idaxle');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Master/hapus_axle/'+idAxle);
    });


    $(document).on("click", "#addModal", function () {
    $('#fgActiveYN').hide();
    $('#txtfgActiveYN').hide();
     $('#logo').hide();
    });

     $(document).on("click", "#submitBtn", function () {
        $('#formAct').submit();
    });



  </script>

</body>

</html>