<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $productModel;
    protected $wishlistModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->wishlistModel = new Wishlist();
    }

    public function index()
    {
        $data['products'] = $this->productModel::all();
        if(Auth::check()){
            $data['userWishlist'] = $this->wishlistModel::where('user_id', Auth::user()->id)
                ->get('product_id')->toArray();
        }
        return view('home', $data);
    }
}
