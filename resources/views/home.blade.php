@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(!empty($products))
                @foreach($products as $product)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="card" style="margin: 10px 0">
                            <img class="card-img-top p-3" src="{{$product['image']}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$product['name']}}</h5>
                                <p class="card-text">

                                </p>
                                <p class="card-price" style="font-weight: bold;">
                                    {{$product['price']}}
                                </p>
                                <form name="add-to-wishlist-{{$product['id']}}" action="{{config('app.url')}}/wishlist"
                                      method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="productId" value="{{$product['id']}}">
                                    @if (Auth::check())
                                        <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-primary">Add to wishlist</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
