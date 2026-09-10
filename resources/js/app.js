const menuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const menuIcon = document.getElementById('menu-icon');
const closeIcon = document.getElementById('close-icon');

if (menuButton && mobileMenu) {

    menuButton.addEventListener('click', () => {

        mobileMenu.classList.toggle('hidden');

        menuIcon.classList.toggle('hidden');

        closeIcon.classList.toggle('hidden');

    });

}