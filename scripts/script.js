const menuButton = document.getElementById('menu');
const menu = document.getElementById('navList');

menuButton.addEventListener('click', () => {
    if(menu.style.display == 'none') menu.style.display = 'flex';
    else menu.style.display = 'none';
})


window.addEventListener('resize', () => {
    if(window.innerWidth > 1023) menu.style.display = 'flex';
    else menu.style.display = 'none';
});