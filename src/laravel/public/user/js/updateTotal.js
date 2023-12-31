$(document).ready(function () {
    $(".quantity-input").change(function () {
        // Retrieve data attributes
        var productId = $(this).data("product-id");
        var quantity = $(this).val();

        // Retrieve CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Send Ajax request
        $.ajax({
            type: "POST",
            url: "/update-cart",
            data: {
                productId: productId,
                quantity: quantity,
            },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (data) {
                // Handle success response
                console.log("Success:", data);
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error("Error:", error);
            },
        });
    });
});
