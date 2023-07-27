<?php get_header('hp'); ?>

<main id="main" data-barba="container" data-barba-namespace="portal" class="portal no-mt ugo-pink-bg">
<?php $isAuth = true;  ?>
    <div class="flex justify-between pv6 container flex-wrap">

        <div class="w-30-ns hp-br user-info-container sticky relative-m top-30 h-max" style="top: 100px">
        </div>

        <div class="flex flex-column w-60-ns w-100-m"> 
             <div class="reservas-container mb4">
                <h2 class="black mb4">Mis reservas</h2>

                <div class="flex justify-between items-stretch column-mobile">
                    <div class="flex flex-wrap new-reserve-list w-70-ns"></div>
                    <div class="new-reserve-trigger pa3 mb4 flex pointer w-20-ns">
                        <div class="m-auto flex flex-column items-center justify-center">
                            <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.448242" y="0.544189" width="54.1318" height="54.1305" rx="27.0653" fill="#4F4483"/>
                            <path d="M27.5156 21.5154V33.7035" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                            <path d="M33.6094 27.6095L21.4213 27.6095" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        <h3 class="tc mt2" style="color: #FFF;">Nueva reserva</h3>
                        </div>
                    </div>
                </div>
                


            </div>

            <div class="pets-container mb4">
                <div class="pets-header mb4 flex jic overflow-hidden">
                    <h2 class="black">Mis mascotas</h2>
                    <p id="new-pet" class="black underline pointer">Agregar otra</p>
                </div>

                <div class="previous-dogs-container pa4 mb4 relative dn">
                    <div class="absolute top-0 right-0 flex pointer close-pdc" style="transform: translate(-50%, -50%); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 100px;">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="14.8527" cy="15.187" r="14.6017" fill="white"/>
                            <path d="M18.3184 11.7209L11.386 18.6533" stroke="black"/>
                            <path d="M18.3184 18.6532L11.386 11.7208" stroke="black"/>
                        </svg>
                    </div>
                    <p class="pr5 hp-brown mb3 lh-copy">Ya mandaste a tu perro a House Paradise? Parece que lo encontramos en nuestra base de datos, confirmá para agregarlo a tus mascotas!</p>
                    <div class="previous-dog-inner pa3 hp-dark-brown-bg flex jic hp-br">
                        <div class="p-d-content">
                        
                        </div>

                        <div class="flex items-center pointer confirm-new-pd">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.219727" y="0.0880127" width="19.7036" height="19.7032" rx="9.85158" fill="#FFDBB0"/>
                                <path d="M13.7822 7.15442L8.21183 12.7248" stroke="#B46200" stroke-width="1.09198" stroke-linecap="round"/>
                                <path d="M8.21191 12.7248L6.36133 10.6144" stroke="#B46200" stroke-width="1.09198" stroke-linecap="round"/>
                            </svg>
                            <p class="hp-yellow fw6 ml2 lh1">Confirmar</p>
                        </div>
                    </div>
                </div>
                <div class="flex pets-container-inner flex-wrap column-mobile">
                </div>
            </div>


            <div class="old-reservations ">
                <h2 class="black mb4">Reservas pasadas</h2>
                <div class="old-reservations-inner flex flex-wrap"></div>
            </div>
        </div>
      
    </div>


    <h2 class="black mt4 pointer mobile pb4 tc" id="log-out">Cerrar sesión</h2>


    <div class="new-dog-pop fixed flex-column ph6-ns pv5-ns dn">
        <div class="new-dog-content m-auto pa5 w-100">
            <h2 class="mb5 white">Agregar nuevo perro</h2>
            <div id="close-dog" class="absolute top-0 right-0 close-new-dog">
                <?php get_template_part('template-parts/content/close'); ?>
            </div>
        </div>

        <div class="submit-new-dog ttu pointer"><h2>Agregar perro</h2></div>

    </div>


    <div class="new-reserve-pop fixed ph6-ns pv5-ns dn flex-column">
            <div id="close-reserve" class="absolute top-0 right-0 close-new-dog">
                <?php get_template_part('template-parts/content/close'); ?>
            </div>


        <div class="reserve-content m-auto pa5 w-100">
            <div class="reserve-header flex column-mobile items-center mb5">
                <h2 id="reserve-title-ph"class=" white f2 w-40-ns">Para quién es la reserva?</h2>
                <div class="breadcrumbs flex">
                    <p id="summary-dog-name"><?php echo $dogName; ?></p>
                    <div class="flex">
                        <p><span id="summary-start-date"></span> — <span id="summary-end-date"></span></p>
                    </div>
                    <p id="summary-nights"></p>
                    <p id="summary-price"></p>
                </div>
            </div>

            <div class="reserve-steps-container">
                <div class="step-1"></div>
                <div class="step-2 dn">
                    <?php get_template_part('template-parts/portal/step-2'); ?>
                    <?php get_template_part('template-parts/reserve-hp/discount'); ?>

                </div>

                <div class="step-3 dn">
                    <?php get_template_part('template-parts/reserve-hp/step-4'); ?>
                </div>
            </div>

            <div class="confirm-edit-reserve dn">
                <h2 class="white mb5">Confirmar edición de reserva</h2>

                <div class="edited-reserve hp-br bg-black ph4 pt4 flex flex-column justify-between relative pb6 w-60-ns center">
                    <div class="flex jic">
                     <p class="f3">Mascota:</p>
                        <div class="edit-summary-dog breadcrumbs">
                            <p>Fainá</p>
                        </div>
                    </div>

                    <div>
                        <div class="mb3">
                            <p class="f3 mb2">Fecha de entrada:</p>
                            <div class="flex jic">
                                <div class="edit-summary-start breadcrumbs">
                                    <p class="strike"></p>
                                </div>

                                <div class="change-separator"></div>

                                <div class="edit-summary-start-new breadcrumbs">
                                    <p></p>
                                </div>
                            </div>
                        </div>


                        <div>
                            <p class="f3 mb2">Fecha de salida:</p>
                            <div class="flex jic">
                                <div class="edit-summary-end breadcrumbs">
                                    <p class="strike"></p>
                                </div>

                                <div class="change-separator"></div>


                                <div class="edit-summary-end-new breadcrumbs">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="flex jic">
                     <p class="f2">Total:</p>
                     <div class="flex">
                        <div class="edit-summary-days breadcrumbs mr3">
                            <p></p>
                        </div>

                        <div class="edit-summary-price breadcrumbs">
                            <p></p>
                        </div>
                     </div>
                        
                    </div>
                    
                    <div class="confirm-edit-reserve w-100 ugo-pink-bg pa3 hp-br absolute bottom-0 left-0 hp-br">
                        <h2 class="black tc">Confirmar</h2>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/reserve-hp/mail-success'); ?>

        <div class="advance-step ttu pointer"><h2>Siguiente</h2></div>

    </div>

    <div class="w-100 h-100 dn fixed top-0 left-0 confirmation-await"></div>

   

<style>

    main.portal {
        background-image: url(/wp-content/uploads/2022/09/eK5ZM6@2x-e1663169089475.png);
        background-size: cover;
        background-opacity: 0.5
    }

    .hp-br {
        border-radius: 8px;
    }


    .pet-container {
        background-color: var(--hp-yellow);
        border-radius: 8px;
        min-width: 35vw;
        flex: 1 0 0 ;
        height: max-content;
    }

    .pet-container.no-image {
        background-color: var(--hp-blue)
    }

    .pet-container.no-image .pet-header {
       height: unset;
    }

    .previous-dogs-container {
        border-radius: 8px;
        width: 100%;
        background-color: var(--hp-yellow);
    }
    

    .pet-c {
        /* width: 35vw; */
    }

    .pet-header {
        height: 55vh;
        border-radius: 8px;
    }

    .pet-name * {
        color: #FFF;
        text-transform: capitalize;
    }

    .pet-header > div {
        border-radius: 8px;
    }

    .pets-container .bg-gradient {
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 30%, #000000 100%);;
        z-index: 2;
    }

    .pet-attributes p {
        padding: 5px 10px;
        background-color: #ffffff52;
        color: #FFF;
        border-radius: 100px;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .new-reserve-trigger {
        background-color: var(--hp-teal);
        border-radius:8px;
    }

    .new-dog-pop, .new-reserve-pop {
        background-color: rgba(0,0,0,0.75);
        width: 100vw;
        height: 100vh;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
    }

    .new-dog-content, .reserve-content {
        background-color: #000;
        border-radius: 8px;

        height: 85vh;
        overflow: scroll;
    }

    .new-dog-content h2 {
        margin-bottom: 20px;
    }

    .submit-new-dog h2, .advance-step h2 {
        width: 100%;
        background-color: var(--pink);
        padding: 20px 15px;
        text-align: center;
        color: #000
    }

    .aob-container {
    margin-bottom: 30px !important;
    }

    .reserve-img {
        width: 40px;
        height: 40px;
        border-radius: 100px;
        border: 1px solid #fff;

    }

    .reserve-dates * {
        color: #4F4483;
    }

    .reserve-content .transport-caption {
        margin-bottom: 30px;
    }

    .reserve-content .breadcrumbs p {
        padding: 10px 20px;
        border-radius: 100px;
        background-color: var(--pink);
        color: #C2537D;
        margin-left: 10px;
        text-wrap: nowrap;
    }

    .reserve-steps-container .step-3 .discount-container {
        display: none;
    }

    .reserve-steps-container .form-final h2 {
        margin-bottom: 20px;
    }

    .new-reserve-pop .message-success.active {
        background-color: #000;
        border-radius:8px;
        width:100%;
        height:100%;
        margin:auto;
        display:flex;
        justify-content:center;
    }

    .edited-reserve {
        background-color: var(--darkGrey)
    }

    .edited-reserve > div {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #fff;
    }

    .reserve-content .edited-reserve .breadcrumbs p {
        margin-left: 0;
    }

    .edit-summary-start.breadcrumbs p, .edit-summary-end.breadcrumbs p {
        background-color: #fffff578;
        color: #fff;
    }

    .confirm-edit-reserve {
        margin-bottom: 0px !important;
        border-bottom: 0px !important;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    .change-separator {
        flex: 1 1 0;
        border-top: 1px dashed #FFFFFF;
        margin: 0 20px;
    }


    #imageForm button {
        -webkit-apperance: none;
        text-align: center;
        background: none;
        outline: none;
        border: 0px;
        color: #fff;
        font-weight: 600;
    }

    .close-new-dog svg{
        width: 50px;
        height: 50px;
        margin: 30px
        /* border-radius: 100px; */
    }


@media(max-width: 1200px) {
    .ph6 {
        padding-left: 3rem !important;
        padding-right: 3rem !important;
    }
}


@media (max-width: 580px) {
    .reserve-content  {
        height: 100vh;
        height: 100sdvh;
        border-radius: 0px;
        padding: 40px 20px;
    }

    .reserve-header {
        align-items: flex-start;
    }

    #reserve-title-ph {
        /* text-align: center; */
        margin-bottom: 20px;
    }

    #summary-dog-name {margin-left: 0px;}

    .breadcrumbs {
        flex-wrap: wrap;
    }


    .reserve-content .breadcrumbs p {
        margin-bottom: 5px;
    }

    .terms-container {
        width: 100%;
    }

    .terms-container svg {
        display: none
    }

    .pet-container {
        min-width: unset;
        margin-bottom: 20px;
        height: unset;
        width: 100%;
        flex: unset;
    }

    .desktop {
        display: none
    }

    .mobile {
        display: block;
    }

    .new-dog-content, .reserve-content {
      
        border-radius: 0px;
        height: 100vh;
        height: 100svh;
        padding: 50px 20px;
        overflow: scroll;
    }

    .close-new-dog svg{
        width: 30px;
        height: 30px;
        margin: 10px
        /* border-radius: 100px; */
    }

    .user-info-container {
        width: 100%;
    }
}
</style>

</main><!-- #main & End Barba Container-->

<?php get_footer();?>