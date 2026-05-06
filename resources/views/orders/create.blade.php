@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Tambah Order</h2>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <!-- CUSTOMER -->
        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-control">
                @foreach($customers as $c)
                    <option value="{{ $c->id }}">{{ $c->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- PRODUK -->
        <div class="mb-3">
            <label>Produk</label>
            <select name="product_id" id="product" class="form-control">
                @foreach($products as $p)
                    <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">
                        {{ $p->nama }} - Rp {{ number_format($p->harga) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- JUMLAH -->
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control">
        </div>

        <!-- BERAT -->
        <div class="mb-3">
            <label>Berat (gram)</label>
            <input type="number" id="weight" class="form-control">
        </div>

        <!-- KURIR -->
        <div class="mb-3">
            <label>Kurir</label>
            <select id="courier" class="form-control">
                <option value="jne">JNE</option>
                <option value="pos">POS</option>
                <option value="tiki">TIKI</option>
            </select>
        </div>

        <!-- BUTTON CEK ONGKIR -->
        <div class="mb-3">
            <button type="button" id="cekOngkir" class="btn btn-primary">
                Cek Ongkir
            </button>
        </div>

        <!-- ONGKIR -->
        <div class="mb-3">
            <label>Ongkir</label>
            <input type="text" name="ongkir" id="ongkir" class="form-control" readonly>
        </div>

        <!-- SUBTOTAL -->
        <div class="mb-3">
            <label>Subtotal</label>
            <input type="text" id="subtotal" class="form-control" readonly>
        </div>

        <!-- TOTAL -->
        <div class="mb-3">
            <label>Total</label>
            <input type="text" name="total" id="total" class="form-control" readonly>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>

{{-- ================= JS ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function(){

    // ================= CEK ONGKIR =================
    document.getElementById('cekOngkir').addEventListener('click', function(){

        let weight = document.getElementById('weight').value;
        let courier = document.getElementById('courier').value;

        fetch(`/cek-ongkir?weight=${weight}&courier=${courier}`)
        .then(res => res.json())
        .then(data => {

            // 🔥 sesuaikan dengan API kamu
            //let ongkir = data.data.costs[0].cost[0].value;

            document.getElementById('ongkir').value = ongkir;
            document.getElementById('ongkir').value = data.data.ongkir;
            hitungTotal(); // otomatis update total

        })
        .catch(error => console.log(error));
    });


    // ================= HITUNG TOTAL =================
    function hitungTotal() {

        let produk = document.getElementById('product');
        let harga = produk.options[produk.selectedIndex].getAttribute('data-harga');

        let jumlah = document.getElementById('jumlah').value;
        let ongkir = document.getElementById('ongkir').value;

        harga = parseInt(harga || 0);
        jumlah = parseInt(jumlah || 0);
        ongkir = parseInt(ongkir || 0);

        let subtotal = harga * jumlah;
        let total = subtotal + ongkir;

        document.getElementById('subtotal').value = subtotal;
        document.getElementById('total').value = total;
    }

    // trigger perubahan
    document.getElementById('jumlah').addEventListener('input', hitungTotal);
    document.getElementById('product').addEventListener('change', hitungTotal);

});
</script>

@endsection