<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller
{
    //fungsi untuk menampilkan halaman homepage
    public function index()
    {
        $categories = Categories::all();

        return view('web.homepage',[
        'categories' => $categories,
        'title'=>'Homepage'
        ]);

        
    }
    public function cart()
    {
        $title = "cart - toko gue";

        return view('web.cart',['title'=>$title]);
    }
    public function about()
    {
        $title = "about - toko gue";
   
        return view('web.about',['title'=>$title]);
    }
    public function contact()
    {
        $title = "contact - toko gue";
   
        return view('web.contact',['title'=>$title]);
    }
    public function product()
    {
        $title = "product - toko gue";
   
        return view('web.products',['title'=>$title]);
    }
    // public function product/($slug)
    // {
    //     $title = "product - toko gue";
   
    //     return view('web.products',['title'=>$title]);
    // }
}
