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

    <div class="flex justify-between min-h-100-vh pt7 container flex-wrap">
       <div class="pets-container">
            <div class="pets-header mb4 flex jic overflow-hidden">
                <h2 class="black">Mis mascotas</h2>
                <p id="new-pet">Agregar otra</p>
            </div>

            <div class="flex pets-container-inner flex-wrap">
                
            </div>
       </div>


       <div class="reservas-container w-50-ns">
          <h2 class="black mb4">Mis reservas</h2>

            <div class="new-reserve pa3 flex">
                <div class="m-auto flex items-center justify-center">
                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.448242" y="0.544189" width="54.1318" height="54.1305" rx="27.0653" fill="#FFC57F"/>
                    <path d="M27.5156 21.5154V33.7035" stroke="#B46200" stroke-width="3" stroke-linecap="round"/>
                    <path d="M33.6094 27.6095L21.4213 27.6095" stroke="#B46200" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                   <h3 class="ml2" style="color: #B46200;">Nueva reserva</h3>
                </div>
            </div>

            <h2 class="black mt4 pointer" id="log-out">Cerrar sesión</h2>

       </div>

   
    </div>


    <div class="new-dog-pop fixed flex-column ph6 pv5 dn">
        <div class="new-dog-content m-auto pa5 w-100">
            <h2 class="mb5 white">Agregar nuevo perro</h2>
        </div>

        <div class="submit-new-dog ttu"><h2>Agregar perro</h2></div>

    </div>


<style>
    .pet-container {
        background-color: var(--hp-yellow);
        border-radius: 8px;
        width: 35vw
    }

    .pet-c {
        /* width: 35vw; */
    }

    .pet-header {
        height: 20vh;
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
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, #000000 100%);
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
        background-color: var(--hp-yellow);
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

</style>

</main><!-- #main & End Barba Container-->

<?php get_footer();?>