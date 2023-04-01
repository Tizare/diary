<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets\css\style.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="style\style.css">--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <title>diary</title>
</head>
<body>
<div class="wrapper">
    <div class="top center">
        <x-header></x-header>
        @yield('content')

    </div>
</div>
</body>
</html>
