document.addEventListener('DOMContentLoaded', () => {
    let counterStarted = false;

    window.addEventListener('scroll', () => {
        const numberElement = document.getElementById('counter-number');
        const counterContainer = document.getElementById('counter');

        if (!numberElement || !counterContainer) return;

        const rect = counterContainer.getBoundingClientRect();

        if (!counterStarted && rect.top < window.innerHeight) {
            counterStarted = true;

            let value = 0;
            const endValue = 370;
            const duration = 1000; // durata in ms
            const stepTime = 10;
            const increment = endValue / (duration / stepTime);

            const interval = setInterval(() => {
                value += increment;
                if (value >= endValue) {
                    value = endValue;
                    clearInterval(interval);
                }
                numberElement.textContent = Math.floor(value);
            }, stepTime);
        }
    });
});

// per gallery

document.addEventListener('DOMContentLoaded', function () {
    const imageElements = Array.from(document.querySelectorAll('[data-image]'));
    const modalImage = document.getElementById('modalImage');
    const prevBtn = document.getElementById('prevImage');
    const nextBtn = document.getElementById('nextImage');
    let currentIndex = 0;

    const images = imageElements.map(el => el.dataset.image);

    imageElements.forEach((el, index) => {
        el.addEventListener('click', function () {
            currentIndex = index;
            modalImage.src = images[currentIndex];
        });
    });

    prevBtn.addEventListener('click', function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        modalImage.src = images[currentIndex];
    });

    nextBtn.addEventListener('click', function () {
        currentIndex = (currentIndex + 1) % images.length;
        modalImage.src = images[currentIndex];
    });
});
