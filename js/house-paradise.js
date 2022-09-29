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
    let button = document.querySelector('.btn-next-hp');
    let prevButton = document.querySelector('.btn-prev-hp');

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
                } else if (index > 9 && index <= 11) {
                 
                    let values = {[`checkbox${index}`] : input.checked}
                    reserveInfo.dog = {...reserveInfo.dog, ...values}
          
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

                reserveInfo.aob.price = parseFloat(document.querySelector('#final-number').innerHTML)

            })
            console.log(reserveInfo);
        } 

        if (hasFilled) {
            formStep++;
            if (formStep >= formContent.length) {
                formStep --;
            }
            loadScreens();
            console.log(reserveInfo);

      

        } else {
            alert('Por favor, completar todos los campos!')
        }       
    })

    prevButton.addEventListener('click', () => {
        if (formStep > 0) {
            formStep--;
            if (formStep >= formContent.length) {
                formStep ++;
            }
    
            loadScreens();
        }
       
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
        console.log(i)
        if (i.type === "select" && i.placeholder != 'raza') {
            
            input = document.createElement('SELECT');

            let placeholder = document.createElement('OPTION')
            placeholder.setAttribute('selected', '');
            placeholder.setAttribute('disabled', '')
            if (i.placeholder === 'castrado?') {
                placeholder.innerHTML = `Está ${i.placeholder}?`;
            } else {
                placeholder.innerHTML = i.placeholder;

            }
            input.appendChild(placeholder);


            i.selectOptions.forEach((o, n) => {
                console.log(o)
               

                let option = document.createElement('OPTION')
                option.setAttribute('value', o.value);
                option.innerHTML = o.nombre;

                input.appendChild(option);
            })
            
          

        } else {
            input = document.createElement('INPUT');
        }

        input.setAttribute('type', i.type);


        input.setAttribute('placeholder', i.placeholder);
        input.classList.add('input-text');
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

        social.forEach(level => {
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
    })

    .catch(error => console.log('error', error));

    dogsInputs = true;
}


const completeSummary = (source,target) => {
    source.addEventListener('input', (e) => {
        target.innerHTML = e.target.value;
    })
}


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

    });

    let calInputs = document.querySelectorAll('#range input');


    let enterDate;
    let exitDate;
    let transportFare = 350;
    calInputs.forEach(input => {
        input.addEventListener('changeDate', function (e, details) { 
            enterDate = document.querySelectorAll('#range input')[0].value
            document.querySelector('#summary-start-date').innerHTML = enterDate;

            enterDate = new Date(enterDate);

            exitDate = document.querySelectorAll('#range input')[1].value
            document.querySelector('#summary-end-date').innerHTML = exitDate;

            exitDate = new Date(exitDate);


            let difference = exitDate.getTime() - enterDate.getTime();

            totalDays = Math.ceil(difference / (1000 * 3600 * 24));
            console.log(totalDays + ' daysin House Paradise  ');
            
            let hasDiscount = false;

            if (totalDays <= 3) {
                 price = 3000;
            } else if (totalDays > 3 && totalDays < 6) {
                price = 2400
                hasDiscount = true;
            } else if (totalDays > 6 && totalDays < 15) {
                price = 2200;
                hasDiscount = true;
            } else if (totalDays > 15) {
                price = 2000;
                hasDiscount = true;
            }

            document.querySelector('.daily-price span').innerHTML = price
            document.querySelector('.title-nights').innerHTML = `${price} por ${totalDays} noches`;
            document.querySelector('.price-nights').innerHTML = `$${price * totalDays} `;
            document.querySelector('.price-transport').innerHTML = "$" + transportFare;
            document.querySelector('#grand-total span').innerHTML = (price * totalDays) 

            document.querySelector('span#final-number').innerHTML = (price * totalDays) + transportFare;
            document.querySelector('span.final-number').innerHTML = (price * totalDays) + transportFare;

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
            e.preventDefault();
            document.querySelector('.reserve-container').classList.remove('o-0', 'pointers-none');
            document.querySelector('.reserve-bg').classList.remove('dn'), 'pointers-none'
        })
    })
}

open();


document.querySelector('.mail-cta').addEventListener('click', ()=> {

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
            "dog_age": parseFloat(reserveInfo.dog.edad),
            "dog_name": reserveInfo.dog.nombre,
            "dog_castrado": reserveInfo.dog.castrado,
            "dog_behaviour": reserveInfo.dog.behaviour,
            "dog_vaccine": reserveInfo.dog.checkbox10,
            "dog_deworming": reserveInfo.dog.checkbox11,
            "aob_date_start": new Date(reserveInfo.aob.date0),
            "aob_date_end": new Date(reserveInfo.aob.date1),
            "aob_price": reserveInfo.aob.price,
        });

        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

        fetch("https://u-go-backend-deveop-lc9t2.ondigitalocean.app/reserves-hps", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .then( ()=> {


            fetch(
                'https://u-go-backend-deveop-lc9t2.ondigitalocean.app/hp-payments/createpreference',
                {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify({
                    title: `Pago para la estadía de ${reserveInfo.dog.nombre} por ${allDays} días en House Paradise`,
                    description: 'test desc',
                    price: reserveInfo.aob.price,
                    quantity: 1,
                    owner_name: reserveInfo.owner.nombre,
                    owner_surname: reserveInfo.owner.apellido,
                    owner_email: reserveInfo.owner.mail,
                  }),
                }
              ).then(response => response.json())
              .then(result => window.location.replace(result.init_point))
    
        })
        .catch(error => console.log('error', error));

})