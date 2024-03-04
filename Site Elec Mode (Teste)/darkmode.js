const darkModeToggle = document.querySelector('.bxs-moon');
const body = document.querySelector('body');
const navLogo = document.getElementById('navLogo');

function saveThemePreference(theme) {
    localStorage.setItem('themePreference', theme);
}

function loadThemePreference() {
    const savedTheme = localStorage.getItem('themePreference');
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        navLogo.setAttribute("src", "Logotipo 2/1.png");
        darkModeToggle.classList.add('activeDark');
    } else {
        body.classList.remove('dark-mode');
        navLogo.setAttribute("src", "Logotipo 2/2.png");
        darkModeToggle.classList.remove('activeDark');
    }
}

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    navLogo.setAttribute("src", body.classList.contains('dark-mode') ? "Logotipo 2/1.png" : "Logotipo 2/2.png");
    darkModeToggle.classList.toggle('activeDark');
    saveThemePreference(body.classList.contains('dark-mode') ? 'dark' : 'normal'); 
});

document.addEventListener('DOMContentLoaded', () => {
    loadThemePreference();
});
