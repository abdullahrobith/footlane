<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

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
        ->paginate(20)
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
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_category_id' => 'required|exists:product_categories,id',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_url' => 'nullable|url',
            'is_active' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi Error, silakan lengkapi data terlebih dahulu.'
            ]);
        }

        if ($request->hasFile('image_file') && $request->filled('image_url')) {
            return redirect()->back()->withInput()->with([
                'errorMessage' => 'Pilih salah satu metode gambar: upload file atau input URL.'
            ]);
        }

        $product = new Products;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $request->product_category_id;
        $product->is_active = $request->is_active;

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('product_images', 'public');
            $product->image_url = asset('storage/' . $imagePath);
        } elseif ($request->filled('image_url')) {
            $product->image_url = $request->image_url;
        }

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
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_category_id' => 'required|exists:product_categories,id',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_url' => 'nullable|url',
            'is_active' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi Error, silakan lengkapi data terlebih dahulu.'
            ]);
        }

        if ($request->hasFile('image_file') && $request->filled('image_url')) {
            return redirect()->back()->withInput()->with([
                'errorMessage' => 'Pilih salah satu metode gambar: upload file atau input URL.'
            ]);
        }

        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with([
                'errorMessage' => 'Data produk tidak ditemukan.'
            ]);
        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $request->product_category_id;
        $product->is_active = $request->is_active;

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('product_images', 'public');
            $product->image_url = asset('storage/' . $imagePath);
        } elseif ($request->filled('image_url')) {
            $product->image_url = $request->image_url;
        }

        $product->save();

        return redirect()->route('products.index')->with([
            'successMessage' => 'Data produk berhasil diperbarui.'
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

    public function sync($id, Request $request)
    {
        $product = Products::findOrFail($id);

        $response = Http::post('https://api.phb-umkm.my.id/api/product/sync', [
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'seller_product_id' => (string) $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'stock' => $product->stock,
            'sku' => $product->sku,
            'image_url' => $product->image_url,
            'weight' => $product->weight,
            'is_active' => $request->is_active == 1 ? false : true,
            'category_id' => (string) $product->category->hub_category_id,
        ]);

        if ($response->successful() && isset($response['product_id'])) {
            $product->hub_product_id = $request->is_active == 1 ? null : $response['product_id'];
            $product->save();
        }

        session()->flash('successMessage', 'Product Synced Successfully');
        return redirect()->back();
    }
}
