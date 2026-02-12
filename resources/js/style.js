
//counter home
document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.counter');

  const startCounter = (counter) => {
    const target = +counter.getAttribute('data-target');
    let current = 0;
    const increment = Math.ceil(target / 100);

    const update = () => {
      if (current < target) {
        current += increment;
        counter.innerText = current > target ? target : current;
        setTimeout(update, 20);
      } else {
        counter.innerText = target;
      }
    };

    update();
  };

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        startCounter(counter);
        observer.unobserve(counter);
      }
    });
  }, { threshold: 0.6 });

  counters.forEach(counter => {
    observer.observe(counter);
  });
});



// per gallery

document.addEventListener("DOMContentLoaded", function () {
  const images = Array.from(document.querySelectorAll('[data-image]'));
  let currentIndex = 0;
  const modalImage = document.getElementById('modalImage');

  images.forEach((img, index) => {
    img.addEventListener('click', () => {
      currentIndex = index;
      modalImage.src = img.dataset.image;
    });
  });

  document.getElementById('prevImage').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    modalImage.src = images[currentIndex].dataset.image;
  });

  document.getElementById('nextImage').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % images.length;
    modalImage.src = images[currentIndex].dataset.image;
  });
});
// Modifica prodotto 
document.addEventListener('DOMContentLoaded', function () {
  window.Livewire.on('scrollToForm', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const successToastEl = document.getElementById('successToast');
  if (successToastEl) {
    const toast = new bootstrap.Toast(successToastEl);
    toast.show();
  }
});

//Ricerca prodotto
function productSearch(initialProducts = []) {
  return {
    query: '',
    results: [...initialProducts],  // carica i prodotti iniziali
    search() {
      if (this.query.trim().length < 1) {
        this.results = [...initialProducts]; // torna alla lista iniziale se campo vuoto
        return;
      }
      fetch(`/search-products?q=${encodeURIComponent(this.query)}`)
        .then(res => res.json())
        .then(data => {
          this.results = data;
        });
    },
    truncate(text, maxLength) {
      return text.length > maxLength ? text.substring(0, maxLength) + '…' : text;
    },
    formatPrice(price) {
      return parseFloat(price).toFixed(2).replace('.', ',');
    }
  };
}
//Drawer recensioni laterale
document.addEventListener('DOMContentLoaded', () => {
  const drawer = document.getElementById('reviewDrawer');
  const overlay = document.getElementById('drawerOverlay');
  const openBtn = document.getElementById('openReviewDrawer');
  const closeBtn = document.getElementById('closeDrawerBtn');

  function openDrawer() {
    drawer.classList.add('open');
    overlay.classList.add('active');
  }

  function closeDrawer() {
    drawer.classList.remove('open');
    overlay.classList.remove('active');
  }

  openBtn.addEventListener('click', e => {
    e.preventDefault();
    openDrawer();
  });

  closeBtn.addEventListener('click', () => {
    closeDrawer();
  });

  overlay.addEventListener('click', () => {
    closeDrawer();
  });


  Livewire.on('closeModal', () => {
    setTimeout(() => {
      closeDrawer();
    }, 2500);
  });
});
  //testo recensioni
document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
// mosaic.js - reveal sequenziale lento con IntersectionObserver
document.addEventListener("DOMContentLoaded", function() {
  const imgs = Array.from(document.querySelectorAll(".m-img"));

  // assegna order/index per ritardo progressivo (righe/colonne non influenzano)
  imgs.forEach((img, i) => {
    img.dataset.idx = i;
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        const i = parseInt(img.dataset.idx, 10) || 0;
        // ritardo progressivo + leggero extra per look elegante
        setTimeout(() => img.classList.add("visible"), i * 200);
        observer.unobserve(img); // play once per immagine
      }
    });
  }, { threshold: 0.2 });

  imgs.forEach(img => observer.observe(img));
});

document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.reviews-track');
    const originalSlides = Array.from(document.querySelectorAll('.review-slide'));
    let index = 0;
    let slideWidth = 0;
    let interval;

    function getVisible() {
        const w = window.innerWidth;
        if (w < 576) return 1;      // mobile
        if (w < 992) return 2;      // tablet
        return 3;                    // desktop
    }

    function setup() {
        const visible = getVisible();
        index = 0;
        track.style.transition = 'none';
        track.style.transform = 'translateX(0)';

        // reset track e cloni per loop infinito
        track.innerHTML = '';
        const slides = originalSlides.map(slide => slide.cloneNode(true));
        slides.forEach(slide => track.appendChild(slide));
        slides.forEach(slide => track.appendChild(slide.cloneNode(true))); // duplico tutte le slide

        // aggiorno flex
        Array.from(track.children).forEach(slide => {
            slide.style.flex = `0 0 ${100 / visible}%`;
        });

        // larghezza reale della slide
        const firstSlide = track.querySelector('.review-slide');
        slideWidth = firstSlide.getBoundingClientRect().width;

        // scroll automatico
        if (interval) clearInterval(interval);
        startAutoScroll(visible);
    }

    function startAutoScroll(visible) {
        const childrenCount = track.children.length;
        interval = setInterval(() => {
            index++;
            track.style.transition = 'transform 1s linear';
            track.style.transform = `translateX(-${index * slideWidth}px)`;

            if (index >= childrenCount / 2) { // reset al primo duplicato
                setTimeout(() => {
                    track.style.transition = 'none';
                    index = 0;
                    track.style.transform = 'translateX(0)';
                }, 1000);
            }
        }, 3000);
    }

  // CONTATORE ANNO DINAMICO AUTO
    // Imposta l'anno di partenza
const startYear = 2016;

// Data odierna
const today = new Date();
let experienceYears = today.getFullYear() - startYear;

// Aggiorna a marzo ogni anno
if (today.getMonth() < 2) { // Gennaio=0, Febbraio=1
    experienceYears -= 1;
}

// Aggiorna l'attributo data-target del contatore
const counterElement = document.querySelector('.counter[data-target="experience"]');
if (counterElement) {
    counterElement.setAttribute('data-target', experienceYears);
}


    setup();
    window.addEventListener('resize', setup);
});













window.productSearch = productSearch;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
