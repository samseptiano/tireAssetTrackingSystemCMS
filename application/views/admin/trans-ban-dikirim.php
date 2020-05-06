<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo TRXBNKRM ?></title>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo TRXBNKRM ?></li>
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
                        <th>Tanggal</th>
                        <th>Customer Username</th>
                        <th>DC</th>
                        <th>No. Pol</th>
                        <th>Status Kirim</th>
                        <th>Aksi</th>
                     </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Tanggal</th>
                        <th>Customer Username</th>
                        <th>DC</th>
                        <th>No. Pol</th>
                        <th>Status Kirim</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($kendaraan_dikirim as $k){?>
                      <tr>
                        <td><?php echo $k->tanggalKirim ?></td>
                        <td><?php echo $k->customerUsername ?></td>
                        <td><?php echo $k->descDC ?></td>
                        <td><?php echo $k->noKendaraan ?></td>
                         <td><?php echo $k->statusKirim ?></td>
                         <td>
                          <button type="button" class="btn btn-warning mb-1" id="viewModalKendaraan" data-toggle="modal"
                                     data-target="#exampleModalScrollable" id="#modalScroll"
                                    data-title="<?php echo $k->id ?>" 
                                    data-id="<?php echo $k->id ?>"
                                    data-iddc="<?php echo $k->idDC ?>"
                                    data-descdc="<?php echo $k->descDC ?>"
                                    data-nokendaraan="<?php echo $k->noKendaraan ?>"
                                    data-idcustomer="<?php echo $k->idCustomer ?>"
                                    data-tanggalkirim="<?php echo $k->tanggalKirim ?>"
                                    data-statuskirim="<?php echo $k->statusKirim ?>"
                                   data-fgactiveyn="<?php echo $k->fgActiveYN ?>"
                                    >View</button>&nbsp;<button type="button" id="delModal" class="btn btn-danger mb-1" data-id="<?php echo $k->id?>" data-toggle="modal" data-target="#exampleModal"
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
          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">                   
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover2">
                    <thead class="thead-light">
                      <tr>
                        <th>Tanggal</th>
                        <th>Cust. Username</th>
                        <th>DC</th>
                        <th>Serial No.</th>
                        <th>Status Kirim</th>
                        <th>Aksi</th>
                     </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Tanggal</th>
                        <th>Cust. Username</th>
                        <th>DC</th>
                        <th>Serial No.</th>
                        <th>Status Kirim</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($ban_dikirim as $b){?>
                      <tr>
                        <td><?php echo $b->tanggalKirim ?></td>
                        <td><?php echo $b->customerUsername ?></td>
                        <td><?php echo $b->descDC ?></td>
                        <td><?php echo $b->serialNo ?></td>
                        <td><?php echo $b->statusKirim ?></td>
                         <td><button type="button" class="btn btn-warning mb-1" id="viewModal" data-toggle="modal"
                                     data-target="#exampleModalScrollable" id="#modalScroll"
                                    data-title="<?php echo $b->id ?>" 
                                    data-id="<?php echo $b->id ?>"
                                     data-iddc="<?php echo $b->idDC ?>"
                                    data-idban="<?php echo $b->idBan ?>"
                                    data-descdc="<?php echo $b->descDC ?>"
                                    data-serialno="<?php echo $b->serialNo ?>"
                                    data-idcustomer="<?php echo $b->idCustomer ?>"
                                    data-tanggalkirim="<?php echo $b->tanggalKirim ?>"
                                    data-statuskirim="<?php echo $b->statusKirim ?>"
                                   data-fgactiveyn="<?php echo $b->fgActiveYN ?>"
                                    >View</button>&nbsp;<button type="button" id="delModal2" class="btn btn-danger mb-1" data-toggle="modal" data-id="<?php echo $b->id?>" data-target="#exampleModal2"
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
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                  <a type="button" id="delButton2" href="<?php echo base_url()?>Admin/Master/hapus_bandikirim/" class="btn btn-primary">Ya</a>
                </div>
              </div>
            </div>
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
                  <a type="button" id="delButton"  href="<?php echo base_url()?>Admin/Master/hapus_kendaraandikirim/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-titlee" id="exampleModalScrollableTitle">Tambah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" id="formAct" action="<?php echo base_url()?>Admin/Trans/tambah_bandikirim">
                  <div class="form-group">
                       <input id="id" class="form-control" type="hidden" name="id" placeholder="id">
                      <label for="exampleInputEmail1" id="txtMerekBan">Tanggal Kirim</label>
                      <input type="date" name="tanggalKirim" class="form-control" id="tanggalKirim">
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1" id="txtCustomer">Customer</label>
                    <select class="form-control" id="idCustomer" name="idCustomer">
                        <option value="">-CUSTOMER-</option>
                      <?php foreach($pelanggan as $p){?>
                        <option value="<?php echo $p->idCustomer?>"><?php echo $p->customerUsername?></option>
                      <?php } ?>
                      </select>
                      </div>
                      <div class="form-group ui-widget">
                      <label for="exampleInputEmail1" id="txtDC" >DC</label>
                    <select class="form-control idDC" id="combobox" name="idDC">
                      <option value="">-DC-</option>
                      </select>
                      </div>
                       <a class="extra-fields-customer" href="#">Add Nomor Kendaraan</a>
                         <div class="form-group customer_records">
                      <label for="exampleInputEmail1" id="txtNoKendaraan" >No Kendaraan</label>
                    <!-- <select class="form-control noKendaraan" id="noKendaraan" name="noKendaraan[]">
                        <option value="">-Kendaraan-</option>
                      </select> -->
                       <input id="noKendaraan" autocomplete="off" class="noKendaraan form-control" type="text" name="noKendaraan[]" placeholder="noKendaraan">

                      </div>
                    <div class="customer_records_dynamic"></div><br><br><br>
                     <a class="extra-fields-customer2" href="#">Add Ban</a>
                         <div class="form-group customer_records2">
                      <label for="exampleInputEmail1" id="txtBan" >Ban</label>
                    <!-- <select class="form-control" id="idBan" name="idBan[]">
                      <?php foreach($ban as $b){?>
                        <option value="<?php echo $b->idBan?>"><?php echo $b->serialNo?></option>
                      <?php } ?>
                      </select> -->
                         <input id="serialBan" autocomplete="off" class="serialBan form-control" type="text" name="serialBan[]" placeholder="serialBan">
                       <input id="idBan" class="idBan form-control" type="hidden" name="idBan[]" placeholder="idBan">

                      </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1" id="txtStatusKirim">Status Kirim</label>
                      <select class="form-control statusKirim" id="statusKirim" name="statusKirim">
                        <option value="0">0</option>
                        <option value="1">1</option>
                       </select>
                      </div>
                    <div class="customer_records_dynamic2"></div>
              </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="submitBtn" name="submit" class="btn btn-primary">Tambah</button>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.27/jquery.autocomplete.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  $(document).ready(function () {
      $('#dataTable2').DataTable(); // ID From dataTable 
      $('#dataTableHover2').DataTable(); // ID From dataTable with Hover
    });

    $(document).on("click", "#addModal", function () {
    $('#fgActiveYN').hide();
    $('#txtfgActiveYN').hide();
    $('#statusKirim').hide();
    $('#txtStatusKirim').hide();
    });

    $(document).on("click", "#delModal", function () {
      var idMerekban = $(this).data('idmerekban');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Master/hapus_merekban/'+idMerekban);
    });

$(document).on("click", "#submitBtn", function () {
        $('#formAct').submit();
    });

    $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var id = $(this).data('id');
                    var descDC = $(this).data('descdc');
          var idDC = $(this).data('iddc');
          var idCustomer = $(this).data('idcustomer');
          var serialNo = $(this).data('serialno');
          var tanggalKirim = $(this).data('tanggalkirim');
          var statusKirim = $(this).data('statuskirim');
          var fgActiveYN = $(this).data('fgactiveyn');
          var idBan = $(this).data('idban');


      $(".modal-body #idDC").val( idDC );
      $(".modal-body #id").val( id);
    $(".modal-titlee").text( title );
      $(".modal-body #tanggalKirim").val( tanggalKirim );
            $(".modal-body #serialBan").val( serialNo );
              $(".modal-body #idBan").val( idBan );
                              $(" .modal-body #statusKirim option[value='"+statusKirim+"']").prop("selected", true);
            $(".modal-body #custom-combobox-input").val( statusKirim );
    $(" .modal-body #idCustomer option[value='"+idCustomer+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Trans/update_bandikirim');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    $('#noKendaraan').hide();
    $('#txtNoKendaraan').hide();
      $('#statusKirim').show();
    $('#txtStatusKirim').show();
    $('.extra-fields-customer').hide();
    $('.extra-fields-customer2').hide();
   $('.ui-autocomplete-input').focus().val(descDC);
   $('.ui-autocomplete-input').attr('readonly',true);
    $('.serialBan').attr('readonly',true);
    $('#idCustomer').attr('disabled',true);
    $('.ui-autocomplete-input').autocomplete('close');

    });

    $(document).on("click", "#viewModalKendaraan", function () {
           var title = $(this).data('title');
          var id = $(this).data('id');
                    var descDC = $(this).data('descdc');
          var idDC = $(this).data('iddc');
          var idCustomer = $(this).data('idcustomer');
          var noKendaraan = $(this).data('nokendaraan');
          var tanggalKirim = $(this).data('tanggalkirim');
          var statusKirim = $(this).data('statuskirim');
          var fgActiveYN = $(this).data('fgactiveyn');
       $("#titlee").text( title );
    $(".modal-titlee").text( title );
      $(".modal-body #tanggalKirim").val( tanggalKirim );
      $(".modal-body #idDC").val( idDC );
      $(".modal-body #id").val( id);
            $(".modal-body #noKendaraan").val( noKendaraan );
            $(".modal-body #custom-combobox-input").val( statusKirim );
                $(" .modal-body #statusKirim option[value='"+statusKirim+"']").prop("selected", true);
    $(" .modal-body #idCustomer option[value='"+idCustomer+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/Trans/update_kendaraandikirim');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    $('#serialBan').hide();
    $('#txtBan').hide();
      $('#statusKirim').show();
    $('#txtStatusKirim').show();
    $('.extra-fields-customer').hide();
    $('.extra-fields-customer2').hide();
   $('.ui-autocomplete-input').focus().val(descDC);
   $('.ui-autocomplete-input').attr('readonly',true);
    $('.noKendaraan').attr('readonly',true);
    $('#idCustomer').attr('disabled',true);
    $('.ui-autocomplete-input').autocomplete('close');

    });





    $('.extra-fields-customer').click(function() {
    $('.customer_records').clone().appendTo('.customer_records_dynamic');
    $('.customer_records_dynamic .customer_records').addClass('single remove');
    $('.single .extra-fields-customer').remove();
    $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
    $('.customer_records_dynamic > .single').attr("class", "remove");

      var count = 0;
    $('.customer_records_dynamic #noKendaraan').each(function() {
            count++;

      var tempPosition = count;      
      var fieldname = $(this).attr("name");
      $(this).attr('name', "noKendaraan[]");
      $(this).attr('class', "noKendaraan"+count+" form-control");
      $(this).attr('id', "noKendaraan"+count);
      $(this).val('');
            for(i=0;i<=count;i++){

                  if($(this).is('.noKendaraan')){
                        const index = kendaraanArray.indexOf($( ".noKendaraan" ).val());
                              if (index > -1) {
                                kendaraanArray.splice(index, 1);
                              }
                  }
                  else{
                        const index = kendaraanArray.indexOf($( ".noKendaraan"+(i) ).val());
                              if (index > -1) {
                                kendaraanArray.splice(index, 1);
                              }
                  }

                }




      autocompleteKendaraan(document.getElementsByClassName('noKendaraan'+count)[0], kendaraanArray);

    });

  });

  $(document).on('click', '.remove-field', function(e) {
    $(this).parent('.remove').remove();
    e.preventDefault();
  });


var count2 =0;
var idBan =0;
 var kendaraanArray = new Array();
 var serialBanArray = new Array();
  var myArrayBan2D = new Array([],[]);

$('.extra-fields-customer2').click(function() {
    $('.customer_records2').clone().appendTo('.customer_records_dynamic2');
    $('.customer_records_dynamic2 .customer_records2').addClass('single2 remov2e');
    $('.single2 .extra-fields-customer2').remove();
    $('.single2').append('<a href="#" class="remove-field2 btn-remove-customer2">Remove Fields</a>');
    $('.customer_records_dynamic2 > .single2').attr("class", "remove2");

    $('.customer_records_dynamic2 #serialBan').each(function() {
      count2++;
      var fieldname = $(this).attr("name");
      $(this).attr('name', "serialBan[]");
       $(this).attr('class', "serialBan"+count2+" form-control");
      $(this).attr('id', "serialBan"+count2);
        $(this).val('');


            for(i=0;i<=count2;i++){

                  if($(this).is('#serialBan')){
                        const index = serialBanArray.indexOf($( "#serialBan" ).val());
                              if (index > -1) {
                                serialBanArray.splice(index, 1);
                              }
                  }
                  else{
                        const index = serialBanArray.indexOf($( "#serialBan"+(i) ).val());
                              if (index > -1) {
                                serialBanArray.splice(index, 1);
                              }
                  }

                }


      autocompleteBan(document.getElementsByClassName('serialBan'+count2)[0], serialBanArray);

                if($(this).is('#serialBan')){
              
                  }
                  else{


                       $(this).blur(function(){
                      for(var i=0;i<myArrayBan2D.length;i++){
                      if(myArrayBan2D[i][1] === $(this).val()){
                        var aaa=count2;
                        //alert( myArray2D[i][0] +" "+aaa);
                        //$('.idBanPasang1').attr('value', myArray2D[i][0]);


                          //document.getElementsByClassName("idBanPasang"+serialBanPasang+" form-control").value=myArray2D[i][0];
                         $(".idBan"+aaa).val(myArrayBan2D[i][0]);
                      }
                    }
                 });
              }


    });


            $('.customer_records_dynamic2 #idBan').each(function() {
                              idBan++;
              var fieldname = $(this).attr("name");
              $(this).attr('name', "idBan[]");
                $(this).attr('id', "idBan"+idBan);
                $(this).attr('class', "idBan"+idBan+"  form-control");
                  $(this).val('');

            });


  });

  $(document).on('click', '.remove-field2', function(e) {
    $(this).parent('.remove2').remove();
    e.preventDefault();
  });



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
          $('.idDC').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('.idDC').append('<option value="'+data['idDC']+'">'+data['descDC']+'</option>');
          });
        }
     });

      $.ajax({
        url:'<?=base_url()?>Admin/Master/getban',
        method: 'post',
        data: {idCustomer: idCustomer},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('.idBan').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             //$('.idDC').append('<option value="'+data['idDC']+'">'+data['descDC']+'</option>');

              serialBanArray.push(data['serialNo']);

               var arr=new Array();
                      arr.push(data['idBan']);
                      arr.push(data['serialNo']);
                      myArrayBan2D.push(arr);

          });
        }
     });

   });

 $('.idDC').change(function(){
      var idDC = $('.idDC').val();
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>Admin/Master/getkendaraan',
        method: 'post',
        data: {idDC: idDC},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#noKendaraan').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
          });
        }
     });
   });

    $(document).on("click", "#delModal", function () {
      var id = $(this).data('id');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Trans/hapus_kendaraandikirim/'+id);
    });
     $(document).on("click", "#delModal2", function () {
      var id = $(this).data('id');
    $('#delButton2').attr('href', '<?php echo base_url()?>Admin/Trans/hapus_bandikirim/'+id);
    });



// <?php foreach($ban as $n){?>
//     serialBanArray.push('<?php echo $n->serialNo ?>');

//      var arr=new Array();
//             arr.push('<?php echo $n->idBan ?>');
//             arr.push('<?php echo $n->serialNo ?>');
//             myArrayBan2D.push(arr);
// <?php }?>


$( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            //alert(ui.item.value);

             //=================================================
             // var idDC = $('.idDC').val();
             //    // AJAX request
             //    $.ajax({
             //      url:'<?=base_url()?>Admin/Master/getkendaraan',
             //      method: 'post',
             //      data: {idDC: idDC},
             //      dataType: 'json',
             //      success: function(response){

             //        // Remove options 
             //        $('#noKendaraan').find('option').not(':first').remove();

             //        // Add options
             //        $.each(response,function(index,data){
             //           $('#noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
             //        });
             //      }
             //   });
             //=================================================
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .attr( "height", "" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: "false"
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();

          if ( this.value && ( !request.term || matcher.test(text) ) )

            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 


        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
 


   $(function() {
      $( "#combobox" ).combobox({
      select: function( event, ui ) {
        //alert(ui.item.value);

        //=================================================
             var idDC =ui.item.value;
                // AJAX request
                $.ajax({
                  url:'<?=base_url()?>Admin/Master/getkendaraan',
                  method: 'post',
                  data: {idDC: idDC},
                  dataType: 'json',
                  success: function(response){

                    // Remove options 
                    $('.noKendaraan').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(index,data){
                       $('.noKendaraan').append('<option value="'+data['noKendaraan']+'">'+data['noKendaraan']+'</option>');
                    
                                            kendaraanArray.push(data['noKendaraan']);

                    });
                  }
               });
             //=================================================

      }
      });
    });
    $( "#combobox" ).combobox();

    $( "#toggle" ).on( "click", function() {
      $( "#combobox" ).toggle();
    });

  } );


 $('.serialBan').blur(function(){
                            for(var i=0;i<myArrayBan2D.length;i++){
                            if(myArrayBan2D[i][1] === $('#serialBan').val()){
                               $(".idBan").val(myArrayBan2D[i][0]);
                            }
                          }
                       });



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




function autocompleteBan(inp, arr) {

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
autocompleteBan(document.getElementsByClassName('serialBan')[0], serialBanArray);



  </script>

</body>
<style type="text/css">
  .custom-combobox {
  position: relative;
  display: inline-block;
}
.custom-combobox-toggle {
  position: absolute;
  top: 0;
  bottom: 0;
  margin-left: -1px;
  padding: 0;
}
.custom-combobox-input {
  margin: 0;
  padding: 5px 10px;
}
.ui-front {
    z-index: 9999999 !important;
}
</style>
</html>