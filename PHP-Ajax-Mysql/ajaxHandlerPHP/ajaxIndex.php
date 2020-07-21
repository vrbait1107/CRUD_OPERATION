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
