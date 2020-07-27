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
            <td><button class="btn btn-primary" onclick = "editEmployee(${row._id})"><i class="fas fa-pencil-alt"></i></button>
            <td><button class="btn btn-danger" onclick = "deleteEmployee(${row._id})"><i class="fas fa-trash"></i></button>
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

    let name = $("#name").val();
    let email = $("#email").val();
    let etype = $("#etype").val();
    let hourlyRate = $("#hourlyRate").val();
    let totalHour = $("#totalHour").val();
    let profileImage = $("#profileImage").val();

    $.ajax({
      url: "/create",
      type: "post",
      data: {
        name: name,
        email: email,
        etype: etype,
        hourlyRate: hourlyRate,
        totalHour: totalHour,
        profileImage: profileImage,
      },
      contentType: false,
      processData: false,
      success(data) {
        $("#employeeForm").trigger("reset");
        $("#employeeModal").modal("hide");
        alert(data);
      },
    });
  });
});
