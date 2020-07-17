<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kedai Mystory - Menu</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

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
               --><li class="nav-item active"><a class="nav-link" href="<?php echo base_url() ?>/view/client">Menu</a>
<!--               <li class="nav-item"><a class="nav-link" href="chef.html">Chef</a>
 -->
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>/view/cart">Cart</a></li>
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
        <h1 class="hero-title">Food Menu</h1>
        <p>From  set together our divided own saw divided the form god <br class="d-none d-xl-block"> seas moveth you will fifth under replenish end</p>
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
        <h4 class="intro-title">Food Menu</h4>
        <h2>Delicious food</h2>
      </div>
      <div class="row">
        <?php
          foreach ($client as $x) {
            # code...
          ?>
        <div class="col-lg-12">
          <div class="media align-items-center food-card">
            <img class="mr-3 mr-sm-4" src="<?php echo base_url() ?>assets/imgmenu/<?php echo $x->gambar ?>" alt="">
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4><?php echo html_escape($x->nama_menu) ?></h4>
                <h3 class="price-tag">Rp.<?php echo html_escape($x->harga_menu)?></h3>
              </div>
              <p><?php echo html_escape($x->deskripsi) ?></p>
              <a href=javascript:void(0) class="btn btn-lg btn-success" onclick="edit_data('<?php echo html_escape($x->id_menu) ?>')" title="Beli">Beli</a>
            </div>
            </div>
          </div>
        </div>
        <?php } ?>

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
            <form id="form" class="needs-validation" role="form" action="<?php echo site_url('view/cart'); ?>" method="post">
                <input type="hidden" name="kode">
                <input type="hidden" name="harga">
                <p><center>
                <div class="btn-group">
                    <input type="number" class="quantity" max="20" name="jumlah" id="hasil" min="1" value="1">
                </div>
                </center></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Update keranjang</button>
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
  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/js/jquery.ajaxchimp.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/js/mail-script.js"></script>
  <script src="<?php echo base_url() ?>/assets/sneaky/js/main.js"></script>

<script>
  function edit_data(id)
    {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('view/client/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
    $('[name="kode"]').val(data.kode_menu);
    $('[name="harga"]').val(data.harga_menu);
    $('#modal_qty').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Edit Data Menu'); // Set title to Bootstrap modal title
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
    alert('Error get data from ajax');
    }
    });
    }
    </script>
<script>
    function save()
    {
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
  
    // ajax adding data to database
    $.ajax({
    url : "<?php echo base_url('view/cart/ajax_add')?>",
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
    if(data.status) //if success close modal and reload ajax table
    {
    $('#modal_qty').modal('hide');
    
    }
    
    $('#btnSave').text('Save'); //change button text
    $('#btnSave').attr('disabled',false); //set button enable
    
    },
    error: function (jqXHR, textStatus , errorThrown)
    {
    alert('Maksimal Pemesanan 20 Permenu');
    $('#btnSave').text('save'); //change button text
    $('#btnSave').attr('disabled',false); //set button enable
    
    }
    });
    }
    </script>
</body>
</html>

