<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Product::all();
        return Product::select('id','nama','harga','stok','deskripsi')->get();
    }

    public function headings():array
    {
        return [
            'id',
            'Nama Produk',
            'Harga',
            'Stok',
            'Deskripsi'
        ];
    }
}
