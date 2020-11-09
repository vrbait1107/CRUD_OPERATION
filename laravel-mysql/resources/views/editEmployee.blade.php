@extends('layouts.master')


@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">

      <form action="/updateEmployee" method="post">

        @csrf

        <h3 class="text-uppercase font-Staatliches card-header mb-3">Edit Employee</h3>

         <div class="form-group">
          <input type="hidden" name="id" id="id" class="form-control" value={{$data["id"]}}>
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" value={{$data["name"]}}>
          <small id="helpId" class="text-danger">@error("name") {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value={{$data["email"]}}>
           <small id="helpId" class="text-danger">@error("email") {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="etype">Employee Type</label>
          <input type="text" name="etype" id="etype" class="form-control" value={{$data["etype"]}}>
           <small id="helpId" class="text-danger">@error("etype") {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="hourlyRate">Hourly Rate</label>
          <input type="text" name="hourlyRate" id="hourlyRate" class="form-control" value={{$data["hourlyRate"]}}>
           <small id="helpId" class="text-danger">@error("hourlyRate") {{$message}} @enderror</small>
        </div>

        <div class="form-group">
          <label for="totalHour">Total Hour</label>
          <input type="text" name="totalHour" id="totalHour" class="form-control" value={{$data["totalHour"]}}>
           <small id="helpId" class="text-danger">@error("totalHour") {{$message}} @enderror</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>

    </div>
  </div>
</div>



@endsection