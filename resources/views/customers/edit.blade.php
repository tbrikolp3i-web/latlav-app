

@extends('layouts.app')

@section('content')

<h2>Edit Customer</h2>
@if ($errors->any())
<div class="alert alert-danger">

<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>

</div>
@endif
<form action="/customers/{{ $customer->id }}" method="POST">

@csrf
@method('PUT')

<input type="text" name="nama" value="{{ $customer->nama }}"><br>

<input type="email" name="email" value="{{ $customer->email }}"><br>

<input type="text" name="telepon" value="{{ $customer->telepon }}"><br>

<textarea name="alamat">{{ $customer->alamat }}</textarea><br>

<button type="submit">Update</button>

</form>

@endsection

