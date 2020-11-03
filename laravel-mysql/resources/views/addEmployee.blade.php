@extends('layouts.master')


@section('content')

<div class="container">
    <div class="row">
<div class="col-md-6 offset-md-3">

<form action="add" method="post">

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
    </div>

     <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Name">
    </div>

     <div class="form-group">
      <label for="etype">Employee Type</label>
      <input type="text" name="etype" id="etype" class="form-control" placeholder="Enter Your Name">
    </div>

    <div class="form-group">
      <label for="hourlyRate">Hourly Rate</label>
      <input type="text" name="hourlyRate" id="hourlyRate" class="form-control" placeholder="Enter Your Name">
    </div>

     <div class="form-group">
      <label for="totalHour">Hourly Rate</label>
      <input type="text" name="totalHour" id="totalHour" class="form-control" placeholder="Enter Your Name">
    </div>

</form>


</div>
    </div>
</div>


    
@endsection