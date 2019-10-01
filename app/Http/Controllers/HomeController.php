<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $productModel;
    protected $wishlistModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->wishlistModel = new Wishlist();
    }

    public function index(Request $request)
    {
        if (!empty($request->input('sortByField'))) {
            $data['products'] = [];
            $products = DB::table('products')
                ->orderBy($request->input('sortByField'), $request->input('sortByDirection'))
                ->get();
            foreach ($products as $product) {
                array_push($data['products'], (array)$product);
            }
        } else {
            $data['products'] = $this->productModel::all();
        }

        if (Auth::check()) {
            $data['userWhislistProducts'] = [];
            $userWishlistProducts = $this->wishlistModel::where('user_id', Auth::user()->id)
                ->get('product_id');
            foreach ($userWishlistProducts as $product) {
                array_push($data['userWhislistProducts'], $product->product_id);
            }
        }
        return view('home', $data);
    }
}
