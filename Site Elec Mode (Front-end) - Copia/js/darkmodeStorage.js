// darkmodeStorage.js

var DarkModeStorage = (function() {
    var body, navLogo;

    function init() {
        body = document.querySelector('body');
        navLogo = document.querySelector('.containerLogo img');

        loadThemePreference();
    }

    function saveThemePreference(theme) {
        localStorage.setItem('themePreference', theme);
    }

    function loadThemePreference() {
        var savedTheme = localStorage.getItem('themePreference');
        savedTheme === 'dark' ? enableDarkMode() : disableDarkMode();
    }

    function enableDarkMode() {
        body.classList.add('dark-mode');
        // Altera a logo para a versão branca
        navLogo.setAttribute("src", "../Logo/Logo_Branca (sem as letras).png");
    }

    function disableDarkMode() {
        body.classList.remove('dark-mode');
        // Altera a logo para a versão preta
        navLogo.setAttribute("src", "../Logo/Logo_Preta (sem as letras).png");
    }

    return {
        init: init
    };
})();

document.addEventListener('DOMContentLoaded', function() {
    DarkModeStorage.init();
});
