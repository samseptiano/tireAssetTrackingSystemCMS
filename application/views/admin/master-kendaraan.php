<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRKNDRN ?></title>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRKNDRN ?></li>
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
                       <button type="button" class="btn btn-primary mb-1"   data-toggle="modal"
                    data-target="#exampleModalScrollable" id="addModal" id="#modalScroll" >Tambah</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No. Lambung</th>
                        <th>No. Polisi</th>
                        <th>Jenis</th>
                        <th>Ukuran Ban</th>
                        <th>Jumlah Roda</th>
                        <th>FG Active</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>No. Lambung</th>
                        <th>No. Polisi</th>
                        <th>Jenis</th>
                        <th>Ukuran Ban</th>
                        <th>Jumlah Roda</th>
                        <th>FG Active</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     <?php foreach($kendaraan as $k){?>
                      <tr>
                        <td><?php echo $k->noLambung ?></td>
                        <td><?php echo $k->noKendaraan ?></td>
                        <td><?php echo $k->jenisKendaraan ?></td>
                        <td><?php echo $k->ukuranBan ?></td>
                        <td><?php echo $k->jumlahRoda ?></td>
                        <td><?php echo $k->fgActive ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="#modalScroll"
                                    data-title="<?php echo $k->noLambung ?>" 
                                    data-nokendaraan="<?php echo $k->noKendaraan ?>" 
                                    data-nolambung="<?php echo $k->noLambung ?>"
                                    data-idDC="<?php echo $k->idDC ?>"
                                    data-namadc="<?php echo $k->descDC ?>"
                                    data-idcustomer="<?php echo $k->idCustomer ?>"
                                    data-lainnya="<?php echo $k->lainnya ?>"
                                    data-idaxle="<?php echo $k->idAxle ?>"
                                    data-jeniskendaraan="<?php echo $k->jenisKendaraan ?>"
                                    data-idukuranban="<?php echo $k->idUkuranBan ?>"
                                    data-jumlahroda="<?php echo $k->jumlahRoda ?>"
                                    data-fgactiveyn="<?php echo $k->fgActive ?>"
                                    >View</button>
                          <button type="button"  id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal"  data-nokendaraan="<?php echo $k->noKendaraan ?>"  data-iddc="<?php echo $k->idDC ?>" 
                    id="#myBtn">Delete</button></td> 
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
                  <a type="button" id="delButton" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-title" id="titlee">Tambah Kendaraan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <form method="post" id="formAct" action="<?php echo base_url()?>Admin/Master/tambah_kendaraan">
                      <input type="hidden" name="idDCLama" class="form-control" id="idDCLama">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Customer</label>
                            <select class="form-control" id="idCustomer" name="idCustomer">
                                 <option value="">-CUSTOMER-</option>
                                <?php foreach($customer as $d){?>
                                <option value="<?php echo $d->idCustomer?>"><?php echo $d->customerName?></option>
                              <?php } ?>
                            </select>
                      </div>
                          <div class="form-group">
                      <label for="exampleInputEmail1">DC</label>
                            <select class="form-control" id="idDC" name="idDC">
                                <option value="">-DC-</option>
                                <!-- <?php foreach($dc as $d){?>
                                <option value="<?php echo $d->idDC?>"><?php echo $d->descDC?></option>
                              <?php } ?> -->
                            </select>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">No. Lambung</label>
                          <input type="text" name="noLambung" class="form-control" id="noLambung">
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">No. Polisi</label>
                          <input type="text" name="noKendaraan" class="form-control" id="noKendaraan">
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Axle</label>
                            <select class="form-control" id="idAxle" name="idAxle">
                                  <option value="">- AXLE -</option>
                                <?php foreach($axle as $d){?>
                                <option value="<?php echo $d->idAxle?>"><?php echo $d->keterangan?></option>
                              <?php } ?>
                            </select>
                      </div>
                     <div class="form-group">
                    <div class="row">
                     <div class="col-md-6">
                      <label for="exampleInputEmail1">Jumlah Roda</label>
                          <!--   <select class="form-control" id="jumlahRoda" name="jumlahRoda">
                                <?php for($i=1;$i<=22;$i++){?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                              <?php } ?>
                            </select> -->
                       <input type="text" name="jumlahRoda" class="form-control" id="jumlahRoda" readonly="readonly">
                      </div>
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">Jenis</label>
                          <input type="text" name="jenisKendaraan" class="form-control" id="jenisKendaraan" readonly="readonly">
                      </div>
                    </div>
                  </div>
                 <div class="form-group">
                      <label for="exampleInputEmail1">Ukuran Ban</label>
                            <select class="form-control" id="idUkuranBan" name="idUkuranBan">
                                  <option value="">- Ukuran Ban -</option>
                                <?php foreach($ukuranBan as $d){?>
                                <option value="<?php echo $d->idUkuranBan?>"><?php echo $d->ukuranBan?></option>
                              <?php } ?>
                            </select>
                      </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Lainnya</label>
                          <input type="text" name="lainnya" class="form-control" id="lainnya">
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

   $(document).on("click", "#submitBtn", function () {
        $('#formAct').submit();
    });

   $(document).on("click", "#addModal", function () {
    $('#fgActiveYN').hide();
    $('#txtfgActiveYN').hide();
    });

     $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var idDC = $(this).data('iddc');
          var noLambung = $(this).data('nolambung');
          var noKendaraan = $(this).data('nokendaraan');
          var jenisKendaraan = $(this).data('jeniskendaraan');
          var idAxle = $(this).data('idaxle');
          var lainnya = $(this).data('lainnya');
          var idUkuranBan = $(this).data('idukuranban');
          var jumlahRoda = $(this).data('jumlahroda');
          var fgActiveYN = $(this).data('fgactiveyn');
          var idCustomer = $(this).data('idcustomer');

      $.ajax({
        url:'<?=base_url()?>Admin/Master/getdc',
        method: 'post',
        data: {idCustomer: idCustomer},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $(' .modal-body #idDC').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $(' .modal-body #idDC').append('<option value="'+data['idDC']+'">'+data['descDC']+'</option>');
          });

            $("#titlee").text( title );
    $(".modal-body #titlee").val( title );
    $(".modal-body #noLambung").val( noLambung );
    $(".modal-body #noKendaraan").val( noKendaraan );
      $(".modal-body #jenisKendaraan").val( jenisKendaraan );
      $(".modal-body #lainnya").val( lainnya );
    $(" .modal-body #idUkuranBan option[value='"+idUkuranBan+"']").prop("selected", true);
      $(".modal-body #idDCLama").val( idDC );
      $(".modal-body #jumlahRoda").val( jumlahRoda );
     $(" .modal-body #idCustomer option[value='"+idCustomer+"']").prop("selected", true);
    $(" .modal-body #idAxle option[value='"+idAxle+"']").prop("selected", true);
    $(" .modal-body #idDC option[value='"+idDC+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Master/update_kendaraan');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#noKendaraan').prop('readonly', true);
    $('#noLambung').prop('readonly', true);
        $('#idAxle').prop('readonly', true);
    $('#txtfgActiveYN').show();
    
        }
     });




   
    });

 $(document).on("click", "#delModal", function () {
      var idDC = $(this).data('iddc');
      var noKendaraan = $(this).data('nokendaraan');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Master/hapus_kendaraan/'+idDC+"/"+noKendaraan);
    });


//=============
 $('#idCustomer').change(function(){
      var idCustomer = $(this).val();
      //alert(idCustomer);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Admin/Master/getdc',
        method: 'post',
        data: {idCustomer: idCustomer},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#idDC').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#idDC').append('<option value="'+data['idDC']+'">'+data['descDC']+'</option>');
          });
        }
     });

   });
//=============

$('#idAxle').change(function(){
      var idAxle = $(this).val();
      //alert(idCustomer);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Admin/Master/getaxle',
        method: 'post',
        data: {idAxle: idAxle},
        dataType: 'json',
        success: function(response){

        $('#jenisKendaraan').val("");
        $('#jumlahRoda').val("");

          // Remove options 
          // $('#idDC').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#jenisKendaraan').val(data['jenisKendaraan']);
              $('#jumlahRoda').val(data['jumlahRoda']);
             // $('#idDC').append('<option value="'+data['idDC']+'">'+data['descDC']+'</option>');
          });
        }
     });
   });

  </script>

</body>

</html>