<script type="text/javascript">
jQuery(document).ready(function($) {
  "use strict";

  //Contact
  $('#submit').click(function() {
    var f = $('form.contactForm').find('.form-group'),
      ferror = false,
      emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

    f.children('input').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;

          case 'email':
            if (!emailExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'checked':
            if (! i.is(':checked')) {
              ferror = ierror = true;
            }
            break;

          case 'regexp':
            exp = new RegExp(exp);
            if (!exp.test(i.val())) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    f.children('textarea').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });

    if (ferror) {
      return false;
    }else{
      var str = $('#myform').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('catalogo/sendEmail'); ?>",
        data: str,
        success: function(msg) {
          if (msg.mensage == 'OK') {
            $("#sendmessage").addClass("show");
            $("#errormessage").removeClass("show");
            $('.contactForm').find("input, textarea").val("");
          } else {
            $("#sendmessage").removeClass("show");
            $("#errormessage").addClass("show");
            $('#errormessage').html(msg);
          }
        }
      });
      return false;
    }
  });
});
</script>
   <!--==========================
      categorias Section
    ============================-->
    <section id="catalogo">

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
              <div class="section-header"><h2>Catalogo</h2></div>
            </div>
            <div class="col-lg-3 col-md-4"> <hr></div>
        </div>


        <div class="row">
          <div class="">
            <div class="box wow fadeInDown">
              <img src="<?php echo base_url();?>assets/img/catalogo.jpg" class="img-responsive" width="100%">
            </div>
          </div>
        </div>

        <div class="space35"></div>

         <div class="row catalogoDescarga wow fadeInUp">
            <div class="col-lg-2 offset-lg-3">
              <img src="<?php echo base_url();?>assets/img/catalogo01.jpg" alt="Catalogo" class="img-responsive" width="100%">
            </div>

             <div class="col-lg-2">
              <img src="<?php echo base_url();?>assets/img/catalogo02.jpg" alt="Catalogo" class="img-responsive" width="100%">
            </div>

             <div class="col-lg-2">
              <img src="<?php echo base_url();?>assets/img/catalogo03.jpg" alt="Catalogo" class="img-responsive" width="100%">
            </div>

          </div>



      </div>
    </section><!-- #categorias -->


     <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header col-lg-10 offset-lg-2">
          <p>Para solicitar nuestro CATÁLOGO DE PRODUCTOS - 2018 en Formato Digital, llene el siguiente formulario:</p>
        </div>

      </div>

      <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->

      <div class="container">
        <div class="form col-lg-8 offset-lg-2">
          <div id="sendmessage">Su mensaje ha sido enviado correctamente. Gracias!!</div>
          <div id="errormessage"></div>
          <!-- form action="" method="post" role="form" class="contactForm" -->
          <?php                         
            $attributes = array('name' => 'myform', 'id' => 'myform', 'method' => 'post', 'role' => 'form', 'class' => 'contactForm');
            echo form_open('', $attributes);
          ?>            
              <div class="form-group">
                <span>Nombre y Apellido</span>
                <input type="text" name="nombre" class="form-control" id="nombre" data-rule="minlen:4" data-msg="Por favor ingrse al menos 4 caracteres" />
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <span>COMPAÑÍA / NEGOCIO</span>
                <input type="text" class="form-control" name="negocio" id="negocio"  data-rule="minlen:4" data-msg="Por favor ingrse al menos 4 caracteres" />
                <div class="validation"></div>
              </div>

               <div class="form-group">
                <span>E-mail</span>
                <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <span>LOCALIDAD / PROVINCIA</span>
                <input type="text" class="form-control" name="localidad" id="localidad" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <span>COMENTARIOS ADICIONALES</span>
                <textarea class="form-control" name="mensaje" rows="5" data-rule="required" data-msg="Por favor escriba su mensaje" ></textarea>
                <div class="validation"></div>
              </div>
            <div class=""><button id="submit" name="submit" type="submit">ENVIAR</button></div>
          <!-- /form -->
          <?php
            echo form_close();
          ?>          
        </div>

      </div>
    </section><!-- #contact -->
