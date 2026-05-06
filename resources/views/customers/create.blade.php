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

<h2>Tambah Customer</h2>

<form action="/customers" method="POST">

@csrf

Nama
<input type="text" name="nama"><br>

Email
<input type="email" name="email"><br>

Telepon
<input type="text" name="telepon"><br>

Alamat
<textarea name="alamat"></textarea><br>

<button type="submit">Simpan</button>

</form>

@endsection
