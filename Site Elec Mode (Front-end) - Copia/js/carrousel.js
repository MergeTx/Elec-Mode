// Carrossel.js
var Carrossel = (function() {
    var images, currentImageIndex, totalImages, leftArrow, rightArrow;
    var intervalId; // Variável para armazenar o ID do intervalo

    function init() {
        images = document.querySelectorAll('.mainCarrousel .imgCarrousel');
        currentImageIndex = 0;
        totalImages = images.length;
        leftArrow = document.querySelector('.seta-esquerda');
        rightArrow = document.querySelector('.seta-direita');

        leftArrow.addEventListener('click', imagemAnterior);
        rightArrow.addEventListener('click', proximaImagem);
        
        images.forEach(function(img, index) {
            if (index !== currentImageIndex) {
                img.style.display = 'none';
            }
        });

        // Inicia o intervalo para trocar as imagens automaticamente
        iniciarIntervalo();
    }

    function iniciarIntervalo() {
        intervalId = setInterval(proximaImagem, 5000); // Troca a imagem a cada 5 segundos (5000 milissegundos)
    }

    function pararIntervalo() {
        clearInterval(intervalId); // Para o intervalo
    }

    function imagemAnterior() {
        pararIntervalo(); // Para o intervalo ao clicar na seta esquerda
        currentImageIndex = (currentImageIndex - 1 + totalImages) % totalImages;
        atualizarImagem();
        iniciarIntervalo(); // Reinicia o intervalo
    }

    function proximaImagem() {
        pararIntervalo(); 
        currentImageIndex = (currentImageIndex + 1) % totalImages;
        atualizarImagem();
        iniciarIntervalo(); 
    }

    function atualizarImagem() {
        images.forEach(function(img, index) {
            if (index === currentImageIndex) {
                img.style.display = 'block';
            } else {
                img.style.display = 'none';
            }
        });
    }

    return {
        init: init
    };
})();

document.addEventListener('DOMContentLoaded', function() {
    Carrossel.init();
});
