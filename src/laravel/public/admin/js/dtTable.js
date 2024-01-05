// new DataTable("#example", {
//     order: [[0, "desc"]],
// });
$("#example").dataTable({
    order: [[0, "desc"]],
    createdRow: function (row, data, dataIndex) {
        if (data[2] == `someVal`) {
            $(row).addClass("redClass");
        }
    },
});
