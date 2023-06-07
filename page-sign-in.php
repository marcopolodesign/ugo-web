<?php get_header('hp'); ?>

<main id="main" data-barba="container" data-barba-namespace="sign-in" class="sign-in no-mt ugo-pink-bg">

    <div class="flex justify-center min-h-100-vh">
        <div class="w-40-ns form-container flex">
            <div class="m-auto pa5 hp-light-color-bg w-70">
                <h2 class="black mb4 tc">Iniciar sesión</h2>
                <form action="/login" method="POST" class="">
                    <input type="email" id="email" placeholder="Mail" name="email" required><br>
                    <input type="password" placeholder="Contraseña"  id="password" name="password" required><br>
                    <button class="w-100 pa3 white fw5" type="submit">Iniciar sesión</button>
                </form>
                <p class="mt4 black tc">¿Primera vez? <a class="black"href="/signup">Crear cuenta</a></p>

            </div>
       
        </div>
        <div class="w-60-ns relative">
            <div class="absolute-cover bg-center" style="background-image: url(<?php the_post_thumbnail_url('full');?>);"></div>
        </div>
    </div>

</main><!-- #main & End Barba Container-->

<?php get_footer();?>



<style>
    form input {
        -webkit-apperance: none;
        background-color: #FFAF4F;
        border-radius: 2px;
        margin-bottom: 15px;
        padding: 1rem;
        outline: none;
        border: 0px;
        width: 100%;
        text-align: center;
    }

    form input, form input::placeholder  {
        color: #B46200 !important;
    }

    form button {
        outline: 0;
        border: 0;
        border-radius: 100px;
        background-color: var(--hp-teal);
    }
</style>