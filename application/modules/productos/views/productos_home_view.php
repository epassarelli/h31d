<!--==========================
  categorias Section
============================-->
<section id="productosIndex">

  <div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-md-4 offset-lg-2"> <hr></div>
        <div class="col-lg-2 col-md-4">
          <div class="section-header"><h2>Productos</h2></div>
        </div>
        <div class="col-lg-3 col-md-4"> <hr></div>
    </div>

    
    <div class="row">
        <div class="col-lg-3 col-md-4 offset-lg-2">
          <a href="<?php echo site_url('productos/busqueda'); ?>" class="section-header"><h5>BÚSQUEDA DE PRODUCTOS <i class="fa fa-caret-right" aria-hidden="true"></i></h5></a>
        </div>
    </div>
  


    <?php 

    if(isset($categorias)):
      
      $i = 1;

      ?>
      
      <div class="row prodcutosCategorias">
      
      <?php

      foreach ($categorias as $cat):
        
      if($i%2==0){ 
        $clase1 = 'col-lg-4';        
        $clase2 = 'box wow fadeInRight';
      }else{
        $clase1 = 'col-lg-4 offset-lg-2 sp-mobile';
        $clase2 = 'box wow fadeInLeft';
        if($i >= 3){
          echo '</div>';
          echo '<div class="row prodcutosCategorias">';
        }
      } 

      ?>

      <div class="<?php echo $clase1; ?>">
        <div class="<?php echo $clase2; ?>">
          <a href="<?php echo base_url() . $cat['slug']; ?>"><img src="<?php echo base_url().'assets/uploads/'.$cat['image'];?>" class="img-responsive" width="100%"> </a>
        </div>
         <div class="caption"><?php echo $cat['name'] ?></div>
      </div>

    <?php 
      $i++;
      endforeach; 
    ?>

    </div>
    
    <?php endif; ?>








  </div>
</section><!-- #categorias -->