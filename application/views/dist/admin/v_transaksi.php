<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Datatables4 -->
<link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/datatables.min.css') ?>">  
  
  <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"></h3>
          </div>
        <div class="modal-body">
          <div class="box-body pad">
            <form  id="form"  class="form-horizontal">
                <div class="form-body"> 
                      <input type="hidden" class="form-control" name="id" >
                  <div class="modal-body">
            <form id="form" class="needs-validation" role="form" action="<?php echo site_url('view/cart'); ?>" method="post">
              <label for="customFile">Status</label> 
                      <select name="status" class="form-control" placeholder="PILIH" required="">
                      <option value="">-</option>
                      <option value="Selesai">Selesai</option>
                      <option value="Pesanan Belum Dibayar">Pesanan Belum Dibayar</option>
                      </select>
                <input type="hidden" name="id">
            </div>
              </div>
              </div>
            </form>
      </div>

          
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
          </div>
      </div>
    </div>
  </div>


<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Transaksi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Master</a></div>
              <div class="breadcrumb-item">Transaksi</div>
            </div>
          </div>




          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Transaksi</h4>
                    <div class="float-right">
                    <button class="btn btn-info " onclick="reload_table()" data-toggle="tooltip"  data-placement="top" title="Reload Table"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                    <!-- <button type="button" class="btn btn-primary" onclick="add_kategori()" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                      Tambah
                    <span class="glyphicon glyphicon-file"></span></button>   -->
                  </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Total</th>
                              <th>Nama Pemesan</th>
                              <th>Refdetail</th>
                              <th>Meja</th>
                              <th>Waktu Pemesanan</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>


  <!-- AdminLTE App -->
  
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
          table = $('#table').DataTable({  
            "processing": true, 
            "ajax": {
                "url": "<?php echo base_url('transaksi/setView'); ?>",
                "type": "POST",
            },
            "columns": [

              { "data": "no" },  
              { "data": "total" },  
              { "data": "nama_pemesan" },
              { "data": "refdetail" },
              { "data": "meja" },
              { "data": "waktu_pemesanan" },
              { "data": "status" },
              { "data": "action" }
            ],
            "order": [[0, 'asc']]
          });
        });


    function reload_table()
    {
    table.ajax.reload(null,false); //reload datatable ajax
    }

    function add_kategori()
    {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Input Transaksi'); // Set Title to Bootstrap modal title
    
    }
    
    function edit_data(id)
    {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
    url : "<?php echo base_url('transaksi/ajax_edit')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    $('[name="id"]').val(data.id_transaksi);
    $('[name="total"]').val(data.total);
    $('[name="nama_pemesan"]').val(data.nama_pemesan);
    $('[name="refdetail"]').val(data.refdetail);
    $('[name="meja"]').val(data.meja);
    $('[name="Waktu_pemesanan"]').val(data.Waktu_pemesanan);
    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Edit Data Transaksi'); // Set title to Bootstrap modal title

    },
    error: function (jqXHR, textStatus , errorThrown)
    {
    alert('Error get data from ajax');
    }
    });
    }

    function save()
    {
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    
    if(save_method == 'add') {
    url = "<?php echo base_url('transaksi/ajax_add')?>";
    } else {
    url = "<?php echo base_url('transaksi/ajax_update')?>";
    }
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
    if(data.status) //if success close modal and reload ajax table
    {
    $('#modal_form').modal('hide');
    reload_table();
    }
    
    $('#btnSave').text('Save'); //change button text
    $('#btnSave').attr('disabled',false); //set button enable
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
    alert('Error adding / update data');
    $('#btnSave').text('save'); //change button text
    $('#btnSave').attr('disabled',false); //set button enable
    
    }
    });
    }

</script>