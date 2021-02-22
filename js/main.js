let myLocalStorage = window.localStorage;
let pageName = document.querySelector('[data-barba=container]');
let preLoad = document.querySelectorAll('.pre-load');

let docuHeight = document.body.clientHeight;
let color;
let anchors;
let buttons;
let allAnchors;

const runScripts = () => {
  pageName = document.querySelector('[data-barba=container]');
  console.log(pageName);
  docuHeight = document.body.clientHeight;

  function allCursor() {
    let cursor = document.querySelector('.cursor');
    allAnchors = Array.prototype.slice.call(document.querySelectorAll('a, .anchor'));
    let extraAnchors = Array.prototype.slice.call(document.querySelectorAll('.anchor'));
    buttons = Array.prototype.slice.call(document.querySelectorAll('button'));

    anchors = allAnchors.concat(extraAnchors);
    anchors = allAnchors.concat(buttons);

    let anchorContainer = document.querySelectorAll('.main-cta');

    const changeCursorColor = () => {
      anchorContainer.forEach((container) => {
        const color = container.getAttribute('cursor-color');

        if (color === 'red') {
          cursor.classList.remove('black');
          cursor.classList.add('red');
        } else if (color === 'black') {
          cursor.classList.remove('red');
          cursor.classList.add('black');
        }
      });
    };

    const hoverCursor = () => {
      cursor.classList.add('is-hover');
    };

    const removeHoverCursor = () => {
      cursor.classList.remove('is-hover');
      cursor.classList.remove('is-shop');
      cursor.classList.remove('add-cart');
    };

    anchors.forEach((anchor) => {
      anchor.addEventListener('mouseover', () => {
        if (anchor.classList.contains('is-shoppable')) {
          cursor.classList.add('is-shop');
        } else if (anchor.classList.contains('single_add_to_cart_button')) {
          cursor.classList.add('add-cart');
        } else {
          hoverCursor();
        }
      });
    });

    anchors.forEach((anchor) => {
      anchor.addEventListener('mouseleave', () => {
        removeHoverCursor();
      });
    });

    const moveCursor = (x, y) => {
      cursor.style.top = y + 'px';
      cursor.style.left = x + 'px';
      changeCursorColor();
    };

    document.addEventListener('mousemove', (event) => {
      moveCursor(event.pageX, event.pageY);
    });

    document.addEventListener('scroll', (event) => {
      moveCursor(event.pageX, event.pageY);
    });
  }

  const animateSVG = (willAnimate) => {
    anime({
      targets: willAnimate,
      strokeDashoffset: [anime.setDashoffset, 0],
      easing: 'easeInOutSine',
      duration: 800,
      delay: function (el, i) {
        return i * 100;
      },
      direction: 'alternate',
      loop: false,
    });
  };

  const animatePath = (willAnimate, path) => {
    var path = anime.path(path);

    var easings = ['linear', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic'];

    var motionPath = anime({
      targets: willAnimate,
      translateX: path('x'),
      translateY: path('y'),
      rotate: path('angle'),
      easing: function (el, i) {
        // return easings[i];
        return 'easeInOutSine';
      },
      duration: 1500,
      // loop: true,
    });
  };

  const scrollTo = (array, target) => {
    let n;
    if (array.length > 0) {
      array.forEach((i) => {
        i.addEventListener('click', (e) => {
          n = array.indexOf(e.target);

          window.scrollTo({
            top: target[n].offsetTop - 150,
            behavior: 'smooth',
          });
        });
      });
    }
  };

  const faq = () => {
    const faq = document.querySelectorAll('.faq-item');
    let categories = document.querySelectorAll('.faq-category');

    // Expand Questions on click
    faq.forEach((q) => {
      q.addEventListener('click', () => {
        const isExpanded = q.getAttribute('area-expanded');

        if (isExpanded === 'false') {
          q.setAttribute('area-expanded', 'true');
        } else {
          q.setAttribute('area-expanded', 'false');
        }
      });
    });

    const filters = document.querySelectorAll('.faq-filter h2');

    // Filter cat on click
    filters.forEach((filter) => {
      let cat = filter.getAttribute('id');

      filter.addEventListener('click', () => {
        categories.forEach((q) => {
          let faqCat = q.getAttribute('faq-cat');
          q.style.display = 'none';
          if (faqCat === cat) {
            q.style.display = '';
          } else if (cat === 'Ver todos') {
            q.style.display = '';
          } else {
            q.style.display = 'none';
          }
        });
      });
    });
  };

  const procesoNumber = (number) => {
    let i = 1;

    number.forEach((n) => {
      n.innerHTML = i;
      i++;
    });
  };

  let notices = document.querySelector('.woocommerce-notices-wrapper');

  const hideAlerts = () => {
    if (notices) {
      setTimeout(() => {
        notices.classList.add('hide');
      }, 8000);
    }
  };

  hideAlerts();

  const postAnimations = () => {
    // Intersection Observer for Posts
    let posts = document.querySelectorAll('section>div');
    let homeBlocks = document.querySelectorAll('.bloques-home > div');
    let homeContent = Array.prototype.slice.call(document.querySelectorAll('.bloques-home > div > div'));

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.intersectionRatio >= 0.2) {
            entry.target.classList.add('in-view');
          } 
          else {
            if (pageName.classList.contains('shop')) {
              entry.target.classList.remove('in-view');
            }
          }
        });
      },
      {
        
        threshold: [0.25,1],
      }
    );

    homeBlocks.forEach((post) => {
      observer.observe(post);
    });

    homeContent.forEach(content => {
      let children = Array.prototype.slice.call(content.children);
        children.forEach((c, index)=> {
          const delay = index * -80;   
          content.style.transitionDelay = delay + 650 + 'ms';
        })
    })
  };

  function googleAnalytics() {
    gtag('event', 'page_view', {
      page_location: 'https://art.mirandabosch.com',
      page_path: window.location.pathname,
      send_to: 'G-409NEZJV2Y',
    })
  }

  let checkoutForm = document.querySelector('form.checkout');

  const checkoutDetails = () => {
    let registerTrigger = document.querySelector('#register-trigger');
    let closeRegister = document.querySelector('#register-close');

    const firstName = document.querySelector('#billing_first_name');
    const lastName = document.querySelector('#billing_last_name');
    const detailName = document.querySelector('#detail-name');
    const detailLast = document.querySelector('#detail-last');

    const mail = document.querySelector('#billing_email');
    const detailMail = document.querySelector('#detail-mail');

    const detailStreet = document.querySelector('#detail-street');
    const street = document.querySelector('#billing_address_1');

    const detailAp = document.querySelector('#detail-ap');
    const ap = document.querySelector('#billing_address_2');

    const detailCity = document.querySelector('#detail-city');
    const city = document.querySelector('#billing_city');

    const detailProvince = document.querySelector('#detail-province');
    province = document.querySelector('#select2-billing_state-container');

    const detailPostCode = document.querySelector('#detail-pc');
    const postCode = document.querySelector('#billing_postcode');

    const phone = document.querySelector('#billing_phone');
    const detailPhone = document.querySelector('#detail-phone');

    firstName.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailName.innerHTML = `<span class="lda-grey">Tu nombre</span>`;
      } else {
        detailName.innerHTML = `<span class="lda-brown">${event.target.value}</span>`;
      }
    });

    lastName.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailLast.innerHTML = `<span class="lda-grey">Apellido</span>`;
      } else {
        detailLast.innerHTML = `<span class="lda-brown">${event.target.value}</span>`;
      }
    });

    street.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailStreet.innerHTML = ``;
      } else {
        detailStreet.innerHTML = `<span class="lda-brown">${event.target.value}, </span>`;
      }
    });

    ap.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailAp.innerHTML = ``;
      } else {
        detailAp.innerHTML = `<span class="lda-brown">${event.target.value}</span><br>`;
      }
    });

    postCode.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailPostCode.innerHTML = ``;
      } else {
        detailPostCode.innerHTML = `<span class="lda-brown">${event.target.value}</span>`;
      }
    });

    phone.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailPhone.innerHTML = ``;
      } else {
        detailPhone.innerHTML = `<span class="lda-brown">${event.target.value}</span>`;
      }
    });

    city.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailCity.innerHTML = ``;
      } else {
        detailCity.innerHTML = `<span class="lda-brown">${event.target.value}</span>`;
      }
    });

    // province.addEventListener('click', () => {
    //   const provinces = document.querySelectorAll('.select2-results__options li');
    // });

    mail.addEventListener('input', (event) => {
      if (event.target.value.length <= 0) {
        detailMail.innerHTML = `<span class="lda-grey ttu">nombre@ejemplo.com</span>`;
      } else {
        detailMail.innerHTML = `<span class="lda-brown">${event.target.value}</span>`;
      }
    });
  };

  const removeProducts = () => {
    let remove = document.querySelector('.product-remove');

    if (remove) {
      remove.querySelector('a').classList.add('barba-prevent');
    }
  };

  let color;

  const bgColor = () => {
    color = document.querySelector('main').getAttribute('bg-color');
    console.log(color)
    if (!color) {
      color = 'white'
    }
    let container = document.querySelector('body');
    let header = document.querySelector('header')
    if (color === "black") {
      container.classList.add(`bg-${color}`);
      header.classList.add(`bg-${color}`);
    } else {
      container.classList.remove(`bg-black`);
      header.classList.remove(`bg-black`);
    }
  }

  const fbTrack = () => {
    fbq('track', 'PageView');

    const wappTracker = () => {
        let trackers = document.querySelectorAll('a.no-deco');

        trackers.forEach(t => {
          t.addEventListener('click' ,()=> {
            fbq('track', 'Purchase_Ver Disponibilidad WS');
          })
        })
    }
    wappTracker();
  }

  const changeColorScroll = () => {
    let container = document.querySelector('body');
    let header = document.querySelector('header')

    const newColor = document.querySelectorAll("[bg-color='white']");
    document.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;

      let helper;
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        helper = 200
      } else {
        helper = window.innerHeight / 2
      }
      newColor.forEach(nc => {
        const colorChange = nc.offsetTop
        console.log(colorChange); console.log(currentScroll)
        if (colorChange < currentScroll + helper) {
          container.classList.add(`bg-white`);
          header.classList.add(`bg-white`);
          container.classList.remove(`bg-black`);
          header.classList.remove(`bg-black`);
        } else if (colorChange > currentScroll) {
          container.classList.remove(`bg-white`);
          header.classList.remove(`bg-white`);
          container.classList.add(`bg-black`);
          header.classList.add(`bg-black`);
        }
      })

    })

  }


  const initScripts = () => {
    if (pageName.classList.contains('home')) {
      // postAnimations();
    }

    bgColor();

    if (checkoutForm) {
      checkoutDetails();


      setTimeout(() => {
        document.querySelector('.wc_payment_method.payment_method_woo-mercado-pago-basic label').innerHTML = `<p class="tc mb3>Pagar con tu cuenta de Mercado Pago. Al tocar "finalizar compra" serás redirigido al portal de Mercado pago para pagar </p>
            <img src="https://mbgallery.local/wp-content/plugins/woocommerce-mercadopago/includes/../assets/images/mercadopago.png" alt="Paga con el medio de pago que prefieras">
            `;
      }, 5000);



    }
  };

  // postAnimations();
  initScripts();
  fbTrack();
  // googleAnalytics();
  allCursor();
  postAnimations();

  // changeFooter();
};

const moreAnchors = () => {
  let cursor = document.querySelector('.cursor');
  let newAnchors = Array.prototype.slice.call(document.querySelectorAll('.anchors'));
  let newA = Array.prototype.slice.call(document.querySelectorAll('a'));
  anchors = allAnchors.concat(newAnchors);
  anchors = allAnchors.concat(newA);

  // const hoverCursor = () => {
  //   console.log('move!');
  //   cursor.classList.add('is-hover');
  // };

  // const removeHoverCursor = () => {
  //   cursor.classList.remove('is-hover');
  //   cursor.classList.remove('is-shop');
  //   cursor.classList.remove('add-cart');
  // };

  // anchors.forEach((anchor) => {
  //   anchor.addEventListener('mouseover', () => {
  //     if (anchor.classList.contains('is-shoppable')) {
  //       cursor.classList.add('is-shop');
  //     } else if (anchor.classList.contains('single_add_to_cart_button')) {
  //       cursor.classList.add('add-cart');
  //     } else {
  //       hoverCursor();
  //     }
  //   });
  // });

  // anchors.forEach((anchor) => {
  //   anchor.addEventListener('mouseleave', () => {
  //     removeHoverCursor();
  //   });
  // });
};

const logo = () => {
  document.addEventListener('scroll', () => {
    let logo = document.querySelector('.logo');

    const currentScroll = window.pageYOffset;
    // logo.style.transform = 'rotate(' + window.pageYOffset / 4 + 'deg)';
  });
};


// Para páginas individuales de grados

let currentSlide = 0;

const homeSlide = () => {
  let slides = document.querySelectorAll('.home-slide >div.overflow-hidden >div');
  let containerSlides = document.querySelectorAll('.home-slide');
  let text = document.querySelectorAll('.slider-text>div:first-child');

  let indicators = document.querySelectorAll('.indicator');
  let timeIndicator = document.querySelectorAll('.indicator span span');
  let maxSlides = slides.length - 1;

  return new Promise((resolve) => {
    const timeline = gsap.timeline({
      defaults: {
        ease: Expo.easeOut,
        duration: 1.5,
      },
      onComplete() {
        currentSlide++;
        resolve();
      },
    });

    timeline
      .set(text.children, { opacity: 0 })
      .set(slides, { zIndex: 3 })
      .set(timeIndicator, { width: '0%' })
      .set(text[currentSlide].children, { opacity: 0, y: '50%' })
      .call(() => {

      })
      .set(slides[currentSlide], { scalex: 0, x: '-100%', zIndex: 4 })
      .to(timeIndicator[currentSlide], { width: '100%', duration: 10 })
      .to(slides[currentSlide], { scalex: 1, x: '0%' }, 0)
      .to(text[currentSlide].children, { opacity: 1, y: '0%', stagger: 0.1, duration: 2 }, 0.8)
      .call(() => {
        console.log(currentSlide)
        currentSlide++;

        if (currentSlide > maxSlides) {
          currentSlide = 0;
          indicators.forEach((i) => {
            i.classList.remove('active');
          });

          indicators.forEach((i) => {
            i.classList.remove('active');
          });
          indicators[currentSlide].classList.add('active');
        }

        console.log(currentSlide)
      });


    indicators.forEach((i) => {
      i.classList.remove('active');
    });
    indicators[currentSlide].classList.add('active');


  });
};

let currentPhrase = 0;

const phrase = () => {
  let phrases = document.querySelectorAll('.phrase > div');
  let firstPhrase = phrases[0].innerHTML;
  let phraseHeight = phrases[0].clientHeight;

  document.querySelector('.phrase').style.minHeight = phraseHeight + 'px';

  let maxPhrases = phrases.length - 1;

  const phraseTimeline = gsap.timeline({
    repeatDelay: 5,
    repeat: -1,
    defaults: {
      ease: Expo.easeOut,
      duration: 2.5,
    },
  });
  phraseTimeline
    .to(phrases[0], { opacity: 0, y: 40, duration: 0.8 })
    .call(() => {
      if (currentPhrase === 0) {
        phrases[0].innerHTML = firstPhrase;
      } else {
        phrases[0].innerHTML = phrases[currentPhrase].innerHTML;
      }
    })
    .to(phrases[0], { opacity: 1, y: 0, duration: 0.8 })
    .call(() => {
      currentPhrase++;
      if (currentPhrase > maxPhrases) {
        currentPhrase = 0;
      }
    });
};

const multiOptions = (instances, description, placeholder) => {
  let n;
  placeholder.innerHTML = description[0].innerText;
  instances[0].classList.add('selected');
  instances.forEach((i) => {
    i.addEventListener('mouseenter', () => {
      instances.forEach((i) => {
        i.classList.remove('selected');
      });

      n = instances.indexOf(i);
      let newDescription = description[n].innerText;

      i.classList.add('selected');

      const timeline = gsap.timeline({
        defaults: {
          ease: Expo.easeOut,
          duration: 0.5,
        },
      });

      timeline
        .to(placeholder, { opacity: 0, y: 20 })
        .call(() => {
          placeholder.innerHTML = newDescription;
        })
        .to(placeholder, { opacity: 1, y: 0 });
    });
  });
};


const changeFooter = () => {
  let footer = document.querySelector('footer');

  let colors = {
    0: {
      'background-color': '#fbcb26',
    },

    1: {
      'background-color': '#fbcb26',
    },
    2: {
      'background-color': '#654a8a',
    },
    3: {
      'background-color': '#7cb1e6',
    },
  };

  let randomNumber = Math.floor(Math.random() * 4);

  if (docuHeight < 4500) {
    // document.querySelector('footer > h1').classList.add('dn');
  } else {
    // document.querySelector('footer > h1').classList.remove('dn');
  }

  footer.style.backgroundColor = colors[randomNumber]['background-color'];
};

const filterBy = () => {
  let posts = document.querySelectorAll('.exhibit-archive');

  posts.forEach((p) => {
    // console.log(p);
    let date = p.getAttribute('year');
    let year = date.split(' ');
    console.log(year[1]);
    // let year = document.querySelectorAll;
  });
};

// filterBy();

const openBio = () => {
  let bioTrigger = document.querySelector('.bio-trigger');
  let bioClose = document.querySelector('#close-bio');
  let bio = document.querySelector('.artist-bio-container');

  bioTrigger.addEventListener('click', () => {
    bio.classList.remove('dn');
    bio.classList.add('flex');
    bio.classList.remove('pointers-none');
  });

  bioClose.addEventListener('click', () => {
    bio.classList.add('dn');
    bio.classList.remove('flex');
    bio.classList.add('pointers-none');
  });
};

const openBioCurador = () => {
  let bioTrigger = document.querySelector('.bio-trigger-curador');
  let bioClose = document.querySelector('#close-bio-curador');
  let bio = document.querySelector('.artist-bio-container.curador-bio');

  bioTrigger.addEventListener('click', () => {
    bio.classList.remove('dn');
    bio.classList.add('flex');
    bio.classList.remove('pointers-none');
  });

  bioClose.addEventListener('click', () => {
    bio.classList.add('dn');
    bio.classList.remove('flex');
    bio.classList.add('pointers-none');
  });
};

const playAudio = () => {
  let audioTrigger = document.querySelector('.audio-container');
  let waves = audioTrigger.querySelectorAll('.audio-effect');
  let text = audioTrigger.querySelector('h2');
  let isPlaying = false;
  let audio = audioTrigger.querySelector('#myAudio');

  let audioTl = new TimelineMax({
    defaults: {
      duration: 2,
      ease: Expo.EaseOut,
    },
    repeat: -1,
    paused: true,
  });

  audioTl.to(waves, { opacity: 0, scale: 1.8, stagger: 0.5 });

  audioTrigger.addEventListener('click', () => {
    if (!isPlaying) {
      text.innerHTML = 'Pausar';
      isPlaying = true;
      audio.play();
      audioTl.play();
    } else {
      isPlaying = false;
      text.innerHTML = 'Play';
      audioTl.pause();
      audio.pause();
    }
  });
};


const closeSideCart = () => {
  document.querySelector('.wsc-modal').classList.remove('wsc-active');
  document.querySelector('body').classList.remove('wsc-active');
};

const filterByLinks = () => {
  let triggers = document.querySelectorAll('.filters-mb p');
  let obrasContainer = document.querySelector('.artist-obras ul')
  let obras = document.querySelectorAll('.obra-artista');
  // let instock = document.querySelectorAll('.instock');
  // let nostock = document.querySelectorAll('.outofstock');
  let noProducts = false;

  triggers.forEach((t) => {
    t.addEventListener('click', () => {
      let status = t.getAttribute('filter');


      let filterTl = gsap.timeline({
        defaults: {
          ease: Expo.easeOut,
          duration: 0.4
        },
      });

      filterTl.to(obrasContainer, { opacity: 0, y: 40 }, 0)
        .to(obrasContainer, { opacity: 1, y: 0 }, 1)

      let match = document.querySelectorAll(`.obra-artista.${status}`);

      if (match.length > 0) {
        obras.forEach((o) => {
          o.classList.add('dn');
        });
        match.forEach((m) => {
          m.classList.remove('dn');
        });

        triggers.forEach((t) => {
          t.classList.remove('active');
        });
        t.classList.add('active');
      } else if (status === 'all') {
        obras.forEach((o) => {
          o.classList.remove('dn');
        });

        triggers.forEach((t) => {
          t.classList.remove('active');
        });
        t.classList.add('active');

        noProducts = false;

      } else {
        noProducts = true;
      }

      if (noProducts) {
        alert('no hay productos disponibles');
      }
    });
  });
};

const Menu = () => {
  const onScroll = () => {
    let container = document.querySelector('header');
    let prevScroll = 0;
    document.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;

      if (currentScroll < 100) {
        container.classList.remove('scrolled');
      } else if (currentScroll > 100 && prevScroll < currentScroll) {
        container.classList.add('scrolled');
      } else if (prevScroll - 15 > currentScroll) {
        // container.classList.remove('scrolled');
      }

      prevScroll = currentScroll;
    });
  };
  onScroll();
};

Menu();

const interview = () => {
  let questionContainer = document.querySelectorAll('.interview-q-container');
  questionContainer.forEach(q => {
    let question = q.querySelector('.interview-q')
    if (q.clientHeight > window.innerHeight - 150) {
      question.classList.add('sticky')
    }
  })
}

const sebas = () => {
  let path = window.location.pathname;
  let sebasOpener = document.querySelector('#sebas-container');
  let sebasSubmit = document.querySelector('#sebas-forever')

  console.log(Cookies.get('name'))

  if (Cookies.get('name') === 'sebas') {
    console.log('sebas!');
  } else {
    sebasOpener.classList.remove('o-0');
    sebasOpener.classList.remove('pointers-none');
    sebasOpener.classList.add('flex');
    sebasSubmit.addEventListener('click', () => {
      sebasOpener.classList.add('o-0');
      sebasOpener.classList.add('pointers-none');
      Cookies.set('name', 'sebas', { expires: 365, path: '/' })
    });
  }
}


const openingsCookies = () => {
  let path = window.location.pathname;
  let preOpening = document.querySelector('.pre-opening-container');
  let openingSumbit = document.querySelector('#mc-embedded-subscribe')
  let response = document.querySelector('#mce-success-response');
  let responseError = document.querySelector('#mce-error-response');
  let html = document.querySelector('html');
  let body = document.querySelector('body');


  path = path.split('/')
  let newCookie = path[2];

  let logo = document.querySelector('.logo');
  console.log(Cookies.get('opening'))
  if (Cookies.get('opening') === newCookie) {
    console.log('cookied!');
    // pre-opening show
    preOpening.classList.add('o-0');
    preOpening.classList.add('pointers-none');
    body.style.height = "";
    html.style.height = ''

  }
  else {

    preOpening.classList.remove('o-0');
    preOpening.classList.remove('pointers-none');
    body.style.height = "100%";
    body.style.overflow = "hidden";
    html.style.height = '100%'

    openingSumbit.addEventListener('click', (e) => {
      setTimeout(() => {
        // preopening hide
        if (response.style.display != 'none') {
          console.log('click');
          preOpening.classList.add('o-0');
          preOpening.classList.add('pointers-none');
          Cookies.set('opening', newCookie, { expires: 365, path: '/' })

          body.style.height = "";
          html.style.height = '';
          body.style.overflow = "";



        } else if (responseError.innerText.indexOf('already subscribed') >= 0 || responseError.innerText.indexOf('too many recent') >= 0) {
          responseError.classList.add('dn')
          preOpening.classList.add('o-0');
          preOpening.classList.add('pointers-none');
          Cookies.set('opening', newCookie, { expires: 365, path: '/' })
          body.style.height = "";
          html.style.height = '';
          body.style.overflow = "";



        }
        else {
          alert('Hubo un error en tu solicitud. Por favor refresca la página y volvé a intentarlo');
          window.location.replace(window.location.href);
        }
      }, 1000);
    });
  }
}

const obrasDisponibles = () => {
  let obrasTrigger = document.querySelector('#obras-trigger');
  let obras = document.querySelector('.obras-disponibles');
  let closeObras = document.querySelector('#close-obras');

  if (obras) {
    obrasTrigger.addEventListener('click', () => {
      obras.classList.add('open');
      closeObras.classList.remove('o-0');
      closeObras.classList.remove('pointers-none');
    })
    closeObras.addEventListener('click', () => {
      obras.classList.remove('open');
      closeObras.classList.add('o-0');
      closeObras.classList.add('pointers-none');
    })
  }
}


const contact = () => {
  let hrefs = document.querySelectorAll('a');
  hrefs.forEach((a) => {
    if (a.href.indexOf('/contacto') > -1) {
      a.classList.add('barba-prevent');
      a.addEventListener('click', (e) => {
        e.preventDefault();

        let timeline = gsap.timeline({
          defaults: {
            easing: Expo.EaseOut,
            duration: 0.5,
          },
        });

        timeline
          .set(container, { pointerEvents: 'all', opacity: 1 })
          .set(contact, { x: '100%' })
          .set(bg, { opacity: 0 })
          .to(contact, { x: '0' }, 0)
          .to(bg, { opacity: 1 }, 0.4);
      });
    }
  });
  let close = document.querySelector('#close-contact');
  let bg = document.querySelector('.contact-bg');
  let contact = document.querySelector('.contact-content');
  let container = document.querySelector('.contact-form-container');

  close.addEventListener('click', () => {
    let timeline = gsap.timeline({
      defaults: {
        easing: Expo.EaseOut,
        duration: 0.5,
      },
    });

    timeline
      .set(container, { pointerEvents: 'none' })
      .to(contact, { x: '100%' })
      .to(bg, { opacity: 0 }, 0);
  });
};

const animateHome = () =>{
  let background = document.querySelector('.bg-color-ball');
  let children = Array.prototype.slice.call(document.querySelector('.home-starter > div').children);
  let image = document.querySelector('.home-starter div.absolute-cover')

  const homeTimeline = gsap.timeline({
    defaults: {
      ease: Expo.easeOut,
      delay: 1,
    },
  });
  homeTimeline
  .to(background, {y: 0, duration: 1, ease: Power4.easeOut},0)
  .to(image, {opacity: 1, y: 0, duration: 1, ease: Power4.easeOut}, 1.2)
  .to(children, {opacity: 1, y: 0, stagger: 0.1, duration: 1,}, 1.6);
}

const gallery = () => {
  let gal = document.querySelector('.marco-gallery');
  let cursor = document.querySelector('.cursor')

  gal.addEventListener('mouseenter', ()=> {
    cursor.classList.add('is-scroll-h');
  })

  gal.addEventListener('mouseleave', ()=> {
    cursor.classList.remove('is-scroll-h');
  })
}



const animateMarco = () =>{
  let background = document.querySelector('.bg-color-ball');
  let children = Array.prototype.slice.call(document.querySelector('.home-starter > *').children);
  let image = document.querySelector('.home-starter img');


const marcoTL = gsap.timeline({
  defaults: {
    ease: Expo.easeOut,
    delay: 1,
  },
});
marcoTL
.set (image, {opacity: 0, y: "60px", height: 100})
.to(background, {width: '3000px', height: '3000px', duration: 2.5, ease: Power4.easeOut},0)
.to(children, {opacity: 1, y: 0, stagger: 0.1, duration: 1,}, 0.55)
// .to(image, {opacity: 1, y: 0, duration: 1, ease: Power4.easeOut}, 0.75)

}


barba.init({
  timeout: 5000,
  prevent: ({ el }) => el.classList.contains('barba-prevent'),
  transitions: [
    {
      leave({ current, next, trigger }) {
        // let cursor = document.querySelector('.cursor');
        // cursor.classList.remove('is-hover');
        // cursor.classList.remove('is-shop');
        // cursor.classList.remove('add-cart');
        // closeSideCart();
        // closeMenu();

        return new Promise((resolve) => {
          const timeline = gsap.timeline({
            defaults: {
              ease: Expo.easeOut,
            },
            onComplete() {
              current.container.remove();
              resolve();
            },
          });
          timeline
            .call(() => {
              preLoad[0].classList.add('animate');
            })
            .set(preLoad, { x: '100%', opacity: '1' })
            .to(current.container, { opacity: 0.6, x: '-10%', duration: 2 }, 0)
            .to(preLoad[0], { x: '0%', ease: Power4.easeOut, duration: 1.5 }, 0);
        });
      },
      enter({ current, next, trigger }) {
        return new Promise((resolve) => {
          window.scrollTo({
            top: 0,
          });
          runScripts();
          const timeline = gsap.timeline({
            onComplete() {
              resolve();
            },
            defaults: {
              duration: 2,
              ease: Expo.easeOut,
            },
          });

          timeline
            .call(() => {
              preLoad.classList.remove('animate');
            })
            .set(next.container, { opacity: 0, x: '10%' })
            .to(preLoad, { x: '-100%', opacity: 1, duration: 2.3 }, 0)
            .to(next.container, { opacity: 1, x: '0' }, 0.5);
        });
      },  
    },

  ],
  views: [
    {
      namespace: 'home',
      afterEnter(data) {
        animateHome();
        gallery();

      },
    },
    {
      namespace: 'marco',
      afterEnter(data) {
       animateMarco();
      },
    }, 
  ],
  debug: true,
});

runScripts();




// 

// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});




