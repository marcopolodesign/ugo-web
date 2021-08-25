<?php if( have_rows('landing_content') ): while( have_rows('landing_content') ): the_row(); ?>

<?php  if( get_row_layout() == 'bloque_1' ): 
    $color = get_sub_field('color_del_bloque');
    if (!$color) : 
      $color = "#860050";
    endif;
  ?>
<div class="container bloque-text-container flex jic mv6 <?php if(get_sub_field('reverse')) : ?> row-reverse <?php endif;?>">
  <div class="bloque-text w-40-ns relative <?php if(get_sub_field('background')) : echo "has-background"; endif;?>" style="color: <?php echo $color;?>; border: 3px solid <?php echo $color;?>">
    <?php if (get_sub_field('numero_bloque')): ?>
      <div class="absolute mh3 ph2 top-0 left-0 numero-bloque z-4">
        <h1 class="main-font f0 top-0 left-0"><?php the_sub_field("numero_bloque");?>. </h1>
      </div>
    <?php endif;?>
    <div class="absolute z-1 bloque-shape top-0 left-0">
        <svg width="326" height="299" viewBox="0 0 326 299" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M326 141.9C326 228.6 253 298.9 163 298.9C73 298.9 0 228.6 0 141.9C0 82.7 34.1 31.1 84.3 4.4L86.4 5.8L89.5 7.8L93 7.5L96.3 6L99.6 8.6L102.9 7.5L106.4 6.2L109.7 5.5L113 5.7L116 7.1L119.3 6L122.8 6.9L126.5 7.3L130 4L133.9 5.1L137.2 2.9L141.1 2L144.6 0.3L147.9 0.9L151.2 1.3L154.5 0L157.8 0.4L161.1 0.2L164.4 1.3L167.7 1.5L170.8 2.8L174.3 4.3L178.2 2.8L181.7 3.9L185.2 5.2L188.5 6.3L191 8.1L194.5 9.6L198.2 8.7L201.7 10.7L205.4 9.2L209.1 9.9L212.8 10.6L216.5 10.4L220 9.3L223 8.1L225.7 5.3L229 3.6H232.7L235.8 4.9L238.6 2.8C290.5 29 326 81.5 326 141.9Z" fill="#F4B5CD"/>
        </svg>
    </div>

    <div class="ph4 pv5 measure relative z-3">
      <?php the_sub_field('texto_bloque');?>
    </div>
  </div>

  <?php if(get_sub_field('imagen_bloque')):?>
  <div class="w-50-ns">
      <img src=<?php the_sub_field('imagen_bloque');?>>
  </div>
  <?php endif;?>
</div>

<?php elseif( get_row_layout() == 'full_bloque' ):  	?>

  <div class="container pv6">
    <div class="bloque-text relative <?php if(get_sub_field('background')) : echo "has-background"; endif;?>" style="color: <?php echo $color;?>; border: 3px solid <?php echo $color;?>">
        <?php if (get_sub_field('numero_bloque')): ?>
          <div class="absolute mh3 ph2 top-0 left-0 numero-bloque z-4">
            <h1 class="main-font f0 top-0 left-0"><?php the_sub_field("numero_bloque");?>. </h1>
          </div>
        <?php endif;?>
        <div class="absolute z-1 bloque-shape top-0 left-0">
            <svg width="326" height="299" viewBox="0 0 326 299" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M326 141.9C326 228.6 253 298.9 163 298.9C73 298.9 0 228.6 0 141.9C0 82.7 34.1 31.1 84.3 4.4L86.4 5.8L89.5 7.8L93 7.5L96.3 6L99.6 8.6L102.9 7.5L106.4 6.2L109.7 5.5L113 5.7L116 7.1L119.3 6L122.8 6.9L126.5 7.3L130 4L133.9 5.1L137.2 2.9L141.1 2L144.6 0.3L147.9 0.9L151.2 1.3L154.5 0L157.8 0.4L161.1 0.2L164.4 1.3L167.7 1.5L170.8 2.8L174.3 4.3L178.2 2.8L181.7 3.9L185.2 5.2L188.5 6.3L191 8.1L194.5 9.6L198.2 8.7L201.7 10.7L205.4 9.2L209.1 9.9L212.8 10.6L216.5 10.4L220 9.3L223 8.1L225.7 5.3L229 3.6H232.7L235.8 4.9L238.6 2.8C290.5 29 326 81.5 326 141.9Z" fill="#F4B5CD"/>
            </svg>
        </div>

        <div class="ph4 pv5 relative z-3">
          <h1 class="mb5 measure"><?php the_sub_field('titulo_bloque');?></h1>

          <div class="flex flex-wrap justify-between items-start">
          <?php if( have_rows('elementos_bloque') ): while( have_rows('elementos_bloque') ): the_row(); ?>

            <div class="bloque-element w-30-ns mb4 mh2 flex flex-column justify-center">
              <?php if (get_sub_field('icono_bloque')): ?>
                <img src="<?php the_sub_field('icono_bloque');?>">
              <?php endif;?>

              <div class="tc mt2 measure lh-copy"><?php the_sub_field('texto_elemento');?></div>
            </div>

          <?php endwhile; endif;?>
          </div>
        </div>
      </div>


  </div>

 


<?php elseif( get_row_layout() == 'galeria' ):  	
  $images = get_sub_field('galeria_de_fotos');
  $size = 'full'; // (thumbnail, medium, large, full or custom size); ?>
  <div class="w-100 ph3 mv6 overflow-x-scroll marco-gallery">
    <!-- <h1 class="tc ugo-dark-pink mb4 recoleta">Galería de fotos</h1> -->
    <div class="flex w-max">
        <?php foreach( $images as $image ): ?>  
          <img class="mh4" src="<?php echo esc_url($image['url']);?>">
        <?php endforeach;?>
    </div>
  </div>
   
  <?php elseif( get_row_layout() == 'map' ): ?>

  <div class="container relative flex jic mv6 <?php if(get_sub_field('reverse')) : ?> row-reverse <?php endif;?>">
    <div class="absolute z-1 bloque-shape top-0 left-0">
        <svg width="326" height="299" viewBox="0 0 326 299" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M326 141.9C326 228.6 253 298.9 163 298.9C73 298.9 0 228.6 0 141.9C0 82.7 34.1 31.1 84.3 4.4L86.4 5.8L89.5 7.8L93 7.5L96.3 6L99.6 8.6L102.9 7.5L106.4 6.2L109.7 5.5L113 5.7L116 7.1L119.3 6L122.8 6.9L126.5 7.3L130 4L133.9 5.1L137.2 2.9L141.1 2L144.6 0.3L147.9 0.9L151.2 1.3L154.5 0L157.8 0.4L161.1 0.2L164.4 1.3L167.7 1.5L170.8 2.8L174.3 4.3L178.2 2.8L181.7 3.9L185.2 5.2L188.5 6.3L191 8.1L194.5 9.6L198.2 8.7L201.7 10.7L205.4 9.2L209.1 9.9L212.8 10.6L216.5 10.4L220 9.3L223 8.1L225.7 5.3L229 3.6H232.7L235.8 4.9L238.6 2.8C290.5 29 326 81.5 326 141.9Z" fill="#F4B5CD"/>
        </svg>
    </div>

    <div class="bloque-text w-40-ns relative <?php if(get_sub_field('background')) : echo "has-background"; endif;?>" style="color: <?php echo $color;?>; border: 2px solid <?php echo $color;?>;" >
    <?php if (get_sub_field('numero_bloque')): ?>
      <div class="absolute mh3 ph2 top-0 left-0 numero-bloque z-4">
        <h1 class="main-font f0 top-0 left-0"><?php the_sub_field("numero_bloque");?>. </h1>
      </div>
    <?php endif;?>
    <div class="ph4 pv5 measure">
      <?php the_sub_field('texto_bloque');?>
    </div>
  </div>

    <?php if(get_sub_field('mapa')):?>
      <div class="marco-map w-50-ns">
        <iframe src=<?php the_sub_field('mapa');?>  width= "100%" height="100%" frameborder="0" style="border:0" allowfullscreen>
        </iframe>
      </div>
    <?php endif;?>
  </div>


  <?php elseif( get_row_layout() == 'carrousel' ): ?>

  <div class="marco-carrousel relative mv5 w-100 overflow-hidden">
    <div class="flex w-max relative left-0">
      <?php if( have_rows('carrousel_content') ): while( have_rows('carrousel_content') ): the_row(); ?>
          <div class="carrousel-image relative mh3-ns">
            <div class="absolute-cover" style='background-image: url(<?php the_sub_field("carrousel_image");?>)'></div>
            <div class="absolute-overlay black z-2"></div>
            <div class="absolute-center z-3 tc">
              <?php the_sub_field('carrousel_text');?>
            </div>        
          </div>

      <?php endwhile; endif;?>
    </div>

    <div class="carrousel-controller">
      <div class="controller-inner">
        <?php $carrousel = get_sub_field('carrousel_content');
        foreach ($carrousel as $c):?>
          <div class="dot"></div>
         <?php endforeach;?>
        </div>
    </div>

  </div>

  <?php elseif( get_row_layout() == 'timeline' ): ?>
    <div class="container mv6 relative" >
      <div class="absolute-cover z-2" style="background-image:url(<?php the_sub_field('timeline_bg');?>)"></div>

      <div class="relative z-3 pt6 pb5">
      <h1 class="f1 mb5-ns main-font">Cómo funciona</h1>
      <div class="ugo-timeline pa5 mt6">
        <div class="flex justify-between items-start  marco-timeline" >
          <?php if( have_rows('timeline_item')) : while ( have_rows('timeline_item') ) : the_row();?>
              <div class="timeline-item relative mh3 center w-20-ns">
                <h3 class="black main-font fw3 tc f4"><?php the_sub_field('timeline_title');?></h3>
              </div>
          <?php endwhile; endif;?>
        </div>
      </div>
      </div>
      
    </div>
   

    <?php elseif( get_row_layout() == 'reviews' ): ?>

    <div class="marco-reviews flex column-mobile">
        <div class="w-50-ns reviews-cover relative">
          <div class="relative z-3 tc">
             <h1 class="main-font white mt4 mb2 f2"><?php the_sub_field('reviews_titile');?></h1>
             <img class="review-logo ph4" src=<?php the_sub_field('review_logo');?>> 
          </div>
            <div class="absolute-cover" style="background-image:url(<?php the_sub_field('review_cover');?>)"></div>
        </div>

        <div class="w-50-ns reviews-content ph5 pv4">
            <?php $reviews = get_sub_field('reviews');
            foreach ($reviews as $r): ?>
              <div class="review relative pv5">
                <img class="relative z-2" src=<?php echo $r['review_image'];?> >
                  <div class="review-icon absolute z-1">
                    <svg width="149" height="149" viewBox="0 0 149 149" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="74.02" cy="74.0219" rx="74.02" ry="74.0219" fill="#F4B5CD"/>
                    </svg>
                  </div>
              </div>
            <?php endforeach;?>
        </div>

    </div>



<?php endif; endwhile; endif;?>
