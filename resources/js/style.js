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
