$(function () {
  $("#dataTable").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    order: [[0, "desc"]],
    type: "select2",
  });
});
