@extends('layouts.app')

@section('content')

<h2>Data Order</h2>

<a href="/orders/create" class="btn btn-success mb-3">Tambah Order</a>

<table class="table table-bordered">

<tr>
<th>Customer</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Subtotal</th>
<th>Ongkir</th>
<th>Total</th>

</tr>

@foreach($orders as $o)

<tr>
<td>{{ $o->customer->nama }}</td>
<td>{{ $o->product->nama }}</td>
<td>{{ $o->jumlah }}</td>
<td>{{ $o->total_harga }}</td>
<td>{{ $order->ongkir }}</td>
<td>{{ $order->total }}</td>
</tr>

@endforeach

</table>

@endsection