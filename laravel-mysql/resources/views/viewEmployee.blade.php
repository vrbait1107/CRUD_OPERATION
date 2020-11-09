@extends('layouts.master')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 mt-5 offset-md-1">

            <h3 class="font-Staatliches text-center">Employee Data</h3>

            <table class="table text-center">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Employee Type</th>
            <th>Hourly Rate</th>
            <th>Total Hour</th>
            <th>Total</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $item)
             <tr>
            <td>{{$item["id"]}}</td>
            <td>{{$item["name"]}}</td>
            <td>{{$item["email"]}}</td>
            <td>{{$item["etype"]}}</td>
            <td>{{$item["hourlyRate"]}}</td>
            <td>{{$item["totalHour"]}}</td>
            <td>{{$item["total"]}}</td>
            <td class="text-primary"><a href= {{"edit/".$item['id']}}><i class="fas text-danger fas fa-pencil-alt"></i></a></td>
            <td><a href= {{"delete/".$item['id']}}><i class="fas text-danger fa-trash-alt"></i></a></td>
            </tr>
        @endforeach

    </tbody>
</table>

        </div>
    </div>
</div>
    
@endsection