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
                </tr>';
            }

            $data .= '</tbody>
            </table>';

        } else {
            $data .= '<td colspan="6">No Records Found</td>';
        }
    }

    echo $data;
}
