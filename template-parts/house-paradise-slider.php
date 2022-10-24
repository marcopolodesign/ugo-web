<div class="w-50-ns relative hp-slider">
    <?php if( have_rows('hp_slider') ): while( have_rows('hp_slider') ): the_row(); ?>
        <div color=<?php the_sub_field('color');?> class="absolute-cover z--1" style="background-image:url(<?php the_sub_field('hp_slider_images');?>)"></div>
    <?php endwhile; endif;?>

</div>
<div class="w-50-ns center relative z-2 mt-0 ml-0 hp-dark-color-bg flex container-mobile">
    <div class="m-auto flex flex-column items-center">
        <?php get_template_part('template-parts/content/hp-logo');?>
        <h1 class="white f2 lh-0 main-font bold mb2 measure tc mt4">Bienvenidos a House Paradise</h1>
        <p class="messina white lh-copy f4 measure-wide tc center ph4-ns">Un campo destinado para que tu mascota disfrute de correr en libertad con sus amigos y juegue hasta agotarse. La mejor experiencia para ellos y para vos.</p>
        <a target="_blank" class="no-deco flex main-cta white-border br-button mt4 w-max jic mb4">
            <p class="ml2 main-font white f4">Reservar ahora</p>
        </a>
    </div>
</div>