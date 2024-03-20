document.addEventListener('DOMContentLoaded', function() {

    const profileButton = document.querySelector('.navIntegers p:last-child');

    const profileModal = document.getElementById('profileModal');

    profileButton.addEventListener('click', function() {
  
        profileModal.style.transform = 'translate(0, -50%)';
    });

    const profileCloseButton = document.querySelector('.profile-close');

    profileCloseButton.addEventListener('click', function() {
  
        profileModal.style.transform = 'translate(100%, -50%)';
    });
});


const cameraIcon = document.querySelector('.profileCam');

        const profileImg = document.querySelector('.profileImg');

        profileImg.addEventListener('mouseenter', function() {
           
            cameraIcon.classList.add('active');
        });

        profileImg.addEventListener('mouseleave', function() {
    
            cameraIcon.classList.remove('active');
        });