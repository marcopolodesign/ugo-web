<?php /* Template Name:  Home  */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" data-barba="container" data-barba-namespace="paseadores" class="paseadores pv5 paseadores-home">

    <section class="paseadores-starter container flex jic pv5">
        <div class="paseadores-starter-info w-40-ns">
          <h1 class="ugo-pink main-font f1">Ganá dinero paseando perros.</h1>
          <h2 class="f5 white mt2 fw6 lh-copy">Recibí solicitudes de paseo, elegí slos perros que queres pasear, con un servicio que se adapta a tus horarios y disponibilidad semanal para trabajar.</h2>
        </div>

        <div class="paseadores-form w-50-ns flex flex-wrap jic">
          <input class="w-50-ns w-100-m" name="name" placeholder="Nombre">
          <input class="w-50-ns w-100-m" name="lastName" placeholder="Apellido">
          <input class="w-50-ns w-100-m" name="dni" placeholder="Documento Nacional">
          <input class="w-50-ns w-100-m" name="phone" placeholder="Teléfono de contacto">
          <input class="w-100" name="mail" placeholder="Correo Electrónico">

          <button action="submit w-100" class="bg-gradient white">Registrarme</button>

        </div>
    </section>


    <div class="bloques-home container">
			<?php get_template_part('template-parts/bloques-marco');?>
		</div>

    </main><!-- #main -->
	</div><!-- #primary -->



<?php
get_footer();
