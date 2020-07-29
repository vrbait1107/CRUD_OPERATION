let readRecordEmployee;
$(document).ready(function () {
  readRecordEmployee = () => {
    let read = "read";

    $.ajax({
      url: "/read",
      type: "post",
      data: {
        read: "read",
      },
      success(data) {
        let contentData = data;
        let tbody = $("tbody");
        tbody.html("");

        contentData.records.forEach((row) => {
          if (!row.profileImage) {
            row.profileImage = "defaultUser.png";
          }

          tbody.append(`
            <tr>
            <td><img src="profileImage/${row.profileImage}" class="img-fluid rounded-circle" style="height:50px;" /></td>
            <td>${row.name}</td>
            <td>${row.email}</td>
            <td>${row.etype}</td>
            <td>${row.hourlyRate}</td>
            <td>${row.totalHour}</td>
            <td>${row.total}</td>
            <td><button class="btn btn-primary" onclick = "editEmployee('${row._id}')"><i class="fas fa-pencil-alt"></i></button>
            <td><button class="btn btn-danger" onclick = "deleteEmployee('${row._id}')"><i class="fas fa-trash"></i></button>
            </tr>
            `);
        });
      },
    });
  };

  readRecordEmployee();

  // ---------------------->> CREATE OPERATION

  $("#employeeForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: "/create",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success(data) {
        $("#employeeForm").trigger("reset");
        $("#employeeModal").modal("hide");
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Data Inserted Successfully!",
        });
        readRecordEmployee();
      },
    });
  });
});

//---------------------->> DELETE OPERATION

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
          readRecordEmployee();
        },
        error(err) {
          alert(err);
        },
      });
    }
  });
};

const editEmployee = (id) => {
  let editId = id;

  $.ajax({
    url: "/edit",
    type: "post",
    data: {
      editId: editId,
    },
    success(data) {
      let employee = data.employee;

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

  $.ajax({
    url: "/update",
    type: "post",
    data: new FormData(this),
    contentType: false,
    processData: false,
    success(data) {
      $("#updateEmployeeModal").modal("hide");
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Data Updated Successfully!",
      });
      readRecordEmployee();
    },
  });
});
