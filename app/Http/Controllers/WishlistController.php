<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    private $wishlist;

    public function __construct()
    {
        $this->wishlist = new Wishlist;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $products = $this->wishlist::where('user_id', Auth::user()->id)
                ->get('product_id');

            $data = $this->wishlist::where('user_id', Auth::user()->id)
                ->get('product_id');

            return view('user_area.wishlists', $data);
        } else {
            header('Location:' . config('app.url'));
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->wishlist->product_id = $request->input('productId');
        $this->wishlist->user_id = $request->input('userId');
        if (!empty($request->input('name'))) {
            $this->wishlist->name = $request->input('name');
        }

        if (!empty($request->input('type'))) {
            $this->wishlist->type = $request->input('type');
        } else {
            $this->wishlist->type = "public";
        }

        $this->wishlist->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
