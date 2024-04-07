<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequets;
use App\Http\Requests\ProductRequetsUpdate;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->search;
        // $users = User::paginate(10);
        $products = DB::table('products')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('category', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequets $request)
    {
        $data = $request->all();
        // Best Practice
        // $data['image'] = $request->file('image')->store('assets/', 'public');
        // Product::create($data);


        // ini ngikutin jago fluter
        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);


        $product = new \App\Models\Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = (int) $request->price;
        $product->stok = (int) $request->stok;
        $product->category = $request->category;
        $product->image = $filename;
        $product->save();

        return redirect()->route('products.index')->with('Success', 'Products Created Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('pages.products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequetsUpdate $request, string $id)
    {
        $data = $request->all();
        $product = Product::FindOrFail($id);

        // if ($request->hasFile('image')) {
        //     Storage::disk('local')->delete('public/' . $product->image); 
        // }
        // $data['image'] = $request->file('image')->store('assets/', 'public');
        // $product->update($data);

        if ($request->hasFile('image')) {
            // Hapus file gambar lama dari penyimpanan
            Storage::delete('public/products/' . $product->image);

            // Mendapatkan nama file yang baru diunggah
            $filename = time() . '.' . $request->image->extension();

            // Menyimpan file gambar yang baru ke penyimpanan
            $request->image->storeAs('public/products', $filename);

            // Mengupdate properti image pada model Product
            $product->image = $filename;
        }

        // Mengupdate properti-properiti lainnya dari data yang diterima dari form
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = (int) $request->price;
        $product->stok = (int) $request->stok;
        $product->category = $request->category;

        // Menyimpan perubahan ke database
        $product->save();


        return redirect()->route('products.index')->with('Success', 'Products Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::FindOrFail($id);
        // $item = Product::with(['gallery'])->FindOrFail($id);

        Storage::disk('local')->delete('public/' . $item->image);


        // $item->gallery()->delete();
        $item->delete();

        return redirect()->route('products.index')->with('success', 'products Deleted');
    }
}
