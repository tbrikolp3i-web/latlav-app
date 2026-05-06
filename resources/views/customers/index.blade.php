@extends('layouts.app')
@section('content')

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<a href="/customers/create" class="btn btn-primary btn-sm">Tambah Customer</a>

<form method="GET" action="/customers" class="mb-3">
<input type="text" name="search" placeholder="Cari nama..." class="form-control">
</form>

<table class="table table-bordered">
<tr>
<th>Nama</th>
<th>Email</th>
<th>Telepon</th>
<th>Alamat</th>
<th>Aksi</th>
</tr>
@foreach($customers as $customer)
<tr>
<td>{{ $customer->nama }}</td>
<td>{{ $customer->email }}</td>
<td>{{ $customer->telepon }}</td>
<td>{{ $customer->alamat }}</td>
<td>
    <div class="d-flex gap-2">
    <a href="/customers/{{ $customer->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
    <form action="/customers/{{ $customer->id }}" 
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
{{ $customers->links('pagination::bootstrap-5') }}
@endsection

