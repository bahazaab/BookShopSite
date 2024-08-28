@props(['name' => '', 'label' => '', 'value' => ''])
<style>
    @keyframes spin {
        to {
            transform: rotate(1turn);
        }
    }

    .animate-spin {
        animation: spin 1s linear infinite;
    }
</style>
<x-input name="{{ $name }}" label="{{ $label }}" onchange="updateImage()" :value="$value"  />
<div class="mb-4">
    <div class=" ml-4 mt-4">
        <img id="book_img" src="{{ $value === '' ? old($name) : $value }}" alt="Not Found" />
    </div>
    <div id="loading-spinner" class="hidden animate-spin p-4 h-20 w-20">
        <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path
                d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z" />
        </svg>
    </div>
</div>

<script>
    function updateImage() {
        const imageUrl = document.getElementById('image_url').value;
        const bookImg = document.getElementById('book_img');
        const loadingSpinner = document.getElementById('loading-spinner');

        // Show loading spinner
        loadingSpinner.classList.remove('hidden');

        // Update image source
        bookImg.src = imageUrl;

        // Hide loading spinner when the image has finished loading
        bookImg.onload = function() {
            loadingSpinner.classList.add('hidden');
        };

        bookImg.onerror = function() {
            loadingSpinner.classList.add('hidden');
        };
    }
</script>
