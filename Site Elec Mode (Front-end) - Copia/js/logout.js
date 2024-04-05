document.addEventListener('DOMContentLoaded', function() {
    const logoutButton = document.getElementById('logoutButton');

    logoutButton.addEventListener('click', function(event) {
        event.preventDefault(); 

        fetch('logins/logout.php') 
        .then(response => {
            if (response.ok) {
                alert('Você saiu do perfil.');
                window.location.href = 'index.php'; 
            } else {
                alert('Ocorreu um erro ao fazer logout.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    });
});
