const darkModeToggle = document.querySelector('.bxs-moon');
const body = document.querySelector('body');
const navLogo = document.getElementById('navLogo');

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    darkModeToggle.classList.toggle('activeDark');

    if(body.classList==('dark-mode')){
        navLogo.setAttribute("src","Logotipo 2/1.png");
    }else{
        navLogo.setAttribute("src","Logotipo 2/2.png");  
    };
    
    
});