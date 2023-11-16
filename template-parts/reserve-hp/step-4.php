<div class="form-final">
    <div class="w-90-ns flex items-center gap-2">
        <!-- <h2 class="go-back mr2 btn-prev-hp">&larr;</h2> -->
        <h2 style="margin-bottom: 0px;">Confirmá tu reserva</h2>
    </div>

    <?php get_template_part('template-parts/reserve-hp/discount'); ?>

    <div class="checkout-options-container">
        <p class="mb3 white fw6 f3">Seleccioná una opción para finalizar</p>

        <div class="checkout-options-inner overflow-hidden">
            <div class="checkout-option flex jic pa3 is-ready smooth-t anchor" data-option="Reserva">
                <p>Quiero que me contacten y pagar más adelante</p>
                <div class="checker"></div>
            </div>
            <div class="checkout-option flex jic pa3 is-ready smooth-t anchor" data-option="Pagar">
                <p>Pagar un anticipo del 20% y confirmar la reserva</p>
                <div class="checker"></div>
            </div>
        </div>

        <div class="dn mt3 pa3 options-explication">
            <p>Estás pagando el 20% para confirmar la reserva. Antes de retirar a tu mascota, tendrás que abonar el restante 80% correspondiente a $18.200</p>
        </div>
    </div>

    <div class="flex jic terms-container pa3 w-max">
        <?php get_template_part('template-parts/reserve-hp/terms'); ?>
        <div class="flex jic ml4"> 
                <p class="mr3 lh1 w-80-ns">Confirmo que estos datos actúan como declaración jurada y que estoy de acuerdo con los <span><a href="/terminos-y-condiciones" target="_blank" class="ugo-pink barba-prevent" onclick="openNewTab('/terminos-y-condiciones')">términos y condiciones.</a></span></p>
                <input class="mr3 terms" type="checkbox">
        </div>
    </div>

    <div class="flex items-stretch final-options column-mobile wrap-desktop justify-between">
        <div class="pay-now-container dn mr4-ns">
        <h2 class="m-auto tc">Cliente recurrente? Pagar la totalidad de la estadía correspondiente a $<span id="final-number"></span> vía Mercado Pago.</h2>
        </div>

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
            <div class="icon-header dn">
            <div class="m-auto">
                <?php get_template_part('template-parts/content/mail-reserve'); ?>
            </div>
            </div>
            <p class="tc dn">Te enviaremos un desglose con tu pedido por mail, y un asesor de UGo! te contactará para que le hagas todas las preguntas que necesites!</p>

            <div class="mail-cta flex items-center justify-center pa3 pointers-none">
            <p class="black lh1 b bold fw6 faro f3 pa2 tc">Confirmar reserva</p>
            </div>
        </div>

        <!-- <div class="mt4 tc anchor hover-main" style="width: 100% !important;"> -->
        <p class="btn-prev-hp  hover-main anchor center mt3">&larr; Necesitas cambiar las fechas? Volvé a seleccionalas</p>
        <!-- </div> -->
    </div>
</div>

<script>

function openNewTab(url) {
    window.open(url, '_blank');
  }
</script>