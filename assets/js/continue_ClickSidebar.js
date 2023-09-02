// Get the sidebar and buttons
const sidebar = document.getElementById('sidebar');
const gig_page = document.getElementById('gig_page');
const main = document.getElementById('main');
const openButton = document.getElementById('open-button');
const closeButton = document.getElementById('close-button');

// Function to open the sidebar
function openSidebar() {
    sidebar.style.right = '0';
    sidebar.style.transition = 'right 0.2s';
    gig_page.style.position = 'fixed';
}

// Function to close the sidebar
function closeSidebar() {
    if (window.innerWidth >= 1024) {

        sidebar.style.right = '-40%';
    }
    if (window.innerWidth < 1024) {
        sidebar.style.right = '-50%';
    }
    if (window.innerWidth < 768) {

        sidebar.style.right = '-100%';
    }
    gig_page.style.position = 'static';
    sidebar.style.transition = 'right 0.4s';
}

// Add event listeners to the buttons
openButton.addEventListener('click', openSidebar);
closeButton.addEventListener('click', closeSidebar);