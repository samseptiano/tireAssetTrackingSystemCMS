<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRBN ?></title>
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
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/home"><?php echo HOME ?></a></li>
              <li class="breadcrumb-item"><?php echo MSTR ?></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRBN ?></li>
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
                       <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="addModal" id="#modalScroll">Tambah</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                          <th>ID</th>
                        <th>Serial No.</th>
                        <th>Merek</th>
                        <th>Ukuran</th>
                        <th>Series</th>
                        <th>TT</th>
                         <th>fgVulkan</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Serial No.</th>
                        <th>Merek</th>
                        <th>Ukuran</th>
                        <th>Series</th>
                        <th>TT</th>
                         <th>fgVulkan</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($ban as $b){?>
                        <tr>
                            <td><?php echo substr($b->idBan,0,10)."..." ?></td>
                            <td><?php echo substr($b->serialNo,0,5)."..." ?></td>
                            <td><?php echo $b->merekBan ?></td>
                            <td><?php echo $b->ukuranBan ?></td>
                            <td><?php echo substr($b->series,0,5)."..." ?></td>
                            <td><?php echo $b->TT ?></td>
                            <td><?php echo $b->statusVulkan ?></td>
                            <td><?php echo $b->fgActiveYN ?></td>
                             <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                        data-target="#exampleModalScrollable" id="#modalScroll"
                        data-title="<?php echo $b->idBan ?>"
                               data-idban="<?php echo $b->idBan ?>"
                                 data-idcustomer="<?php echo $b->idCustomer ?>"
                                data-serialno="<?php echo $b->serialNo ?>"
                                 data-merekban="<?php echo $b->merekBan ?>"
                                  data-idmerekban="<?php echo $b->idMerekBan ?>"
                                   data-idukuranban="<?php echo $b->idUkuranBan ?>"
                                    data-ukuranban="<?php echo $b->ukuranBan ?>"
                                    data-series="<?php echo $b->series ?>"
                                     data-tt="<?php echo $b->TT ?>"
                                      data-pr="<?php echo $b->PR ?>"
                                      data-statusvulkan="<?php echo $b->statusVulkan ?>"
                                       data-fgactiveyn="<?php echo $b->fgActiveYN ?>"
                                       >View</button>
                              <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal"
                               data-idban="<?php echo $b->idBan ?>"  data-idcustomer="<?php echo $b->idCustomer ?>"
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/master/hapus_ban/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-title" id="titlee">Tambah Ban</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" id="formAct" action="<?php echo base_url()?>Admin/master/tambah_ban">
                     <label for="exampleInputEmail1">Customer</label>
                    <div class="ui-widget form-group">
                    <input type="hidden" name="idCustomerLama" class="form-control" id="idCustomerLama">
                    <select  id="idCustomer" name="idCustomer" class="form-control">
                        <?php foreach($customer as $c){ ?>
                        <option value="<?php echo $c->idCustomer?>"><?php echo $c->customerName?></option>
                        <?php } ?>
                    </select>
                    </div>
                     <div class="form-group">

                      <input type="hidden" name="idBan" class="form-control" id="idBan">
                      <label for="exampleInputEmail1">Serial No.</label>
                      <input type="text" name="serialNo" class="form-control" id="serialNo" placeholder="serial No.">
                    </div>
                    <label for="exampleInputEmail1">Merek Ban</label>
                    <div class="ui-widget form-group">
                    <select  id="idMerekBan" name="idMerekBan" class="form-control">
                        <?php foreach($merekBan as $m){ ?>
                        <option value="<?php echo $m->idMerekBan?>"><?php echo $m->merekBan?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <label for="exampleInputEmail1">Ukuran Ban</label>
                    <div class="ui-widget form-group">
                    <select  id="idUkuranBan" name="idUkuranBan" class="form-control">
                        <?php foreach($ukuranBan as $u){ ?>
                        <option value="<?php echo $u->idUkuranBan?>"><?php echo $u->ukuranBan?></option>
                        <?php } ?>
                    </select>
                  </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1">Series</label>
                      <input type="text" name="series" class="form-control" id="series" placeholder=series>
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail1">FG Vulkan (R/RR)</label>
                         <select class="form-control" id="statusVulkan" name="statusVulkan">
                        <option value="">B</option>
                        <option value="R">R</option>
                        <option value="RR">RR</option>
                      </select>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Tebal Telapak (mm)</label>
                      <input type="text" name="tt" class="form-control" id="tt" placeholder="tebal telapak">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Ply Rating</label>
                      <input type="text" name="plyRating" class="form-control" id="plyRating" placeholder="ply. rating">
                    </div>
                  </div>
                  </div>
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
    $(document).on("click", "#delModal", function () {
      var idBan = $(this).data('idban');
      var idCustomer = $(this).data('idcustomer');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/master/hapus_ban/'+idBan+"/"+idCustomer);
    });


   $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var idBan = $(this).data('idban');
          var idCustomer = $(this).data('idcustomer');
          var serialNo = $(this).data('serialno');
          var merekBan = $(this).data('merekban');
          var idMerekBan = $(this).data('idmerekban');
          var idUkuranBan = $(this).data('idukuranban');
          var ukuranBan = $(this).data('ukuranban');
          var series = $(this).data('series');
          var tt = $(this).data('tt');
          var pr = $(this).data('pr');
          var statusvulkan = $(this).data('statusvulkan');
          var fgActiveYN = $(this).data('fgactiveyn');

     $("#titlee").text( title );
    $(".modal-body #idBan").val( idBan );
     $(".modal-body #series").val( series );
     $(".modal-body #serialNo").val( serialNo );
    $(".modal-body #idCustomerLama").val( idCustomer );
     $(".modal-body #tt").val( tt );
     $(".modal-body #plyRating").val( pr );
    $(" .modal-body #idCustomer option[value='"+idCustomer+"']").prop("selected", true);
    $(" .modal-body #idUkuranBan option[value='"+idUkuranBan+"']").prop("selected", true);
    $(" .modal-body #idMerekBan option[value='"+idMerekBan+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
        $(" .modal-body #statusVulkan option[value='"+statusvulkan+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/master/update_ban/'+idBan);
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    });



  </script>

</body>

</html>