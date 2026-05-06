<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class OngkirController extends Controller
{
    
    public function cekOngkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => env('KOMERCE_KEY')
        ])->post('https://api.komerce.id/api/v1/calculate/shipping-cost', [
            'origin' => 501,
            'destination' => 114,
            'weight' => 1000,
            'courier' => 'jne'
        ]);

        
        dd($response->json());

        return $response->json();
    }
    /*
    public function cekOngkir(Request $request)
    {
        return response()->json([
            'data' => [
                'ongkir' => 10000
            ]
        ]);
    }
    */
    

        /*
        public function cekOngkir(Request $request)
        {
            // ambil input (optional)
            $weight = $request->weight ?? 1000;
            $courier = $request->courier ?? 'jne';

            // simulasi ongkir
            $ongkir = 20000;

            return response()->json([
                'success' => true,
                'data' => [
                    'origin' => 501,
                    'destination' => 114,
                    'weight' => $weight,
                    'courier' => $courier,
                    'ongkir' => $ongkir
                ]
            ]);
        }*/
}
