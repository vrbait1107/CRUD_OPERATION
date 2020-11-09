@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center card-header font-Staatliches mb-3 text-uppercase">Register</h3>

            <form action="register" method="post">

                @csrf
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control"
                        placeholder="Enter Your Username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter Your Password">
                </div>

                 <div class="form-group">
                    <label for="confirmPassword">Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
                        placeholder="Confirm Your Password">
                </div>

                <input type="submit" value="Register" class="btn btn-primary">

            </form>
            <p class="mt-3"> Already Register <a href="/">Login Here</a></p>
        </div>
    </div>
</div>

@endsection

