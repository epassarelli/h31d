<script type="text/javascript">
  $(document).ready(function(){
    $('#gallery').simplegallery({
      galltime : 400,
      gallcontent: '.content',
      gallthumbnail: '.thumbnail',
      gallthumb: '.thumb'
    });
  });
</script>

<!--==========================
  categorias Section
============================-->
<section id="productosDetalle">

<div class="container-fluid">
<?php
//var_dump($productosByDetalle);
/*
      'name' => string 'Ropa de Lluvia' (length=14)
      'idproducts' => string '3' (length=1)
      'nombre' => string 'Guante XCV' (length=10)
      'precio' => string '100.00' (length=6)
      'description' => string 'Guante de Latex para lluvia
' (length=29)
      'foto1' => string '465e7-producto_01.jpg' (length=21)
      'foto2' => null
      'foto3' => null
      'foto4' => null
      'foto5' => null
      'slug'
*/
?>
  <div class="row">
      <div class="col-lg-3 col-md-4 offset-lg-2"> <hr></div>
      <div class="col-lg-2 col-md-4">
        <div class="section-header"><h2><?php echo $productosByDetalle[ 'name' ]; ?></h2></div>
      </div>
      <div class="col-lg-3 col-md-4"> <hr></div>
  </div>


<div class="row ">

  <div class="col-lg-4 offset-lg-2 wow fadeInLeft">

  <div id="gallery" class="simplegallery">
    <div class="content">
      <img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto1' ];?>" class="image_1" alt="" />
      <img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto2' ];?>" class="image_2" style="display:none" alt="" />
      <img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto3' ];?>" class="image_3" style="display:none" alt="" />
      <img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto4' ];?>" class="image_4" style="display:none" alt="" />
      <img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto5' ];?>" class="image_5" style="display:none" alt="" />
    </div>

   <div class="clear"></div>

    <div class="thumbnail">
        <div class="thumb">
            <a href="#" rel="1"><img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto1' ];?>" id="thumb_1" alt="" class="img-responsive" /></a>
        </div>
        <div class="thumb">
            <a href="#" rel="2"><img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto2' ];?>" id="thumb_2" alt="" /></a>
        </div>
        <div class="thumb">
            <a href="#" rel="3"><img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto3' ];?>" id="thumb_3" alt="" /></a>
        </div>
        <div class="thumb">
            <a href="#" rel="4"><img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto4' ];?>" id="thumb_4" alt="" /></a>
        </div>
        <div class="thumb last">
            <a href="#" rel="5"><img src="<?php echo base_url() . 'assets/uploads/' . $productosByDetalle[ 'foto5' ];?>" id="thumb_5" alt="" /></a>
        </div>                    
    </div>
  </div>
     
      
    </div>


          <div class="col-lg-4">
            <span class="articulo">Art. <?php echo $productosByDetalle[ 'codigo' ]; ?></span>
            <h2><?php echo $productosByDetalle[ 'nombre' ]; ?></h2>
            <hr class="subrayado">
            <span class="articulo"><?php echo ''; ?></span>
            <p class="descripcion"><?php echo $productosByDetalle[ 'description' ]; ?></p>
            <div class="precio"><?php echo $productosByDetalle[ 'precio' ]; ?></div>
          </div>
        </div>

        <div class="clear"></div>

        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <img src="<?php echo base_url();?>assets/img/separador.png" class="img-responsive" width="100%">
          </div>
        </div>

         <div class="clear"></div>

        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <h5>Caracteristicas</h5>
          </div>
        </div>
<?php
  if (strlen(trim($productosByDetalle[ 'caracteristicas1' ])) > 0 ) {
?>
    <div class="row caracteristicas">
      <div class="col-lg-6 offset-lg-3">
        <h6><?php echo $productosByDetalle[ 'caracteristica1' ]; ?> </h6>
        <p><?php echo $productosByDetalle[ 'caracteristicas1' ]; ?></p>
      </div>
    </div>

    <div class="clear"></div>
<?php
  }
  if (strlen(trim($productosByDetalle[ 'caracteristicas2' ])) > 0 ) {
?>
    <div class="row caracteristicas">
      <div class="col-lg-6 offset-lg-3">
        <h6><?php echo $productosByDetalle[ 'caracteristica2' ]; ?> </h6>
        <p><?php echo $productosByDetalle[ 'caracteristicas2' ]; ?></p>
      </div>
    </div>

    <div class="clear"></div>
<?php
  }
  if (strlen(trim($productosByDetalle[ 'caracteristicas3' ])) > 0 ) {
?>
    <div class="row caracteristicas">
      <div class="col-lg-6 offset-lg-3">
        <h6><?php echo $productosByDetalle[ 'caracteristica3' ]; ?> </h6>
        <p><?php echo $productosByDetalle[ 'caracteristicas3' ]; ?></p>
      </div>
    </div>

    <div class="clear"></div>
<?php
  }
  if (strlen(trim($productosByDetalle[ 'caracteristicas4' ])) > 0 ) {
?>
    <div class="row caracteristicas">
      <div class="col-lg-6 offset-lg-3">
        <h6><?php echo $productosByDetalle[ 'caracteristica4' ]; ?> </h6>
        <p><?php echo $productosByDetalle[ 'caracteristicas4' ]; ?></p>
      </div>
    </div>

    <div class="clear"></div>
<?php
  }
  if (strlen(trim($productosByDetalle[ 'caracteristicas5' ])) > 0 ) {
?>
    <div class="row caracteristicas">
      <div class="col-lg-6 offset-lg-3">
        <h6><?php echo $productosByDetalle[ 'caracteristica5' ]; ?> </h6>
        <p><?php echo $productosByDetalle[ 'caracteristicas5' ]; ?></p>
      </div>
    </div>

    <div class="clear"></div>
<?php
  }
?>
      </div>
 
    </section><!-- #categorias -->
