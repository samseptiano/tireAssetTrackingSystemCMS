<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <title><?php echo APPNAME ?>  - <?php echo MSTRDC ?></title>
    <?php include('include/css.php');?>
  <link href="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
    padding-top: 2px;
    padding-bottom: 5px;
    padding-right: 5px;
  }
</style>

</head>

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
              <li class="breadcrumb-item active" aria-current="page"><?php echo MSTRDC ?></li>
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
                        <th>Keterangan</th>
                        <th>Customer</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Keterangan</th>
                        <th>Customer</th>
                        <th>FGAktif</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($dc as $d){ ?>
                      <tr>
                        <td><?php echo substr($d->idDC,0,10)."..." ?></td>
                        <td><?php echo substr($d->descDC,0,30)."..." ?></td>
                        <td><?php echo substr($d->customerName,0,10)."..." ?></td>
                        <td><?php echo $d->fgActiveYN ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                                    data-target="#exampleModalScrollable"id="#modalScroll"
                                    data-title="<?php echo $d->idDC ?>" 
                                    data-descdc="<?php echo $d->descDC ?>" 
                                    data-customername="<?php echo $d->customerName ?>"
                                    data-customerid="<?php echo $d->idCustomer ?>"
                                    data-fgactiveyn="<?php echo $d->fgActiveYN ?>"
                                    >View</button>
                        <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal" data-iddc="<?php echo $d->idDC ?>" data-idcustomer="<?php echo $d->idCustomer ?>"
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
                  <a type="button" id="delButton" href="<?php echo base_url()?>Admin/master/hapus_dc/" class="btn btn-primary">Ya</a>
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
                  <h5 class="modal-title" id="titlee">Tambah DC</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <form method="post" id="formAct" action="<?php echo base_url()?>Admin/master/tambah_dc">
                <div class="modal-body">
                     <div class="form-group">

                      <input type="hidden" name="idDC" class="form-control" id="idDC">
                      <label for="exampleInputEmail1">Nama DC</label>
                      <input type="text" name="DCname" class="form-control" id="DCname" placeholder="Nama DC">
                    </div>
                    <label for="exampleInputEmail1">Customer</label>
                    <div class="ui-widget form-group">
                    <input type="hidden" name="idCustomerLama" class="form-control" id="idCustomerLama">
                    <select  id="idCustomer" name="idCustomer" class="form-control">
                        <?php foreach($customer as $c){ ?>
                        <option value="<?php echo $c->idCustomer?>"><?php echo $c->customerName?></option>
                        <?php } ?>
                    </select>
                  </div>
                    <select class="form-control" id="fgActiveYN" name="fgActiveYN">
                        <option value="Y">Y</option>
                        <option value="N">N</option>
                      </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" id="submitBtn" class="btn btn-primary">Tambah</button>
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
      $.noConflict(true);
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

  $(document).on("click", "#delModal", function () {
      var idDC = $(this).data('iddc');
      var idCustomer = $(this).data('idcustomer');
    $('#delButton').attr('href', '<?php echo base_url()?>Admin/master/hapus_dc/'+idDC+"/"+idCustomer);
    });

      $(document).on("click", "#viewModal", function () {
           var title = $(this).data('title');
          var customername = $(this).data('customername');
          var customerid = $(this).data('customerid');
          var iddc = $(this).data('iddc');
          var descdc = $(this).data('descdc');
          var fgActiveYN = $(this).data('fgactiveyn');


     $("#titlee").text( title );
    $(".modal-title #titlee").val( title );
    $(".modal-body #idDC").val( title );
     $(".modal-body #DCname").val( descdc );
      $(".modal-body #idCustomerLama").val( customerid );
     $(" .modal-body #idCustomer option[value='"+customerid+"']").prop("selected", true);
    $(" .modal-body #fgActiveYN option[value='"+fgActiveYN+"']").prop("selected", true);
    $('#formAct').attr('action', '<?php echo base_url()?>Admin/master/update_dc');
    $('#submitBtn').html('Update');
    $('#fgActiveYN').show();
    $('#txtfgActiveYN').show();
    });

    $(document).on("click", "#addModal", function () {
    $('#fgActiveYN').hide();
    $('#txtfgActiveYN').hide();
    });
</script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script>
$(function() {
  $.widget("custom.combobox", {
    _create: function() {
      this.wrapper = $("<span>")
        .addClass("custom-combobox")
        .insertAfter(this.element);

      this.element.hide();
      this._createAutocomplete();
      this._createShowAllButton();
    },

    _createAutocomplete: function() {
      var selected = this.element.children(":selected"),
        value = selected.val() ? selected.text() : "";

      this.input = $("<input>")
        .appendTo(this.wrapper)
        .val(value)
        .attr("title", "")
        .addClass(
          "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left"
        )
        .autocomplete({
          delay: 0,
          minLength: 0,
          source: $.proxy(this, "_source")
        })
        .tooltip({
          classes: {
            "ui-tooltip": "ui-state-highlight"
          }
        });

      this._on(this.input, {
        autocompleteselect: function(event, ui) {
          ui.item.option.selected = true;
          this._trigger("select", event, {
            item: ui.item.option
          });
        },

        autocompletechange: "_removeIfInvalid"
      });
    },

    _createShowAllButton: function() {
      var input = this.input,
        wasOpen = false;

      $("<a>")
        .attr("tabIndex", -1)
        .attr("title", "Show All Items")
        .tooltip()
        .appendTo(this.wrapper)
        .button({
          icons: {
            primary: "ui-icon-triangle-1-s"
          },
          text: false
        })
        .removeClass("ui-corner-all")
        .addClass("custom-combobox-toggle ui-corner-right")
        .on("mousedown", function() {
          wasOpen = input.autocomplete("widget").is(":visible");
        })
        .on("click", function() {
          input.trigger("focus");

          // Close if already visible
          if (wasOpen) {
            return;
          }

          // Pass empty string as value to search for, displaying all results
          input.autocomplete("search", "");
        });
    },

    _source: function(request, response) {
      var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
      response(
        this.element.children("option").map(function() {
          var text = $(this).text();
          if (this.value && (!request.term || matcher.test(text)))
            return {
              label: text,
              value: text,
              option: this
            };
        })
      );
    },

    _removeIfInvalid: function(event, ui) {
      // Selected an item, nothing to do
      if (ui.item) {
        return;
      }

      // Search for a match (case-insensitive)
      var value = this.input.val(),
        valueLowerCase = value.toLowerCase(),
        valid = false;
      this.element.children("option").each(function() {
        if (
          $(this)
            .text()
            .toLowerCase() === valueLowerCase
        ) {
          this.selected = valid = true;
          return false;
        }
      });

      // Found a match, nothing to do
      if (valid) {
        return;
      }

      // Remove invalid value
      this.input
        .val("")
        .attr("title", value + " didn't match any item")
        .tooltip("open");
      this.element.val("");
      this._delay(function() {
        this.input.tooltip("close").attr("title", "");
      }, 2500);
      this.input.autocomplete("instance").term = "";
    },

    _destroy: function() {
      this.wrapper.remove();
      this.element.show();
    }
  });

  $("#combobox").combobox();
  
});

  </script>

</body>

</html>