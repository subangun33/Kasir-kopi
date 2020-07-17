<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Datatables4 -->
<link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/datatables.min.css') ?>">  

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

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

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number">Order #12345</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Billed To:</strong><br>
                            Ujang Maman<br>
                            1234 Main<br>
                            Apt. 4B<br>
                            Bogor Barat, Indonesia
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Shipped To:</strong><br>
                          Muhamad Nauval Azhar<br>
                          1234 Main<br>
                          Apt. 4B<br>
                          Bogor Barat, Indonesia
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          September 19, 2018<br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Item</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right">Totals</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Mouse Wireless</td>
                          <td class="text-center">$10.99</td>
                          <td class="text-center">1</td>
                          <td class="text-right">$10.99</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Keyboard Wireless</td>
                          <td class="text-center">$20.00</td>
                          <td class="text-center">3</td>
                          <td class="text-right">$60.00</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Headphone Blitz TDR-3000</td>
                          <td class="text-center">$600.00</td>
                          <td class="text-center">1</td>
                          <td class="text-right">$600.00</td>
                        </tr>
                      </table>
                    </div>
                    
              <hr>
              
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