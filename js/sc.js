
// for Reviwes start


let currentIndex = 0;
        const track = document.getElementById('carouselTrack');
        const cards = document.querySelectorAll('.review-card');
        const totalCards = cards.length;
        const dotsContainer = document.getElementById('dotsContainer');

        for (let i = 0; i < totalCards; i++) {
            const dot = document.createElement('div');
            dot.className = 'dot';
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToReview(i));
            dotsContainer.appendChild(dot);
        }

        const dots = document.querySelectorAll('.dot');

        function updateCarousel() {
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
            
            cards.forEach((card, index) => {
                card.classList.toggle('active', index === currentIndex);
            });

            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        function nextReview() {
            currentIndex = (currentIndex + 1) % totalCards;
            updateCarousel();
        }

        function prevReview() {
            currentIndex = (currentIndex - 1 + totalCards) % totalCards;
            updateCarousel();
        }

        function goToReview(index) {
            currentIndex = index;
            updateCarousel();
        }

        let touchStartX = 0;
        let touchEndX = 0;

        const carousel = document.querySelector('.carousel');

        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carousel.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextReview();
            }
            if (touchEndX > touchStartX + 50) {
                prevReview();
            }
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') prevReview();
            if (e.key === 'ArrowRight') nextReview();
        });
        
        
        //  Reviwes end