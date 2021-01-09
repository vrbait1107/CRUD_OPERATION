<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operaton | Edit Employeee</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>


</head>

<body>

    <!-- Include Navbar -->
    <?php include_once "includes/navbar.php";?>


    <main class="container my-5">

        <div class="row">
            <section class="col-md-6 offset-md-3">

                <h3 class="card-header text-center mb-3 text-uppercase font-weight-bold"
                    style="font-family: 'Times New Roman', Times, serif;">Edit Employee</h3>

                       <div class="text-right my-3">
            <a href="<?php echo base_url("/") ?>" class="btn btn-outline-primary">Back</a>
            </div>


                     <form name ="editEmployeeForm" method="post" id="editEmployeeForm">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Employee Name" value="<?php echo set_value('name', $employee["name"]) ?>">
                        <span class="text-danger"><?php if (isset($validation) && $validation->hasError('name')) {
    echo "* " . $validation->getError('name');}?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" id="email" class="form-control"
                            placeholder="Enter Employee Email" value="<?php echo set_value('email', $employee["email"]) ?>">
                            <span class="text-danger"><?php if (isset($validation) && $validation->hasError('email')) {
    echo "* " . $validation->getError('email');}?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Mobile Number</label>
                        <input type="text" name="mobileNumber" id="mobileNumber" class="form-control"
                            placeholder="Enter Employee Email" value="<?php echo set_value('mobileNumber', $employee["mobileNumber"]) ?>">
                            <span class="text-danger"><?php if (isset($validation) && $validation->hasError('mobileNumber')) {
    echo "* " . $validation->getError('mobileNumber');}?></span>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3"
                            placeholder="Enter Employee Address" value="<?php echo set_value('address', $employee["address"]) ?>"></textarea>
                            <span class="text-danger"><?php if (isset($validation) && $validation->hasError('address')) {
    echo "* " . $validation->getError('address');}?></span>
                    </div>

                    <div class="form-group">
                        <label class="mr-3" for="gender">Employee Gender</label>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                Male
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                Female
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="other">
                                Other
                            </label>
                        </div>
                          <div class="text-danger"><?php if (isset($validation) && $validation->hasError('gender')) {
    echo "* " . $validation->getError('gender');}?></div>
                    </div>


                    <button class="btn btn-primary">Update Employee</button>

                </form>

            </section>
        </div>
    </main>

    <!-- Include Footer Scripts -->
    <?php include_once "includes/footerScripts.php";?>


   

</body>

</html>