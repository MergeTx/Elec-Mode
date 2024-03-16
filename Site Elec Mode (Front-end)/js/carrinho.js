
const cartButton = document.querySelector('.navIntegers p:first-child');

const cartModal = document.getElementById('cartModal');

cartButton.addEventListener('click', function() {

    cartModal.style.right = '0';
});

const closeButton = document.querySelector('.modal-close');

closeButton.addEventListener('click', function() {

    cartModal.style.right = '-300px';
});