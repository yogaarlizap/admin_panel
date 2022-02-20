<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('kategori')->get();
        $categories = Category::all();
        $no = 0;
        return view('admin.products.index', compact('products', 'no', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'gambar' => 'required',
            'keterangan' => 'required',
        ]);

        $nama_gambar = $request->file('gambar')->getClientOriginalName();

        $request->file('gambar')->storeAs('/public/images/product', $nama_gambar);


        $product = new Product;
        $product->nama = $request->nama_produk;
        $product->kategori_id = $request->kategori;
        $product->jumlah_stok = $request->stok;
        $product->berat = $request->berat;
        $product->gambar = $nama_gambar;
        $product->keterangan = $request->keterangan;
        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        echo json_encode($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'gambar' => 'required',
            'keterangan' => 'required',
        ]);

        $nama_gambar = $request->file('gambar')->getClientOriginalName();

        $request->file('gambar')->storeAs('C:\xampp\htdocs\nara-etnic\public\assets\product', $nama_gambar);

        $product = Product::find($id);
        $product->nama = $request->nama_produk;
        $product->kategori_id = $request->kategori;
        $product->jumlah_stok = $request->stok;
        $product->berat = $request->berat;
        $product->gambar = $nama_gambar;
        $product->keterangan = $request->keterangan;
        $product->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
