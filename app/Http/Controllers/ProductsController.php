<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

    $products = Products::with('category') // relasi kategori
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->paginate(10)
        ->withQueryString(); // agar ?search tetap di pagination

    return view('dashboard.products.indexproducts', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('dashboard.products.createproducts', ['products' => $products], ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_category_id' => 'required|exists:product_categories,id',
            'image_url' => 'nullable|url',
            'is_active' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi Error, silakan lengkapi data terlebih dahulu.'
            ]);
        }

        // Simpan data produk
        $product = new Products;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $request->product_category_id;
        $product->image_url = $request->image_url;
        $product->is_active = $request->is_active;

        $product->save();

        return redirect()->back()->with([
            'successMessage' => 'Data produk berhasil disimpan.'
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $products = Products::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Products::find($id);
        $categories = Categories::all();
        return view('dashboard.products.editproducts', [
            'products' => $products
        ], ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_category_id' => 'required|exists:product_categories,id',
            'image_url' => 'nullable|url',
            'is_active' => 'required|boolean'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi Error, silakan lengkapi data terlebih dahulu.'
            ]);
        }
        // Simpan data produk
        $product = Products::find($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $request->product_category_id;
        $product->image_url = $request->image_url;
        $product->is_active = $request->is_active;

        $product->save();

        return redirect()->back()->with([
            'successMessage' => 'Data produk berhasil disimpan.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect()->back()->with(
        [
                'successMessage' => 'Data Berhasil Dihapus'
            ]
        );
    }
}