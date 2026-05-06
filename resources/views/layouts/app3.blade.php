<!DOCTYPE html>
<html>
<head>
    <title>Customer Management</title>
 
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body>
      @auth
<h1>Customer Management System</h1>

<ul class="nav">

  
<li class="nav-item">
<a class="nav-link" href="/customers">Customer</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/products">Produk</a>
</li>


<li class="nav-item">
<a class="nav-link" href="/orders">Order</a>
</li>



@endauth
<div>
    @guest
        <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
        <a href="/register" class="btn btn-outline-light btn-sm">Register</a>
    @else
        <span class="text-black me-2">{{ Auth::user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    @endguest
</div>

</ul>
<hr>

@yield('content')

</body>
</html>
