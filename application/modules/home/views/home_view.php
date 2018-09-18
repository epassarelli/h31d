<!--==========================
  Intro Section
============================-->
<section id="intro">

  <div id="intro-carousel" class="owl-carousel" >
    <?php foreach($sliders as $news): ?>
        <div class="item">
          <a href="<?php echo $news['link']; ?>">
            <img src="<?php echo base_url() .'assets/uploads/' . $news['imagen']; ?>">
          </a>
        </div>
    <?php endforeach; ?>        
  </div>

</section>   


<main id="main">

  <!--==========================
    categorias Section
  ============================-->
  <section id="categorias">
    <div class="container">
    
      <div class="row">

        <div class="col-lg-6">
          
            <a href="<?php echo $destacados['destacado1_link']; ?>">
              <div class="box wow fadeInLeft">
                <img src="<?php echo site_url('assets/uploads/' . $destacados['destacado1']); ?>" class="img-responsive" width="100%">
              </div>
            </a>

            <a href="<?php echo $destacados['destacado2_link']; ?>">
              <div class="box wow fadeInLeft">
                <img src="<?php echo site_url('assets/uploads/') . $destacados['destacado2']; ?>" class="img-responsive" width="100%">
              </div>
            </a>         

        </div>

        <div class="col-lg-6">
          
            <a href="<?php echo $destacados['destacado3_link']; ?>">
              <div class="box wow fadeInRight">
                <img src="<?php echo site_url('assets/uploads/') . $destacados['destacado3']; ?>" class="img-responsive" width="100%">
              </div>
            </a>

        </div>

      </div>

    </div>
  </section><!-- #categorias -->

  <!--==========================
    video
  ============================-->

  <section id="video" class="wow fadeInUp">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-6 offset-lg-3 col-md-6">
          <div class="embed-responsive embed-responsive-16by9">
            <?php foreach($video as $videoHome) { ?>
              <iframe class="embed-responsive-item" src="<?php echo $videoHome['video']?>" allowfullscreen></iframe>
            <?php } ?>
          </div>
        </div>
        
      </div>
    </div>
    
  </section>

  <!--==========================
    Destacados
  ============================-->

  <section id="destacados" class="wow fadeInUp">
   
    <div class="container">

      <div class="row">
          <div class="col-lg-4 col-md-4"> <hr></div>
          <div class="col-lg-4 col-md-4">
            <div class="section-header"><h2>Productos destacados</h2></div>
          </div>
          <div class="col-lg-4 col-md-4"> <hr></div>
      </div>


      <div class="row">
        <?php foreach($productos as $productosDestacados) { ?>
          <div class="col-lg-3 col-md-4">
            <div class="destacados-item wow fadeInUp">
              <a href="<?php echo base_url() . $productosDestacados['slug']; ?>">
                <img src="<?php echo base_url() .'assets/uploads/' . $productosDestacados['foto1']; ?>" alt="">
                <div class="destacados-overlay">
                </div>
              </a>
            </div>
            <div><p><?php echo $productosDestacados['nombre']?></p> <span><?php echo $productosDestacados['subtitulo']?></span></div>
          </div>          
        <?php } ?>
      </div>

      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <h5><a href="<?php echo site_url('productos');?>" class="verTodo">VER TODOS LOS PRODUCTOS</a></h5>
        </div>
      </div>

    </div>
  </section><!-- #destacados -->