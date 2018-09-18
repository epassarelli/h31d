<script type="text/javascript">
    $( function() {            
    $("#provincia").change( function() {                
      $("#provincia option:selected").each( function() {
                provincia = $('#provincia').val();                   
        $.post( 
          "<?php echo base_url();?>admin/localidades/getLocalidadesForm", 
          { provincia : provincia }, 
          function(data) {
                      $("#localidad").html(data);
                });         
            });            
    });         
  }); 
</script>

<!--==========================
  categorias Section
============================-->
<section id="puntosVenta">

  <div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-md-4 offset-lg-2"> <hr></div>
        <div class="col-lg-2 col-md-4">
          <div class="section-header"><h2>Puntos de venta</h2></div>
        </div>
        <div class="col-lg-3 col-md-4"> <hr></div>
    </div>


    <div class="row">
      <div class="">
        <div class="box wow fadeInDown">
          <img src="<?php echo base_url();?>assets/img/puntosVenta.jpg" class="img-responsive" width="100%">
        </div>
      </div>
    </div>

    <div class="space35"></div>

    <div class="row wow fadeIn">
        <div class="col-lg-10 offset-lg-1 mapa">
          <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62496.98702835498!2d-58.46349224812943!3d-34.58915666704055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb6f6e24fd63b%3A0x865b503f1d30d52c!2sUrquiza+Motos!5e0!3m2!1ses!2sar!4v1531254961101" width="100%" height="550" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

<!--
    <div class="row wow fadeInUp">
         <div class="col-lg-2 offset-lg-1">
          <h6>buscador de locales</h6>
         </div>
    </div>

    <div class="row wow fadeInUp">
         
         <div class="col-lg-3 offset-lg-1">
            <form action="">
              <div class="form-group">
                <label for="selectProvincia">PROVINCIA</label>
                <select class="form-control" id="provincia" name="provincia">
                    <?php foreach ($provincias as $p): ?>
                      <option value="<?php echo $p->id; ?>"><?php echo $p->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>

         </div>


          <div class="col-lg-3">

              <div class="form-group">
                <label for="selectProvincia">LOCALIDAD</label>
                <select class="form-control" name="localidad" id="localidad">
                  <option value="">Selecciona primero la provincia</option>
                </select>
              </div>
            </form>
          </div>

         <div class="col-lg-2">
            <button>Buscar</button>
         </div>

    </div>
-->
    <div class="space25"></div>
  

    <div class="container">
    <div class="row  wow fadeInUp">

    <?php 

    if(isset($locales)){
      foreach ($locales as $l) {
        # code...
        ?>

        <div class="col-lg-3">
          <div class="store">
            <img src="<?php echo base_url();?>assets/img/gotaStore.png" class="img-responsive gotaStore">
            <h5><?php echo $l['nombre']; ?></h5>
            <p><?php echo $l['calle']; ?></p>
            <p><?php echo $l['localidad']; ?></p>
            <p><?php echo $l['provincia']; ?></p>
            
            <p class="storeIcons"><i class="fa fa-phone"></i> <?php echo $l['telefono']; ?></p>
            <p class="storeIcons"><i class="fa fa-at"></i> <?php echo $l['correo']; ?></p>
            <p class="storeIcons"><i class="fa fa-globe"></i> <a href="<?php echo $l['web']; ?>" target="_blank"><?php echo $l['web']; ?></a></p>
            <img src="<?php echo base_url().'assets/uploads/'.$l['image']; ?>" class="img-responsive" width="100%">
            <!-- button type="button" class="mostrarmapa" id="<?php //echo $l['latitud']; ?>" name="<?php //echo $l['longitud']; ?>">ver en mapa</button -->
            <button type="button" class="mostrarmapa" id="<?php echo $l['calle'].', '.$l['localidad'].', '.$l['provincia']; ?>" name="<?php echo $l['longitud']; ?>">ver en mapa</button>
          </div>
        </div>
        <?php
      }
    }
    ?>
    </div>
    </div>

  </div>

</section><!-- #categorias -->

<div class="space35"></div>

<script>
$( ".mostrarmapa" ).click(function(e) {
  e.preventDefault();
  var latitud = $(this).attr('id');
  var longitud = $(this).attr('name');
  var $iframe = $('#mapa');
  //var url = 'http://maps.google.com/maps/place?q='+latitud+','+longitud+'&z=15&output=embed';
  var url = 'http://maps.google.com/maps/place?q='+latitud+'&z=15&output=embed';
  $iframe.attr('src',url);
  $('html,body').animate({ scrollTop: $("#mapa").offset().top }, 'slow');
  return false;
});
</script>