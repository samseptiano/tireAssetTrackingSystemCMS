<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRPLNGGN ?></title>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRPLNGGN ?></li>
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($pelanggan as $p){ ?>
                      <tr>
                        <td><?php echo substr($p->idCustomer,0,6)."..." ?></td>
                        <td><?php echo  $p->customerName?></td>
                        <td><?php echo $p->customerAddress?></td>
                        <td><?php echo $p->customerContact ?></td>
                        <td><?php echo $p->fgActiveYN ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                                    data-target="#exampleModalScrollable"id="#modalScroll"
                                    data-title="<?php echo $p->idCustomer ?>" 
                                    data-customername="<?php echo $p->customerName ?>" 
                                    data-customerlogo="<?php echo $p->customerLogo ?>"
                                    data-password="<?php echo $p->password ?>"
                                    data-customerwebsite="<?php echo $p->customerWebsite ?>"
                                    data-customerpic="<?php echo $p->customerPIC ?>"
                                    data-customerusername="<?php echo $p->customerUsername ?>"
                                    data-customeraddress="<?php echo $p->customerAddress ?>"
                                    data-customercontact="<?php echo $p->customerContact ?>"
                                    data-fgactiveyn="<?php echo $p->fgActiveYN ?>"
                                    >View</button>
                          <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal" data-idcustomer="<?php echo $p->idCustomer ?>"
                    id="#myBtn">Delete</button>
                    <button type="button" id="resetModal" class="btn btn-warning mb-1" data-toggle="modal" data-target="#resetPassword" data-customerusername="<?php echo $p->customerUsername ?>"
                    id="#myBtn">Reset Password</button></td>
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/Master/hapus_pelanggan/" class="btn btn-primary">Ya</a>
                </div>
              </div>
            </div>
          </div>

 <!-- Modal -->
          <div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Reset password?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <a type="button" id="resetButton" href="<?php echo base_url()?>Admin/Master/reset_password_pelanggan/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-title" id="titlee">Tambah Pelanggan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                	<form method="post" id="formAct" action="<?php echo base_url()?>Admin/Master/tambah_pelanggan" enctype="multipart/form-data">
                     <div class="form-group">
                      <input type="hidden" name="idCustomer" class="form-control" id="idCustomer">
                      <label for="exampleInputEmail1">Nama Customer</label>
                      <input type="text" name="customerName" class="form-control" id="customerName" placeholder="Nama Customer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat Customer</label>
                      <textarea class="form-control" name="customerAddress" id="customerAddress" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak Customer</label>
                      <input type="text" name="customerContact" class="form-control" id="customerContact" placeholder="Kontak Customer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Website Customer</label>
                      <input type="text" name="customerWebsite" class="form-control" id="customerWebsite" placeholder="Website Customer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">PIC Customer</label>
                      <input type="text" name="customerPIC" class="form-control" id="customerPIC" placeholder="PIC Customer">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1" id="txtpassword">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1" id="txtcustomerUsername">Username</label>
                      <input type="text" name="customerUsername" class="form-control"  onBlur="checkAvailabilityUsername()" id="customerUsername" placeholder="Username Customer">
                      <span id="username-availability-status"></span>
                            <p><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/admin/img/loader.gif" id="loaderIcon" style="display:none" /></p>
                    </div>
                      <div class="form-group">
                      	 <input type="hidden" name="customerLogoLama" class="form-control" id="customerLogoLama">
                      	<img id="logo"  class="img-thumbnail"  alt="Italian Trulli">
                      <label for="exampleInputEmail1">Logo Customer</label>
                      <input type="file" name="customerLogo" class="form-control" id="customerLogo" placeholder="Logo Customer" size="33">
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
          var customerName = $(this).data('customername');
        var customerUsername = $(this).data('customerusername');
          var customerAddress = $(this).data('customeraddress');
          var customerContact = $(this).data('customercontact');
          var fgActiveYN = $(this).data('fgactiveyn');
          var customerLogo = $(this).data('customerlogo');
          var password = $(this).data('password');

          var website = $(this).data('customerwebsite');
          var pic = $(this).data('customerpic');

     $("#titlee").text( title );
     $('#logo').attr("src", '<?php echo base_url()?>'+customerLogo);
    $(".modal-body #idCustomer").val( title );
      $(".modal-body #customerLogoLama").val( customerLogo );
     $(".modal-body #customerName").val( customerName );
          $(".modal-body #password").val( password );
          $(".modal-body #customerUsername").val( customerUsername );
     $(".modal-body #customerAddress").val( customerAddress );
     $(".modal-body #customerContact").val( customerContact );
     $(".modal-body #customerPIC").val( pic );
     $(".modal-body #customerWebsite").val( website );
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Master/update_pelanggan');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    });

    $(document).on("click", "#delModal", function () {
      var idcustomer = $(this).data('idcustomer');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Master/hapus_pelanggan/'+idcustomer);
    });

    $(document).on("click", "#resetModal", function () {
      var customerUsername = $(this).data('customerusername');
    $('#resetButton').attr('href', '<?php echo base_url()?>Admin/Master/reset_password_pelanggan/'+customerUsername);
    });

    $(document).on("click", "#addModal", function () {
    $('#fgActiveYN').hide();
    $('#txtfgActiveYN').hide();
    $('#password').hide();
    $('#txtpassword').hide();
     $('#logo').hide();
    });

     $(document).on("click", "#submitBtn", function () {
        $('#formAct').submit();
    });

    function checkAvailabilityUsername() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "<?php echo base_url('Admin/Master/check_availability_username_customer'); ?>",
    data:'username='+$("#customerUsername").val(),
    type: "POST",
    success:function(data){
      $("#username-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
    });
  }

  </script>

</body>

</html>