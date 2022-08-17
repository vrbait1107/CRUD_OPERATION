@extends('layouts.master')


@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <form action="/create" id='addStudent' name='addStudent' method="POST">

                    @csrf

                    <h3 class="text-uppercase font-Staatliches card-header mb-3">Add Student</h3>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                            value='{{ old('first_name') }}' placeholder="Enter Your First Name">

                        @error('first_name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                            value='{{ old('last_name') }}' placeholder="Enter Your Last Name">
                        @error('last_name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="school_name">School Name</label>
                        <input type="text" name="school_name" id="school_name" class="form-control"
                            placeholder="Enter Your School Name" value='{{ old('school_name') }}'>
                        @error('school_name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control"
                            placeholder="Enter Your Email" value='{{ old('email') }}'>
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" id="age" class="form-control"
                            placeholder="Enter Your Age" value='{{ old('age') }}'>
                        @error('age')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    <a type="button" href={{ route('home') }} class="btn btn-danger">Back</a>

                </form>

            </div>
        </div>
    </div>
@endsection
