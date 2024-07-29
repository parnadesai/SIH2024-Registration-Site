const ratingContainer = document.querySelector('.rating-container');
const ratingText = document.querySelector('#rating-text');
const reviewContainer = document.querySelector('.review-container');
const review = document.querySelector('#review');
const submitBtn = document.querySelector('#submit-btn');

let rating = 0;

ratingContainer.addEventListener('click', (e) => {
    if (e.target.classList.contains('star')) {
        const stars = ratingContainer.querySelectorAll('.star');
        stars.forEach((star, index) => {
            if (index <= e.target.dataset.index) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
        rating = e.target.dataset.index;
        ratingText.textContent = `You rated ${rating} out of 5`;
    }
});

submitBtn.addEventListener('click', () => {
    const reviewText = review.value.trim();
    if (reviewText !== '') {
        // Submit review to server or database
        console.log(`Review submitted: ${reviewText} with rating ${rating}`);
        review.value = '';
        rating = 0;
        ratingText.textContent = 'Select a rating';
        const stars = ratingContainer.querySelectorAll('.star');
        stars.forEach((star) => {
            star.classList.remove('active');
        });
    } else {
        alert('Please write a review');
    }
});
