<div class="fixed z-5 reserve-container flex column-mobile-reverse ugo-black-bg overflow-scroll o-0 pointers-none">
  <!--  column-mobile-reverse -->
  <div class="close-modal black">X</div>
  <div class="w-60-ns flex flex-column justify-between relative overflow-y-scroll reserve-input-container">
    <div class="pl4-ns pt3">
      <p class="breadcrumb dn">UGo! Home > House Paradise > Sobre tu perro</p>
      <h3 class="hp-title">
        Bienvenido a House Paradise! Estás tomando los primeros pasos para darle
        las mejores vacaciones a tu perro a partir de $4000 por día.
      </h3>
      <div class="steps-master mt4 flex flex-row justify-between pl2-ns pr5-ns">
        <!-- Aca van los steps -->

      
      </div>
      <form class="form-container form-mobile">
        <div class="form-owner"></div>

        <div class="form-dog">
          <h2 class="white">Algunos datos sobre tu mascota:</h2>
        </div>

        <div class="form-calendar">
          <?php get_template_part('template-parts/reserve-hp/step-3'); ?>
        </div>

         <?php get_template_part('template-parts/reserve-hp/step-4'); ?>
      </form>


    </div>
    <div class="sticky w-100 bottom-0 flex jic bg-black hp-reserve-controller z-5">
        <div class="prev-button btn-prev-hp left-0 anchor w-40-ns">
          <p class="lh1 tc">&larr; Paso anterior</p>
        </div>

        <div class="next-button w-60-ns">
          <p class="btn-next-hp w-100 tc lh1">Siguiente &rarr;</p>
        </div>

    </div>

    <div class="absolute w-100 h-100 dn confirmation-await"></div>
   
  </div>

  <?php get_template_part('template-parts/reserve-hp/mail-success');?>

  <div class="w-40-ns summary-stay-container flex">
    <?php get_template_part('template-parts/reserve-hp/summary-hp'); ?>
  </div>
</div>

<div
  class="fixed reserve-bg z-4 w-100 h-100 bg-black top-0 left-0 dn pointers-none"
  style="opacity: 0.85"
></div>


