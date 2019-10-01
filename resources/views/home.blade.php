@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Sort by:</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Title</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Price</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @if(!empty($products))
                @foreach($products as $product)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="card" style="margin: 10px 0">
                            <img class="card-img-top p-3" src="{{$product['picture']}}" alt="Card image cap">
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
                                        @if(in_array($product['id'],$userWhislistProducts))
                                            <button type="button" class="btn btn-default"
                                                    disabled>{{__('Added to your Wishlist')}}</button>
                                        @else
                                            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                            <button type="submit" class="btn btn-primary">Add to wishlist</button>
                                        @endif
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
