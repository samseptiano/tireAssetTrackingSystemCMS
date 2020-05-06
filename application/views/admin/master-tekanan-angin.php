<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRTKNAGN ?></title>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRTKNAGN ?></li>
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
                        <th>Ukuran Ban</th>
                         <th>Tekanan Angin</th>
                        <th>FG Aktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Ukuran Ban</th>
                        <th>Tekanan Angin</th>
                        <th>FG Aktif</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($tekananangin as $u){?>
                      <tr>
                        <td><?php echo $u->idTekananAngin ?></td>
                        <td><?php echo $u->ukuranBan ?></td>
                        <td><?php echo $u->tekananAngin ?></td>
                        <td><?php echo $u->fgActiveYN ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                     data-target="#exampleModalScrollable" id="#modalScroll"
                                    data-title="<?php echo $u->idTekananAngin ?>" 
                                    data-idtekananangin="<?php echo $u->idTekananAngin ?>" 
                                    data-idukuranban="<?php echo $u->idUkuranBan ?>" 
                                    data-tekananangin="<?php echo $u->tekananAngin ?>"
                                   data-fgactiveyn="<?php echo $u->fgActiveYN ?>">View</button>
                          <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-idtekananangin="<?php echo $u->idTekananAngin ?>" data-target="#exampleModal"
                    id="#myBtn">Delete</button></td>  
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/Master/hapus_tekananangin/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-title" id="titlee">Tambah Tekanan Angin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                 <form method="post" id="formAct" action="<?php echo base_url()?>Admin/Master/tambah_tekananangin">
                <div class="modal-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1" id="txtMerekBan" >Tekanan Angin</label>
                     <input type="hidden" name="idTekananAngin" class="form-control" id="idTekananAngin">
                      <input type="text" name="tekananAngin" class="form-control" id="tekananAngin">
                      </div>
                          <div class="form-group">
                      <label for="exampleInputEmail1" id="txtUkuranBan" >Ukuran Ban</label>
                    <select class="form-control" id="idUkuranBan" name="idUkuranBan">
                        <?php foreach($ukuranban as $u){?>
                        <option value="<?php echo $u->idUkuranBan?>"><?php echo $u->ukuranBan?></option>
                        <?php } ?>
                      </select>
                      </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1" id="txtfgActiveYN" >FG Active</label>
                    <select class="form-control" id="fgActiveYN" name="fgActiveYN">
                        <option value="Y">Y</option>
                        <option value="N">N</option>
                      </select>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="submitBtn" name="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
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

     $(document).on("click", "#addModal", function () {
    $('#fgActiveYN').hide();
    $('#txtfgActiveYN').hide();
    });

    $(document).on("click", "#delModal", function () {
          var idTekananAngin = $(this).data('idtekananangin');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Master/hapus_tekananangin/'+idTekananAngin);
    });


    $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var idUkuranBan = $(this).data('idukuranban');
          var idTekananAngin = $(this).data('idtekananangin');
          var tekananAngin = $(this).data('tekananangin');
          var ukuranRing = $(this).data('ukuranring');
          var fgActiveYN = $(this).data('fgactiveyn');

       $("#titlee").text( title );
    $(".modal-body #titlee").val( title );
     $(".modal-body #tekananAngin").val( tekananAngin );
      $(".modal-body #idTekananAngin").val( idTekananAngin );
          $(" .modal-body #idUkuranBan option[value='"+idUkuranBan+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Master/update_tekananangin');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    });
  </script>

</body>

</html>