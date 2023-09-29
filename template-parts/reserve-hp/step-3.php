<div class="transport-caption flex items-center pa3">
    <?php get_template_part('template-parts/content/transport');?> 
    <p class="ugo-pink ml3 w-max">Los viajes de ida y vuelta se realizan todos los <span class="underline fw6">Lunes, Miércoles y Viernes</span> hábiles de la semana.</p>
</div>

<div class="flex w-90" id="range">
    <div>
        <p>Fecha de entrada</p>
        <input type="text" name="start" value="" class="input-text start-date w-40" placeholder="Elegí fecha de entrada">
    </div>

    <div>
        <p>Fecha de Salida</p>
        <input type="text" name="end" value="" class="input-text end-date w-40" placeholder="Elegí fecha de salida">
    </div>
</div>

<div class="flex mt4 items-stretch justify-between column-mobile">
    <div class="daily-rate-container w-30-ns">
        <p class="tag-title w-max">Precio por día</p>
        <div class="daily-rate-inner flex flex-column">
            <h2 class="daily-price tc hp-yellow">$<span>....</span></h2>
            <div class="regular-price tc dn">
                <h3 class="grey strike f5 m-auto mb0">$4000</h3>
                <p class="f6">Precio Regular</p>
            </div>
        </div>
    </div>

    <div class="stay-summary-container w-60-ns flex flex-column">
        <div class="flex jic">
            <p class="white underline title-nights"></p>
            <p class="white  price-nights"></p>
        </div>

        <div class="flex jic">
            <p class="white underline title-transport">Tarifa de traslado</p>
            <p class="white price-transport">$350</p>
        </div>

        <div class="ugo-pink-bg totals flex jic pv3 mt-auto mb0 black">
            <p class="fw6">Total</p>
            <p class="fw6" id="grand-total">$<span>....</span></p>
        </div>

    </div>
</div>




