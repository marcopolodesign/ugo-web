<?php 
/** Template Name: FAQ */
get_header(); 
$mainColor = get_field('main_color');

?>

<main id="main" data-barba="container" data-barba-namespace="faq" class="faq no-mt ugo-pink-bg">

  <section class="relative container pt5">
      <div class="flex justify-between items-end pt6-ns pb4 faq-title">
        <h1 class='black f0'><?php the_title();?>s</h1>
        <div class="tr tc page-description black black-text f3">
          <?php 
            if(have_posts() ) : while(have_posts() ) : the_post(); 
              the_content();
            endwhile; endif;
          ?>
        </div>
      </div>

    <!-- <div class="relative container pt3 z-3">
    <div class="featured-faq-container flex column-mobile justify-between items-start">
      <?php if( have_rows('main_faq') ): while ( have_rows('main_faq') ) : the_row();?>
        <div class="featured-faq tc ph4 pv5 mh3">
          <h2 class="main-font f3 mb2 white"><?php the_sub_field('question');?></h2>
          <?php the_sub_field('answer');?>
        </div>

      <?php endwhile; endif; ?>
      </div>
    </div> -->


    <!-- <div class="absolute-cover z--1" style="background-image: url(<?php the_post_thumbnail_url();?>)"></div> -->
  </section>

  <section class="pb5 container">
      <div class="faq-container">
      <div class="faq-content">
        <div class="faq-category-container relative">
          <?php $color = get_field('color');
               if( have_rows('faq') ): while ( have_rows('faq') ) 
                : the_row(); if (get_sub_field('question')):?>
                  <div class="faq-item bigg-black-bg pv4" area-expanded="false">
                    <h2 class="fw3 faq-question f2 black w-70-ns"><?php the_sub_field('question'); ?></h2>
                    <div class="faq-answer black">
                      <?php the_sub_field('answer'); ?>
                    </div>  
                  </div>
                <?php endif; endwhile; endif;?>
           
        </div>
       </div>
  </section>


    <?php  
        get_template_part('template-parts/reserve'); 
        get_template_part('template-parts/reserve-hp/reserve-message'); 
    ?>

    <script src="/wp-content/themes/ugo-web/js/datepicker-full.min.js"></script>
    <script src="/wp-content/themes/ugo-web/js/house-paradise.js"></script>
  
<style>



.faq-answer {
	max-height: 0;
	opacity: 0;
}

/* General FAQ */

.faq-filter {
	top: 180px;
}

.faq-filter > h2:not(:first-child) {
	color: var(--grey);
}

.faq-filter h2 {
	transition: all 0.3s ease;
}

.faq-filter > h2:hover {
	color: #000 !important;
}

.faq-content {
	min-height: 500px;
}

.faq-item {
	position: relative;
	max-height: min-content;
	max-height: -moz-min-content;
	max-height: intrinsic;
	border-bottom: 3px solid #000;
	cursor: pointer;
}

.faq-item::after {
	position: absolute;
	top: 0;
	right: 0;
	margin-top: 12px;
	margin-right: 20px;
	content: "+";
	color: #000;
	font-size: 42px;
	transition: transform 0.3s ease;
	transform-origin: center;
}

.faq-item[area-expanded="true"]::after {
	transform: rotate(45deg);
}

.faq-item p:last-child,
.faq-item p:nth-child(2) {
	color: #000;
    font-size: 22px;
    width: 60%;
    line-height: 1.5;
	/* margin-top: 10px; */
}

.faq-item[area-expanded="true"] p:last-child,
.faq-item[area-expanded="true"] p:nth-child(2) {
margin-top: 40px !important;
}

.faq-item[area-expanded="true"] {
	max-height: 500px;
}

.faq-item[area-expanded="false"] p:not(:first-child) {
	/* display: none; */
}

.faq-item[area-expanded="true"] p:not(:first-child) {
	/* transition: all 0.3s ease; */
}

.faq-item[area-expanded="true"] h2, .faq-item[area-expanded="true"] p {
	/* color: var(--hp-blue); */
}

.faq-item[area-expanded="true"],
.faq-item:hover {
	/* border-bottom : 3px solid var(--hp-blue); */
	transition: border 0.3s ease;
}

.faq-item[area-expanded="true"]::after {
	/* color: var(--hp-blue); */
}

.faq-question {
	position: relative;
}

.faq-question::after {
	position: absolute;
	top: 50%;
	right: 10px;
	transform: translateY(-50%);
	content: "";
	background-image: url("/wp-content/uploads/2020/01/arrow-pink.svg");
	height: 100%;
	transition: all 0.3s ease;
	width: 8.5px;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
}

.faq-item[area-expanded="true"] .faq-question::after {
	transform: translateY(-50%) rotate(90deg);
}


    .faq-title {
        border-bottom: 3px solid #000;
    }
	
	.header-title-center {
		margin-top: 80px;
	}

.header-title-center {
		margin-top: 80px;
	}

  
.faq-filter >div {
		border: 1px solid <?php echo $mainColor;?>
	}


   	.featured-faq {
		border: 1px solid <?php echo $mainColor;?>;
	}

	.featured-faq * {
		color:<?php echo $mainColor;?>
	}
	
	@media (min-width: 768px) {
		.featured-faq {
			width: 33%;
		}
	}

	.page-description p {
				color: <?php echo $mainColor;?>
			}

    @media (min-width: 768px) {
      .featured-faq {
        width: 33%;
      }
    }

</style>


</main><!-- #main & End Barba Container-->

<?php get_footer();?>
