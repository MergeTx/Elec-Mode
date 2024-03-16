// Carrossel.js
var Carrossel = (function() {
    var images, currentImageIndex, totalImages, leftArrow, rightArrow;

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
    }

    function imagemAnterior() {
        currentImageIndex = (currentImageIndex - 1 + totalImages) % totalImages;
        atualizarImagem();
    }

    function proximaImagem() {
        currentImageIndex = (currentImageIndex + 1) % totalImages;
        atualizarImagem();
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
