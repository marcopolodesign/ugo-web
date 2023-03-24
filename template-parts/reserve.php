<div class="fixed z-5 reserve-container flex column-mobile-reverse ugo-black-bg overflow-scroll o-0 pointers-none">
  <!--  column-mobile-reverse -->
  <div class="close-modal black">X</div>
  <div class="w-60-ns flex flex-column justify-between relative overflow-y-scroll reserve-input-container">
    <div class="pl4-ns pt5">
      <p class="breadcrumb">UGo! Home > House Paradise > Sobre tu perro</p>
      <h3 class="hp-title">
        Bienvenido a House Paradise! Estás tomando los primeros pasos para darle
        las mejores vacaciones a tu perro a partir de $2650 por día.
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

        <div class="form-final">
          <h2 class="w-90-ns">Último paso! Hace click aquí abajo para enviar tu solicitud para que un representante de UGo! House Paradise se contacte con vos a la brevedad. Muchas graciasssss!!<span class="dn">Podes pagar ahora el total, pagar un anticipo del 20% o elegir que te contactemos en menos de 24hrs para confirmar la reserva.</span></h2>
          <div class="discount-code dn items-center">
              <input class="input-text" placeholder="Tenes un código de descuento? Ingresalo aquí">
              <p id="discount-verify" class="tc fw5">Verificar cupón</p>
          </div>

          <div class="flex items-stretch final-options column-mobile wrap-desktop justify-between">
              <!-- <div class="pay-now-container dn mr4-ns">
                <h2 class="m-auto tc">Cliente recurrente? Pagar la totalidad de la estadía correspondiente a $<span id="final-number"></span> vía Mercado Pago.</h2>
              </div> -->

              <div class="pay-now-container upfront flex flex-column jic">
                <div class="icon-header flex">
                    <div class="m-auto">
                      <?php get_template_part('template-parts/content/upfront-reserve'); ?>
                    </div>
                </div>

                <p class="m-auto tc">Confirmar la estadía pagando anticipadamente un 20% correspondiente a $<span class="fw6 underline" id="final-number-upfront"></span>  vía Mercado Pago</p>

                <div class="upfront-cta flex items-center justify-center pa3">
                    <?php get_template_part('template-parts/content/mp-reserve'); ?>
                    <p class="ml3 lh1">Pagar anticipo vía Mercado Pago</p>
                  </div>

              </div>


              <div class="mail-now-container hover-main flex flex-column w-100">
                  <div class="icon-header flex">
                    <div class="m-auto">
                      <?php get_template_part('template-parts/content/mail-reserve'); ?>
                    </div>
                  </div>
                  <p class="tc">Te enviaremos un desglose con tu pedido por mail, y un asesor de UGo! te contactará para que le hagas todas las preguntas que necesites!</p>

                  <div class="mail-cta flex items-center justify-center pa3">
                    <?php get_template_part('template-parts/content/whapp'); ?>
                    <p class="ml3 lh1">Enviar cotización y contactarme</p>
                  </div>
              </div>

              <div class="btn-prev-hp mt4 pa2 tc anchor hover-main" style="width: 100% !important;">
                <p>&larr; Volver a seleccionar fechas</p>
              </div>
          </div>
        </div>
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


