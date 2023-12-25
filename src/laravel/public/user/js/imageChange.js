// Trong JavaScript
$(document).ready(function () {
    $(".thumbnail").click(function () {
        var newImage = $(this).data("image");
        var assetPath = $("#main-image").data("asset");
        var assetNewImage = assetPath + newImage;
        $("#main-image").attr("src", assetNewImage);
    });
});
