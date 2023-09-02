// Get the file input element
const fileInput = document.getElementById('images');
// Get the selected image element
const selectedImage = document.getElementById('selected-image');

// Add event listener for the file input change event
fileInput.addEventListener('change', function(event) {
    // Get the selected file
    const file = event.target.files[0];
    // Create a FileReader object
    const reader = new FileReader();
    // Set the image source when the FileReader has finished loading the file
    reader.onload = function() {
        selectedImage.src = reader.result;
    };
    // Read the file as a data URL
    reader.readAsDataURL(file);
});