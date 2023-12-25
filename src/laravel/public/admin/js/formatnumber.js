$(document).ready(function () {
    $(".number-input").on("input", function () {
        formatNumber($(this));
    });

    function formatNumber(input) {
        let value = input.val().replace(/[^0-9]/g, "");

        // Kiểm tra nếu có dấu chấm thì chỉ xử lý phần trước dấu chấm
        if (value.includes(".")) {
            let parts = value.split(".");
            parts[0] = parseFloat(parts[0]).toLocaleString("en-US", {
                maximumFractionDigits: 0,
            });
            value = parts.join(".");
        } else {
            value = parseFloat(value).toLocaleString("en-US");
        }

        input.val(value);
    }
});
