document.addEventListener("DOMContentLoaded", function () {
    // Listen for click events on navigation links
    document.querySelectorAll(".dropdown-item").forEach(function (element) {
        element.addEventListener("click", function (event) {
            // Prevent the default behavior of the link
            event.preventDefault();

            // Check if the current page is a product detail page
            var isProductDetailPage =
                window.location.pathname.startsWith("/product/");

            // Navigate to the home page with the specified section
            window.location.href = isProductDetailPage
                ? "{{ url(" / ") }}" + this.hash
                : this.getAttribute("href");
        });
    });
});
