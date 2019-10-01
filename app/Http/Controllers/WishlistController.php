<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    private $wishlist;
    private $product;
    private $user;

    public function __construct()
    {
        $this->wishlist = new Wishlist;
        $this->product = new Product;
        $this->user = new User;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $data['products'] = [];
            $ids = $this->wishlist::where('user_id', Auth::user()->id)
                ->get('product_id');
            foreach ($ids as $id) {
                $products = $this->product::where('id', $id->product_id)
                    ->get();
                foreach ($products as $product) {
                    array_push($data['products'], $product);
                }
            }
            return view('user_area.wishlists', $data);
        } else {
            return redirect(route('wishlist.index'));
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
        try {
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
            return redirect(route('home'));
        } catch (\Exception $exception) {
            Log::error(print_r($exception, true));
            return redirect(route('home'))->withErrors(['error' => 'Oops! Something goes wrong.']);
        }
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
     * Remove the specified item from storage.
     *
     * @param integer
     * @return void
     */
    public function destroy($id)
    {
        $deletedRows = Wishlist::where('product_id', $id)->delete();
        if ($deletedRows > 0) {
            return redirect(route('wishlist.index'));
        } else {
            return redirect(route('wishlist.index'))->withErrors(['error' => 'Unable to delete. Something goes wrong!']);
        }
    }

    /**
     * Shares the specified resource with user who match with given email.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function share(Request $request)
    {
        $user = $this->user::where('email', $request->input('email'))
            ->first('id');
        if (!empty($user)) {
            return redirect(route('wishlist.index'));
        } else {
            return redirect(route('wishlist.index'))->withErrors(['error' => 'User not found. Check email address and try again.']);
        }
    }
}
