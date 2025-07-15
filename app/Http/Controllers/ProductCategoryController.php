<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        
        return view('dashboard.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('dashboard.categories.createcategories',  ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi input
    $validator = \Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255|unique:product_categories,slug',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->with([
            'errors' => $validator->errors(),
            'errorMessage' => 'Validasi gagal. Silakan lengkapi data kategori produk dengan benar.'
        ]);
    }

    // Proses slug: gunakan input atau generate otomatis
    $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);

    // Simpan data kategori
    $category = new Categories;
    $category->name = $request->name;
    $category->slug = $slug;
    $category->description = $request->description;

    // Proses upload gambar jika tersedia
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('category_images', 'public');
        $category->image_url = asset('storage/' . $imagePath);
    }

    $category->save();

    return redirect()->back()->with([
        'successMessage' => 'Data kategori produk berhasil disimpan.'
    ]);
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
        $categories = Categories::find($id);
        return view('dashboard.categories.editcategories', [
            'categories' => $categories
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    // Validasi input
    $validator = \Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->with([
            'errors' => $validator->errors(),
            'errorMessage' => 'Validasi Error, silakan lengkapi data terlebih dahulu.'
        ]);
    }

    // Update data kategori
    $category = Categories::find($id);
    if (!$category) {
        return redirect()->back()->with([
            'errorMessage' => 'Data kategori tidak ditemukan.'
        ]);
    }

    $category->name = $request->name;
    $category->slug = \Str::slug($request->name);
    $category->description = $request->description;
    $category->save();

    return redirect()->route('categories.index')->with([
        'successMessage' => 'Data kategori berhasil diperbarui.'
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->back()->with(
        [
                'successMessage' => 'Data Berhasil Dihapus'
            ]
        );
    }

    public function sync($id, Request $request)
    {
        $category = Categories::findOrFail($id);
          
          $response = Http::post('https://api.phb-umkm.my.id/api/product-category/sync', [
              'client_id' => env('CLIENT_ID'),
              'client_secret' => env('CLIENT_SECRET'),
              'seller_product_category_id' => (string) $category->id,
              'name' => $category->name,
              'description' => $category->description,
              'is_active' => $request->is_active == 1 ? false : true,
          ]);
  
          if ($response->successful() && isset($response['product_category_id'])) {
              $category->hub_category_id = $request->is_active == 1 ? null : $response['product_category_id'];
              $category->save();
          }
  
          session()->flash('successMessage', 'Category Synced Successfully');
          return redirect()->back();
      }
}
