<?php

namespace App\Http\Controllers;

use app\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // function create
    public function Create(Request $request)
    {
        $kodeProduk = $request->input('kode_produk');
        $namaProduk = $request->input('nama_produk');
        $harga      = $request->input('harga');

        $produk = Produk::create([
            'kode_produk' => $kodeProduk,
            'nama_produk' => $namaProduk,
            'harga'       => $harga 
        ]);

        $this->responseHasil(200, True, $produk);
    }

    // untuk function list
    public function list()
    {
        $produk = Produk::all();
        $this->responseHasil(200, True, $produk);
    }

    // untuk menampilkan produk
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $this->responseHasil(200, True, $produk);
    }

    // untuk update pada produk
    public function Update(Request $request, $id)
    {
        $kodeProduk = $request->input('kode_produk');
        $namaProduk = $request->input('nama_produk');
        $harga = $request->input('harga');

        $produk = Produk::findOrFail($id);
        $result = $produk->update([
            'kode_produk' => $kodeProduk,
            'nama_produk' => $namaProduk,
            'harga'       => $harga
        ]);

        $this->responseHasil(200, True, $result);
    }

    // untuk menghpaus produk
    public function Delete($id)
    {
        $produk = Produk::findOrFail($id);
        $delete = $produk->Delete();

        $this->responseHasil(200, True, $delete);
    }

    
}
