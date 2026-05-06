<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
     public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['gambar'] = $filename;
         }
            Product::create($data);
            return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            if ($product->gambar && file_exists(public_path('images/'.$product->gambar))) {
                unlink(public_path('images/'.$product->gambar));
            }

            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('images'), $filename);

            $data['gambar'] = $filename;
        }

        $product->update($data);

        return redirect('/products');
    }

   public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->gambar && file_exists(public_path('images/'.$product->gambar))) {
            unlink(public_path('images/'.$product->gambar));
        }

        $product->delete();
        return redirect('/products');
    }

    public function exportPDF()
    {
        $products = Product::all();
        $pdf = Pdf::loadView('products.pdf', 
                compact('products'))->setPaper('a4','landscape');
        // tampil di browser (preview)
        return $pdf->stream('laporan_produk.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    
}
