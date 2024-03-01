document.addEventListener('DOMContentLoaded', function () {
    const addToCartBtns = document.querySelectorAll('.addToCartBtn');
    const addToCartIcons = document.querySelectorAll('.addToCartIcon');
    const cartContent = document.querySelector('.cartContent');

    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];


    function addItemToCart(itemId) {
     
        const newItem = {
            id: itemId,
            name: `Produto ${itemId}`,
            
        };
        cartItems.push(newItem);
        updateCartContent();
        saveCartItemsToLocalStorage();
    }

    
    function updateCartContent() {
        cartContent.innerHTML = ''; 
        if (cartItems.length === 0) {
            cartContent.innerHTML = '<p>Seu carrinho está vazio.</p>';
        } else {
            cartItems.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.textContent = item.name; 
                cartContent.appendChild(itemElement);
            });
        }
    }

    function saveCartItemsToLocalStorage() {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    addToCartBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const itemId = btn.getAttribute('data-item-id');
            addItemToCart(itemId);
        });
    });

    addToCartIcons.forEach(icon => {
        icon.addEventListener('click', function () {
            const itemId = icon.getAttribute('data-item-id');
            addItemToCart(itemId);
        });
    });

    updateCartContent();
});
