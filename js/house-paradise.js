document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "beforeend",
    "<link rel=\"stylesheet\" href=\"wp-content/themes/ugo-web/css/datepicker.min.css\" />"    
);

document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "beforeend",
    "<link rel=\"stylesheet\" href=\"/wp-content/themes/ugo-web/css/hp.css\" />"    
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
let totalDays;

let allDays;

const HPavailability = [];

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

    let incompleteFields;
 
   

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

                    // Add to object
                    let attr = input.getAttribute('placeholder');
                    let values = {[attr] : input.value}
                    reserveInfo.owner = {... reserveInfo.owner, ...values}
                    input.classList.remove('incomplete')                
                   }
                }
            })

            // make the incompleteFields if below a reusable function

        incompleteFields = document.forms[0].querySelectorAll('.incomplete');

        if (incompleteFields.length <= 0) {
            hasFilled = true
        } else {
            hasFilled = false;
        }

        } else if (formStep === 1) {
           
            inputs.forEach((input,index) => {
                if (index > 4 && index <= 9) {

                    let value = input.value;    
                    if (!value) {
                        input.classList.add('incomplete')
                        hasFilled = false;
                    } else {
                        input.classList.remove('incomplete')
                        let attr = input.getAttribute('placeholder');
                        let values = {[attr] : input.value}
                        reserveInfo.dog = {... reserveInfo.dog, ...values}
                    }

                   incompleteFields = document.forms[0].querySelectorAll('.incomplete');

                   if (incompleteFields.length <= 0) {
                       hasFilled = true
                   } else {
                       hasFilled = false;
                   }

                } else if (index > 10 && index <= 12) {
                 
                    let values = {[`checkbox${index}`] : input.checked}
                    reserveInfo.dog = {...reserveInfo.dog, ...values}
          
                    console.log(values)

                    let cirugiaRes = document.querySelectorAll('.dog-textarea input')[0]

                    if (cirugiaRes) {
                        cirugiaRes = cirugiaRes.value;
                        reserveInfo.dog.cirugia = cirugiaRes;
                    }

                    let alergiesRes = document.querySelectorAll('.dog-textarea input')[1]

                    if (alergiesRes) {
                        alergiesRes = alergiesRes.value;
                        reserveInfo.dog.alergia = alergiesRes;
                    }

            
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
                
                       let biteRes = document.querySelector('.bite-container h4.behaviour-type.selected');
                       if (biteRes) {
                          biteRes = biteRes.innerHTML;
                           reserveInfo.dog.bite = biteRes;
                       }

                       let swimRes = document.querySelector('.swim-container h4.behaviour-type.selected');
                       if (swimRes) {
                        swimRes = swimRes.innerHTML;
                           reserveInfo.dog.swim = swimRes;
                       }

                       //aob responses
               

                       let foodRes = document.querySelectorAll('.aob-container input')[0];
                       if (foodRes) {
                        foodRes = foodRes.value;
                           reserveInfo.dog.food = foodRes;
                       }

                       let commentsRes = document.querySelectorAll('.aob-container input')[1];
                       if (commentsRes) {
                        commentsRes = commentsRes.value;
                           reserveInfo.dog.comments = commentsRes;
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
            if (totalDays <= 0 || totalDays === undefined) {
                // alert('seleccioná fechas')
                hasFilled  = false;
                document.querySelectorAll('#range input').forEach(date => {date.classList.add('incomplete')})
            } else {
                hasFilled = true;
                document.querySelectorAll('#range input').forEach(date => {date.classList.remove('incomplete')})
            }

            console.log(totalDays)

            console.log(reserveInfo);

            if (hasFilled) {
                document.querySelector('.reserve-input-container').classList.add("ending")
                document.querySelector('.summary-stay-container').classList.add("ending")
            }
        } 

        if (hasFilled) {
           if (formStep <= formContent.length - 1 ) {
            formStep++
            hasFilled = false;
           }
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
    let comida;
    let comments;
  fetch(`https://u-go-backend-deveop-lc9t2.ondigitalocean.app/${dogEndPoint}`, requestOptions)
  .then(response => response.json())
  .then((response)=> {
     data = response;
     console.log(data)
    let inputs = response.inputDogs;
     comida = response.Comida;
     comments = response.Comentarios;
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

            input.classList.add('o-0', 'pointers-none', 'celo-date', 'dn')

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
            dogHealth.forEach((h, i) => {
                let inputContainer = document.createElement('div');

                if (i <= 1) {
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
            } else {
                inputContainer.classList.add('dog-textarea');
                let healthInput = document.createElement('input');
                healthInput.setAttribute('type', 'input');
                healthInput.placeholder = h.question;

                healthInput.classList.add('input-textarea', 'w-100', 'input-text');

                inputContainer.appendChild(healthInput);
                healthContainer.appendChild(inputContainer);
            }
            })
            
        formContent[1].appendChild(healthContainer)    
    }).then(() => {

        let social = data.social

        socialContainer = document.createElement('div');
        socialContainer.classList.add('social-container');

        let title = document.createElement("h2");
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

        behaviour.forEach((b, i) => {

        let behaviourContainer = document.createElement('div');
        behaviourContainer.classList.add('behaviour-container')

        if (i === 1 ) {
            behaviourContainer.classList.add('bite-container')
        }
        else if (i === 2) {
            behaviourContainer.classList.add('swim-container')
        }
        let behaviourTitle = document.createElement('p')

        behaviourTitle.innerHTML = b.questions;

        behaviourContainer.appendChild(behaviourTitle);

        let responsesContainer = document.createElement('div');

       let responses = [];
       b.options.map((response, index) => {
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
    })



    aobContainer = document.createElement('div');
    aobContainer.classList.add('aob-container');

    let title = document.createElement("h2");
    title.innerHTML = `Otros datos sobre tu mascota!`;
    aobContainer.appendChild(title)


    let foodInput = document.createElement('input');
    foodInput.setAttribute('type', 'input');
    foodInput.placeholder = comida

    foodInput.classList.add('input-textarea', 'w-100', 'input-text');


    let commentsInput = document.createElement('input');
    commentsInput.setAttribute('type', 'input');
    commentsInput.placeholder = comments

    commentsInput.classList.add('input-textarea', 'w-100', 'input-text');


    aobContainer.appendChild(foodInput);
    aobContainer.appendChild(commentsInput);


    formContent[1].appendChild(aobContainer)

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
let transportFare = 4000;
let price;


const getSheet = () => {
    var id = '1il0HUktHwxaF_wDfpAjH-N9sxoT_sd_k73Z_v3_KDhk';
    var gid = '0'
    var url = `https://docs.google.com/spreadsheets/d/1il0HUktHwxaF_wDfpAjH-N9sxoT_sd_k73Z_v3_KDhk/gviz/tq?tqx=out:json&tq&gid=755951076`;
    fetch(url)
  .then(response => response.text())
  .then(data => {
    // Extract the JSON data using a regular expression pattern
    const match = data.match(/google\.visualization\.Query\.setResponse\((.*)\)/);
    
    if (match) {
      const jsonData = JSON.parse(match[1]);

      let HPdata = jsonData.table.rows;

      HPdata.forEach(dates => {
       let availability = dates.c
            const obj = {
                date: availability[0].f,
                availability: availability[1].v
            };
            HPavailability.push(obj);
      })
      // Use the JSON data as needed
    } else {
      throw new Error('Unable to extract JSON data from the response.');
    }
  })
  .catch(error => {
    console.error('Error retrieving data:', error);
  });
}



const calendar = () => {
    
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

    getSheet();
    console.log(HPavailability)
 
    calInputs.forEach(input => {
        input.addEventListener('changeDate', function (e, details) { 
            input.classList.remove('incomplete');

            // Grab initial dates
            enterDate = document.querySelectorAll('#range input')[0].value
            document.querySelector('#summary-start-date').innerHTML = enterDate;
            exitDate = document.querySelectorAll('#range input')[1].value
            document.querySelector('#summary-end-date').innerHTML = exitDate;

            // Translate to Spanish enterDate
            enterDateES = enterDate.split('/');
            enterDateES = enterDateES[1] + "/" + enterDateES[0] + '/' + enterDateES[2];
            enterDateES =  new Date(enterDateES);


            // Translate to Spanish exitDate
            exitDateES = exitDate.split('/');
            exitDateES = exitDateES[1] + "/" + exitDateES[0] + '/' + exitDateES[2];
            exitDateES =  new Date(exitDateES);

            console.log(exitDateES)

            if (enterDate != exitDate) {
                let difference = exitDateES.getTime() - enterDateES.getTime();
                totalDays = Math.ceil(difference / (1000 * 3600 * 24));
                
                // console.log(totalDays + ' days in House Paradise  ');
                
                
                const showPrice = (price) => {
                    document.querySelector('.daily-price').innerHTML = formatPrice(price);
    
                    document.querySelector('.title-nights').innerHTML = `${formatPrice(price)} por ${totalDays} noches`;
                    document.querySelector('.price-nights').innerHTML = formatPrice(price * totalDays);
                    document.querySelector('.price-transport').innerHTML = formatPrice(transportFare);
                    document.querySelector('#grand-total').innerHTML = formatPrice((price * totalDays) + transportFare);
        
                    // document.querySelector('span#final-number').innerHTML = formatPrice((price * totalDays) + transportFare);
                    document.querySelector('span#final-number-upfront').innerHTML = formatPrice(((price * totalDays) + transportFare) * 0.2);
                    
        
                    finalPricing = (price * totalDays) + transportFare;
                    document.querySelector('span.final-number').innerHTML = formatPrice((price * totalDays) + transportFare);
                    document.querySelector('.final-summery-title span').innerHTML = ` por ${totalDays} días`
        
                    allDays = totalDays;
                }
    
                const matchingObject = HPavailability.find(item => item.date.toString() === exitDate);


                // Chequear cuales noches son 


                function getDateRange(startDate, endDate) {
                    const dates = [];
                    let currentDate = new Date(startDate);
                  
                    while (currentDate <= endDate) {
                      dates.push(new Date(currentDate));
                      currentDate.setDate(currentDate.getDate() + 1);
                    }
                  
                    return dates;
                  }

                  const dateRange = getDateRange(enterDateES, exitDateES);
                    console.log(dateRange);
    
                console.log(matchingObject);
    
                if (matchingObject) {
                    price = 4000;
                } else {
                    price = 4000;
                }


                // Get today's date
                const today = new Date();

                // Assuming the user-selected date is stored in the variable 'selectedDate'
                // const selectedDate = ; // Replace with your actual variable

                // Calculate the difference in days
                const timeDifference = enterDateES.getTime() - today.getTime();
                const daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));


                console.log(daysDifference)
    
                showPrice(price)
            }

          

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

const discounts = () => {
    let promotions = [
        {name: 'MEJORESAMIGOS', discount : 15},
        {name: 'AMIGUIS', discount : 15},
        {name: 'PARAISO', discount : 20}
    ]

    let verify = document.querySelector('#discount-verify');

    verify.addEventListener('click', ()=> {
        let cupon = document.querySelector('.discount-code input').value.toUpperCase();

        const matchingProduct = promotions.find(product => product.name === cupon);

        if (matchingProduct) {
            let discount = matchingProduct.discount;
            // alert(`tenes un descuento de ${matchingProduct.discount}`)

            let discounted = finalPricing - finalPricing * (1 - discount/100);
            finalPricing = finalPricing * (1 - discount/100);
            
            // console.log(finalPricing);         
            // Change the validation field
            document.querySelectorAll('.discount-container div')[0].classList.toggle('dn')
            document.querySelectorAll('.discount-container div')[0].classList.toggle('flex')
            document.querySelectorAll('.discount-container div')[1].classList.toggle('dn')
            document.querySelectorAll('.discount-container div')[1].classList.toggle('flex')
         
            // Change the description in the validation field
            document.querySelector('.discount-success > p').innerHTML = `Cupón cargado correctamente! Recibiste un ${discount}% de descuento equivalente a ${formatPrice(discounted)} sobre el total de tu reserva.`


            document.querySelector('#discount-legend').innerHTML = cupon;

            // If cupon is deleted 

            document.querySelector('.discount-cupon-success svg').addEventListener('click', ()=> {
                changeDiscountFields();
            })

            
          
            // Change the final number 
            document.querySelector('span.discount-final-number').innerHTML = formatPrice(finalPricing);
            document.querySelector('span.final-number').style.textDecoration = 'line-through';
            document.querySelector('.final-summery-title span').innerHTML = ` con descuento por ${totalDays} días`


            // Change for the reservation
            reserveInfo.aob.price = finalPricing

            // Make the final number visibile
            document.querySelector('span.discount-final-number').classList.remove('dn');
            document.querySelector('.summary-discount-container').classList.remove('dn');
            document.querySelector('.summary-discount-container').classList.add('flex' , 'jic');
            document.querySelectorAll('.hr')[3].classList.remove('dn')


            // Change the 10% in the summary
            document.querySelector('.summary-discount-container span').innerHTML = matchingProduct.discount + "%"
        } else {
            document.querySelector('.discount-code input').style.border = "1px solid red";
        }

        console.log(cupon)
    })
}

discounts();

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


var raw;
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
            "dog_bite" : reserveInfo.dog.bite,
            "dog_swim" : reserveInfo.dog.swim,
            "dog_cirugia" : reserveInfo.dog.cirugia,
            "dog_alergia" : reserveInfo.dog.alergia,
            "dog_food" : reserveInfo.dog.food,
            "dog_comments" : reserveInfo.dog.comments
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

    let checked = false;
    let terms = document.querySelector('input.terms');
    checked = terms.checked;

    if (!checked){ 
        alert('por favor, confirmá nuestros términos y condiciones')
    } else {
        reserveInfo.aob.purchased = "consulta";
        reserveInfo.aob.status = "Pendiente de pago";

        let celoDate =  document.querySelector('.celo-date input').value;
        
        if (!celoDate) {
            celoDate = '2022-12-18';
        }

        var raw = JSON.stringify({
            "owner_name": reserveInfo.owner.nombre,
            "owner_surname": reserveInfo.owner.apellido,
            "owner_phone": reserveInfo.owner.telefono,
            "owner_email":reserveInfo.owner.mail,
            "owner_dni": reserveInfo.owner.dni,
            "dog_genre": reserveInfo.dog.Género,
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
            "dog_bite" : reserveInfo.dog.bite,
            "dog_swim" : reserveInfo.dog.swim,
            "dog_cirugia" : reserveInfo.dog.cirugia,
            "dog_alergia" : reserveInfo.dog.alergia,
            "dog_food" : reserveInfo.dog.food,
            "comments" : reserveInfo.dog.comments
        });
        

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

    
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

    }
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
                document.querySelector('div.celo-date').classList.remove('o-0', 'pointers-none', 'dn')
            }
    })
}
