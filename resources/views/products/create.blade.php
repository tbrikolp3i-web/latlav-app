@if ($errors->any())
<div class="alert alert-danger">

<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>

</div>
@endif

@extends('layouts.app')

@section('content')

<form action="/products" method="POST" enctype="multipart/form-data">

@csrf

Nama
<input type="text" name="nama"><br>

Harga
<input type="number" name="harga"><br>

Stok
<input type="number" name="stok"><br>

Deskripsi
<textarea name="deskripsi"></textarea><br>

Gambar
<input type="file" name="gambar" accept="image/*"><br>

<button>Simpan</button>

</form>
@endsection