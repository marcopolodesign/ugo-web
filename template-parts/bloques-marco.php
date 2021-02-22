<?php if( have_rows('landing_content') ): while( have_rows('landing_content') ): the_row(); ?>

<?php  if( get_row_layout() == 'bloque_1' ): 
    $color = get_sub_field('color_del_bloque');
    if (!$color) : 
      $color = "#860050";
    endif;
  ?>
<div class="container bloque-text-container flex jic mv6 <?php if(get_sub_field('reverse')) : ?> row-reverse <?php endif;?>">
  <div class="bloque-text w-40-ns relative <?php if(get_sub_field('background')) : echo "has-background"; endif;?>" style="color: <?php echo $color;?>; border: 2px solid <?php echo $color;?>">
    <?php if (get_sub_field('numero_bloque')): ?>
      <div class="absolute mh3 ph2 top-0 left-0 numero-bloque z-4">
        <h1 class="recoleta f0 top-0 left-0"><?php the_sub_field("numero_bloque");?>. </h1>
      </div>
    <?php endif;?>
    <div class="ph4 pv5 measure">
      <?php the_sub_field('texto_bloque');?>
    </div>
  </div>

  <?php if(get_sub_field('imagen_bloque')):?>
  <div class="w-50-ns">
      <img src=<?php the_sub_field('imagen_bloque');?>>
  </div>
  <?php endif;?>
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

  <div class="container flex jic mv6 <?php if(get_sub_field('reverse')) : ?> row-reverse <?php endif;?>">
    <div class="bloque-text w-40-ns relative <?php if(get_sub_field('background')) : echo "has-background"; endif;?>" style="color: <?php echo $color;?>; border: 2px solid <?php echo $color;?>;" >
    <?php if (get_sub_field('numero_bloque')): ?>
      <div class="absolute mh3 ph2 top-0 left-0 numero-bloque z-4">
        <h1 class="recoleta f0 top-0 left-0"><?php the_sub_field("numero_bloque");?>. </h1>
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


  <?php elseif( get_row_layout() == 'timeline' ): ?>
    <div class="container mv6">
      <h1 class="ugo-dark-pink f1 mb5-ns recoleta tc-ns">Cómo funciona</h1>
      <div class="flex justify-between items-start  marco-timeline">
        <?php if( have_rows('timeline_item')) : while ( have_rows('timeline_item') ) : the_row();?>
            <div class="timeline-item relative mh3 center w-20-ns">
              <h3 class="ugo-dark-pink recoleta fw3 tc f3"><?php the_sub_field('timeline_title');?></h3>
            </div>
        <?php endwhile; endif;?>
      </div>
    </div>
   





<?php endif; endwhile; endif;?>
