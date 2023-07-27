<div class="discount-container">
    <div class="discount-code flex items-center">
        <input class="input-text" placeholder="Tenes un código de descuento? Ingresalo aquí">
        <p id="discount-verify" class="tc fw5 pointer" style="white-space: nowrap">Verificar cupón</p>
    </div>

    <div class="discount-success dn jic column-mobile pa3">
        <p class="lh-1 w-70-ns"></p>
        <div class="discount-cupon-success pv2 ph4 relative">
            <p id="discount-legend" class="tc pink">BFF</p>
            <?php get_template_part('template-parts/content/close'); ?>
        </div>
    </div>
</div>


<style>

    .discount-success {
        background-color: var(--darkGrey);
        border-radius: 8px;
    }

    .discount-success > p  {
        color: #93DC9C;
    }

    .discount-cupon-success {
        border-radius: 100px;
        border: 2px solid var(--pink)
    }

    .discount-cupon-success svg {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        transform: translate(-50%, -50%);
    }
</style>