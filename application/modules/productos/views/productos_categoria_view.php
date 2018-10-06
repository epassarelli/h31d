   <!--==========================
      categorias Section
    ============================-->
    <section id="productosCategoria">

      <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-md-4 offset-lg-2"> <hr></div>
            <div class="col-lg-2 col-md-4">
              <div class="section-header"><h2><?php echo $fotoCategoria[ 'name' ]; ?></h2></div>
            </div>
            <div class="col-lg-3 col-md-4"> <hr></div>
        </div>


        <div class="row ">
          <div class="col-lg-4 offset-lg-4">
              <img src="<?php echo base_url();?>assets/uploads/<?php echo $fotoCategoria[ 'image' ]; ?>" alt="<?php echo $fotoCategoria[ 'name' ]?>" class="img-responsive encabezado" width="100%">
          </div>
        </div>

        <div class="clear"></div>


         <div class="row filtros">
          <div id="filters" class="col-lg-2 offset-lg-2 ">


            <h6>filtros </h6>
            <div class="filter-attributes">
              <span><?php echo $tags[0]['categoria']; ?></span>
              <?php

              $last = $tags[0]['categoria'];
              foreach ($tags as $tag):
                
                $categoria = $tag['categoria'];
                $name = $tag['name'];

                if ($categoria<>$last) {
                  $last = $categoria;
              ?>
            </div>
            <div class="filter-attributes">
              <span><?php echo $categoria; ?></span>  
              <div class="checkboxProductos"><input type="checkbox" name="<?php echo $categoria; ?>" id="<?php echo $name; ?>" value="<?php echo $name; ?>"><?php echo $name; ?></input></div>                
                <?php
                  } else {
                ?>
                    <div class="checkboxProductos"><input type="checkbox" name="<?php echo $categoria; ?>" id="<?php echo $name; ?>" value="<?php echo $name; ?>"><?php echo $name; ?></input></div>
                <?php
                  }
                endforeach;
                ?>
            </div>


            <input type='button' id='none' value='Limpiar filtros'></input>

          </div>

   <?php 

    if(isset($productosByCategoria)):
      
      $i = 0;
      $totalCol = round(count($productosByCategoria) / 3);

      ?>
      


      <div class="col-lg-6">
      
      <?php

      foreach ($productosByCategoria as $prod):
        
      if($i > $totalCol){ 
          //echo '</div>';
          //echo '<div class="col-lg-2">';
          $i = 0;
      } 

      $tagTipoString = '';
      $tagMaterialString = '';

      foreach ($prod['tagsProducto'] as $tagsProducto):
        $tagTipoString .= 'data-' .$tagsProducto['categoria'] . '="'.$tagsProducto['name'] .'"';
        //$tagMaterialString .= $tags['name'] . ',';
      endforeach; 

      //$tagTipoString = substr($tagTipoString, 0, -1);
      //$tagMaterialString = substr($tagMaterialString, 0, -1);      
      ?>

      <div class="col-lg-4 grid-products" <?php echo $tagTipoString; ?> >
        <a href="<?php echo base_url() . $prod['slug'];?>"><img src="<?php echo base_url();?>assets/uploads/<?php echo $prod['foto1'] ?>" class="img-responsive" alt="Guantes" width="100%"></a>
        <p class="nombreProducto"><?php echo $prod['nombre']; ?></p>
        <p class="precioProducto">$  <?php echo $prod['precio']; ?></p>
      </div>

    <?php 
      $i++;
      endforeach; 
    ?>

    </div>
    
    <?php endif; ?>

          <!-- div class="col-lg-2">

            <div class='grid-products' data-tipo='gore-tex' data-material='malla'>
               <a href="#"><img src="<?php //echo base_url();?>assets/img/guantesInterna_01.jpg" class="img-responsive" alt="Guantes" width="100%"></a>
               <p class="nombreProducto">Estiva</p>
               <p class="precioProducto">$1499</p>
            </div>


            <div class='grid-products' data-tipo='motocross' data-material='cuero'>
              <a href="#"><img src="<?php //echo base_url();?>assets/img/guantesInterna_01.jpg" class="img-responsive" alt="Guantes" width="100%"></a>
              <p class="nombreProducto">Hardtack</p>
              <p class="precioProducto"><span class="colorProductos rojo"></span><span class="colorProductos amarillo"></span><span class="colorProductos naranja"></span>$1499</p>
            </div>

          </div>

          <div class="col-lg-2">

            <div class='grid-products' data-tipo='deportivo' data-material='malla'>
               <a href="#"><img src="<?php //echo base_url();?>assets/img/guantesInterna_01.jpg" class="img-responsive" alt="Guantes" width="100%"></a>
               <p class="nombreProducto">Hardtack</p>
               <p class="precioProducto">$1499</p>
            </div>


            <div class='grid-products' data-tipo='verano' data-material='textura'>
              <a href="#"><img src="<?php //echo base_url();?>assets/img/guantesInterna_01.jpg" class="img-responsive" alt="Guantes" width="100%"></a>
              <p class="nombreProducto">Estiva</p>
              <p class="precioProducto"><span class="colorProductos rojo"></span><span class="colorProductos amarillo"></span><span class="colorProductos naranja"></span>$1499</p>
            </div>


          </div -->

        </div>

        <div class="clear"></div>

    
      </div>
    </section><!-- #categorias -->