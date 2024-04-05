const cartButton = document.querySelector('.navIntegers p:first-child');
const cartModal = document.getElementById('cartModal');
const closeButton = document.querySelector('.modal-close');

function abrirCarrinho() {
    cartModal.style.right = '0';
}

function fecharCarrinho() {
    cartModal.style.right = '-450px';
}

cartButton.addEventListener('click', abrirCarrinho);
closeButton.addEventListener('click', fecharCarrinho);

function adicionarAoCarrinho(produto) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    let produtoExistente = carrinho.find(item => item.nome === produto.nome);

    if (produtoExistente) {
        produtoExistente.quantidade += 1;
    } else {
        carrinho.push(produto);
    }

    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    atualizarCarrinho();
}

function limparCarrinho() {
    localStorage.removeItem('carrinho');
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const carrinhoContainer = document.querySelector('.cartModal .carrinhoProdutos');
    carrinhoContainer.innerHTML = '';

    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    carrinho.forEach(produto => {
        const produtoHTML = `
            <div class="cartProdCarrinho">
                <img class="cardImgCarrinho" src="Logo/Logo_Branca.png" alt="">
                <p class="cardDescCarrinho font">${produto.nome}</p>
                <div class="cardQPCarrinho">
                    <p class="cardQntCarrinho font">${produto.quantidade}</p>
                    <p class="cardPrecCarrinho font">${produto.preco}</p>
                </div>
            </div>
        `;
        carrinhoContainer.innerHTML += produtoHTML;
    });
}

const comprarButtons = document.querySelectorAll('.comprarBtn');
comprarButtons.forEach(button => {
    button.addEventListener('click', function() {
        const card = button.closest('.cardProdutos');
        const nomeProduto = card.querySelector('.cardDesc').textContent;
        const precoProduto = card.querySelector('.cardPreco').textContent;

        const produto = {
            nome: nomeProduto,
            preco: precoProduto,
            quantidade: 1
        };

        adicionarAoCarrinho(produto);
    });
});

const clearCartButton = document.querySelector('.cartClear');
clearCartButton.addEventListener('click', limparCarrinho);

atualizarCarrinho();
