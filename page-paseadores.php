<?php /* Template Name:  Paseadores  */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" data-barba="container" data-barba-namespace="paseadores" class="paseadores pv5 paseadores-home">

    <section class="paseadores-starter container flex jic pv5" id="paseadores-top">
        <div class="paseadores-starter-info w-40-ns">
          <h1 class="ugo-pink main-font f1">Ganá dinero paseando perros.</h1>
          <h2 class="f5 white mt2 fw6 lh-copy">Recibí solicitudes de paseo, elegí slos perros que queres pasear, con un servicio que se adapta a tus horarios y disponibilidad semanal para trabajar.</h2>
        </div>

        <form class="paseadores-form w-50-ns flex flex-wrap jic validate" action="https://ugo.us9.list-manage.com/subscribe/post?u=cf0cbf5202a5fbeef1a2eb9af&amp;id=9a941a0f13&amp;f_id=00830ae1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" >
          <input class="w-50-ns w-100-m" type="text" value="" name="FNAME" placeholder="Nombre Completo">
          <input class="w-50-ns" type="email" value="" name="EMAIL" required placeholder="Correo Electrónico">
          <input class="w-50-ns w-100-m" type="text" value="" name="DNI" class="" placeholder="Documento Nacional">
          <input class="w-50-ns w-100-m" type="text" name="PHONE" class="" value="" placeholder="Teléfono de contacto">
         
          <div id="mce-responses" class="clear foot">
		        <div class="response" id="mce-error-response" style="display:none"></div>
		        <div class="response" id="mce-success-response" style="display:none"></div>
          </div>


          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cf0cbf5202a5fbeef1a2eb9af_9a941a0f13" tabindex="-1" value=""></div>

          <input type="submit" value="Registrarme" name="subscribe" id="mc-embedded-subscribe"  class="bg-gradient white submit w-100"></input>

          <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='DNI';ftypes[2]='text';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
      
        </form>
    </section>



    <div class="bloques-home container">
			<?php get_template_part('template-parts/bloques-marco');?>
		</div>


    <div class="flex flex-column justify-center items-center ">
      <h2 class="ugo-pink main-font f1 mv4 tc">Registrate ahora</h1>
      <a id="paseadores-end-cta" href="#paseadores-top" class="main-cta no-deco bg-gradient white fw8 center br-button">Empezar a pasear con UGo!</a>
    </div>
      

    </main><!-- #main -->
	</div><!-- #primary -->



<?php
get_footer();
