<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- SweetAlert.js-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Font-Awesome css   -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<div id="responseAdd"></div>

  <main class="container my-5">
    <div class="row">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal">
        Add Employee
      </button>

      <!-- Modal -->
      <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="employeeModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="" method="post" id="employeeForm">

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your email">
                </div>

                <div class="form-group">
                  <select name="etype" id="etype" class="form-control">
                    <option value="Supervisor">Supervisor</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="hourlyRate">Hourly Rate</label>
                  <input type="text" name="hourlyRate" id="hourlyRate" class="form-control"
                    placeholder="Enter Your Hourly Rate">
                </div>

                <div class="form-group">
                  <label for="totalHour">Total Hour</label>
                  <input type="text" name="totalHour" id="totalHour" class="form-control"
                    placeholder="Enter Your Total Hours">
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add Employee</button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>

      <section class="col-md-12 mt-3">
        <h3 class="text-center text-uppercase">Employee Records</h3>
      <div class="table-responsive">
      <!-- Response Records -->
      <div id="responseRecords"></div>
      </div>
      </section>
    </div>
  </main>





 <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
</body>

</html>
