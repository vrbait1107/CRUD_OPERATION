$(document).ready(function () {
  $("#employeeForm").on("submit", function (e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let etype = $("#etype").val();
    let hourlyRate = $("#hourlyRate").val();
    let totalHour = $("#totalHour").val();
    let total = parseInt(hourlyRate) * parseInt(totalHour);
    let insert = "insert";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxIndex.php",
      type: "post",
      data: {
        name: name,
        email: email,
        etype: etype,
        hourlyRate: hourlyRate,
        totalHour: totalHour,
        total: total,
        insert: insert,
      },
      success(data) {
        $("#responseAdd").html(data);
        $("#employeeForm").trigger("reset");
        $("#employeeModal").modal("hide");
      },
      error(err) {
        alert(err);
      },
    });
  });
});