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
        