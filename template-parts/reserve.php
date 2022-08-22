<div
  class="fixed z-5 ma5 top-0 left-0 reserve-container flex column-mobile-reverse ugo-black-bg overflow-scroll"
>
  <!--  column-mobile-reverse -->
  <div class="close-modal">X</div>
  <div class="w-60-ns mt5 pl4 vh-75-ns relative">
    <p class="breadcrumb">UGo! Home > House Paradise > Sobre tu perro</p>
    <h3 class="hp-title">
      Bienvenido a House Paradise! Estás tomando los primeros pasos para darle
      las mejores vacaciones a tu perro a partir de $175 por día.
    </h3>
    <div class="steps-master mt4 flex flex-row justify-between pl2 pr5">
      <div>
        <div class="step-container">
          <div class="icon-step"></div>
          <div class="step-hr"></div>
        </div>
        <div>
          <p class="text-gray">Paso 1</p>
          <p class="text-gray b">Sobre el dueño</p>
        </div>
      </div>

      <div>
        <div class="step-container">
          <div class="icon-step"></div>
          <div class="step-hr"></div>
        </div>
        <div>
          <p class="text-gray">Paso 2</p>
          <p class="text-gray b">Sobre el perro</p>
        </div>
      </div>
      <div>
        <div class="step-container">
          <div class="icon-step"></div>
          <div class="step-hr"></div>
        </div>
        <div>
          <p class="text-gray">Paso 3</p>
          <p class="text-gray b">Seleccion de fechas</p>
        </div>
      </div>
      <div>
        <div class="step-container">
          <div class="icon-step"></div>
        </div>
        <div>
          <p class="text-gray">Paso 4</p>
          <p class="text-gray b">Confirmacion</p>
        </div>
      </div>
    </div>
    <form class="form-owner form-mobile">
      <input type="text" placeholder="Nombre" class="input-text" />
      <input type="text" placeholder="Apellido" class="input-text" />
      <input type="text" placeholder="DNI" class="input-text" />
      <input type="text" placeholder="Correo electronico" class="input-text" />
      <input type="text" placeholder="Telefono" class="input-text" />
    </form>

    <div class="absolute bottom-1 right-2">
      <button class="btn-next-hp">Siguiente paso: Elegí tu turno ></button>
    </div>
  </div>

  <div class="w-40-ns summary-stay-container">
    <div class="w-90-ns summary-stay relative overflow-hidden pt4 vh-75-ns">
      <h4 class="f3">Resumen de Estadia</h4>
      <div class="mt4">
        <div class="flex flex-row items-center justify-between">
          <p class="b">Mateo Aldao Suaya</p>
          <p>+54 91169742032</p>
        </div>
        <p class="text-gray">mateoaldao@gmail.com</p>
      </div>
      <div class="hr"></div>
      <div class="mt4">
        <div class="flex flex-row items-center justify-between">
          <div>
            <p class="text-gray">Nombre</p>
            <p class="b">Fainá</p>
          </div>
          <div>
            <p class="text-gray">Raza</p>
            <p class="b">Golden</p>
          </div>
          <div>
            <p class="text-gray">Edad</p>
            <p class="b">2 ańos</p>
          </div>
        </div>
      </div>
      <div class="hr"></div>
      <div class="absolute bottom--2 left--1 flex flex-row">
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
        <div class="circle-summary"></div>
      </div>
    </div>
  </div>
</div>

<div
  class="fixed reserve-bg z-4 w-100 h-100 bg-black top-0 left-0"
  style="opacity: 0.85"
></div>

<style>
  .reserve-container {
    border-radius: 20px;
    border: 2px solid var(--pink);
    width: 90vw;
    height: 90vh;
  }

  .btn-next-hp {
    color: #fff;
    appearance: none;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    padding: 22px;
    background: linear-gradient(180deg, #f4b5cd 27.35%, #ff619d 84.4%);
    font-weight: 700;
  }
  .close-modal {
    position: absolute;
    top: 20px;
    right: 20px;
    height: 40px;
    width: 40px;

    border-radius: 40px;
    background-color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }


.breadcrumb{
  font-size:16px;
  color:#fff;
  font-weight:700;
  opacity:0.6
}
.input-text{
  background-color: var(--darkGrey);
  outline: none;
  border-radius: 8px;
  height: 55px;
  border: none;
  margin-bottom: 18px;
  width: 25%;
  margin-right: 20px;
  padding-left: 12px;
  color:#fff;
  font-weight: 600;
}
.form-owner{
  margin-top: 35px;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.hp-title{
  color:#fff;
  font-weight:700;
  max-width:50%;
  margin-top:20px;
}
.summary-stay{
  background-color: #fff;
  border-radius: 8px;
  padding-left: 30px;
  padding-right: 30px;
margin: 64px auto;
}
.hr{
  height: 2px;
  width: 100%;
  background-color: #ccc;
  margin:30px 0
}
.step-hr{
  height: 3px;
 
  /* width: 11%; */
width: 90%;
  margin-top: 10px;
  background-color:var(--darkGrey);

}

.icon-step{
  width: 35px;
  height: 35px;
  background-color:var(--darkGrey);
border-radius: 30px;
margin-bottom: 10px;
padding-right: 20px;
}
.step-container{
  display: flex;
  flex-direction: row;

}
.summary-stay-container{
  background-color: var(--darkGrey);
}
.text-gray{
  color: var(--grey);
}
.circle-summary{
  background-color: var(--darkGrey);
  height: 50px;
  width: 50px;
  border-radius: 45px;
  margin-right: -2px;
}




</style>
