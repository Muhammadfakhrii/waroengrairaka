// public/js/dashboard.js

function search() {
    var query = document.getElementById('searchInput').value.trim();
    if (query !== '') {
        window.location.href = "{{ route('products.search') }}?query=" + query;
    }
}

function filterCategory(category) {
    window.location.href = "{{ route('products.category') }}?category=" + category;
}
