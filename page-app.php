
<?php /* Template Name:  App  */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" data-barba="container" data-barba-namespace="app" class="app pv5 bg-black">

        <section class="app-starter container flex jic pv5" id="app-top">
            <div class="w-50-ns app-image relative">
                <div class="w-70-ns center ph3">
                    <img class="ph4" src="<?php the_field('imagen_principal');?>">
                </div>
                <div class="absolute app-image-1 w-40 top-0">
                    <img src="<?php the_field('imagen_app_feature');?>" >
                </div>

                <div class="absolute app-image-2 w-40 right-0">
                    <img src="<?php the_field('imagen_app_feature_2');?>">
                </div>
            </div>

            <div class="paseadores-starter-info w-40-ns">
                <h1 class="ugo-pink main-font f1">Somos La forma más segura de pasear a tu perro.</h1>
                <h2 class="f5 white mt2 fw6 lh-copy mt2">Elegí el paseador que más te guste. Trackeá tu perro en tiempo real mientras pasea. Revisá sus paseos anteriores y planificá sus proximos paseos. Todo desde un mismo lugar. <br><br>Eso es UGo! - la nueva forma de que tus perros paseen.</h2>

                <div class="app-download-cta flex jic mt4">
                    <a class="apple-store w-50-ns">
                        <img src="/wp-content/uploads/2022/05/Download_on_the_App_Store_Badge_ES_RGB_blk_100217.svg">
                    </a>
                    <a class="google-play w-50-ns">
                        <img src="/wp-content/uploads/2022/05/google-play-badge.png">
                    </a>
                </div>
            </div>

        </section>

        <section class="app-features flex justify-between pa5-ns container-mobile relative">
            <div class="flex flex-column jic w-30-ns ph4 relative z-2">
                <div class="mr-0 ml-auto">
                    <img src="<?php the_field('imagen_app_feature');?>">
                </div>
                <div class="center">
                    <img src="/wp-content/uploads/2022/05/Group-1231.png">
                </div>
            </div>

            <div class="w-30-ns ph4 pt4 relative z-2">
                <img src="<?php the_field('imagen_principal');?>" >
            </div>

            <div class="flex flex-column jic w-30-ns relative z-2">
                <div class="center w-80-ns">
                    <img src="/wp-content/uploads/2022/05/Group-1232.png">
                </div>
                <div class="m-auto w-90-ns">
                    <img src="/wp-content/uploads/2022/05/Group-1233.png">
                </div>
            </div>

            <div class="absolute-cover no-repeat bg-center z--1" style="background-size: contain; z:index: -1; background-image: url('/wp-content/uploads/2022/05/Group-1234.svg);">
            </div>

        </section>

        <div class="bloques-home">
			<?php get_template_part('template-parts/bloques-marco');?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->



<?php
get_footer();
