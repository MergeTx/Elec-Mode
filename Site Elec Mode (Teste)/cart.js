document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.addToCartBtn');
    const cartContent = document.getElementById('cartContent');
    const cartModal = document.getElementById('cartModal');

    let cartItems = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.getAttribute('data-item-id');
            const itemName = button.parentElement.querySelector('h3').innerText;
            const itemDescription = button.parentElement.querySelector('p').innerText;

            const existingItem = cartItems.find(item => item.id === itemId);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cartItems.push({ id: itemId, name: itemName, description: itemDescription, quantity: 1 });
            }

            updateCart();
        });
    });

    function updateCart() {
        cartContent.innerHTML = '';

        if (cartItems.length === 0) {
            cartContent.innerHTML = '<p>Seu carrinho está vazio.</p>';
        } else {
            cartItems.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.innerHTML = `
                    <h3>${item.name}</h3>
                    <p>${item.description}</p>
                    <button class="removeFromCartBtn" data-item-id="${item.id}">Remover do Carrinho</button>
                    <span>Quantidade: ${item.quantity}</span>
                `;
                cartContent.appendChild(itemElement);

                const removeButton = itemElement.querySelector('.removeFromCartBtn');
                removeButton.addEventListener('click', () => {
                    removeItemFromCart(item.id);
                });
            });
        }
    }


function removeItemFromCart(itemId) {
    const itemIndex = cartItems.findIndex(item => item.id === itemId);
    if (itemIndex !== -1) {
        cartItems[itemIndex].quantity -= 1;
        if (cartItems[itemIndex].quantity <= 0) {
            cartItems.splice(itemIndex, 1);
        }
        updateCart();
    }
}


    document.querySelector('.activeCart').addEventListener('click', () => {
        cartModal.style.display = 'block';
    });

    document.getElementById('closeCartModalBtn').addEventListener('click', () => {
        cartModal.style.display = 'none';
    });

    document.getElementById('clearCartBtn').addEventListener('click', () => {
        cartItems = [];
        updateCart();
    });
});
