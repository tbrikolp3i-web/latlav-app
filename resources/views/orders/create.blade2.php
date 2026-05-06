@extends('layouts.app')

@section('content')

<h2>Tambah Order</h2>

<form action="/orders" method="POST">

@csrf

<label>Customer</label>
<select name="customer_id" class="form-control mb-2">
@foreach($customers as $c)
<option value="{{ $c->id }}">{{ $c->nama }}</option>
@endforeach
</select>

<label>Produk</label>
<select name="product_id" class="form-control mb-2">
@foreach($products as $p)
<option value="{{ $p->id }}">
{{ $p->nama }} - {{ $p->harga }}
</option>
@endforeach
</select>

<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control mb-2">

<div class="mb-3">
    <label>Berat (gram)</label>
    <input type="number" name="weight" id="weight" class="form-control">
</div>

<div class="mb-3">
    <label>Kurir</label>
    <select id="courier" class="form-control">
        <option value="jne">JNE</option>
        <option value="pos">POS</option>
        <option value="tiki">TIKI</option>
    </select>
</div>

<div class="mb-3">
    <button type="button" id="cekOngkir" class="btn btn-primary">
        Cek Ongkir
    </button>
</div>

<div class="mb-3">
    <label>Ongkir</label>
    <input type="text" name="ongkir" id="ongkir" class="form-control" readonly>
</div>

<button class="btn btn-primary">Simpan</button>

</form>





<script>
document.getElementById('cekOngkir').addEventListener('click', function(){

    let weight = document.getElementById('weight').value;
    let courier = document.getElementById('courier').value;

    fetch(`/cek-ongkir?weight=${weight}&courier=${courier}`)
    .then(res => res.json())
    .then(data => {
        document.getElementById('ongkir').value = data.data.ongkir;
    });

});
</script>

<script>
    /*
document.getElementById('cekOngkir').addEventListener('click', function(){

    fetch('/cek-ongkir', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            origin: 501,
            destination: 114,
            weight: document.getElementById('weight').value,
            courier: document.getElementById('courier').value
        })
    })
    .then(res => res.json())
    .then(data => {

        //let ongkir = data.rajaongkir.results[0].costs[0].cost[0].value;
        //document.getElementById('ongkir').value = ongkir;
     //   .then(data => {
    document.getElementById('ongkir').value = data.data.ongkir;
    });
});*/
</script>

@endsection