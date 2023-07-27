<div class="form-final">
    <h2 class="w-90-ns">Último paso! Hace click aquí abajo para enviar tu solicitud para que un representante de UGo! House Paradise se contacte con vos a la brevedad. Muchas graciasssss!!<span class="dn">Podes pagar ahora el total, pagar un anticipo del 20% o elegir que te contactemos en menos de 24hrs para confirmar la reserva.</span></h2>

    <?php get_template_part('template-parts/reserve-hp/discount'); ?>

    <div class="flex jic terms-container pa3 w-max">
    <?php get_template_part('template-parts/reserve-hp/terms'); ?>
    <div class="flex jic ml4"> 
            <p class="mr3 lh1 w-80-ns">Confirmo que estos datos actúan como declaración jurada y que estoy de acuerdo con los <span><a href="/terminos-y-condiciones" target="_blank" class="ugo-pink barba-prevent" onclick="openNewTab('/terminos-y-condiciones')">términos y condiciones.</a></span></p>
            <input class="mr3 terms" type="checkbox">
    </div>
    
    </div>

    <div class="flex items-stretch final-options column-mobile wrap-desktop justify-between">
        <!-- <div class="pay-now-container dn mr4-ns">
        <h2 class="m-auto tc">Cliente recurrente? Pagar la totalidad de la estadía correspondiente a $<span id="final-number"></span> vía Mercado Pago.</h2>
        </div> -->

        <div class="pay-now-container upfront dn flex-column jic">
        <div class="icon-header flex">
            <div class="m-auto">
                <?php get_template_part('template-parts/content/upfront-reserve'); ?>
            </div>
        </div>

        <p class="m-auto tc">Confirmar la estadía pagando anticipadamente un 20% correspondiente a <span class="fw6 underline" id="final-number-upfront"></span>  vía Mercado Pago</p>

        <div class="upfront-cta flex items-center justify-center pa3">
            <?php get_template_part('template-parts/content/mp-reserve'); ?>
            <p class="ml3 lh1">Pagar anticipo vía Mercado Pago</p>
            </div>

        </div>


        <div class="mail-now-container flex flex-column w-100" style="width: 100%">
            <div class="icon-header flex">
            <div class="m-auto">
                <?php get_template_part('template-parts/content/mail-reserve'); ?>
            </div>
            </div>
            <p class="tc">Te enviaremos un desglose con tu pedido por mail, y un asesor de UGo! te contactará para que le hagas todas las preguntas que necesites!</p>

            <div class="mail-cta flex items-center justify-center pa3">
            <!-- <?php get_template_part('template-parts/content/whapp'); ?> -->
            <p class="black lh1 b bold fw6">Confirmar reserva</p>
            </div>
        </div>

        <div class="btn-prev-hp mt4 pa2 tc anchor hover-main" style="width: 100% !important;">
        <p>&larr; Volver a seleccionar fechas</p>
        </div>
    </div>
</div>

<script>

function openNewTab(url) {
    window.open(url, '_blank');
  }
</script>