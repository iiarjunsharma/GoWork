
// // openChatbar && chatingBar_open_close
const start_chat = document.getElementById('start_chat');
const contact_list = document.getElementById('contact_list');
const contact_lister = document.getElementById('contact_lister');
const contact_chat = document.getElementById('contact_chat');
const close_arrow = document.getElementById('close_arrow');

if (window.innerWidth > 1024) {

    function openChatbar() {
        start_chat.style.display = 'none';
        contact_chat.style.display = 'block';
    }
    contact_lister.addEventListener('click', openChatbar);
} 
else {
    if (window.innerWidth <= 1024) {
        // Function to open the chat bar
        function openchattingbar(event) {
            // if (window.innerWidth <= 1024) {
            event.preventDefault(); // Prevents the default behavior of the <a> element
            contact_list.style.display = 'none';
            contact_chat.style.display = 'block';

            // Store the state in localStorage
            localStorage.setItem('chatState', 'open');
            // }
        }

        // Function to close the chat bar
        function closechattingbar(event) {
            // if (window.innerWidth <= 1024) {
            event.preventDefault(); // Prevents the default behavior of the <a> element
            contact_list.style.display = 'block';
            contact_chat.style.display = 'none';

            // Store the state in localStorage
            localStorage.setItem('chatState', 'closed');
            // }
        }

        // Check for and apply the stored state on page load
        const storedChatState = localStorage.getItem('chatState');
        if (storedChatState === 'open') {
            contact_list.style.display = 'none';
            contact_chat.style.display = 'block';
        } else {
            contact_list.style.display = 'block';
            contact_chat.style.display = 'none';
        }

        contact_lister.addEventListener('click', openchattingbar);
        close_arrow.addEventListener('click', closechattingbar);

    }
}

// chat_down_start
// Scroll to the bottom of the chat container after loading
var chatContainer = document.getElementById("chat_messages");
chatContainer.scrollTop = chatContainer.scrollHeight;