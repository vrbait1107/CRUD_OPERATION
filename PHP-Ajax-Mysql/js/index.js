let readRecords;

$(document).ready(function () {
  // Reading Records
  readRecords = () => {
    let readData = "readData";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxIndex.php",
      type: "post",
      data: {
        readData: readData,
      },
      success(data) {
        $("#responseRecords").html(data);
      },
      error(err) {
        alert(err);
      },
    });
  };

  readRecords();

  // -------------------------->> INSERTING EMPLOYEE RECORDS

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
        $("#employeeForm").trigger("reset");
        $("#employeeModal").modal("hide");
        $("#responseAdd").html(data);
        readRecords();
      },
      error(err) {
        alert(err);
      },
    });
  });
});

const getEmployee = (id) => {
  let editId = id;

  $.ajax({
    url: "ajaxHandlerPHP/ajaxIndex.php",
    type: "post",
    data: {
      editId: editId,
    },
    success(data) {
      let employee = JSON.parse(data);
      $("#updateName").val(employee.name);
      $("#updateEmail").val(employee.email);
      $("#updateEtype").val(employee.etype);
      $("#updateHourlyRate").val(employee.hourlyRate);
      $("#updateTotalHour").val(employee.totalHour);
      $("#hiddenId").val(employee.id);
    },
  });

  $("#updateEmployeeModal").modal("show");
};

//----------------------->> UPDATE EMPLOYEE
$("#updateEmployeeForm").on("submit", function (e) {
  e.preventDefault();

  let hiddenId = $("#hiddenId").val();
  let updateName = $("#updateName").val();
  let updateEmail = $("#updateEmail").val();
  let updateEtype = $("#updateEtype").val();
  let updateHourlyRate = $("#updateHourlyRate").val();
  let updateTotalHour = $("#updateTotalHour").val();
  let updateTotal = parseInt(updateHourlyRate) * parseInt(updateTotalHour);

  $.ajax({
    url: "ajaxHandlerPHP/ajaxIndex.php",
    type: "post",
    data: {
      hiddenId: hiddenId,
      updateName: updateName,
      updateEmail: updateEmail,
      updateEtype: updateEtype,
      updateHourlyRate: updateHourlyRate,
      updateTotalHour: updateTotalHour,
      updateTotal: updateTotal,
    },
    success(data) {
      $("#updateResponse").html(data);
      $("#updateEmployeeModal").modal("hide");
      readRecords();
    },
  });
});

const deleteEmployee = (id) => {
  let deleteId = id;

  $.ajax({
    url: "ajaxHandlerPHP/ajaxIndex.php",
    type: "post",
    data: {
      deleteId: deleteId,
    },
    success(data) {
      $("#deleteResponse").html(data);
      readRecords();
    },
    error(err) {
      alert(err);
    },
  });
};
