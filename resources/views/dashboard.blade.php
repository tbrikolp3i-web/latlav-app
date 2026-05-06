@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card bg-primary text-white p-3">
                <h4>{{ $totalCustomers }}</h4>
                <p>Customers</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white p-3">
                <h4>{{ $totalProducts }}</h4>
                <p>Products</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning text-white p-3">
                <h4>{{ $totalOrders }}</h4>
                <p>Orders</p>
            </div>
        </div>

    </div>

    <hr>

    <h4>Customer Terbaru</h4>
    <ul>
        @foreach($latestCustomers as $c)
            <li>{{ $c->nama }}</li>
        @endforeach
    </ul>

    <h4>Order Terbaru</h4>
    <ul>
        @foreach($latestOrders as $o)
            <li>{{ $o->customer->nama }} beli {{ $o->product->nama }}</li>
        @endforeach
    </ul>

</div>

@endsection