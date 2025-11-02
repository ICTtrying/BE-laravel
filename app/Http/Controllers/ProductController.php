<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
   public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products = $this->product->getAllProducts();
        return view('index', [
            'title' => 'Overzicht Magazijn Jamin',
            'products' => $products
        ]);
    }

}
