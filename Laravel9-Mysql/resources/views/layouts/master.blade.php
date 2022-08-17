<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @include('includes.headerScripts')

    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>
    @include('includes.navbar')
    @yield('content')
    @include('includes.footerScripts')
</body>

</html>
