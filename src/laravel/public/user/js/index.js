var modal = document.getElementById("myModal");
var btn = document.getElementById("cart");
var btn1 = document.getElementById("cart1")
var btn2 = document.getElementById("cart2")
var close = document.getElementsByClassName("close")[0];
var close_footer = document.getElementsByClassName("close-footer")[0];
var order = document.getElementsByClassName("order")[0];
btn.onclick = function () {
    modal.style.display = "block";
}

close.onclick = function () {
    modal.style.display = "none";
}
close_footer.onclick = function () {
    modal.style.display = "none";
}
order.onclick = function () {
    alert("Cảm ơn bạn đã thanh toán đơn hàng")
    location.assign('index.html');
}

btn1.onclick = function () {
    modal.style.display = "block";
}
btn2.onclick = function () {
    modal.style.display = "block";
}


