// let url = 'http://localhost:1337';
let url = 'https://u-go-backend-deveop-lc9t2.ondigitalocean.app';

async function createAccount(email, password) {
    const response = await fetch(`${url}/users`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        // 'Authorization': `Bearer ${authToken}`,
      },
      body: JSON.stringify({
        username: 'delfiquetto',
        identifier: email,
        email: email,
        password: password,
      }),
    });
  
    if (response.ok) {
      alert('Account created successfully');
      console.log(response)
      // Redirect or perform other actions as needed
    } else {
      alert('Account creation failed');
      // Handle error response
    }
}

async function logIn(email, password) {
    const response = await fetch(`${url}/auth/local`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        identifier: email,
        password: password,
      }),
    });
  
    if (response.ok) {
      const data = await response.json();
      console.log('User profile', data.user);
      console.log('User token', data.jwt);
      console.log(response);
      const jwtToken = localStorage.setItem('jwtToken' , data.jwt);
      const user = localStorage.setItem('user', JSON.stringify(data.user));
      window.location.href = '/portal';
      // Redirect or perform other actions as needed
    } else {
      console.error('Login failed');
      // Handle error response
      const errorData = await response.json();
      console.log(errorData);
      alert('Login failed: ' + errorData.message);
    }
}


function logOut() {
// Clear the JWT token from localStorage
localStorage.removeItem('jwtToken');

// Redirect to /sign-in
window.location.href = '/sign-in';
}

const logoutButton = document.getElementById('log-out');

const loadUser = async () => {
    let user = localStorage.getItem('user');
    user ? user = user = JSON.parse(user) : window.location.href = '/sign-in';
    console.log(user._id);

    const response = await fetch(`${url}/users/${user._id}`);
    if (response.ok) {
        const user = await response.json();
        getDogs(user);
        userHeader(user);
    }
   
}

const getDogs = async (user) => {
    if (user && user.dogs) {
    console.log(user)
      
    var requestOptions = {
        method: 'GET',
        redirect: 'follow', 
      
      };

      let reserves  = await fetch (`${url}/reserves-hps?[owner][$eq]=${user.id}&_sort=aob_date_start:desc`, requestOptions).then(response => response.json())
      console.log('User has reserves:',reserves);

      // Populate the dog list 
        let dogList = document.querySelector('.pets-container-inner');
        user.dogs = user.dogs.reverse()

        let reserveList = document.querySelector('.new-reserve-list');

        fillDogs(user.dogs, dogList);
        fillReserves(reserves, reserveList);

        var reserveOptions = {
            body: JSON.stringify({
                _sort: 'date:asc'
              })
        }

        // Retrieve data from /reserves-hps endpoint
        let response = await fetch(`${url}/reserves-hps?[owner_email][$eq]=${user.email}`);
        const data = await response.json();
        if (response.ok && !localStorage.getItem('imported-dogs')) {
            // Check if user's email matches owner_email in the response
            const reservations = data.filter((reservation) => reservation.owner_email === user.email);
            console.log('Reservations:', reservations);

            document.querySelector('.p-d-content').innerHTML =  
            `<h3 class="hp-yellow f2 faro">${reservations[0].dog_name}</h3>
            <p class="hp-yellow">${reservations[0].dog_genre}, ${reservations[0].dog_age} ${Number(reservations[0].dog_age) > 1 ? 'años' : 'año'}</p>`
            
            hpReserveDog(reservations[0]);
      } 
      
        // Get old Reserves
        if (response.ok && !localStorage.getItem('imported-reserves')) {
            const reservations = data.filter((reservation) => reservation.owner_email === user.email);
            // console.log('Reservations:', reservations);

        //    await reserves.then(fillReserves(reservations, reserveList));    
        }

   
    } else {
      console.log('User does not have dogs');
    }
};

let addedStartDates = []; // Array to store the added start dates

const fillReserves = async (reserves, list) => {
    reserves.forEach(reserve => {
        let dogImage = reserve.avatar ? reserve.avatar.url : "/wp-content/uploads/2022/08/Rectangle-861.jpg";

        const result = calculateDates(reserve.aob_date_start, reserve.aob_date_end);

        if (!addedStartDates.includes(result.startDate)) {
        let previousReserve = `
            <div class="hp-reserve-item hp-br hp-teal-bg pa3 w-100 mb4">
                <div class="hp-reserve-header flex jic">
                    <div class="flex jic">
                        <div class="relative reserve-img cover bg-center" style="background-image: url('${dogImage}')"></div>
                        <h2 class="faro ml1">${reserve.dog.name ? reserve.dog.name : reserve.dog_name}</h2>
                        <h5 class="ttu ml3 reserve-status ph2 pv1 lausanne lh1 hp-teal" style="background-color: #4F4483; font-size: 11px; border-radius: 2px;padding-top: 5.2px;">${reserve.aob_purchased}</h5>
                    </div>
                    ${ (reserve.aob_purchased != 'COMPLETADO') ? 
                     `<div class="edit-reserve">
                        <p>Editar</p>
                    </div>` : ''
                    }
                </div>

                <div class="flex reserve-dates mv3">
                    <div class="flex flex-column hp-teal">
                        <p class="lh1">Desde</p>
                        <h2 class="hp-teal lh1 f2">${result.startDate}—</h2>
                    </div>
                    <div class="flex flex-column hp-teal">
                        <p class="lh1">Hasta</p>
                        <h2 class="hp-teal lh1 f2">${result.endDate}</h2>
                </div>
                </div>
                <p class="white">Total a pagar por ${result.diffDays} noches ${formatPrice(reserve.aob_price)}</p>

            </div>
        `
        addedStartDates.push(result.startDate);

        // Make an if statement checking if the reserve.aob_date_end is in the past
        console.log(reserve.aob_date_end + " " + new Date())
        if (new Date(reserve.aob_date_end) < new Date()) {
            document.querySelector('.old-reservations-inner').innerHTML = document.querySelector('.old-reservations-inner').innerHTML + previousReserve;
        } else {
            list.innerHTML = list.innerHTML + previousReserve;
        }
        }

    })
}

const fillDogs = async (dogs, list) => {
    dogs.forEach(dog => {        
        let dogImage = dog.avatar ? dog.avatar.url : "/wp-content/uploads/2022/08/Rectangle-861.jpg"
        let newDog = `<div class="pet-container pa3 mr4 mb4">
                <div class="pet-content pa2">
                    <div class="pet-header pa3 relative flex flex-column justify-between">
                        <div class="relative z-3 flex flex-column justify-between h-100">
                            <p class="tr">Editar</p>
                            <div class="pet-name">
                                <h3 class="black f2 faro">${dog.name}</h3>
                                <p>${dog.sex} ${dog.age} ${Number(dog.age) > 1 ? 'años' : 'año'}</p>
                            </div>
                        </div>
                        <div class="absolute-cover bg-gradient z-2"></div>
                        <div class="absolute-cover bg-center" style='background-image: url(${dogImage}'></div>

                    </div>
                </div>
                <div class="pet-attributes flex flex-wrap items-center mt3">
                        ${
                        dog.questions_values.map(attribute => {
                            return `<p class="ttc">${attribute.slug}</p>`
                        })
                        } 
                    </div>
                        </div>`
            list.innerHTML = list.innerHTML + newDog;
        })
}

const newDogInputs = () => {

    document.querySelector('#new-pet').addEventListener('click', () => {
        document.querySelector('.new-dog-pop').classList.remove('dn');
        document.querySelector('.new-dog-pop').classList.add('flex');
    })

    let data;
    let socialContainer;
    let comida;
    let comments;

    let inputsContainer = document.querySelector('.new-dog-content');
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
      };


  fetch(`https://u-go-backend-deveop-lc9t2.ondigitalocean.app/inputs-web-dog`, requestOptions)
  .then(response => response.json())
  .then((response)=> {
     data = response;
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

            input.classList.add('input-text', `${i.placeholder}`);
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
            dateInput.classList.add('input-text',)

            input.classList.add('o-0', 'pointers-none', 'celo-date', 'dn')

            input.appendChild(celoCaption);
            input.appendChild(dateInput);
        }
         else {
            input = document.createElement('INPUT');
            input.classList.add('input-text', `${i.placeholder}`);
        }

        input.setAttribute('type', i.type);


        input.setAttribute('placeholder', i.placeholder);
        input.setAttribute("required", "")

            
    inputsContainer.appendChild(input);
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
            
            inputsContainer.appendChild(healthContainer)    
    }).then(() => {

        let social = data.social

        socialContainer = document.createElement('div');
        socialContainer.classList.add('social-container');

        let title = document.createElement("h2");
        title.innerHTML = `Por último, algunas preguntas sobre su sociabilización`;

        inputsContainer.appendChild(title);

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
        inputsContainer.appendChild(socialContainer);


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


    inputsContainer.appendChild(aobContainer)

      dogInputConditionals()
    })

    .catch(error => console.log('error', error));
    dogsInputs = true;


    const changeSelects = () => {
        document.querySelectorAll('select').forEach(s => {
            s.addEventListener('click' , ()=> {
                s.classList.add('selected')
            })    
        })
    
    }
    
    const dogInputConditionals = () => {
        let castradoTrigger = document.querySelector('.input-castrado');
    
        castradoTrigger.addEventListener('change', (e) => {
                if (e.target.value === 'no') {
                    document.querySelector('div.celo-date').classList.remove('o-0', 'pointers-none', 'dn')
                }
        })
    }
    // create the object for the dog

    let newDog;


    const createDog = async () => {
    console.log(newDog)

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");


    var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: newDog,
    redirect: 'follow'
    };

    const response = await fetch(`${url}/dogs/`,requestOptions)
    
    if (response.ok) {
        let data = await response.json();
        console.log(data);

        document.querySelector('.new-dog-pop').classList.add('dn');
        document.querySelector('.new-dog-pop').classList.remove('flex');
    } else {
        const errorData = await response.json();
        console.log(errorData);
    }
    }

    document.querySelector('.submit-new-dog').addEventListener('click', ()=> {
        let hpQuestions = []

        // General Options

        document.querySelectorAll('.new-dog-content select').forEach(select => {
           
            const dogAttributes = {
                'title' : select.placeholder,
                'slug' : select.value,
                'type' : 'text',
            }

            hpQuestions.push(dogAttributes)
        })

        document.querySelectorAll('.dog-checbox').forEach(checkbox => {
            let input = checkbox.querySelector('input');
            const dogAttributes = {
                'title' : checkbox.querySelector('p').innerHTML,
                'slug' : input.value,
                'type' : boolean,
                'value' :  input.checked ? true : false
            }

            hpQuestions.push(dogAttributes)

        })


        document.querySelectorAll('.dog-textarea').forEach(option => {
            let input = option.querySelector('input');
            const dogAttributes = {
                'title' : input.placeholder,
                'slug' : input.value,
            }

            hpQuestions.push(dogAttributes)
        })

        // Social Options

        document.querySelectorAll('.social-container > div').forEach((option, i) => {

        let slug
            if (i === 0) {
                 slug = option.querySelector('[class*="selected"] p').innerHTML
            }   else {
                 slug = option.querySelector('[class*="selected"]').innerHTML
            }
        
          
            const dogAttributes = {
                'title' : option.querySelector('p').innerHTML,
                'slug' : slug,
                'type' : 'text',
            }

            hpQuestions.push(dogAttributes)
        })
        

        newDog = JSON.stringify({
            'name' : document.querySelector('.input-text.nombre').value,
            'age' : document.querySelector('.input-text.edad').value,
            'hp_questions' : hpQuestions,
            'sex' : capitalizeFirstLetter(document.querySelector('select.Género').value),
            'owner' : user.id
       })

       createDog();
    })
}

const userHeader = (user) => {
    let header = document.querySelector('header');
    // Delete the Reserve CTA
    let newHeaderLinks = document.createElement('div');
    newHeaderLinks.classList.add('new-header-links' , 'flex' , 'jic');

    // Create the userName element and add it to the header
    let userName = document.createElement('p');
    userName.innerHTML = `Hola ${user.first_name}!`;
    userName.classList.add('mr3', 'fw6');
    newHeaderLinks.appendChild(userName);

    // Create the logout button and add it to the header
    
    let logoutButton = document.createElement('p');
    logoutButton.innerHTML = 'Cerrar sesión';
    logoutButton.classList.add('no-deco', 'pointer', 'ml-2');
    newHeaderLinks.appendChild(logoutButton);

    logoutButton.addEventListener('click', logOut);

    header.appendChild(newHeaderLinks);

    header.querySelector('a.no-deco').innerHTML = ""
}


function capitalizeFirstLetter(str) {
    return str.replace(/^\w/, (c) => c.toUpperCase());
  }

const hpReserveDog= (dog) => {

// Open pop up
document.querySelector('.previous-dogs-container').classList.remove('dn');

document.querySelector('.confirm-new-pd').addEventListener('click', () => {
    document.querySelector('.new-dog-pop').classList.remove('dn');
    document.querySelector('.new-dog-pop').classList.add('flex');

    // Populate the inputs
    document.querySelector('.input-text.nombre').value = dog.dog_name;
    document.querySelector('.input-text.edad').value = dog.dog_age;
    document.querySelector('.input-text.raza').value = dog.dog_raza;
    // Selects
    document.querySelector('select.Género').prepend(document.querySelector(`option[value="${dog.dog_genre}"]`))
    document.querySelector(`option[value="${dog.dog_genre}"]`).selected = true;
    document.querySelector('select.Género').setAttribute('placeholder',dog.dog_genre.toUpperCase());
    
    let castradoInput = document.querySelector('select.castrado');
    castradoInput.querySelector(`option[value="${dog.dog_castrado}"]`).selected = true;

    if (dog.dog_castrado === 'yes') {         
        castradoInput.setAttribute('placeholder', "Si");
    } else {
        castradoInput.setAttribute('placeholder', 'No')
    }

    // Check inputs
    if (dog.dog_deworming === 'true') {
        document.querySelectorAll('.input-checkbox')[0].checked = true
    }

    if (dog.dog_vaccine === 'true') {
        document.querySelectorAll('.input-checkbox')[1].checked = true
    } 
    
    // Textareas

    document.querySelectorAll('.dog-textarea input')[0].value = dog.dog_cirugia
    document.querySelectorAll('.dog-textarea input')[1].value = dog.dog_alergia

    let socialLevels = document.querySelectorAll('div.social-level > div > div ')
    // Social Levels
    let foundIndex = -1;
    socialLevels.forEach((div, index) => {
        const p = div.querySelector('p');
        if (p && p.innerText === dog.dog_social) {
            foundIndex = index;
            return; // Exit the loop if a match is found
        }

        });
    socialLevels[foundIndex].classList.add('selected-social')

    let searchWords = [`${dog.dog_behaviour}`, `${dog.dog_bite}`, `${dog.dog_swim}`]
    // AOB
    let behaviourContainers = document.querySelectorAll('.behaviour-container');

    behaviourContainers.forEach((bContainer, index) => {
        bContainer.querySelectorAll('h4').forEach(h => {
            console.log(h.innerText)
            const matchedWord = searchWords.find(word => h.innerText.toLowerCase().includes(word));
            console.log(matchedWord)
            if (matchedWord) {
                h.classList.add('selected')
            }
        })
    })

    if (dog.dog_bite) {
        document.querySelectorAll('.bite-container h4')[0].classList.add('selected')
    } else {
        document.querySelectorAll('.bite-container h4')[1].classList.add('selected')
    }

    if (dog.dog_swim) {
        document.querySelectorAll('.swim-container h4')[0].classList.add('selected')
    } else {
        document.querySelectorAll('.swim-container h4')[1].classList.add('selected')
    }
    
    document.querySelectorAll('.input-textarea')[2].value = dog.dog_food
    document.querySelectorAll('.input-textarea')[3].value = dog.comments
    
})

// Close the pop up
document.querySelector('.close-pdc').addEventListener('click', () => {
    document.querySelector('.previous-dogs-container').classList.add('dn');
    localStorage.setItem('imported-dogs', true)
})
}

const calculateDates = (startDate, endDate) => {
    const oneDay = 24 * 60 * 60 * 1000; // One day in milliseconds

    // Convert the English-formatted dates to Date objects
    const startDateObj = new Date(startDate);
    const endDateObj = new Date(endDate);

    // Calculate the difference in days
    const diffDays = Math.round(Math.abs((endDateObj - startDateObj) / oneDay));

    // Format the dates in Spanish (DD/MM/YYYY)
    const formattedStartDate = formatDate(startDateObj);
    const formattedEndDate = formatDate(endDateObj);

    // Return the formatted dates and the difference in days
    return {
        startDate: formattedStartDate,
        endDate: formattedEndDate,
        diffDays: diffDays
    };
}

function formatDate(date) {
  const day = String(date.getDate()).padStart(2, '0');
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const year = date.getFullYear();

  return `${day}.${month}`;
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

let enterDateES;
let exitDateES;

let price;
let finalPricing;


const newReserve = () => { 
    let newReserve = document.querySelector('.new-reserve-pop');
    newReserve.classList.remove('dn');
    newReserve.classList.add('flex');
    let transportFare = 6000;

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
    
        // getSheet();
        // console.log(HPavailability)
     
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
            
                        document.querySelector('#grand-total').innerHTML = formatPrice((price * totalDays) + transportFare);
                        document.querySelector('span#final-number-upfront').innerHTML = formatPrice(((price * totalDays) + transportFare) * 0.2);
                        
            
                        finalPricing = (price * totalDays) + transportFare;
                        document.querySelector('#grand-total').innerHTML = formatPrice((price * totalDays) + transportFare);
                        document.querySelector('#summary-nights').innerHTML = ` ${totalDays} noches`;
                        document.querySelector('#summary-price').innerHTML = formatPrice((price * totalDays) + transportFare);

            
                        allDays = totalDays;
                    }
        
                    // const matchingObject = HPavailability.find(item => item.date.toString() === exitDate);
    
    
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

                        price = 5000;
        

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

    let formReserveStep = 0;
    if (user.dogs.length > 0) {
        formReserveStep = 1;
        document.querySelector('#summary-dog-name').innerHTML = user.dogs[0].name
    }

    let reserveSteps = document.querySelectorAll('.reserve-steps-container > div');

    const stepsReserve = () => {
        // reserveSteps[formReserveStep].classList.remove('dn');
        reserveSteps.forEach((s,index) => {
            if (index === formReserveStep) {
                s.classList.remove('dn');
                if (reserveSteps === 1) {
                    s.classList.add('flex')
                }
            } else {
                s.classList.add('dn');
                s.classList.remove('flex')
            }
        })

    }
    calendar();
    stepsReserve();

   
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
                document.querySelector('#discount-final-number').innerHTML = formatPrice(finalPricing);
                document.querySelector('#grand-total').style.textDecoration = 'line-through';
    
    
                // Change for the reservation
                // reserveInfo.aob.price = finalPricing
    
                // Make the final number visibile
                document.querySelector('#discount-final-number').classList.remove('dn');
                document.querySelector('.discount-container').classList.remove('dn')
                document.querySelector('.discount-container').classList.add('flex')
                // Change the 10% in the summary
                document.querySelector('.discount-percentage').innerHTML = matchingProduct.discount + "%" ;


            } else {
                document.querySelector('.discount-code input').style.border = "1px solid red";
            }
    
            console.log(cupon)
        })
    }
    
    discounts();


    let nextStep = document.querySelector('.advance-step');

    let reserveTitle = {
        0 : 'Para quién es la reserva?',
        1 : 'Elegí las fechas',
        2 : 'Resumen de tu reserva',
    }

    nextStep.addEventListener('click', () => {
        document.querySelector('#reserve-title-ph').innerHTML = reserveTitle[formReserveStep];

        if (formReserveStep <= reserveSteps.length - 1 ) {
            formReserveStep++;
            hasFilled = false;


            if (formReserveStep <= 2) {
                nextStep.classList.add('dn');
            } else {
                nextStep.classList.remove('dn');
            }
           }

        stepsReserve();
    })

    document.querySelectorAll('.btn-prev-hp').forEach(btn => {
        document.querySelector('#reserve-title-ph').innerHTML = reserveTitle[formReserveStep];

        btn.addEventListener('click', ()=> {
            formReserveStep--;
            stepsReserve();
            nextStep.classList.remove('dn');
        })

    })

}

let reserveInfo = {};

const sendReserve = async () => {
    document.querySelector('.mail-now-container').addEventListener('click', ()=> {

        let checked = false;
        let terms = document.querySelector('input.terms');
        checked = terms.checked;

     

        let selectedDog = user.dogs[0].id;
    
        if (!checked){ 
            alert('por favor, confirmá nuestros términos y condiciones')
        } else {
            // reserveInfo.aob.purchased = "consulta";
            // reserveInfo.aob.status = "Pendiente de pago";
    
        
            var raw = JSON.stringify({
                "owner" : user.id,
                "dog" : selectedDog,
                "aob_date_start": enterDateES,
                "aob_date_end": exitDateES,
                "aob_price": finalPricing,
                "aob_purchased" : 'consulta', 
                "status" : "Pendiente de pago",
            });
            
    
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");
    
        
            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
            };


            let confirmationPop = document.querySelector('.confirmation-await');
            confirmationPop.classList.remove('dn');
        
    
            fetch("https://u-go-backend-deveop-lc9t2.ondigitalocean.app/reserves-hps", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .then( () => {
                confirmationPop.classList.add('dn');
                document.querySelector('.reserve-content').classList.add('dn') 
                document.querySelector('.reserve-content').classList.remove('flex') 
                document.querySelector('.message-success').classList.remove('dn') ;
                document.querySelector('.message-success').classList.add('active') ;

                setTimeout(() => {
                    window.location.reload();
                }, 8000)
            })
            .catch(error => console.log('error', error));
    
        }
    })
}


if (window.location.pathname === '/portal/') {
    console.log('Loading user data...');
    loadUser();
    newDogInputs();
    sendReserve();

    document.querySelector('.new-reserve-trigger').addEventListener('click', newReserve)
}

if (window.location.pathname === '/sign-in/') { 
    console.log('signin')
    // Example usage:
    const form = document.querySelector('form');
    if (form) {
    form.addEventListener('submit', async function (event) {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        await logIn(email, password);
        });
    }
}



