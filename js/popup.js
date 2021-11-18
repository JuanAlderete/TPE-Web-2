const open = document.getElementById('popup-open');
const container_popup = document.getElementById('confirm');
const close = document.getElementById('close-popup');

open.addEventListener('click', () =>{
    container_popup.classList.add('show');
});

close.addEventListener('click', () =>{
    container_popup.classList.remove('show');
});