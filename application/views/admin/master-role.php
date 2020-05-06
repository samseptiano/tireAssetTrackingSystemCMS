<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRROLE ?></title>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRROLE ?></li>
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
                        <th>Role</th>
                        <th>FG Aktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                         <th>Role</th>
                        <th>FG Aktif</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($role as $u){?>
                      <tr>
                        <td><?php echo $u->idRole?></td>
                        <td><?php echo $u->descRole?></td>
                        <td><?php echo $u->fgActiveYN?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="#modalScroll"
                                                        data-title="<?php echo $u->idRole ?>"
                                                        data-descrole="<?php echo $u->descRole ?>"
                                                        data-idrole="<?php echo $u->idRole ?>" 
                                                        data-fgactiveyn="<?php echo $u->fgActiveYN ?>" 
                                                              >View</button>
                          <button type="button" id="delModal" class="btn btn-danger mb-1" data-idrole="<?php echo $u->idRole ?>" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">Delete</button>
                  </td>  
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/Master/hapus_role/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-titlee" id="titlee">Tambah Role</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" id="formAct" action="<?php echo base_url()?>Admin/Master/tambah_role">
                <div class="modal-body">
                  <div class="form-group">
                        <div class="form-group">
                      <label for="exampleInputEmail1" id="txtRole" >ID ROLE</label>
                      <input type="text" name="idRole" class="form-control" id="idRole" onblur="checkAvailabilityRole()" required="required">
                       <span id="role-availability-status"></span>
                            <p><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/admin/img/loader.gif" id="loaderIcon" style="display:none" /></p>                    
                          </div> 
                      </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1" id="txtRole" >Role</label>
                        <input type="text" name="descRole" class="form-control" id="descRole" required="required">
                    </div>   
                  <div class="form-group">
                      <label for="exampleInputEmail1" id="txtfgActiveYN" >FG Aktif</label>
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
      var idRole = $(this).data('idrole');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Master/hapus_role/'+idRole);
    });

    $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var descRole = $(this).data('descrole');
          var idRole = $(this).data('idrole');
          var fgActiveYN = $(this).data('fgactiveyn');
       $("#titlee").text( title );
    $(".modal-body #idUser").val( title );
     $(".modal-body #idRole").prop( "readonly",true );
          $(".modal-body #idRole").val( idRole );
     $(".modal-body #descRole").val( descRole );
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Master/update_role');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    });

    function checkAvailabilityRole() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "<?php echo base_url('Admin/Master/check_availability_role'); ?>",
    data:'idRole='+$("#idRole").val(),
    type: "POST",
    success:function(data){
      $("#role-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
    });
  }

  $("#idRole").bind('keyup', function (e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $("#idRole").val(($("#idRole").val()).toUpperCase());
});

  </script>

</body>

</html>