<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Datatables4 -->
<link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/datatables.min.css') ?>">

<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>

<body>
  <div id="app">


    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Invoice</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Invoice</div>
          </div>
        </div>
        <?php
        foreach ($trx as $r) {
          $url1 = $this->uri->segment(1);
          $url2 = $this->uri->segment(2);
          $url3 = $this->uri->segment(3);
          $url4 = $this->uri->segment(4);
        ?>
          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number">Order #<?php echo $r->refdetail ?></div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Pesanan Atas Nama:</strong><br> Nama:<b>
                            <?php echo $r->nama_pemesan ?></b><br>No Meja :
                          <?php echo $r->meja ?><br>No HP :
                          <?php echo $r->no_hp ?>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Total:</strong><br><strong>
                          <?php
                            $totaltrx = 0;
                            foreach ($detail as $d) {
                              $totaltrx += $d->subtotal;   
                          ?>
                          <?php } ?>
                          <h2>Rp. <?php echo number_format($totaltrx) ?></h2></strong>
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          <?php echo $r->waktu_pemesanan ?><br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($detail as $r) {
                      ?>
                        <tr>
                          <td><?php echo $r->nama_menu ?></td>
                          <td><?php echo $r->jumlah ?></td>
                          <td><?php echo $r->subtotal ?></td>
                          <td><?php echo $r->status ?></td>
                          <td><a href='javascript:void(0)' class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' onclick='edit_data("<?php echo $r->id_detail ?>")'><i class='fa fa-list-alt'></i></a>
                          <?php } ?>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
          </div>
      </section>
    </div>
    <footer class="main-footer">

      <div class="footer-right">

      </div>
    </footer>
  </div>
  </div>

  <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"></h3>
        </div>
        <div class="modal-body">
          <div class="box-body pad">
            <form id="form" class="form-horizontal" action="<?php echo site_url('View/Detail/ajax_update'); ?>" method="post">
              <div class="form-body">
                <div class="modal-body">
                    <label for="customFile">Status</label>
                    <select name="status" class="form-control" placeholder="PILIH" required="">
                      <option value="">-</option>
                      <option value="Pesanan Terkonfirmasi">Pesanan Terkonfirmasi</option>
                      <option value="Tunggu Pesanan">Tunggu Pesanan</option>
                      <option value="Pesanan Tidak Bisa Dibuat">Pesanan Tidak Bisa Dibuat</option>
                      <option value="Selesai">Selesai</option>
                    </select>
                    <?php
                    foreach ($trx as $r) {
                    ?>
                    <input type="hidden" name="kode" value="<?php echo $r->refdetail ?>">
                    <input type="hidden" name="url" value="<?php echo $url1; echo "/"; echo $url2; echo "/"; echo $url3; echo "/"; echo $url4; ?>">
                    <input type="hidden" name="id">
                    <?php } ?>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSave" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <script src="<?php echo base_url('assets/modules/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/datatables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/jquery-ui/jquery-ui.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/page/modules-datatables.js') ?>"></script>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

  <script type="text/javascript">
    var table;
    var tablemodal;
    var save_method;

    $(document).ready(function() {

    });


    function reload_table() {
      table.ajax.reload(null, false); //reload datatable ajax
    }

    function add_kategori() {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Input Transaksi'); // Set Title to Bootstrap modal title

    }

    function edit_data(id) {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      //Ajax Load data from ajax
      $.ajax({
        url: "<?php echo base_url('View/Detail/ajax_edit') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id"]').val(data.id_detail);
          $('[name="status"]').val(data.status);
          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit Data Detail'); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }
  </script>