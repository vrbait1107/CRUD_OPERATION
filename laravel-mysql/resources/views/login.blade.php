@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center card-header mb-3 font-Staatliches text-uppercase">Login</h3>

            <form action="login" method="post">

                @csrf
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control"
                        placeholder="Enter Your Username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter Your Username">
                </div>

                <input type="submit" value="Login" class="btn btn-primary">

                <p class="mt-3"> Don't Have an Account <a href="/register">Register Here</a></p>

            </form>

        </div>
    </div>
</div>

@endsection