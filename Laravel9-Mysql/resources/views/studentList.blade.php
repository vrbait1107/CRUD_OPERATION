@extends('layouts.master')


@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check"></i> {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> {{ session('danger') }}
            </div>
        @endif

        <div class="row">

            <div class="col-md-10 mt-5 offset-md-1">

                <a href="{{ route('add') }}" class="btn btn-primary">Add Student</a>

                <h3 class="font-Staatliches text-center">Student Records</h3>

                <table class="table text-center table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>School Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($students->count() > 0)
                            @foreach ($students as $key => $student)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $student['first_name'] }}</td>
                                    <td>{{ $student['last_name'] }}</td>
                                    <td>{{ $student['school_name'] }}</td>
                                    <td>{{ $student['age'] }}</td>
                                    <td>{{ $student['email'] }}</td>
                                    <td>
                                        <a class="btn btn-primary" href='{{ route('edit', $student['id']) }}'>
                                            <i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href='{{ route('delete', $student['id']) }}'>
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="alert alert-danger" colspan="8"><i class="fas fa-exclamation-triangle"></i> No
                                    Records Found.</td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
