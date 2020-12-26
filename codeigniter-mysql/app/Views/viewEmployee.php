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
            ?>
                        
                <h3 class="card-header text-center mb-3 text-uppercase font-weight-bold"
                    style="font-family: 'Times New Roman', Times, serif;">View Employee</h3>

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
                        <tr>
                           <td scope="row">1</td>
                            <td>Vishal Bait</td>
                            <td>vishal@gmail.com</td>
                            <td>1234567890</td>
                            <td>At-Mahad, Tal- Mahad</td>
                            <td><a class="btn btn-primary" href="/editEmployee">Edit</a></td>
                            <td><a class="btn btn-danger" href="/editEmployee">Delete</a></td>
                        </tr>

                        <tr>
                           <td scope="row">1</td>
                            <td>Vishal Bait</td>
                            <td>vishal@gmail.com</td>
                            <td>1234567890</td>
                            <td>At-Mahad, Tal- Mahad</td>
                            <td><a class="btn btn-primary" href="/editEmployee">Edit</a></td>
                            <td><a class="btn btn-danger" href="/editEmployee">Delete</a></td>
                        </tr>

                         <tr>
                           <td scope="row">1</td>
                            <td>Vishal Bait</td>
                            <td>vishal@gmail.com</td>
                            <td>1234567890</td>
                            <td>At-Mahad, Tal- Mahad</td>
                            <td><a class="btn btn-primary" href="/editEmployee">Edit</a></td>
                            <td><a class="btn btn-danger" href="/editEmployee">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </main>

    <!-- Include Footer Scripts -->
    <?php include_once "includes/footerScripts.php";?>

</body>

</html>