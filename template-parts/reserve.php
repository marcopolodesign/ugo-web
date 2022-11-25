<div class="fixed z-5 reserve-container flex column-mobile-reverse ugo-black-bg overflow-scroll o-0 pointers-none">
  <!--  column-mobile-reverse -->
  <div class="close-modal black">X</div>
  <div class="w-60-ns pt5 pl4  relative overflow-y-scroll reserve-input-container">
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

        <div class="flex items-stretch final-options column-mobile">
            <div class="pay-now-container dn mr4-ns">
              <h2 class="m-auto tc">Cliente recurrente? Pagar la totalidad de la estadía correspondiente a $<span id="final-number"></span> vía Mercado Pago.</h2>
            </div>

            <div class="pay-now-container upfront mr4-ns dn">
              <h2 class="m-auto tc">Confirmar la estadía pagando anticipadamente un 20% correspondiente a $<span id="final-number-upfront"></span>  vía Mercado Pago</h2>
            </div>


            <div class="mail-now-container flex flex-column w-100 anchor" style="width: 100%;">
                <p class="tc">Te enviaremos un desgloce con tu pedido por mail, y un asesor de UGo! te contactará para que le hagas todas las preguntas que necesites!</p>

                <div class="mail-cta flex items-center justify-center pa3">
                   <?php get_template_part('template-parts/content/whapp'); ?>
                  <p class="ml3 lh1">Enviar cotización y contactarme</p>
                </div>
            </div>
        </div>
      </div>
    </form>


    <div class="fixed next-button">
      <button class="btn-next-hp">Siguiente ></button>
    </div>

    <div class="fixed prev-button left-0 anchor">
      <p class="btn-prev-hp lh1">< Paso anterior</p>
    </div>
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


