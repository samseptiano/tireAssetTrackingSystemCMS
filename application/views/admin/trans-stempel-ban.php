<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo TRXSTPBN ?></title>
    <?php include('include/css.php');?>
  <link href="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
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
              <li class="breadcrumb-item active" aria-current="page"><?php echo TRXSTPBN ?></li>
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
                        <div class="col-sm-4"><input id="tglAwal" style="font-size:11px" type="date" class="form-control"></div>
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
                       <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollableAdd" id="addModal" id="#modalScroll">Tambah</button>
                </div>
                <div id="tableRefresh" class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Trans no.</th>
                        <th>DC</th>
                        <th>Ban</th>
                        <th>Tgl Masuk</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Trans no.</th>
                        <th>DC</th>
                        <th>Ban</th>
                        <th>Tgl Masuk</th>
                        <th>Keterangan</th>
                         <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($stempelBan as $s){?>
                      <tr>
                        <td><?php echo $s->idTrans?></td>
                        <td><?php echo substr($s->descDC,0,10)."..."?></td>
                        <td><?php echo substr($s->idBan,0,10)."..."?></td>
                        <td><?php echo $s->tgl_masuk?></td>
                        <td><?php echo substr($s->keterangan,0,15)."..."?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                                data-target="#exampleModalScrollableView" id="#modalScroll"
                                data-id="<?php echo $s->idTrans ?>" 
                                data-iddc="<?php echo $s->idDC ?>" 
                                data-descdc="<?php echo $s->descDC ?>" 
                                data-tt="<?php echo $s->TT ?>" 
                                data-idban="<?php echo $s->idBan ?>" 
                                data-keterangan="<?php echo $s->keterangan ?>" 
                                data-serialno="<?php echo $s->serialNo ?>" 
                                data-idukuranban="<?php echo $s->idUkuranBan ?>" 
                                data-ukuranban="<?php echo $s->ukuranBan ?>" 
                                data-statusVulkan = "<?php echo $s->statusVulkan ?>"
                                data-idmerekban="<?php echo $s->idMerekBan ?>" 
                                data-merekban="<?php echo $s->merekBan ?>" 
                                data-tglmasuk="<?php echo $s->tgl_masuk ?>"
                                >View</button>
      <?php if($this->session->userdata('role') == ADMINROLE){?>
                          <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn" data-id="<?php echo $s->idTrans ?>">Delete</button>
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/Trans/hapus_stempelban/" class="btn btn-primary">Ya</a>
                </div>
              </div>
            </div>
          </div>


          <!-- Modal Scrollable -->
          <div class="modal fade" id="exampleModalScrollableView" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Stempel ban</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" id="" action="<?php echo base_url()?>Admin/Trans/update_stempelban">
                     <div class="form-group">
                      <input type="hidden" name="idDC" class="form-control" id="idDC">
                      <label for="exampleInputEmail1">DC</label>
                      <input type="text" name="descDC" class="form-control" id="descDC" placeholder="DC" readonly="readonly">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ban</label>
                      <input type="text" name="idBan" class="form-control" id="idBan" placeholder="ID Ban" readonly="readonly">
                      <div class="row"><div class="col-md-6"><small id="serialNo" for="exampleInputEmail1">serialNo</small></div><div class="col-md-6"><small id="tt" for="exampleInputEmail1">tebalTelapak</small></div></div>
                      <div class="row"><div class="col-md-6"><small id="merekBan" for="exampleInputEmail1">merekBan</small></div><div class="col-md-6"><small id="ukuranBan" for="exampleInputEmail1">ukuranBan</small></div></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <textarea class="form-control" name="keterangan" id="keterangan" rows="3" readonly="readonly"></textarea>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Status Vulkan</label>
                      <input type="text" name="statusVulkan" class="form-control" id="statusVulkan" placeholder="statusVulkan" readonly="readonly">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Masuk</label>
                      <input type="text" name="tgl_masuk" class="form-control" id="tgl_masuk" placeholder="tgl masuk" readonly="readonly">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <!-- <button type="submit" id="submitBtn" class="btn btn-primary">Tambah</button> -->
                </div>
              </div>
            </div>
          </div>


      <div class="modal fade" id="exampleModalScrollableAdd" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Stempel ban</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" id="formActTambah" action="<?php echo base_url()?>Admin/Trans/tambah_stempelban">
                     <div class="form-group">
                        <input type="hidden" name="id" class="form-control" id="id">
                      <label for="exampleInputEmail1">DC</label>
                    <div class="ui-widget form-group">
                    <select  id="combobox" name="idDC" class="form-control">
                        <?php foreach($dc as $c){ ?>
                        <option value="<?php echo $c->idDC?>"><?php echo $c->descDC?></option>
                        <?php } ?>
                    </select>
                  </div>                    
                </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ban</label>
                  <div class="ui-widget form-group">
                    <select  id="combobox" name="idBan" class="form-control">
                        <?php foreach($ban as $b){ ?>
                        <option value="<?php echo $b->idBan?>"><?php echo $b->serialNo?></option>
                        <?php } ?>
                    </select>
                  </div>                           
                </div>
                <div class="form-group">
                      <label for="exampleInputEmail1">Status Vulkan</label>
                 <select  id="statusVulkan" name="statusVulkan" class="form-control">
                        <option value="BB">BB</option>
                        <option value="VULK1">VULK 1</option>
                        <option value="VULK2">VULK 2</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                    </div>
                 </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" id="submitBtnTambah" class="btn btn-primary">Tambah</button>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
<!-- CSS file -->

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

    $(document).on("click", "#viewModal", function () {
          var id = $(this).data('id');
           var idDC = $(this).data('iddc');
          var descDC = $(this).data('descdc');
          var idBan = $(this).data('idban');
          var serialNo = $(this).data('serialno');
          var idUkuranBan = $(this).data('idukuranban');
           var keterangan = $(this).data('keterangan');
          var ukuranBan = $(this).data('ukuranban');
          var idMerekBan = $(this).data('idmerekban');
          var merekBan = $(this).data('merekban');
          var tgl_masuk = $(this).data('tglmasuk');
          var tt = $(this).data('tt');
          var statusVulkan = $(this).data('statusvulkan');
    
     //$("#titlee").text( title );

     $(".modal-body #id").val( id );
     $(".modal-body #idDC").val( idDC );
     $(".modal-body #descDC").val( descDC );
     $(".modal-body #idBan").val( idBan );
          $(".modal-body #statusVulkan").val( statusVulkan );
     $(".modal-body #keterangan").val( keterangan );
     $(".modal-body #serialNo").text( "Serial: "+serialNo );
     $(".modal-body #merekBan").text( "Merek: "+merekBan );
     $(".modal-body #ukuranBan").text("Ukuran: "+ ukuranBan );
     $(".modal-body #tt").text("Tebal Telapak: "+ tt );
     $(".modal-body #tgl_masuk").val( tgl_masuk );
     });


    $(document).on("click", "#delModal", function () {
      var id = $(this).data('id');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/Trans/hapus_stempelban/'+id);
    });


//   $('#typeahead').typeahead({
//         source:  function (query, process) {
//         return $.get('<?php echo base_url()?>Admin/Trans/get_banAutoComplete', { query: query }, function (data) {
//                 console.log(data);
//                 //data = $.parseJSON(data);


//               var typeahead = {
//   typeaheadInit: function() {
//     var jsonData = data;

//     var productNames = [];
//     $.each(jsonData, function(index, product) {
//       productNames.push(product.idBan + "#" + product.idBan + "#" + product.idBan);
//     });
//     $('#typeahead').typeahead({
//       source: productNames,
//       highlighter: function(item) {
//         var parts = item.split('#'),
//           html = '<div><div class="typeahead-inner" id="' + parts[2] + '">';
//         html += '<div class="item-img" style="background-image: url(' + parts[1] + ')"></div>';
//         html += '<div class="item-body">';
//         html += '<p class="item-heading">' + parts[0] + '</p>';
//         html += '</div>';
//         html += '</div></div>';

//         var query = this.query;
//         var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
//         var reQuery = new RegExp('(' + reEscQuery + ')', "gi");
//         var jElem = $(html);
//         var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function() {
//           return this.nodeType === 3;
//         });
//         textNodes.replaceWith(function() {
//           return $(this).text().replace(reQuery, '<strong>$1</strong>');
//         });

//         return jElem.html();
//       },
//       updater: function(selectedName) {
//         var name = selectedName.split('#')[0];
//         return name;
//       }
//     });
//   },

//   initialize: function() {
//     var _this = this;
//     _this.typeaheadInit();
//   }
// };
// $(document).ready(function() {

//   typeahead.initialize();
// });

//             });
//         }
//     });


//============================================================


  $(document).on("click", "#submitBtnTambah", function () {
       $('#formActTambah').submit();
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
             $("#tableRefresh").load('stempelbanperiode/'+tglAwal+'/'+tglAkhir)
      }

    });




  </script>

</body>

</html>