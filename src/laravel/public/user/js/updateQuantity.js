function updateQuantity() {
    var quantityInput = document.getElementById("quantityInput");
    var hiddenQuantity = document.getElementById("hiddenQuantity");
    var hiddenQuantity1 = document.getElementById("hiddenQuantity1");
    hiddenQuantity.value = quantityInput.value;
    hiddenQuantity1.value = quantityInput.value;
}
