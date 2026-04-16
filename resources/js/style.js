
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
document.addEventListener("DOMContentLoaded", function () {
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
  const startYear = 2017;

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

  window.addEventListener('error', function (e) {
    if (e.response && e.response.status === 419) {
      alert('La sessione è scaduta. Aggiorna la pagina per continuare.');
      window.location.reload();
    }
  });



  setup();
  window.addEventListener('resize', setup);
});

// ===============================
// GALLERY UPLOAD
// ===============================

document.addEventListener('DOMContentLoaded', () => {

  const form = document.getElementById('galleryUploader');
  if (!form) return;

  const input = document.getElementById('imageInput');
  const bar = document.getElementById('uploadBar');
  const percent = document.getElementById('uploadPercent');
  const box = document.getElementById('uploadBox');
  const btn = document.getElementById('uploadBtn');

  if (!input) return;

  // 🔥 FIX IMPORTANTE: prendi il componente GIUSTO
  const component = window.Livewire.find(
    form.closest('[wire\\:id]').getAttribute('wire:id')
  );

  if (!component) {
    console.error('Livewire component non trovato');
    return;
  }

  input.addEventListener('change', function (e) {

    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    const img = new Image();

    reader.onload = (event) => {
      img.src = event.target.result;
    };

    reader.readAsDataURL(file);

    img.onload = () => {

      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');

      const maxWidth = 1200;

      let width = img.width;
      let height = img.height;

      if (width > maxWidth) {
        height = height * (maxWidth / width);
        width = maxWidth;
      }

      canvas.width = width;
      canvas.height = height;

      ctx.drawImage(img, 0, 0, width, height);

      canvas.toBlob((blob) => {

        const compressedFile = new File([blob], file.name, {
          type: 'image/jpeg',
          lastModified: Date.now()
        });

        // ===============================
        // UI ON
        // ===============================
        box.style.display = 'block';
        btn.disabled = true;

        bar.style.width = '0%';
        percent.innerText = '0%';

        // ===============================
        // LIVEWIRE UPLOAD SAFE
        // ===============================
        component.upload(
          'image',
          compressedFile,

          // SUCCESS
          () => {
            btn.disabled = false;
            percent.innerText = "100%";
            bar.style.width = "100%";

            setTimeout(() => {
              box.style.display = 'none';
              bar.style.width = '0%';
              percent.innerText = '0%';
            }, 1200);
          },

          // ERROR
          () => {
            btn.disabled = false;
            percent.innerText = "Errore";
          },

          // PROGRESS
          (event) => {
            const progress = event.detail.progress;
            bar.style.width = progress + '%';
            percent.innerText = progress + '%';
          }

        );

      }, 'image/jpeg', 0.75);
    };
  });
});









window.productSearch = productSearch;
