<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Mini App')</title>

    <style>
        body { font-family: Arial; margin: 40px; }
        .card { border:1px solid #ccc; padding:15px; margin-bottom:10px; }
        .text-danger { color:red; }
        .text-success { color:green; }
    </style>

    @stack('styles')
</head>
<body>

@include('partials.navbar')

<hr>

@yield('content')

@stack('scripts')

</body>
</html>
