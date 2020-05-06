<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRHRG ?></title>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRHRG ?></li>
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
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Merek</th>
                        <th>Ukuran</th>
                        <th>Harga Satuan</th>
                        <th>Customer</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>ID</th>
                        <th>Merek</th>
                        <th>Ukuran</th>
                        <th>Harga Satuan</th>
                        <th>Customer</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($harga as $p){ ?>
                      <tr>
                        <td><?php echo substr($p->idHarga,0,5)."..." ?></td>
                        <td><?php echo  $p->merekBan?></td>
                        <td><?php echo $p->ukuranBan?></td>
                        <td><?php echo $p->harga ?></td>
                         <td><?php echo $p->customerName ?></td>
                        <td><?php echo $p->fgActive ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                                    data-target="#exampleModalScrollable"id="#modalScroll"
                                    data-title="<?php echo $p->idHarga ?>" 
                                    data-idmerekban="<?php echo $p->idMerekBan ?>" 
                                    data-idukuranban="<?php echo $p->idUkuranBan ?>"
                                    data-idharga="<?php echo $p->idHarga ?>"
                                    data-statusvulkan="<?php echo $p->statusVulkan ?>"
                                    data-harga="<?php echo $p->harga ?>"
                                    data-idcustomer="<?php echo $p->idCustomer ?>"
                                    data-fgactiveyn="<?php echo $p->fgActive ?>"
                                    >View</button>
                          <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal" data-idharga="<?php echo $p->idHarga ?>"
                    id="#myBtn">Delete</button></td>
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/Master/hapus_harga/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-title" id="titlee">Tambah Harga</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <form method="post" id="formAct" action="<?php echo base_url()?>Admin/Master/tambah_harga">
                      <input type="hidden" name="idHarga" class="form-control" id="idHarga">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Customer</label>
                            <select class="form-control" id="idCustomer" name="idCustomer">
                              <?php foreach($customer as $c){?>
                                <option value="<?php echo $c->idCustomer?>"><?php echo $c->customerName?></option>
                              <?php }?>
                      </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Merek Ban</label>
                            <select class="form-control" id="idMerekBan" name="idMerekBan">
                              <?php foreach($merek as $m){?>
                                <option value="<?php echo $m->idMerekBan?>"><?php echo $m->merekBan?></option>
                              <?php }?>
                      </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ukuran</label>
                            <select class="form-control" id="idUkuranBan" name="idUkuranBan">
                              <?php foreach($ukuran as $u){?>
                                <option value="<?php echo $u->idUkuranBan?>"><?php echo $u->ukuranBan?></option>
                              <?php }?>
                      </select>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Ban</label>
                            <select class="form-control" id="statusVulkan" name="statusVulkan">
                                <option value="">BB</option>
                                <option value="VULK1">VULK 1</option>
                                <option value="VULK2">VULK 2</option>
                      </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="phone" name="harga" class="form-control" id="harga" placeholder="harga">
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
          var idCustomer = $(this).data('idcustomer');
          var idMerekBan = $(this).data('idmerekban');
          var idUkuranBan = $(this).data('idukuranban');
          var idHarga = $(this).data('idharga');
          var harga = $(this).data('harga');
          var statusVulkan = $(this).data('statusvulkan');
          var fgActiveYN = $(this).data('fgactiveyn');

     $("#titlee").text( title );
    $(".modal-body #titlee").val( title );
     $(".modal-body #harga").val( harga );
      $(".modal-body #idHarga").val( idHarga );
    $(" .modal-body #idMerekBan option[value='"+idMerekBan+"']").prop("selected", true);
    $(" .modal-body #idUkuranBan option[value='"+idUkuranBan+"']").prop("selected", true);
    $(" .modal-body #statusVulkan option[value='"+statusVulkan+"']").prop("selected", true);
    $(" .modal-body #idCustomer option[value='"+idCustomer+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Master/update_harga');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    });

    $(document).on("click", "#delModal", function () {
      var idHarga = $(this).data('idharga');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Master/hapus_harga/'+idHarga);
    });

    $(document).on("click", "#addModal", function () {
    $('#fgActiveYN').hide();
    $('#txtfgActiveYN').hide();
    });

    $(document).on("click", "#submitBtn", function () {
        $('#formAct').submit();
    });

  </script>

</body>

</html>