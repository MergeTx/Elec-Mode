var Carrossel = (function() {
    var images, currentImageIndex, totalImages, leftArrow, rightArrow, indicadoresContainer;
    var intervalId; 

    function init() {
        images = document.querySelectorAll('.mainCarrousel .imgCarrousel');
        currentImageIndex = 0;
        totalImages = images.length;
        leftArrow = document.querySelector('.seta-esquerda');
        rightArrow = document.querySelector('.seta-direita');
        indicadoresContainer = document.querySelector('.indicadores');

        leftArrow.addEventListener('click', imagemAnterior);
        rightArrow.addEventListener('click', proximaImagem);

        images.forEach(function(img, index) {
            if (index !== currentImageIndex) {
                img.style.display = 'none';
            }
        });

        criarIndicadores();
        atualizarIndicadores();

        iniciarIntervalo();
    }

    function iniciarIntervalo() {
        intervalId = setInterval(proximaImagem, 5000); 
    }

    function pararIntervalo() {
        clearInterval(intervalId); 
    }

    function criarIndicadores() {
        for (var i = 0; i < totalImages; i++) {
            var indicador = document.createElement('div');
            indicador.classList.add('indicador');
            indicador.addEventListener('click', function() {
                var index = Array.from(indicadoresContainer.children).indexOf(this);
                mostrarImagem(index);
            });
            indicadoresContainer.appendChild(indicador);
        }

        var indicadoresExtras = document.querySelectorAll('.indicador:nth-child(n+' + (totalImages + 1) + ')');
        indicadoresExtras.forEach(function(indicadorExtra) {
            indicadoresContainer.removeChild(indicadorExtra);
        });
    }

    function atualizarIndicadores() {
        var indicadores = document.querySelectorAll('.indicador');
        indicadores.forEach(function(indicador, index) {
            if (index === currentImageIndex) {
                indicador.classList.add('ativo');
            } else {
                indicador.classList.remove('ativo');
            }
        });
    }

    function imagemAnterior() {
        pararIntervalo(); 
        currentImageIndex = (currentImageIndex - 1 + totalImages) % totalImages;
        mostrarImagem(currentImageIndex);
        iniciarIntervalo(); 
    }

    function proximaImagem() {
        pararIntervalo(); 
        currentImageIndex = (currentImageIndex + 1) % totalImages;
        mostrarImagem(currentImageIndex);
        iniciarIntervalo(); 
    }

    function mostrarImagem(index) {
        images.forEach(function(img, i) {
            if (i === index) {
                img.style.display = 'block';
            } else {
                img.style.display = 'none';
            }
        });
        currentImageIndex = index;
        atualizarIndicadores();
    }

    return {
        init: init
    };
})();

document.addEventListener('DOMContentLoaded', function() {
    Carrossel.init();
});
