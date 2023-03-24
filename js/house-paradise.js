document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "beforeend",
    "<link rel=\"stylesheet\" href=\"wp-content/themes/ugo-web/css/datepicker.min.css\" />"    
);

document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "beforeend",
    "<link rel=\"stylesheet\" href=\"wp-content/themes/ugo-web/css/hp.css\" />"    
);




let url = 'https://u-go-backend-deveop-lc9t2.ondigitalocean.app/';
let infoEndPoint = 'input-main';

let dogEndPoint = 'inputs-web-dog';
let ownerEndPoint = 'inputs-web-owner';


let reserveInfo = {};


let closeModal = document.querySelector('.close-modal')

let stepsHeader = document.querySelector('.steps-master');
let formOwner = document.querySelector('.form-owner')
let ownerSummary = document.querySelectorAll('.summary-owner span');
let dogSummary = document.querySelectorAll('.summary-dog span');

let prevButton = document.querySelectorAll('.btn-prev-hp');
let button = document.querySelector('.btn-next-hp');

let confirmationPop = document.querySelector('.confirmation-await');


let ownerInputs;
let dogsInputs;
let calendarInputs;

let allDays;



let formStep = 0;
let formContent = document.querySelectorAll('.form-container > div');

var requestOptions = {
    method: 'GET',
    redirect: 'follow'
  };


const loadSteps = () => {
    formContent.forEach((div, index) => {
        if (index === formStep) {
            div.classList.add('active')
            div.classList.remove('hidden')

        } else {
            div.classList.add('hidden');
            div.classList.remove('active')
        }

        if (formStep === 0 ) {
            prevButton[1].classList.add('dn');
            button.parentElement.style.width = "100%";
        } else {
            prevButton[1].classList.remove('dn');
            button.parentElement.style.width = "";
        }
    })

    Array.from(stepsHeader.children).forEach((step, index) => {
        if (index <= formStep) {
            step.classList.add('active');
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
                if (index === formStep) {
                    step.style.display = "block";
                } else {
                    step.style.display = "";
                }
             
            }
        } else {
            step.classList.remove('active');
        }
    })

}


const loadPopUp = () => {

  fetch(`https://u-go-backend-deveop-lc9t2.ondigitalocean.app/${infoEndPoint}`, requestOptions)
  .then(response => response.json())
  .then((data)=> {
    let steps = data.steps;
    steps.map(s => {
        stepsHeader.innerHTML = stepsHeader.innerHTML + `
        <div>
            <div class="step-container justify-center items-center mb3">
                <div class="icon-step"></div>
                <div class="step-hr"></div>
            </div>

            <div>
              <p class="text-gray lh1 mb1 f6 ttu" style="font-size: 10px">${s.step}</p>
             <p class="text-gray lh1">${s.title}</p>
          </div>
       </div>
    `

    Array.from(stepsHeader.children)[0].classList.add('active')
    Array.from(stepsHeader.children)[0].style.display = "block";


    })
  })
  .catch(error => console.log('error', error));

  // Populate first Owner Inputs
  fetch(`https://u-go-backend-deveop-lc9t2.ondigitalocean.app/${ownerEndPoint}`, requestOptions)
  .then(response => response.json())
  .then((response)=> {
    let inputs = response.inputsOwner;
    inputs.map((i, index) => {
        let input = document.createElement('INPUT');
        input.setAttribute('type', i.type);
        input.setAttribute('placeholder', i.placeholder);
        input.classList.add('input-text');
        input.setAttribute("required", "")

    formOwner.appendChild(input);

        completeSummary(input, ownerSummary[index])
    })  

    }) 
    .catch(error => console.log('error', error));

    loadSteps();
    ownerInputs = true;
}

loadPopUp();

const nextScreen = () => {

    let hasFilled = false;

    let lead = true;

    button.addEventListener('click', () => {

        let inputs = Array.prototype.slice.call(document.forms[0]);

        if (formStep === 0) {
            inputs.forEach((input,index) => {
                if (index <= 4) {
                   let value = input.value;
                   if (!value) {
                    input.classList.add('incomplete')
                    hasFilled = false;
                   } else {
                    hasFilled = true;

                    let attr = input.getAttribute('placeholder');
                     let values = 
                     {[attr] : input.value}
                    reserveInfo.owner = {... reserveInfo.owner, ...values}
                    input.classList.remove('incomplete')
                
                   }

                //    Hay que hacer en base al classList y si alguno tiene ponerle incomplete se pasa a hasFilled = false;
                }
            })

        } else if (formStep === 1) {
           
            inputs.forEach((input,index) => {
                if (index > 4 && index <= 9) {
                    let value = input.value;
                   if (!value) {
                    input.classList.add('incomplete')
                    hasFilled = false;
                   } else {
                    hasFilled = true;
                    input.classList.remove('incomplete')

                    let attr = input.getAttribute('placeholder');
                     let values = {[attr] : input.value}
                    reserveInfo.dog = {... reserveInfo.dog, ...values}
                   }
                } else if (index > 10 && index <= 12) {
                 
                    let values = {[`checkbox${index}`] : input.checked}
                    reserveInfo.dog = {...reserveInfo.dog, ...values}
          
                    console.log(values)
                    // Social responses
                    let socialRes = document.querySelector('.selected-social p');

                    if (socialRes) {
                        socialRes = socialRes.innerHTML;
                        reserveInfo.dog.social = socialRes;
                    }
                
                    // Behaviour responses
                    let behaviourRes = document.querySelector('h4.behaviour-type.selected');
                    if (behaviourRes) {
                        behaviourRes = behaviourRes.innerHTML;
                        reserveInfo.dog.behaviour = behaviourRes;
                    }
                
  
               
                } 
            }) 


        } else if (formStep === 2) {
            // Calendario 

            let calendarDates = document.querySelectorAll('#range input');
            
            calendarDates.forEach((date, index) => {
                let values = {[`date${index}`] : date.value}
                reserveInfo.aob = {...reserveInfo.aob, ...values}
                reserveInfo.aob.price = finalPricing;
            })
         

            console.log(reserveInfo);

            document.querySelector('.reserve-input-container').classList.add("ending")
            document.querySelector('.summary-stay-container').classList.add("ending")

        } 

        if (hasFilled) {
            console.log(formStep)
            console.log(formContent.length - 1)
           if (formStep <= formContent.length - 1 ) {
            formStep++
           }
           console.log(formStep)


            // if (formStep >= formContent.length) {
            //     formStep --;
            // }
            loadScreens();
            console.log(reserveInfo);

      

        } else {
            alert('Por favor, completar todos los campos!')
        }       
    })

    prevButton.forEach((prev, index) => {
        prev.addEventListener('click', () => {

            if (index === 0) {
                document.querySelector('.reserve-input-container').classList.remove("ending")
                document.querySelector('.summary-stay-container').classList.remove("ending")
            }
            if (formStep > 0) {
                formStep--;
                if (formStep >= formContent.length -1) {
                    formStep ++;
                }
        
                loadScreens();
            }

            console.log(formStep)


    })
       
    });


    const loadScreens = () => {
        loadSteps();

        if (!dogsInputs) {
         dogDetails();
        }
 
 
        if (formStep > 0) {
         document.querySelector('.hp-title').classList.add('dn')
        } else {
         document.querySelector('.hp-title').classList.remove('dn')
        }  
    }

}


nextScreen();

const dogDetails = () => {

    let data;
    let socialContainer;
  fetch(`https://u-go-backend-deveop-lc9t2.ondigitalocean.app/${dogEndPoint}`, requestOptions)
  .then(response => response.json())
  .then((response)=> {
     data = response;
    //  console.log(data)
    let inputs = response.inputDogs;
    inputs.map((i, index) => {
        let input;
        // console.log(i)
        if (i.type === "select" && i.placeholder != 'raza') {
            
            input = document.createElement('SELECT');

            let placeholder = document.createElement('OPTION')
            placeholder.setAttribute('selected', '');
            placeholder.setAttribute('disabled', '')
            if (i.placeholder === 'castrado') {
                placeholder.innerHTML = `Está ${i.placeholder}?`;
                input.classList.add('input-castrado')
            } else {
                placeholder.innerHTML = i.placeholder;
            }

            input.classList.add('input-text');
            input.appendChild(placeholder);

            i.selectOptions.forEach((o, n) => {
                let option = document.createElement('OPTION')
                option.setAttribute('value', o.value);
                option.innerHTML = o.nombre;

                input.appendChild(option);
            })
            

        } else if (i.type === "date") {

            // Create a div insteado of an input 
            input = document.createElement('div');
            let dateInput = document.createElement('input');
            let celoCaption = document.createElement('p');

            celoCaption.innerHTML = i.placeholder;

            dateInput.setAttribute('type', i.type);
            dateInput.classList.add('input-text')

            input.classList.add('o-0', 'pointers-none', 'celo-date')

            input.appendChild(celoCaption);
            input.appendChild(dateInput);
        }
         else {
            input = document.createElement('INPUT');
            input.classList.add('input-text');
        }

        input.setAttribute('type', i.type);


        input.setAttribute('placeholder', i.placeholder);
        input.setAttribute("required", "")

            
    formContent[1].appendChild(input);
        if (index <= 2) {
            completeSummary(input, dogSummary[index])
        }
    })  
    }).then(() => {
        let healthContainer = document.createElement('div')
        let title = document.createElement("h2");
        title.classList.add('white');
        
        title.innerHTML = 'Y también sobre su salud:';

        healthContainer.appendChild(title)

        let dogHealth = data.healthDogs;
            dogHealth.forEach(h => {
                let inputContainer = document.createElement('div');
                inputContainer.classList.add('flex');
                inputContainer.classList.add('dog-checkbox')
    
                let inputText = document.createElement('p');
                inputText.innerHTML = h.question;
                inputText.classList.add('mr3');
    
                inputContainer.appendChild(inputText)
    
                let healthInput = document.createElement('input');
                healthInput.setAttribute('type', 'checkbox');
                healthInput.classList.add('input-checkbox');
                healthInput.required = true;
    
                inputContainer.appendChild(healthInput);
    
                healthContainer.appendChild(inputContainer);
            })
            
        formContent[1].appendChild(healthContainer)    
    }).then(() => {

        let social = data.social

        socialContainer = document.createElement('div');
        socialContainer.classList.add('social-container');

        let title = document.createElement("h3");
        title.innerHTML = `Por último, algunas preguntas sobre su sociabilización`;

        formContent[1].appendChild(title);

        let socialLevelContainer = document.createElement('div')
        socialLevelContainer.classList.add('social-level')

        let sectionTitle = document.createElement('p');
        sectionTitle.innerHTML = "¿Qué tan sociable es?";

        socialLevelContainer.appendChild(sectionTitle);

        let socialLevelInner = document.createElement('div');
        socialLevelContainer.appendChild(socialLevelInner);

        let socialResponses = [];

        social.forEach((level, i) => {
            let socialLevel = document.createElement('div')
            let grade = document.createElement('h4')
            socialLevel.appendChild(grade);
            grade.innerHTML = level.title;
            let caption = document.createElement("p");
            caption.innerHTML = level.desc;
            socialLevel.appendChild(caption);

            socialResponses.push(socialLevel);

            function toggleOpen() {
                this.classList.add('selected-social');
                socialResponses.forEach(res => {
                    if (res !== this) res.classList.remove('selected-social');
                });
            }

            socialResponses.forEach(res => {
                res.addEventListener('click', (toggleOpen))
            })


            socialLevelInner.appendChild(socialLevel);
        })
        socialLevelContainer.appendChild(socialLevelInner);
        socialContainer.appendChild(socialLevelContainer)
        formContent[1].appendChild(socialContainer);


    }).then(() => {
        let behaviour = data.social_comportamiento

        let behaviourContainer = document.createElement('div');
        behaviourContainer.classList.add('behaviour-container')
        let behaviourTitle = document.createElement('p')

        behaviourTitle.innerHTML = behaviour[0].questions;

        behaviourContainer.appendChild(behaviourTitle);

        let responsesContainer = document.createElement('div');

       let responses = [];
       behaviour[0].options.map((response, index) => {
            let r = document.createElement("h4");
     
            r.classList.add('behaviour-type');
            r.innerHTML = response.value

            responsesContainer.appendChild(r);

            responses.push(r);
        
            function toggleOpen() {
                this.classList.add('selected');
                responses.forEach(res => {
                    if (res !== this) res.classList.remove('selected');
                });
            }

            responses.forEach(res => {
                res.addEventListener('click', (toggleOpen))
            })
           
       });

      behaviourContainer.appendChild(responsesContainer)
      socialContainer.appendChild(behaviourContainer);


      changeSelects();

      dogInputConditionals()
    })

    .catch(error => console.log('error', error));

    dogsInputs = true;
}


const completeSummary = (source,target) => {
    source.addEventListener('input', (e) => {
        target.innerHTML = e.target.value;
    })
}

let enterDateES;
let exitDateES
let finalPricing;

const calendar = () => {
    let totalDays;
    let price;
    let date = new Date();

    const elem = document.getElementById('range');
    const dateRangePicker = new DateRangePicker(elem, {
        datesDisabled: [0,2,4,6],
        daysOfWeekHighlighted: [1,3,5],
        language: "es",
        startView: 0,
        todayHighlight: true,
        weekStart: 1,
        minDate: date,
        clearBtn: true,
        format: ("dd/mm/yyyy")

    });

    let calInputs = document.querySelectorAll('#range input');


    let enterDate;
    let exitDate;
    let transportFare = 4000;
    calInputs.forEach(input => {
        input.addEventListener('changeDate', function (e, details) { 
            enterDate = document.querySelectorAll('#range input')[0].value
        
           document.querySelector('#summary-start-date').innerHTML = enterDate;
    
            exitDate = document.querySelectorAll('#range input')[1].value
            document.querySelector('#summary-end-date').innerHTML = exitDate;


            enterDateES = enterDate.split('/');

            enterDateES = enterDateES[1] + "/" + enterDateES[0] + '/' + enterDateES[2];
            enterDateES =  new Date(enterDateES);


             exitDateES = exitDate.split('/');

            exitDateES = exitDateES[1] + "/" + exitDateES[0] + '/' + exitDateES[2];
            console.log(exitDateES)
            exitDateES =  new Date(exitDateES);

            console.log(exitDateES)

            let difference = exitDateES.getTime() - enterDateES.getTime();

            totalDays = Math.ceil(difference / (1000 * 3600 * 24));
            console.log(totalDays + ' days in House Paradise  ');
            
            let hasDiscount = false;

            if (totalDays <= 3) {
                 price = 4000;
            } else if (totalDays > 3 && totalDays < 6) {
                price = 4000
                hasDiscount = true;
            } else if (totalDays > 6 && totalDays < 15) {
                price = 4000;
                hasDiscount = true;
            } else if (totalDays > 15) {
                price = 4000;
                hasDiscount = true;
            }

            document.querySelector('.daily-price').innerHTML = formatPrice(price);

            console.log(formatPrice(price));

            document.querySelector('.title-nights').innerHTML = `${formatPrice(price)} por ${totalDays} noches`;
            document.querySelector('.price-nights').innerHTML = formatPrice(price * totalDays);
            document.querySelector('.price-transport').innerHTML = formatPrice(transportFare);
            document.querySelector('#grand-total').innerHTML = formatPrice((price * totalDays) + transportFare);

            // document.querySelector('span#final-number').innerHTML = formatPrice((price * totalDays) + transportFare);
            document.querySelector('span#final-number-upfront').innerHTML = ((price * totalDays) + transportFare) * 0.2;

            finalPricing = (price * totalDays) + transportFare;
            document.querySelector('span.final-number').innerHTML = formatPrice((price * totalDays) + transportFare);
            document.querySelector('.final-summery-title span').innerHTML = ` por ${totalDays} días`

            allDays = totalDays;
            });
            
    })

    let isOpen = false;
    document.querySelectorAll('.datepicker').forEach((picker, index) => {
        let dates = picker.querySelectorAll('.datepicker-grid')
        dates.forEach(d => {
            d.addEventListener('click', ()=> {
                if (isOpen) {
                    picker.classList.remove('active');
                    picker.style.left = '';
                    document.querySelectorAll('#range input')[index].classList.remove('in-edit')

                } else {
                    picker.style.left = '315.102px';
                }
                isOpen = !isOpen;
            })
        })
    })
}


calendar();


let close = () => {
    closeModal.addEventListener('click', ()=> {
        document.querySelector('.reserve-container').classList.add('o-0', 'pointers-none');
        document.querySelector('.reserve-bg').classList.add('dn'), 'pointers-none'
    })
}

close();

let open = () => {
    let a = document.querySelectorAll('a');

    a.forEach(trigger => {
        trigger.addEventListener('click', (e)=> {

        gtag('event', 'open_reserve', {
            page_location: 'https://www.ugo.com.ar',
            page_path: window.location.pathname,
            send_to: 'G-9WN369K0SS',
            // value: e.target,
        })

            e.preventDefault();
            document.querySelector('.reserve-container').classList.remove('o-0', 'pointers-none');
            document.querySelector('.reserve-bg').classList.remove('dn'), 'pointers-none'
        })
    })

    if (window.location.href.indexOf('#reserve') >= 0) {
        document.querySelector('.reserve-container').classList.remove('o-0', 'pointers-none');
        document.querySelector('.reserve-bg').classList.remove('dn'), 'pointers-none'
    }
}

open();


document.querySelectorAll('.pay-now-container').forEach(pay => {
    pay.addEventListener('click', ()=> {

        console.log(reserveInfo.dog.edad)
        let mpTitle;

        if (pay.classList.contains('upfront')) {
            reserveInfo.aob.price = reserveInfo.aob.price * 0.2;
             mpTitle = `Pago del 20% del total de la estadía de ${reserveInfo.dog.nombre} por ${allDays} días en House Paradise`
             reserveInfo.aob.purchased = 'anticipo';
             reserveInfo.aob.status = "Anticipo pagado";

        } else {
            mpTitle = `Pago para la estadía de ${reserveInfo.dog.nombre} por ${allDays} días en House Paradise` 
            reserveInfo.aob.purchased = 'full';
            reserveInfo.aob.status = "A retirar";
        }

        let celoDate =  document.querySelector('.celo-date input').value;
    
        if (!celoDate) {
            celoDate = '2022-12-18';
        }
    
    


        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "owner_name": reserveInfo.owner.nombre,
            "owner_surname": reserveInfo.owner.apellido,
            "owner_phone": reserveInfo.owner.telefono,
            "owner_email":reserveInfo.owner.mail,
            "owner_dni": reserveInfo.owner.dni,
            "dog_genre": reserveInfo.dog.genero,
            "dog_raza": reserveInfo.dog.raza,
            "dog_social": reserveInfo.dog.social,
            "dog_age": reserveInfo.dog.edad,
            "dog_name": reserveInfo.dog.nombre,
            "dog_castrado": reserveInfo.dog.castrado,
            "date_celo" : celoDate,
            "dog_behaviour": reserveInfo.dog.behaviour,
            "dog_vaccine": reserveInfo.dog.checkbox11,
            "dog_deworming": reserveInfo.dog.checkbox12,
            "aob_date_start": enterDateES,
            "aob_date_end": exitDateES,
            "aob_price": reserveInfo.aob.price,
            "aob_purchased" : reserveInfo.aob.purchased, 
            "status" : reserveInfo.aob.status,
        });

        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

        fetch("https://u-go-backend-deveop-lc9t2.ondigitalocean.app/reserves-hps", requestOptions)
        .then(response => response.json())
        .then( (result)=> {
            console.log(result)
            fetch(
                'https://u-go-backend-deveop-lc9t2.ondigitalocean.app/hp-payments/createpreference',
                {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify({
                    title: mpTitle,
                    description: 'test desc',
                    price: reserveInfo.aob.price,
                    quantity: 1,
                    owner_name: reserveInfo.owner.nombre,
                    owner_surname: reserveInfo.owner.apellido,
                    owner_email: reserveInfo.owner.mail,
                    reserve: result._id
                  }),
                }
              ).then(response => response.json())
              .then(result => window.location.replace(result.init_point))
    
        })
        .catch(error => console.log('error', error));
    })
})


document.querySelector('.mail-now-container').addEventListener('click', ()=> {

    reserveInfo.aob.purchased = "consulta";
    reserveInfo.aob.status = "Pendiente de pago";

    let celoDate =  document.querySelector('.celo-date input').value;
    
    if (!celoDate) {
        celoDate = '2022-12-18';
    }

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        "owner_name": reserveInfo.owner.nombre,
        "owner_surname": reserveInfo.owner.apellido,
        "owner_phone": reserveInfo.owner.telefono,
        "owner_email":reserveInfo.owner.mail,
        "owner_dni": reserveInfo.owner.dni,
        "dog_genre": reserveInfo.dog.genero,
        "dog_raza": reserveInfo.dog.raza,
        "dog_social": reserveInfo.dog.social,
        "dog_age": reserveInfo.dog.edad,
        "dog_name": reserveInfo.dog.nombre,
        "dog_castrado": reserveInfo.dog.castrado,
        "date_celo" : celoDate,
        "dog_behaviour": reserveInfo.dog.behaviour,
        "dog_vaccine": reserveInfo.dog.checkbox11,
        "dog_deworming": reserveInfo.dog.checkbox12,
        "aob_date_start": enterDateES,
        "aob_date_end": exitDateES,
        "aob_price": reserveInfo.aob.price,
        "aob_purchased" : reserveInfo.aob.purchased, 
        "status" : reserveInfo.aob.status,
    });

    var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: raw,
    redirect: 'follow'
    };

    confirmationPop.classList.remove('dn');
  

    fetch("https://u-go-backend-deveop-lc9t2.ondigitalocean.app/reserves-hps", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .then( () => {
        confirmationPop.classList.add('dn');
        document.querySelector('.reserve-input-container').classList.add('dn') 
        document.querySelector('.reserve-input-container').classList.remove('flex') 
        document.querySelector('.message-success').classList.remove('dn') 
    })
    .catch(error => console.log('error', error));

})

// Confirmation Message

let isMessage = document.location.search
let urlMessage = window.location.href


if (urlMessage.indexOf("?payment") >= 0) {
    let title = document.querySelector('.mp-callback-container .callback-header h2')
       document.querySelector('.mp-callback-container').classList.remove('dn')
       document.querySelector('.mp-callback-container').classList.add('flex', 'flex-column')

       let params = new URLSearchParams(isMessage) 
       let success = params.get('status');
 

       if (success == 'approved') {
            title.innerHTML = `Gracias por tu compra! Tu reserva quedó confirmada. Un asesor de House Paradise se pondrá en contacto a la brevedad!`

            fetch(`${url}reserves-hps/${params.get('reserve')}`, requestOptions)
            .then(response => response.json())
            .then((response) => {
                console.log(response)

            let dogName = response.dog_name;
            let dogAge = response.dog_age;
            let dogRaze = response.dog_raza;
     
            let startDate = response.aob_date_start
            let endDate = response.aob_date_end
            let mail = response.hp_payment.owner_email;
            let price = response.aob_price
       
     
            document.querySelectorAll('.mp-callback-container .summary-dog span')[0].innerHTML = dogName;
            document.querySelectorAll('.mp-callback-container .summary-dog span')[1].innerHTML = dogAge;
            document.querySelectorAll('.mp-callback-container .summary-dog span')[2].innerHTML = dogRaze;
            document.querySelector('.mp-callback-container #summary-start-date').innerHTML = startDate;
            document.querySelector('.mp-callback-container #summary-end-date').innerHTML = endDate;
     
            document.querySelector('.mp-callback-container span.final-number').innerHTML = price;
            });
      

       } else {

        document.querySelector('.cb-header-icon').innerHTML = `
            <svg width="105" height="105" viewBox="0 0 105 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="52.5" cy="52.5" r="52.5" fill="#EA4335"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M74.598 33.1717C76.1601 34.7338 76.1601 37.2664 74.598 38.8285L37.8284 75.5981C36.2663 77.1602 33.7336 77.1602 32.1716 75.5981C30.6095 74.036 30.6095 71.5033 32.1716 69.9412L68.9411 33.1717C70.5032 31.6096 73.0359 31.6096 74.598 33.1717Z" fill="white"/>
                <rect x="53" y="65.8486" width="16.7563" height="16.7563" transform="rotate(-135 53 65.8486)" fill="#EA4335"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M32.1712 33.1716C33.7333 31.6095 36.266 31.6095 37.8281 33.1716L74.5976 69.9411C76.1597 71.5032 76.1597 74.0359 74.5976 75.598C73.0355 77.1601 70.5029 77.1601 68.9408 75.598L32.1712 38.8284C30.6091 37.2663 30.6091 34.7337 32.1712 33.1716Z" fill="white"/>
            </svg>
            `

            document.querySelector('.mp-callback-container .summary-stay-container').style.display = 'none'
            title.innerHTML = `Ups! Ocurrió un problema al realizar tu compra. Por favor, <span><a href="/#reserve" class="ugo-pink">volvé a intentarlo</a></span>`

       }

      
document.querySelector('.close-mp-modal').addEventListener('click', ()=> {
    document.querySelector('.mp-callback-container').classList.remove('flex', 'flex-column')
    document.querySelector('.mp-callback-container').classList.add('dn')
})


}

const conversion = () => {
    let triggers = document.querySelectorAll('.final-options > div')

    triggers.forEach(t => {
        t.addEventListener('click', ()=> {
            gtag('event', 'convert', {
                page_location: 'https://www.ugo.com.ar',
                page_path: window.location.pathname,
                send_to: 'G-9WN369K0SS',
                value: t.classList[0].toString(),
            })
        })
    })
}


const changeSelects = () => {
    document.querySelectorAll('select').forEach(s => {
        s.addEventListener('click' , ()=> {
            s.classList.add('selected')
            console.log(s)
        })    
    })

}


const formatPrice = (number) => {
    let ars = Intl.NumberFormat("es-AR", {
        style: "currency",
        currency: "ARS",
        decimal: 0,
        maximumSignificantDigits: 3
    });

    return (ars.format(number))
}



const dogInputConditionals = () => {
    let castradoTrigger = document.querySelector('.input-castrado');

    castradoTrigger.addEventListener('change', (e) => {
            if (e.target.value === 'no') {
                document.querySelector('div.celo-date').classList.remove('o-0', 'pointers-none')
            }
    })
}

