<?php

require_once "../config.php";
extract($_POST);

if (isset($_POST["insert"])) {

    $sql = "INSERT INTO employee_information (name, email, etype, hourlyRate, totalHour, total)
   VALUES(:name, :email, :etype, :hourlyRate, :totalHour, :total)";

    $result = $conn->prepare($sql);

    $result->bindValue(":name", $name);
    $result->bindValue(":email", $email);
    $result->bindValue(":etype", $etype);
    $result->bindValue(":hourlyRate", $hourlyRate);
    $result->bindValue(":totalHour", $totalHour);
    $result->bindValue(":total", $total);

    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Employee Data Inserted Successfully'
          })</script>";

    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'We failed to insert employee data'
          })</script>";
    }

}

if (isset($_POST["readData"])) {

    $sql = "SELECT * FROM employee_information";
    $result = $conn->prepare($sql);
    $result->execute();

    if ($result) {

        $data = '<table class="table table-striped">
        <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Employee Type</th>
        <th>Hourly Rate</th>
        <th>Total Hour </th>
        <th>Total</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>
        <tbody>';

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $data .= '<tr>
                <td> ' . $row['name'] . '</td>
                <td> ' . $row['email'] . '</td>
                <td> ' . $row['etype'] . '</td>
                <td> ' . $row['hourlyRate'] . '</td>
                <td> ' . $row['totalHour'] . '</td>
                <td> ' . $row['total'] . '</td>
               <td><button class= "btn btn-primary" onclick= "getEmployee(' . $row['id'] . ')"><i class="fa fa-pencil"></i></button></td>
               <td><button class= "btn btn-danger" onclick= "deleteEmployee(' . $row['id'] . ')"><i class="fa fa-trash"></i></button></td>
                </tr>';
            }

            $data .= '</tbody>
            </table>';

        } else {
            $data .= '<td colspan="8" class="text-center">No Records Found</td>';
        }
    }

    echo $data;
}

if (isset($_POST["editId"])) {

    $sql = "SELECT * FROM employee_information WHERE id = :editId";

    $result = $conn->prepare($sql);
    $result->bindValue(":editId", $editId);

    $result->execute();

    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $data = json_encode($row);
        echo $data;
    }
}

// ------------------------>> UPDATE EMPLOYEE DATA

if (isset($_POST['hiddenId'])) {

    $sql = "UPDATE employee_information SET name = :updateName, email = :updateEmail, etype = :updateEtype,
  hourlyRate = :updateHourlyRate, totalHour = :updateTotalHour, total = :updateTotal WHERE id = :hiddenId";

    $result = $conn->prepare($sql);
    $result->bindValue(":updateName", $updateName);
    $result->bindValue(":updateEmail", $updateEmail);
    $result->bindValue(":updateEtype", $updateEtype);
    $result->bindValue(":updateHourlyRate", $updateHourlyRate);
    $result->bindValue(":updateTotalHour", $updateTotalHour);
    $result->bindValue(":updateTotal", $updateTotal);
    $result->bindValue(":hiddenId", $hiddenId);

    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Employee Data Updated Successfully'
          })</script>";

    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'We failed to update employee data'
          })</script>";
    }

}

//-------------------------->> DELETE EMPLOYEE DATA

if (isset($_POST['deleteId'])) {
    $sql = "DELETE FROM employee_information WHERE id = :deleteId";

    $result = $conn->prepare($sql);
    $result->bindValue(":deleteId", $deleteId);

    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Employee Data deleted Successfully'
          })</script>";

    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'We failed to delete employee data'
          })</script>";
    }

}
