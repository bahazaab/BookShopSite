function updateImage() {
    const imageUrl = document.getElementById('image_url').value;
    const bookImg = document.getElementById('book_img');
    const loadingSpinner = document.getElementById('loading-spinner');

    // Show loading spinner
    loadingSpinner.classList.remove('hidden');

    // Update image source
    bookImg.src = imageUrl;

    // Hide loading spinner when the image has finished loading
    bookImg.onload = function () {
        loadingSpinner.classList.add('hidden');
    };

    bookImg.onerror = function () {
        loadingSpinner.classList.add('hidden');
    };
}