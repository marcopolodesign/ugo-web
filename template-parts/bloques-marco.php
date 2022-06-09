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

    <div class="back-arrow arrow">
        <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.9998 2.00017L3 13L13.9998 23.9998" stroke="#F4B5CD" stroke-width="3"/>
        </svg>
      </div>
      <div class="foward-arrow arrow">
        <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M10.9999 23.9998L21.9998 13L10.9999 2.00018" stroke="#F4B5CD" stroke-width="3"/>
        </svg>
      </div>
      

    <div class="carrousel-controller relative">
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

      <div class="relative z-3 pt6 pb5 marco-timeline-container">
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


    <?php elseif( get_row_layout() == 'timeline_item' ): ?>

      <div class="items-timeline-container pv5 ph5-ns">
        <h1 class="ugo-pink ttu tc f1 main-font w-50-ns center"><?php the_sub_field('timeline_title');?></h1>

        <div class="items-timeline-inner flex justify-between items-stretch mt4">

        <?php if( have_rows('item_timeline_item')) : while ( have_rows('item_timeline_item') ) : the_row();?>
              <div class="timeline-item relative mh3 center w-20-ns mh5-ns">
                <h3 class="black main-font fw3 tc f4 ugo-pink"><?php the_sub_field('item_timeline_title');?></h3>
                <div class="white f6 tc mt2"><?php the_sub_field('item_timeline_text');?></div>
              </div>
          <?php endwhile; endif;?>
        </div>
      </div>

      <?php elseif( get_row_layout() == 'image_fs' ): ?>

      <div class="fs-image pv5">
        <img src="<?php the_sub_field('image');?>" >
      </div>


      <?php elseif( get_row_layout() == 'steps' ): ?>

        <div class="steps-container flex jic">
          <div class="steps-inner w-50-ns ">
            <h2 class="title mb4 ugo-pink fw8"><?php the_sub_field('step_title');?></h2>

          <?php if( have_rows('steps_content')) : while ( have_rows('steps_content') ) : the_row();?>
              <div class="step not-active flex items-center mb4 anchor">
                <h1 class="step-n ugo-pink fw8 main-font f1"><?php echo get_row_index();?></h1>
                <div class="step-info ml4">
                  <h2 class="fw8 ugo-pink f5"><?php the_sub_field('step_title');?></h2>
                  <div class="white lh-copy mt1 fw6 f5 lh-0"><?php the_sub_field('step_text');?></div>
                </div>
              </div>
          <?php endwhile; endif;?>
          </div>
          <div class="steps-image w-40-ns relative">
            <?php if( have_rows('steps_content')) : while ( have_rows('steps_content') ) : the_row();?>
              <img class="pa5 not-active" src="<?php the_sub_field("step_image");?>">
              <?php endwhile; endif;?>
          </div>
        </div>


          <?php elseif( get_row_layout() == 'next_section' ): ?>
            
            <div class="mv5 container">
              <div class="next-section-container relative ph4-ns ">
                <div class="relative z-3 next-section-content flex flex-column items-end justify-end pv6 measure mr-0 ml-auto">
                  <?php the_sub_field('next_content');

                  if (get_sub_field('has_links')):
                    get_template_part('template-parts/content/stores-links'); 
                  endif; ?>
                  
                </div>

                <div class='next-section-gradient w-60 h-100 z-2 absolute top-0 right-0'></div>
                <div class="absolute-cover z--1" style="background-image: url(<?php the_sub_field('image');?>)"></div>
              </div>
            </div>


        <?php elseif( get_row_layout() == 'bloque_info_round' ): 
            $textWidth = 'w-60-ns';
          ?>

          <div class="bloque-round-container flex jic container mv5">
            <?php if(get_sub_field('image')): 
              $textWidth = 'w-40-ns';
              ?>
            <div class="w-60-ns round-image relative">
                <div class="absolute-cover" style='background-image: url(<?php the_sub_field("image");?>)' ></div>
            </div>
            <?php endif;?>

            <div class="center <?php echo $textWidth; ?>">
              <?php the_sub_field('texto');?>
              <div class="flex column-mobile">
              <?php if( have_rows('round_items')) : while ( have_rows('round_items') ) : the_row();?>
                <div class="round-item mr4-ns">
                  <?php if(get_sub_field('round-item-icon')): ?>
                    <img class="icon mb2" src="<?php the_sub_field("round-item-icon");?>" >
                    <?php endif;?>
                    <div class="white f6"><?php the_sub_field('round_item_info');?></div>
                </div>
              <?php endwhile; endif;?>
              </div>
            </div>
          </div>


          <?php elseif( get_row_layout() == 'text_image' ):
							$reverse = get_sub_field('reverse');
							if ($reverse) :
								$reverse = 'row-reverse';
              endif; ?>

							<div class="flex <?php echo $reverse; ?> justify-center items-center app-mock-container container column-mobile">
								<div class="flex w-40-ns center h-100 pa5-ns">
									<img src=<?php the_sub_field('image'); ?> class="m-auto">
								</div>

								<div class="w-40-ns center">
									<?php the_sub_field('text'); ?>
								</div>
							</div>


        <?php elseif( get_row_layout() == 'cards' ): ?>

        <div class="cards-container pv5 ph5-ns">
          <h1 class="ugo-pink ttu tc f1 main-font w-50-ns center"><?php the_sub_field('cards_title');?></h1>

          <div class="cards-inner flex justify-between mt5">

            <?php if( have_rows('card_item')) : while ( have_rows('card_item') ) : the_row();?>
                  <div class="card-item flex flex-column items-center  relative mh3 center w-30-ns mh4-ns pa4 h-max">
                    <?php if(get_sub_field('card_icon')): ?>
                      <svg width="155" height="91" viewBox="0 0 155 91" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_2760_2630)">
                        <g filter="url(#filter1_d_2760_2630)">
                        <rect x="4" width="147" height="83" rx="8" fill="#2B2729"/>
                        <rect x="5.5" y="1.5" width="144" height="80" rx="6.5" stroke="#DDDDDD" stroke-width="3"/>
                        </g>
                        <path d="M57.1 49.1955C56.3647 47.4099 55.2977 45.7879 53.9583 44.42C52.623 43.0481 51.0412 41.9544 49.3003 41.1991C49.2847 41.1911 49.2691 41.1871 49.2535 41.1791C51.6819 39.3808 53.2606 36.4516 53.2606 33.1467C53.2606 27.6719 48.9339 23.2361 43.5937 23.2361C38.2536 23.2361 33.9269 27.6719 33.9269 33.1467C33.9269 36.4516 35.5056 39.3808 37.934 41.1831C37.9184 41.1911 37.9028 41.1951 37.8872 41.203C36.1409 41.9583 34.574 43.0413 33.2292 44.424C31.8911 45.793 30.8242 47.4146 30.0875 49.1995C29.3637 50.9468 28.9734 52.8202 28.9376 54.7182C28.9366 54.7609 28.9439 54.8033 28.9591 54.843C28.9743 54.8827 28.9971 54.9189 29.0261 54.9495C29.0552 54.98 29.0899 55.0043 29.1283 55.0208C29.1666 55.0374 29.2078 55.0459 29.2494 55.0459H31.5882C31.7597 55.0459 31.8961 54.9061 31.9 54.7342C31.978 51.6491 33.1863 48.7599 35.3224 46.57C37.5325 44.3041 40.4676 43.0573 43.5937 43.0573C46.7199 43.0573 49.655 44.3041 51.8651 46.57C54.0012 48.7599 55.2095 51.6491 55.2875 54.7342C55.2914 54.91 55.4278 55.0459 55.5993 55.0459H57.9381C57.9797 55.0459 58.0209 55.0374 58.0592 55.0208C58.0976 55.0043 58.1323 54.98 58.1614 54.9495C58.1904 54.9189 58.2132 54.8827 58.2284 54.843C58.2436 54.8033 58.2509 54.7609 58.2499 54.7182C58.2109 52.808 57.825 50.9498 57.1 49.1955ZM43.5937 40.0202C41.8046 40.0202 40.1207 39.3048 38.8539 38.0061C37.5871 36.7073 36.8893 34.9809 36.8893 33.1467C36.8893 31.3124 37.5871 29.5861 38.8539 28.2873C40.1207 26.9885 41.8046 26.2732 43.5937 26.2732C45.3829 26.2732 47.0668 26.9885 48.3336 28.2873C49.6004 29.5861 50.2982 31.3124 50.2982 33.1467C50.2982 34.9809 49.6004 36.7073 48.3336 38.0061C47.0668 39.3048 45.3829 40.0202 43.5937 40.0202Z" fill="white"/>
                        <rect x="20.375" y="15.0967" width="46.4375" height="51.4623" rx="11.5" stroke="white" stroke-width="3"/>
                        <path d="M84.5 59.8655L101.562 59.8655" stroke="white" stroke-width="3" stroke-linecap="round"/>
                        <path d="M84.5 16.0066L136.125 16.0066" stroke="white" stroke-width="3" stroke-linecap="round"/>
                        <path d="M84.5 23.2361L128.688 23.2361" stroke="white" stroke-width="3" stroke-linecap="round"/>
                        <path d="M84.5 30.4656L104.625 30.4656" stroke="white" stroke-width="3" stroke-linecap="round"/>
                        </g>
                        <defs>
                        <filter id="filter0_d_2760_2630" x="0" y="0" width="155" height="91" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2760_2630"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2760_2630" result="shape"/>
                        </filter>
                        <filter id="filter1_d_2760_2630" x="0" y="0" width="155" height="91" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2760_2630"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2760_2630" result="shape"/>
                        </filter>
                        </defs>
                      </svg>
                        <!-- <img src="<?php the_sub_field("card_icon");?>" > -->
                    <?php endif;?>
                    <h3 class="black main-font fw3 tc f4 ugo-pink"><?php the_sub_field('card_item_title');?></h3>
                    <div class="white f6 tc mt2"><?php the_sub_field('card_item_text');?></div>
                  </div>
              <?php endwhile; endif;?>
            </div>
          </div>


  


<?php endif; endwhile; endif;?>
