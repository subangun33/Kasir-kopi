<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kedai Mystory - Cart</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/sdatatables.min.css') ?>">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/sneaky/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/sneaky/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/sneaky/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/sneaky/vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/sneaky/vendors/Magnific-Popup/magnific-popup.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/sneaky/css/style.css">
</head>
<body">

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- <a class="navbar-brand logo_h" href="index.html"><img src="<?php echo base_url() ?>assets/sneaky/img/logo.png" alt=""></a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <!-- <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li> 
              <li class="nav-item"><a class="nav-link" href="about.html">About</a></li> 
               -->
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>/view/client">Menu</a>
                <!--               <li class="nav-item"><a class="nav-link" href="chef.html">Chef</a>
 -->
              <li class="nav-item active"><a class="nav-link" href="<?php echo base_url() ?>/view/cart">Cart</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Hero Banner Section start =================-->
  <section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
      <div class="hero-left">
        <h1 class="hero-title">Cart Menu</h1>
        <p>From set together our divided own saw divided the form god <br class="d-none d-xl-block"> seas moveth you will fifth under replenish end</p>
        <ul class="hero-info d-none d-lg-block">
          <!-- <li>
            <img src="<?php echo base_url() ?>assets/sneaky/img/banner/fas-service-icon.png" alt="">
            <h4>Fast Service</h4>
          </li>
          <li>
            <img src="<?php echo base_url() ?>assets/sneaky/img/banner/fresh-food-icon.png" alt="">
            <h4>Fresh Food</h4>
          </li>
          <li>
            <img src="<?php echo base_url() ?>assets/sneaky/img/banner/support-icon.png" alt="">
            <h4>24/7 Support</h4>
          </li> -->
        </ul>
      </div>
      <div class="hero-right">
        <div class="owl-carousel owl-theme w-100 hero-carousel">
          <div class="hero-carousel-item">
            <img class="img-fluid" src="<?php echo base_url() ?>assets/sneaky/bg.png" alt="">
          </div>
        </div>
      </div>
      <ul class="social-icons d-none d-lg-block">
        <li><a href="#"><i class="ti-facebook"></i></a></li>
        <li><a href="#"><i class="ti-twitter"></i></a></li>
        <li><a href="#"><i class="ti-instagram"></i></a></li>
      </ul>
    </div>
  </section>
  <!--================Hero Banner Section end =================-->


  <!--================Food menu section start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro mb-75px">

      </div>
      <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"></h3>
            </div>
            <div class="modal-body">
              <div class="box-body pad">
                <form id="form-save" class="form-horizontal">
                  <div class="form-body">
                    <input type="hidden" class="form-control" name="id">
                    <div class="form-group">
                      <label>Nama Pemesan</label>
                      <input type="text" class="form-control" placeholder="Masukan Kode" name="nama" value="<?php echo $this->session->userdata("nama"); ?>" disabled>
                      <i class="form-control-feedback"></i><span class="text-warning"></span>
                    </div>

                    <div class="form-group">
                      <label>Meja</label>
                      <input type="text" class="form-control" placeholder="Masukan Nama Menu" name="neja" value="<?php echo $this->session->userdata("meja"); ?>" disabled>
                      <i class="form-control-feedback"></i><span class="text-warning"></span>
                    </div>

                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" class="form-control" placeholder="Masukan Nama Menu" name="no_hp" value="<?php echo $this->session->userdata("no_hp"); ?>" disabled>
                      <i class="form-control-feedback"></i><span class="text-warning"></span>
                    </div>

                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <label>Total Harga</label>
                          <input type="number" id="total_harga" class="form-control" placeholder="Masukan Harga" name="total_harga" disabled>
                          <i class="form-control-feedback"></i><span class="text-warning"></span>
                        </div>
                      </div>

                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
            <?php 
              if ($cek_transaksi > 0) { ?>
              
              <?php } else { ?>
                <button type="button" id="btnSave" onclick="Pesanan()" class="btn btn-primary">Pesan</button>
              <?php }
              ?>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Cart</h1>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Cart</h4>
              <div class="float-right">
                <button class="btn btn-info " onclick="reload_table()" data-toggle="tooltip" data-placement="top" title="Reload Table"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <!-- <button type="button" class="btn btn-primary" onclick="add_kategori()" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                      Tambah
                    <span class="glyphicon glyphicon-file"></span></button> -->
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Pemesanan</th>
                      <th>Refpesanan</th>
                      <th>Jumlah</th>
                      <th>Subtotal</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tr>
                    <th colspan="4"><b>Total Harga </b></th>
                    <th><b class="info-box-number" id="total">0</b>

                    </th>
                    <th></th>
                    <th></th>
                  </tr>
                  <td colspan="11">
                    <button name="Beli" onclick="add_kategori()" data-toggle="tooltip" data-placement="top" title="Tambah Data" class="btn btn-success">Lihat Pesanan</button></a>
                  </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  </div>

  <div class="modal fade" id="modal_qty">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Masukan Jumlah Beli</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form" action="" class="needs-validation" role="form" method="post">
            <input type="hidden" name="id">
            <input type="hidden" name="refpesanan">
            <p>
              <center>
                <div class="btn-group">
                  <input type="number" class="quantity" name="jumlah" id="hasil" min="1" value="1">
                </div>
              </center>
            </p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="button" onclick="save()" class="btn btn-primary">Update keranjang</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  </section>
  <!--================Food menu section end =================-->



  <!--================CTA section start =================-->

  <!-- ================ End footer Area ================= -->



  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/datatables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/jquery-ui/jquery-ui.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/page/modules-datatables.js') ?>"></script>

  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/js/jquery.ajaxchimp.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/js/mail-script.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/js/main.js"></script>


  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>


  <script type="text/javascript">
    var table;
    var tablemodal;
    var save_method;

    $(document).ready(function() {
      get_count();
      table = $('#table').DataTable({
        "processing": true,
        "ajax": {
          "url": "<?php echo base_url('view/cart/setView'); ?>",
          "type": "POST",
        },
        "columns": [

          {
            "data": "no"
          },
          {
            "data": "kode_detail"
          },
          {
            "data": "refpesanan"
          },
          {
            "data": "jumlah"
          },
          {
            "data": "subtotal"
          },
          {
            "data": "status"
          },
          {
            "data": "action"
          }
        ],
        "order": [
          [0, 'asc']
        ]
      });
    });

    function reload_table() {
      table.ajax.reload(null, false); //reload datatable ajax
      get_count();
    }

    function add_kategori() {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Input Cart'); // Set Title to Bootstrap modal title

    }

    function edit_data(id) {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      //Ajax Load data from ajax
      $.ajax({
        url: "<?php echo base_url('view/cart/ajax_edit') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id"]').val(data.id_detail);
          $('[name="refpesanan"]').val(data.refpesanan);
          $('[name="jumlah"]').val(data.jumlah);
          $('#modal_qty').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit Data Cart'); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }

    function save() {
      $('#btnSave').text('Saving...'); //change button text
      $('#btnSave').attr('disabled', true); //set button disable
      var url;

      var formData = new FormData($('#form')[0]);
      $.ajax({
        url: "<?php echo base_url('view/cart/total') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
          if (data.status) //if success close modal and reload ajax table
          {
            $('#modal_qty').modal('hide');
            reload_table();
            get_count();
          }

          $('#btnSave').text('Save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error adding / update data');
          $('#btnSave').text('save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable

        }
      });
    }

    function get_count() {
      $.ajax({
        url: "<?php echo site_url('view/cart/gettotal'); ?>",
        type: "GET",
        data: "",
        dataType: "json",
        cache: false,
        success: function(data) {
          $('#total').text(data.total);
          $('#total_harga').val(data.total);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(errorThrown);
        }
      });
    }

    function delete_data(id) {
      if (confirm('Yakin Hapus Data ?')) {
        // ajax delete data to database
        $.ajax({
          url: "<?php echo base_url('view/cart/ajax_delete') ?>/" + id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            //if success reload ajax table
            $('#modal_form').modal('hide');
            reload_table();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
          }
        });
      }
    }

    function Pesanan() {
      $('#btnSave').text('Saving...'); //change button text
      $('#btnSave').attr('disabled', true); //set button disable
      var url;

      var formData = new FormData($('#form-save')[0]);
      $.ajax({
        url: "<?php echo base_url('view/cart/save_pesanan') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
          if (data.status) //if success close modal and reload ajax table
          {
            $('#modal_form').modal('hide');
            reload_table();
            get_count();
          }

          $('#btnSave').text('Save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error adding / update data');
          $('#btnSave').text('save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable

        }
      });
    }
  </script>