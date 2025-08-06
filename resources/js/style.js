
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







window.productSearch = productSearch;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
