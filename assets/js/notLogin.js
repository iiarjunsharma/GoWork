// replaceState
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