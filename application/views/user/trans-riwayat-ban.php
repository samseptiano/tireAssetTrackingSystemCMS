<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo TRXRWTBN ?></title>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo TRXRWTBN ?></li>
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
                        <div class="col-sm-4"><input style="font-size:11px" type="date" class="form-control"></div>
                        <div class="col-sm-2"><center><p style="margin-top:10px">s/d</p></center></div>
                        <div class="col-sm-4">
                      <input type="date" style="font-size:11px" class="form-control"></div>
                        <div class="col-sm-2">
                        <center><button type="button" style="margin-top:5px" class="btn btn-sm btn-primary mb-1">Filter</button></center>
                        </div>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">Pilih Periode Tanggal Tabel.</small>
                    </div>
                    
                </div>
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
                       <button type="button" class="btn btn-primary mb-1">Add</button>
                </div> -->
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>DC</th>
                        <th>No Kendaraan</th>
                        <!-- <th>No Kendaraan</th> -->
                        <!-- <th>ID Ban</th> -->
                        <th>Posisi Ban</th>
                        <th>Tgl Mutasi</th>
                        <!-- <th>TT Pasang</th> -->
                        <!-- <th>TT Lepas</th> -->
                        <th>Odometer Pasang</th>
                        <th>Odometer Lepas</th>
                        <th>Total KM</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                        <th>DC</th>
                        <th>No Kendaraan</th>
                         <!-- <th>No Kendaraan</th> -->
                        <!-- <th>ID Ban</th> -->
                        <th>Posisi Ban</th>
                        <th>Tgl Mutasi</th>
                      <!--   <th>TT Pasang</th>
                        <th>TT Lepas</th> -->
                        <th>Odometer Pasang</th>
                        <th>Odometer Lepas</th>
                        <th>Total KM</th>
                        <th>Aksi</th>
                    </tfoot>
                    <tbody>
                      <?php foreach($riwayatban as $r){?>
                      <tr>
                        <td><?php echo $r->descDC ?></td>
                        <td><?php echo $r->noKendaraan ?></td>
                        <!-- <td><?php echo $r->noKendaraan ?></td> -->
                        <!-- <td><?php echo $r->idbanPasang?></td> -->
                        <td><?php echo $r->posisiBan ?></td>
                        <td><?php echo $r->tglMutasi ?></td>
                        <!-- <td><?php echo $r->TTPasang ?></td> -->
                        <!-- <td><?php echo $r->TTLepas ?></td> -->
                        <td><?php echo $r->odometerPasang." KM"?></td>
                        <td><?php echo $r->odometerLepas." KM" ?></td>
                        <td><?php echo $r->totalKM." KM" ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-xs btn-warning mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="#modalScroll"
                     data-descdc="<?php echo $r->descDC ?>"
                      data-nokendaraan="<?php echo $r->noKendaraan ?>"
                       data-nokendaraan="<?php echo $r->noKendaraan ?>"
                        data-serialno="<?php echo $r->serialNo ?>"
                        data-merekban="<?php echo $r->merekBan ?>"
                        data-ukuranban="<?php echo $r->ukuranBan ?>"
                        data-idban="<?php echo $r->idbanPasang ?>"
                         data-posisiban="<?php echo $r->posisiBan ?>"
                          data-tglmutasi="<?php echo $r->tglMutasi ?>"
                           data-ttpasang="<?php echo $r->TTPasang ?>"
                            data-ttlepas="<?php echo $r->TTLepas ?>"
                             data-odometerpasang="<?php echo $r->odometerPasang ?>"
                              data-odometerlepas="<?php echo $r->odometerLepas ?>"
                               data-totalkm="<?php echo $r->totalKM ?>"
                                   >View</button>
                        </td>  
                      </tr> 
                    <?php }?>
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

          <!-- Modal Scrollable -->
           <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Riwayat ban</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                     <div class="form-group">
                      <input type="hidden" name="idDC" class="form-control" id="idDC">
                      <label for="exampleInputEmail1">DC</label>
                      <input type="text" name="descDC" class="form-control" id="descDC" placeholder="DC" readonly="readonly">
                    </div>
                     <div class="row"><div class="col-md-12">
                      <div class="form-group">
                      <label for="exampleInputEmail1">No. Polisi</label>
                      <input type="text" name="noKendaraan" class="form-control" id="noKendaraan" placeholder="noKendaraan" readonly="readonly">
                    </div></div></div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ban</label>
                      <input type="text" name="idBan" class="form-control" id="idBan" placeholder="ID Ban" readonly="readonly">
                      <div class="row"><div class="col-md-6"><small id="merekBan" for="exampleInputEmail1">Merek Ban</small></div><div class="col-md-6"><small id="ukuranBan" for="exampleInputEmail1">Ukuran Ban</small></div></div>
                      <div class="row"><div class="col-md-6"><small id="serialNo" for="exampleInputEmail1">Serial</small></div><div class="col-md-6"><small id="posisiBan" for="exampleInputEmail1">Posisi Ban</small></div></div>
                      <div class="row"><div class="col-md-6"><small id="ttPasang" for="exampleInputEmail1">Tebal Telapak Pasang</small></div><div class="col-md-6"><small id="ttLepas" for="exampleInputEmail1">tebal Telapak Lepas</small></div></div>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Mutasi</label>
                      <input type="text" name="tglMutasi" class="form-control" id="tglMutasi" placeholder="tglMutasi" readonly="readonly">
                    </div>
                      <div class="row"><div class="col-md-6">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Odometer Lepas</label>
                      <input type="text" name="odometerLepas" class="form-control" id="odometerLepas" placeholder="odometerLepas" readonly="readonly">
                    </div></div><div class="col-md-6">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Odometer Pasang</label>
                      <input type="text" name="odometerPasang" class="form-control" id="odometerPasang" placeholder="odometerPasang" readonly="readonly">
                       <div class="row"><div class="col-md-12"><small id="totalKM" for="exampleInputEmail1">Total KM</small></div></div>
                    </div></div></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
           var descDC = $(this).data('descdc');
          var noKendaraan = $(this).data('nokendaraan');
          var serialNo = $(this).data('serialno');
          var merekBan = $(this).data('merekban');
          var ukuranBan = $(this).data('ukuranban');
          var tglMutasi = $(this).data('tglmutasi');
          var ttLepas = $(this).data('ttlepas');
          var ttPasang = $(this).data('ttpasang');
          var odometerLepas = $(this).data('odometerlepas');
          var odometerPasang = $(this).data('odometerpasang');
          var totalKM = $(this).data('totalkm');
          var ukuranBan = $(this).data('ukuranban');
          var posisiban = $(this).data('posisiban');
          var idBan = $(this).data('idban');

     $(".modal-body #noKendaraan").val( noKendaraan );
     $(".modal-body #descDC").val( descDC );
     $(".modal-body #idBan").val( idBan );
          $(".modal-body #tglMutasi").val( tglMutasi );
     $(".modal-body #odometerPasang").val( odometerPasang+" KM" );
     $(".modal-body #odometerLepas").val( odometerLepas+" KM");
     $(".modal-body #posisiBan").text("Posisi Ban Ke: "+ posisiban );

     $(".modal-body #serialNo").text( "Serial No: "+serialNo );
     $(".modal-body #merekBan").text( "Merek: "+merekBan );
     $(".modal-body #ukuranBan").text("Ukuran: "+ ukuranBan );
      $(".modal-body #ttPasang").text("TT Pasang: "+ ttPasang+"mm" );
     $(".modal-body #ttLepas").text("TT Lepas: "+ ttLepas+"mm" );
      $(".modal-body #totalKM").text("Total: "+ totalKM+" KM" );


     });

  </script>

</body>

</html>