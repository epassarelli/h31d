<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Held</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url();?>assets/img/favicon.ico">
  <link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

   <!-- JavaScript Libraries -->
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/easing/easing.min.js"></script>
  <!--<script src="<?php echo base_url();?>assets/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url();?>assets/lib/superfish/superfish.min.js"></script>-->
  <script src="<?php echo base_url();?>assets/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/sticky/sticky.js"></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>-->
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url();?>assets/js/main.js"></script>


</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <span>70 años de calidad y tradición en accesorios e indumentaria para motociclistas</span>
      </div>
      <div class="social-links float-right">
        <a href="https://www.instagram.com/heldargentina" class="instagram" target="_blank">
          <i class="fa fa-instagram"></i></a>
        <a href="https://www.facebook.com/Held-Argentina-147305329310473/" class="facebook" target="_blank">
          <i class="fa fa-facebook"></i></a>        
        <a href="https://www.youtube.com/channel/UCqmxYHZO_tbGu5-qABpz2aQ" class="youtube" target="_blank">
          <i class="fa fa-youtube"></i></a>
      </div>
    </div>

     <div id="logo" class="">
        
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt="Held logo" width="17%" /></a>
      </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">
      <div  class="pull-left">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt="Held logo" width="30%" /></a>
      </div>
     
      <div class="col-lg-7 offset-lg-2">
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="<?php echo base_url();?>">HOME</a></li>
            <li><a href="<?php echo base_url();?>historia">HISTORIA</a></li>
            <li><a href="<?php echo base_url();?>productos">PRODUCTOS</a></li>
            <li><a href="<?php echo base_url();?>tecnologia">TECNOLOGIA</a></li>
            <li><a href="<?php echo base_url();?>catalogo">CATALOGO</a></li>
            <li><a href="<?php echo base_url();?>locales">PUNTOS DE VENTA</a></li>
            <li><a href="<?php echo base_url();?>contacto">CONTACTO</a></li>
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>
  </header><!-- #header -->


        <!-- Full Width Column -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="container">
                <?php echo $this->layout->get_wrapper('page') ?>
            </section><!-- /.content -->
        </div><!-- ./wrapper -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
       
       <div class="row">
            <div class="col-lg-5 col-md-5"> <hr></div>
            <div class="col-lg-2 col-md-2"><div class="section-header"><img src="<?php echo base_url();?>assets/img/footerLogo.png" alt="Held" class="img-responsive"></div></div>
            <div class="col-lg-5 col-md-5"> <hr></div> 
        </div>
      
        
        <div class="row credits">
          <div class="col-lg-1 offset-lg-2"> <hr></div>
          <div class="col-lg-6"><p>ventas@held-argentina.com <span class="separador">/</span> 0810-444-6686 <span class="separador">/</span> +54 11 6143-5319</p></div>
          <div class="col-lg-1"> <hr></div>
        </div>

        <div class="row social-links">
          <div class="col-lg-6 offset-lg-3">Nuestras Redes Sociales

            <a href="https://www.instagram.com/heldargentina" class="instagram" target="_blank">
              <i class="fa fa-instagram"></i></a>
            <a href="https://www.facebook.com/Held-Argentina-147305329310473/" class="facebook" target="_blank">
              <i class="fa fa-facebook"></i></a>        
            <a href="https://www.youtube.com/channel/UCqmxYHZO_tbGu5-qABpz2aQ" class="youtube" target="_blank">
              <i class="fa fa-youtube"></i></a>

          </div>
        </div>
   
    </div>

  
  </footer><!-- #footer -->

   <div class="copyright"><p>HELD Biker Fashion - Argentina © 2018</p></div>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 
</body>
</html>