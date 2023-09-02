// replacestate
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href)
}

// scrollNav
const navigation = document.getElementById('navigation');
let scrolled = false;

window.addEventListener('scroll', () => {
    if (window.scrollY > 0 && !scrolled) {
        navigation.classList.remove('navigation');
        navigation.classList.add('scroll_nav');
        scrolled = true;
    } else if (window.scrollY === 0 && scrolled) {
        navigation.classList.remove('scroll_nav');
        navigation.classList.add('navigation');
        scrolled = false;
    }
});

// main_manu_bar
const rnavbar = document.getElementById('rnavbar');
const menu_btn = document.getElementById('menu_btn');

function rightNav() {
    if (rnavbar.style.display === 'none' || rnavbar.style.display === '') {
        rnavbar.style.display = 'flex';
    } else {
        rnavbar.style.display = 'none';
    }
}
menu_btn.addEventListener('click', rightNav);

// notificationBar
const noti_wrapper = document.getElementById('noti_wrapper');
const open_notification = document.getElementById('open_notification');
const close_noti = document.getElementById('close_noti');

function openNotiBar() {
    noti_wrapper.style.display = 'block';
}

function closeNotiBar() {
    noti_wrapper.style.display = 'none';
}
open_notification.addEventListener('click', openNotiBar);
close_noti.addEventListener('click', closeNotiBar);