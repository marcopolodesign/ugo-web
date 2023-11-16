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
  // console.log(pageName);
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

        threshold: [0.25, 1],
      }
    );

    homeBlocks.forEach((post) => {
      observer.observe(post);
    });

    homeContent.forEach(content => {
      let children = Array.prototype.slice.call(content.children);
      children.forEach((c, index) => {
        const delay = index * -80;
        content.style.transitionDelay = delay + 650 + 'ms';
      })
    })
  };

  function googleAnalytics() {
    gtag('event', 'page_view', {
      page_location: 'https://www.ugo.com.ar',
      page_path: window.location.pathname,
      send_to: 'G-9WN369K0SS',
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
        t.addEventListener('click', () => {
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

  const stepsiPhone = ()=> {
    let steps = Array.prototype.slice.call(document.querySelectorAll('.step'));
    let holder = document.querySelectorAll('.steps-image img');

    steps[0].classList.remove('not-active');
    holder[0].classList.remove('not-active');

    let n;

    steps.forEach(s => {
      s.addEventListener('mouseenter' , (index) => {
        n = steps.indexOf(s);

        steps.forEach(s => {
          s.classList.add('not-active')
        })

        holder.forEach(h => {
          h.classList.add('not-active')
        })
        
        steps[n].classList.remove('not-active');
        holder[n].classList.remove('not-active');

      })
    })
  }


  const initScripts = () => {
    if (pageName.classList.contains('home')) {
      // postAnimations();
    
    // bgColor();
    }

    // Reusable FN's

    let hasStepsBlock = document.querySelector('.steps-container');

    if (hasStepsBlock) {
      stepsiPhone();
    }
  };

  // postAnimations();
  initScripts();
  fbTrack();
  googleAnalytics();
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

let pos = 2;
const moveCarrousel = () => {
  let arrow = document.querySelector('.foward-arrow');
  let leftArrow = document.querySelector('.back-arrow');

  let container = document.querySelectorAll('.marco-carrousel>div:first-child');
  let isFoward = false;
  let isBack = false;
  let distance = document.querySelector('.gallery-home-image').clientWidth;

  window.addEventListener('resize', () => {
    distance = document.querySelector('.carrousel-image').clientWidth;
  });


  let maxMovement = document.querySelectorAll('.carrousel-image').length - 1;

  container[0].style.left = (distance * -1) + "px";


  arrow.addEventListener('click', () => {
    leftArrow.classList.remove('o-0');
    leftArrow.classList.remove('pointers-none');

    if (isBack) {
      pos = pos + 1;
      isBack = false;
    }

    isFoward = true;

    container.forEach((c) => {
      if (pos <= 2) {
        c.style.left = pos * (distance * -1) + 'px';
        newPos = c.style.left;
        console.log(newPos);
      }
    });

    if (pos <= maxMovement) {
      pos++;
    }

    console.log(pos);
  });

  leftArrow.addEventListener('click', () => {
    if (isFoward) {
      pos = pos - 1;
      isBack = true;
      isFoward = false;
    }
    container.forEach((c) => {
      if (pos >= 1) {
        c.style.left = pos * (distance * -1) + distance + 'px';
      }
    });


    if (pos === 0) {
      leftArrow.classList.add('o-0');
      pos = 0;
      console.log('is-nlll')
    } else {
      pos--;
    }

    console.log(pos);
  });
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
  if (!pageName.classList.contains('success')) {
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
}
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

const animateHome = () => {
  let background = document.querySelector('.bg-color-ball');
  let children = Array.prototype.slice.call(document.querySelector('.hp-starter > div').children);
  let image = document.querySelector('.home-starter div.absolute-cover')

  const homeTimeline = gsap.timeline({
    defaults: {
      ease: Expo.easeOut,
      delay: 1,
    },
  });
  homeTimeline
    .to(background, { y: 0, duration: 1, ease: Power4.easeOut }, 0)
    .to(image, { opacity: 1, y: 0, duration: 1, ease: Power4.easeOut }, 1.2)
    .to(children, { opacity: 1, y: 0, stagger: 0.1, duration: 1, }, 1.6);
}

const gallery = () => {
  let gal = document.querySelector('.marco-gallery');
  let cursor = document.querySelector('.cursor')

  gal.addEventListener('mouseenter', () => {
    cursor.classList.add('is-scroll-h');
  })

  gal.addEventListener('mouseleave', () => {
    cursor.classList.remove('is-scroll-h');
  })
}



const animateMarco = () => {
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
    .set(image, { opacity: 0, y: "60px", height: 100 })
    .to(background, { width: '3000px', height: '3000px', duration: 2.5, ease: Power4.easeOut }, 0)
    .to(children, { opacity: 1, y: 0, stagger: 0.1, duration: 1, }, 0.55)
  // .to(image, {opacity: 1, y: 0, duration: 1, ease: Power4.easeOut}, 0.75)

}

const carrousel = () => {
  let slider = document.querySelector('.marco-carrousel > div');
  let controllers = Array.prototype.slice.call(document.querySelectorAll('.dot'));

  controllers.forEach((c, i) => {
    c.addEventListener('click', () => {
      slider.style.transitionDelay = "0s !important"
      controllers.forEach(c => {
        c.classList.remove('active')
      });
      c.classList.add('active');
      if (i < 0) {
        slider.style.left = "80vw"
      } else {
        slider.style.left = i * -86 + "vw";
      }
    })
  })
}

carrousel();


const homeGallery = () => {
  // set up some general x-position and tweening speeds
  let aimX = 0
  let currentSpeed = 0.1
  let aimSpeed = 0.5
  
  // pick the section and div from the HTML
  const section = document.querySelector(".gallery-home")
  const holder = section.querySelector(".gallery-home-image")
  
  // // we need to fill moreeee so lets clone
  // // we need three here but could be two if each holder is bigger than the page width
  // const clone = holder.cloneNode(true)
  // section.appendChild(clone)
  
  // const clone2 = holder.cloneNode(true)
  // section.appendChild(clone2)
  
  // now collect all 3 holders
  const holders = section.querySelectorAll(".gallery-home-image");
  
  // and calculate a single width and total width of them
  const holderWidth = holder.clientWidth
  const totalWidth = holderWidth * holders.length
  
  // we need to animate each frame
  const animate = function () {
    // add tweening speed with a damping of 0.05
    currentSpeed += (aimSpeed - currentSpeed) * 0.01
    
    // change the x position based on current speed
    aimX = aimX + currentSpeed
     
    // for each of the content divs 
    holders.forEach((holder, index) => {
      // make a general left position based on...
      // the general x position
      // then add in a spacing for each one,
      // e.g. 0, 1000 and 2000 if we have 0 aimX and 1000px divs
      let leftPosition = (-1 * aimX + index * holderWidth)
      // they need to loop though, otherwise they'll just go off screen forever    
      // so lets add an offset to push them back over
      let offset = Math.floor((leftPosition + holderWidth) / totalWidth) * totalWidth
      // then add that offset based on the total width
      // negative as we're reducing the position
      leftPosition += (-1 * offset)
      // set a position
      holder.style.left = leftPosition + "px"
    })
    
    // do each frame
    requestAnimationFrame(animate)
  }
  
  // change the aimspeed to be lower
  // so that the current speed tweens towards this
  section.addEventListener("mousemove", function (event) {
    // if you just wanna stop on hover...
    // aimSpeed = 0
    // -1 on left edge, 0 in middle, 1 on right edge
    let normalize = (2 * (event.pageX / window.innerWidth) - 1)
    // 5 to -5
    aimSpeed = -2 * normalize
  })
  
  //
  // and back up to default on mouseout
  section.addEventListener("mouseout", function () {
    aimSpeed = 0.5
  })
  
  animate()
}

const marquee = () => {
  let svg = document.querySelector('.marquee').innerHTML
  let marqueeTitle = new Array(6).fill(svg).join(" ");

  document.querySelectorAll('.marquee').forEach(m => {
    m.innerHTML = marqueeTitle
  })
}

// const wallpapers = gsap.utils.toArray('.wallpaper-images-container > div');
//     const wallpaperTL = gsap.timeline({ repeat: -1, });
//     wallpapers.forEach((w, i) => {
//         wallpaperTL
//             // .set(w, { clipPath: 'inset (100% 0 0 )' })
//             .to(w, { clipPath: "inset(0)", duration: .6, ease: 'power1.out' })
//             .to(w, { duration: 9.8 })
//     });

//     var i = 0



const paradiseSlider = () => {
  let images = document.querySelectorAll('.hp-slider > div');
  let color;

  // let hpImages = gsap.timeline({
  //   defaults: {
  //     ease: "power4.inOut",
  //     duration: 0.8,
  //   }, 
  //   repeat: -1,
  //   repeatDelay: 5,
  // })
  

  images[images.length - 1].classList.add('active')



  i = 0;

  setInterval(() => {
    images.forEach((img, index) => {
        if (i != index) {
          img.classList.remove('active');
        }


    images[i].classList.add('active');
    color = images[i].getAttribute('color');
    
    document.querySelector('.hp-starter > div:last-child').style.backgroundColor = color;
    })

    if ( i >= images.length - 1) {
      i = 0
    } else {
      i++;
    }


  }, 5000);


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
      namespace: 'hp',
      afterEnter(data) {
        // animateHome();
        homeGallery();
        marquee();
        paradiseSlider();
        // moveCarrousel();

      },
    },
    {
      namespace: 'app',
      afterEnter(data) {
        let featuresContainer = document.querySelector('.app-features');
        let elements = Array.prototype.slice.call(featuresContainer.children);
        console.log(featuresContainer.offsetHeight);
        console.log(featuresContainer.offsetTop);
        
        
        document.addEventListener('scroll', (e)=> {
          let scroll = window.scrollY + window.innerHeight / 1.3;
         
          if (scroll > featuresContainer.offsetTop && featuresContainer.offsetTop + featuresContainer.offsetHeight  > scroll - 600) {
            // let percentScrolled = window.scrollY / window.innerHeight;
         
            elements.forEach((el, index) => {
              el.classList.add('transform');
              const delay = index * 100;
              el.style.transitionDelay = delay  + 'ms';
            })
          } else {
            elements.forEach(el => {
              el.classList.remove('transform')
            })
          }
        })
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


const instagram = () => {
  let fields = 'id,username,media_type,media_url,timestamp,permalink'

  const accessToken = 'IGQWRPelJZAQlFfdjlZAMmg4SXkzYm1tYWRKb0h0b0hrLXVVTHZADamhvUGVtcXVBUVQ1NmlxM1BBUHdTRXNtamE5eWtuSGZAyYW5TdlBnM0xoS1NKdFlyajFGOEdRRlJXSThwbkxIdVJVSGJmUndyNmVkakJzdnB6YWcZD';


  const superHiApi = `https://api.superhi.com/api/test/token/instagram?access_token=${accessToken}`


  const sectionTag = document.querySelector('.instagram-feed');
  let newToken;

  const refreshToken = () => {
    return fetch (superHiApi)
    .then((response)=> response.json())
    .then((token)=> {
     return token.access_token
    }
   ); 
  }
  refreshToken();

  const getGram = async () => {
    newToken = await refreshToken()

    const apiUrl = `https://graph.instagram.com/me/media?fields=${fields}&access_token=${newToken}`;
    return fetch(apiUrl, {
      count: 5
    })
    .then((response) => response.json())
    .then((data) => {
      console.log(data)
      if (!data.error) {
      sectionTag.innerHTML = '';
      data.data.slice(0, 5).forEach((post) => {
        if (post.media_type === "VIDEO") {
          sectionTag.innerHTML =
          sectionTag.innerHTML +
          `<div class="flex flex-column">
            <a rel="noreferrer noopener" class="relative w-100" target="_blank" href="${post.permalink}">
            <video preload="true" autoplay="true" muted="true" loop="true" src="${post.media_url}"></video>
            </a>
          </div>`;
        } else { 
          sectionTag.innerHTML =
            sectionTag.innerHTML +
            `<div class="flex flex-column">
                <a class="relative w-100" target="_blank" href="${post.permalink}">
              <div class='absolute-cover cover no-repeat bg-center' style='background-image: url("${post.media_url}")'></div>
              </a>
            </div>
          `;
        }
        });
        }
    
      // setTimeout(() => {
      //   let width = document.querySelector('.instagram-feed div a').clientWidth;
      // //   document.querySelectorAll('.instagram-feed div a').forEach((post) => {
      // //     post.style.height = width + 'px';
      // //   });

      //   document.querySelectorAll('.instagram-feed div video').forEach((post) => {
      //     post.style.height = width + 50 + 'px';
      //   });
        
      // }, 1000);
      // window.addEventListener('resize', () => {
      //   width = document.querySelector('.instagram-feed div a').clientWidth;
      //   console.log(width);
      //   document.querySelectorAll('.instagram-feed div a').forEach((post) => {
      //     post.style.height = width + 'px';
      //   });

      //   document.querySelectorAll('.instagram-feed div video').forEach((post) => {
      //     post.style.height = width + 'px';
      //   });

      // });
    });
  }
  getGram()
};

// instagram();



const getPaymentID = () => {

  if (pageName.classList.contains('success')) {
      let id = window.location.search;
      let params = new URLSearchParams(id) 

      console.log(params)


      let totalAmount = params.get('total_amount')
      let status = params.get('status');
      let linkingUrl = params.get('linking_url');
      let paymentId = params.get('payment_id');

      // insert inside HTML

      document.querySelector('#price-header').innerHTML = totalAmount
      document.querySelector('#payment-id').innerHTML = paymentId
      document.querySelector('#payment-status').innerHTML = status
      document.querySelector('#payment-total').innerHTML = totalAmount
      document.querySelector('#back-to-app').setAttribute('href', linkingUrl);
     

      console.log(status)
}
}
getPaymentID();



const faqQuestions = () => {

  const faq = document.querySelectorAll('.faq-item');  
  faq.forEach(q => {
    let isExpanded = q.getAttribute('area-expanded');
    q.addEventListener('click', (e)=> {
      let answer = q.querySelector('.faq-answer');
      let answerContent = answer.querySelector('p');
      let arrow = q.querySelector('svg');

      let height = answer.querySelector('p').clientHeight ;   

      let faq = gsap.timeline({
        defaults: {
          easing: Expo.EaseOut,
          duration: 0.2,
        },
      })

      if (!isExpanded) {
        faq
        // .to(arrow, {transform: 'rotate(-90deg)'})
        .to (answer, { opacity: 0})  
        .to (answerContent, {marginTop: '0px', marginBottom: "0px"}, 0)
        .to (answer, {maxHeight: "0", opacity: 0}, 0.05)
      

          isExpanded = true;  
      } else {
        faq
        // .to(arrow, {transform: 'rotate(0deg)'})
        .to (answer, {maxHeight: height})
        .to (answer, { opacity: 1}, 0)
        .to (answerContent, {marginTop: '10px', marginBottom: "10px"}, 0)
        isExpanded = false;  
      }          
      q.setAttribute('area-expanded', !isExpanded);

    })
  })
}


faqQuestions();