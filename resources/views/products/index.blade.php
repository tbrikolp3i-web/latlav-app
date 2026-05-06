@extends('layouts.app')
@section('content')
<h2>Data Produk</h2>
<a href="/products/create" class="btn btn-success mb-3">Tambah Produk</a>
<table class="table table-striped">
<tr>
<th>Nama Produk</th>
<th>Harga</th>
<th>Stok</th>
<th>Gambar</th>
<th>Deskripsi</th>
<th>Action</th>
</tr>
@foreach($products as $p)
<tr>
<td>{{ $p->nama }}</td>
<td>{{ $p->harga }}</td>
<td>{{ $p->stok }}</td>
<td>
@if($p->gambar)
    <img src="{{ asset('images/'.$p->gambar) }}" width="80">
@endif
</td>
<td>{{ $p->deskripsi }}</td>
<td>
    <div class="d-flex gap-2">
    <a href="/products/{{ $p->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
    <form action="/products/{{ $p->id }}" 
        method="POST" onsubmit="return confirm('Yakin hapus data?')">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>
</div>
</td>
</tr>
@endforeach
</table>
<a href="/products/pdf" target="_blank" class="btn btn-danger">
Preview PDF
</a>
<a href="/products/excel" target="_blank" class="btn btn-danger">
Export Excel
</a>
@endsection

