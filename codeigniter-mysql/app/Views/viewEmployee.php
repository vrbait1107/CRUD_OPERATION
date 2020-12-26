<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operaton | View Employee</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>


</head>

<body>

    <!-- Include Navbar -->
    <?php include_once "includes/navbar.php";?>


    <main class="container my-5">

        <div class="row">
            <section class="col-md-12">

            <?php
if (!empty($session->getFlashdata("success"))):
    echo "<p class='alert alert-success'>" . $session->getFlashdata("success") . "<p>";
endif;

if (!empty($session->getFlashdata("error"))):
    echo "<p class='alert alert-danger'>" . $session->getFlashdata("error") . "<p>";
endif;
?>



                <h3 class="card-header text-center mb-3 text-uppercase font-weight-bold"
                    style="font-family: 'Times New Roman', Times, serif;">View Employee</h3>

                      <div class="text-right my-3">
            <a href="<?php echo base_url("/add") ?>" class="btn btn-outline-primary">Add Employee</a>
            </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

<?php

if (!empty($employees)):

    foreach ($employees as $employee):

    ?>
																                        <tr>
																                           <td scope="row"><?php echo $employee["id"] ?></td>
																                            <td><?php echo $employee["name"] ?></td>
																                            <td><?php echo $employee["email"] ?></td>
																                            <td><?php echo $employee["mobileNumber"] ?></td>
																                            <td><?php echo $employee["address"] ?></td>
																                            <td><a class="btn btn-primary" href="/edit/<?php echo $employee["id"] ?>">Edit</a></td>
																                            <td><a class="btn btn-danger" onclick= "deleteConfirm('<?php echo $employee['id'] ?>')">Delete</a></td>
																                        </tr>
																<?php
endforeach;
endif;

?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>

    <!-- Include Footer Scripts -->
    <?php include_once "includes/footerScripts.php";?>

     <script type="text/javascript">

    const deleteConfirm = (id) => {
       if(confirm("Are you sure you want to delete?")){
        window.location.href= '<?php echo base_url('/delete') ?>/' + id;
       }
    }
    </script>

</body>

</html>