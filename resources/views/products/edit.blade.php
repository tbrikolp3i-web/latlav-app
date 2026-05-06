@extends('layouts.app')

@section('content')

<div class="container">

<h2>Edit Produk</h2>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<!-- Nama Produk -->
<div class="mb-3">
<label>Nama Produk</label>
<input type="text" name="nama" class="form-control"
value="{{ $product->nama}}">
</div>

<!-- Harga -->
<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control"
value="{{ $product->harga }}">
</div>

<!-- Stok -->
<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control"
value="{{ $product->stok }}">
</div>

<!-- Deskripsi -->
<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control">{{ $product->deskripsi }}</textarea>
</div>

<!-- Gambar Lama -->
<div class="mb-3">
<label>Gambar Saat Ini</label><br>

@if($product->gambar)
<img src="{{ asset('images/'.$product->gambar) }}" width="120" class="mb-2">
@else
<p>Tidak ada gambar</p>
@endif

</div>

<!-- Upload Gambar Baru -->
<div class="mb-3">
<label>Upload Gambar Baru</label>
<input type="file" name="gambar" class="form-control" accept="image/*">
<small>Kosongkan jika tidak ingin mengganti gambar</small>
</div>

<!-- Button -->
<button class="btn btn-primary">Update</button>
<a href="/products" class="btn btn-secondary">Kembali</a>

</form>

</div>

@endsection