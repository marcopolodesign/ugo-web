let url = 'http://localhost:1337';

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
    getDogs(user);
}


const getDogs = async (user) => {
    if (user && user.dogs) {
      console.log('User has dogs:', user.dogs);

      // Populate the dog list 
        let dogList = document.querySelector('.pets-container-inner');

        fillDogs(user.dogs, dogList);
  
      // Retrieve data from /reserves-hps endpoint
      const response = await fetch(`${url}/reserves-hps?[owner_email][$eq]=${user.email}`);
      if (response.ok) {
        const data = await response.json();
  
        // Check if user's email matches owner_email in the response
        const reservations = data.filter((reservation) => reservation.owner_email === user.email);
        console.log('Reservations:', reservations);
  
        // Perform other actions with the retrieved data
        // ...
      } else {
        console.log('Error retrieving data from /reserves-hps:', response.status);
      }
    } else {
      console.log('User does not have dogs');
    }
};

const fillDogs = async (dogs, list) => {
    dogs.forEach(dog => {   
        
        let dogImage = dog.avatar ? dog.avatar.url : "/wp-content/uploads/2022/08/Rectangle-861.jpg"
        let newDog = `<div class="pet-container pa3 mr4 mb4">
                <div class="pet-content pa2">
                    <div class="pet-header pa3 relative flex flex-column justify-between">
                        <div class="relative z-3 flex flex-column justify-between h-100">
                            <p class="tr">Editar</p>
                            <div class="pet-name">
                                <h3 class="black f2">${dog.name}</h3>
                                <p>${dog.sex} ${dog.age} ${dog.age < 1 ? 'años' : 'año'}</p>flex-wrap
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



function capitalizeFirstLetter(str) {
    return str.replace(/^\w/, (c) => c.toUpperCase());
  }

if (window.location.pathname === '/portal/') {
    console.log('Loading user data...');
    loadUser();
    newDogInputs();

    logoutButton.addEventListener('click', logOut);
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



