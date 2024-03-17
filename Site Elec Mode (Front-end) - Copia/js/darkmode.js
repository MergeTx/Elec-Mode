var DarkMode = (function() {
    var darkModeToggle, body, navLogo, imgCarrousel;

    function init() {
        darkModeToggle = document.querySelector('.darkModeToggle');
        body = document.querySelector('body');
        navLogo = document.querySelector('.navLogo img');
        imgCarrousel = document.querySelector('.imgCarrousel');

        darkModeToggle.addEventListener('click', toggleDarkMode);
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
        navLogo.setAttribute("src", "Logo/Logo_Branca.png");
        darkModeToggle.classList.add('activeDark');
        saveThemePreference('dark');
    }

    function disableDarkMode() {
        body.classList.remove('dark-mode');
        navLogo.setAttribute("src", "Logo/Logo_Preta.png");
        darkModeToggle.classList.remove('activeDark');
        saveThemePreference('normal');
    }

    function toggleDarkMode() {
        body.classList.toggle('dark-mode');
        darkModeToggle.classList.toggle('activeDark');
        body.classList.contains('dark-mode') ? enableDarkMode() : disableDarkMode();
    }

    return {
        init: init
    };
})();

document.addEventListener('DOMContentLoaded', function() {
    Carrossel.init();
    DarkMode.init();
});