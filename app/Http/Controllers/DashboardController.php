<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class DashboardController extends Controller
{
  public function index()
  {
    $jumlahKategori = Categories::count();
    $jumlahProduk = Products::count();

    return view('dashboard', compact('jumlahKategori', 'jumlahProduk'));
  }
}
