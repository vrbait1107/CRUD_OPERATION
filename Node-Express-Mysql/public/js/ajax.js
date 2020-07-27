let readRecord;
$(document).ready(function () {
  readRecord = () => {
    let read = "read";
    $.ajax({
      url: "/read",
      method: "post",
      data: {
        read: read,
      },
      success(data) {
        const tbody = $("tbody");

        tbody.html("");
        const contentData = data.records.forEach((row) => {
          tbody.append(`<tr>
              <td>${row.name}</td>
              <td>${row.email}</td>
              <td>${row.etype}</td>
              <td>${row.hourlyRate}</td>
              <td>${row.totalHour}</td>
              <td>${row.total}</td>
              <td><button class="btn btn-primary" onclick="getEmployee(${row.id})"><i class="fa fa-pencil"></i></button></td>
              <td><button class="btn btn-danger" onclick="deleteEmployee(${row.id})"><i class="fa fa-trash-o"></i></button></td>
            </tr>`);
        });
      },
      error(err) {
        alert(err);
      },
    });
  };

  readRecord();

  // -------------------------->> INSERTING EMPLOYEE RECORDS

  $("#employeeForm").on("submit", function (e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let etype = $("#etype").val();
    let hourlyRate = $("#hourlyRate").val();
    let totalHour = $("#totalHour").val();
    let total = parseInt(hourlyRate) * parseInt(totalHour);

    $.ajax({
      url: "/create",
      type: "post",
      data: {
        name: name,
        email: email,
        etype: etype,
        hourlyRate: hourlyRate,
        totalHour: totalHour,
        total: total,
      },
      success(data) {
        alert(data);
        $("#employeeForm").trigger("reset");
        $("#employeeModal").modal("hide");
        readRecord();
      },
      error(err) {
        alert(err);
      },
    });
  });
});

const deleteEmployee = (id) => {
  let deleteId = id;

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "/delete",
        type: "post",
        data: {
          deleteId: deleteId,
        },
        success(data) {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Data Deleted Successfully!",
          });
          readRecord();
        },
        error(err) {
          alert(err);
        },
      });
    }
  });
};

const getEmployee = (id) => {
  let editId = id;

  $.ajax({
    url: "/edit",
    type: "post",
    data: {
      editId: editId,
    },
    success(data) {
      let employee = data.employee[0];

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
    url: "/update",
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
      $("#updateEmployeeModal").modal("hide");
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Data Updated Successfully!",
      });
      readRecord();
    },
  });
});
