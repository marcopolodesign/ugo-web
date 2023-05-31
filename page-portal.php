<?php get_header(); ?>

<main id="main" data-barba="container" data-barba-namespace="portal" class="portal no-mt ugo-pink-bg">

<script>
    const user = JSON.parse(localStorage.getItem('user'));
    console.log(user);
    // if (user) {
    //     <?php $isAuth = true; ?>
    // } else {
    //     window.location.href = '/sign-in';
    // }
</script>

    <div class="flex justify-between min-h-100-vh pt6 container flex-wrap">
       <div class="pets-container w-50-ns">
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
            <div class="flex pets-container-inner flex-wrap">
            </div>
       </div>


       <div class="reservas-container w-40-ns">
          <h2 class="black mb4">Mis reservas</h2>

            <div class="flex flex-wrap mb4 new-reserve-list">

            </div>

            <div class="new-reserve pa3 flex">
                <div class="m-auto flex items-center justify-center">
                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.448242" y="0.544189" width="54.1318" height="54.1305" rx="27.0653" fill="#4F4483"/>
                    <path d="M27.5156 21.5154V33.7035" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                    <path d="M33.6094 27.6095L21.4213 27.6095" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                   <h3 class="ml2" style="color: #FFF;">Nueva reserva</h3>
                </div>
            </div>

            <!-- <h2 class="black mt4 pointer" id="log-out">Cerrar sesión</h2> -->

       </div>

   
    </div>


    <div class="new-dog-pop fixed flex-column ph6 pv5 dn">
        <div class="new-dog-content m-auto pa5 w-100">
            <h2 class="mb5 white">Agregar nuevo perro</h2>
        </div>

        <div class="submit-new-dog ttu pointer"><h2>Agregar perro</h2></div>

    </div>


<style>

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

    .previous-dogs-container {
        border-radius: 8px;
        width: 100%;
        background-color: var(--hp-yellow);
    }
    

    .pet-c {
        /* width: 35vw; */
    }

    .pet-header {
        height: 27.5vh;
        border-radius: 8px;
    }

    .pet-name * {
        color: #FFDBB0;
        text-transform: capitalize;
    }

    .pet-header > div {
        border-radius: 8px;
    }

    .pet-header .bg-gradient {
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 60%, #000000 100%);
        z-index: 2;
    }

    .pet-attributes p {
        padding: 5px 10px;
        background-color: #FFC57F;
        color: #B46200;
        border-radius: 100px;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .new-reserve {
        background-color: var(--hp-teal);
        border-radius:8px;
    }

    .new-dog-pop {
        background-color: rgba(0,0,0,0.75);
        width: 100vw;
        height: 100vh;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
    }

    .new-dog-content {
        background-color: #000;
        border-radius: 8px;

        height: 85vh;
        overflow: scroll;
    }

    .new-dog-content h2 {
        margin-bottom: 20px;
    }

    .submit-new-dog h2 {
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

</style>

</main><!-- #main & End Barba Container-->

<?php get_footer();?>