   <!--==========================
      categorias Section
    ============================-->
    <section id="tecnologia">

      <!--<div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4"> <hr></div>
            <div class="col-lg-4 col-md-4">
              <div class="section-header"><h2>historia de held</h2></div>
            </div>
            <div class="col-lg-4 col-md-4"> <hr></div>
        </div>

      </div>-->
      <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-md-4 offset-lg-2"> <hr></div>
            <div class="col-lg-2 col-md-4">
              <div class="section-header"><h2>Tecnología</h2></div>
            </div>
            <div class="col-lg-3 col-md-4"> <hr></div>
        </div>


        <div class="row">
          <div class="">
            <div class="box wow fadeInDown">
              <img src="<?php echo base_url();?>assets/img/tecnologia.jpg" class="img-responsive" width="100%">
            </div>
          </div>
        </div>

        <div class="space35"></div>

        <div class="row wow fadeInUp">
         
        <?php 

        if(isset($tecnologias)):

          $categoria = '';
          $bloques   = 0;

          foreach ($tecnologias as $t): 
          
            // Si la categoria es distanta a la anterior nueva inicio bloque, pongo titulo y si NO es la 1ra cierro div 
            if ( $t['categoria'] !== $categoria ){
              
              $categoria = $t['categoria'];
              // Si el bloque es distinto de 0 entonces CIERRO la anterior e INICIO la nueva
              if ( $bloques !== 0){
              ?>

               </div>
              </div>               

              <?php 
              }
              ?> 
              
            

            <div class="col-lg-8 offset-lg-2 tituloTecnologia">
              <h3><?php echo $t['name']; ?></h3>
            </div>

            <div class="col-lg-6 offset-lg-3">

            <div id="accordion">              
            <?php
              
            }
            // Muestro una CARD con la Tecnologia
            ?>

                <div class="card">
                  <div class="card-header" id="heading<?php echo $t['idtecnologias']; ?>">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $t['idtecnologias']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $t['idtecnologias']; ?>">
                        <?php echo $t['titulo']; ?>
                      </button>
                    </h5>
                  </div>

                  <div id="collapse<?php echo $t['idtecnologias']; ?>" class="collapse" aria-labelledby="heading<?php echo $t['idtecnologias']; ?>" data-parent="#accordion">
                    <div class="card-body">
                      <?php echo nl2br($t['descripcion']); ?>
                    </div>
                  </div>
                </div>


            <?php

            $bloques++;
          endforeach; ?>

        <?php endif; ?>


        </div>

      </div>
    </section><!-- #categorias -->
