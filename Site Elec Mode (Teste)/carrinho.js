document.addEventListener('DOMContentLoaded', function () {
    const cartIcon = document.querySelector('.activeCart');
    const cartModal = document.getElementById('cartModal');
    const closeCartModalBtn = document.getElementById('closeCartModalBtn'); // Adicionado
    const addToCartBtns = document.querySelectorAll('.addToCartBtn');
    const addToCartIcons = document.querySelectorAll('.addToCartIcon');
    const cartContent = document.querySelector('.cartContent');
    const clearCartBtn = document.getElementById('clearCartBtn');

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

    function removeItemFromCart(itemId) {
        cartItems = cartItems.filter(item => item.id !== itemId);
        updateCartContent();
        saveCartItemsToLocalStorage();
    }

    function clearCart() {
        cartItems = [];
        saveCartItemsToLocalStorage();
        updateCartContent();
        
    }

    function updateCartContent() {
        cartContent.innerHTML = '';
        if (cartItems.length === 0) {
            cartContent.innerHTML = '<p>Seu carrinho está vazio.</p>';
        } else {
            cartItems.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.textContent = item.name;

                const removeBtn = document.createElement('button');
                removeBtn.textContent = 'Remover';
                removeBtn.addEventListener('click', function () {
                    removeItemFromCart(item.id);
                });
                itemElement.appendChild(removeBtn);

                cartContent.appendChild(itemElement);
            });
        }
    }

    function saveCartItemsToLocalStorage() {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    closeCartModalBtn.addEventListener('click', function () {
        cartModal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === cartModal) {
            cartModal.style.display = 'none';
        }
    });

    cartIcon.addEventListener('click', function () {
        cartModal.style.display = 'block';
    });

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

    clearCartBtn.addEventListener('click', function () {
        clearCart();
    });

    updateCartContent();
});
