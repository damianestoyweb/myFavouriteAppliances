@extends('layouts.app')

@section('content')
    <div class="container" data-page="wishlist">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-xs-10 col-sm-10">
                <h1>{{__('My Wishlist')}}</h1>
            </div>
            <div class="col-xs-2 col-sm-2 text-right">
                @if(!empty($products))
                    <a href="" class="btn btn-outline-primary share-button">
                        <span class="font-weight-bold align-middle">{{__('Share it!')}}</span>
                        <i class="material-icons align-middle">share</i></a>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            @if(!empty($products))
                @foreach($products as $product)
                    <div class="col-xs-10 col-sm-10 pt-2 pb-2">
                        <div class="media">
                            <img style="max-width: 100px;" src="{{$product->picture}}" class="img-thumbnail mr-3"
                                 alt="{{$product->name}}">
                            <div class="media-body">
                                <h5 class="mt-0">{{$product->name}}</h5>
                                <strong>{{$product->price}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 text-right">
                        <a href="/wishlist/delete/{{$product->id}}" class="btn btn-danger">
                            <span class="font-weight-bold align-middle">{{__('Delete')}}</span>
                            <i class="material-icons align-middle">delete</i>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row pt-5">
            <div class="col-xs-12 col-sm-12">
                <h1>{{__('Shared with me')}}</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            @if(!empty($sharedWishlists))
                @foreach($sharedWishlists as $wishlist)
                    <div class="col-xs-12 col-sm-12">
                        <h2>{{__("Wishlist of: {$wishlist['owner']['name']}")}}</h2>
                    </div>
                    @if(!empty($wishlist['products']))
                        @foreach($wishlist['products'] as $product)
                            <div class="col-xs-12 col-sm-12 pt-2 pb-2">
                                <div class="media">
                                    <img style="max-width: 100px;" src="{{$product['picture']}}"
                                         class="img-thumbnail mr-3"
                                         alt="{{$product['name']}}">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{$product['name']}}</h5>
                                        <strong>{{$product['price']}}</strong>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
        <hr>

        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">I want to share my wishlist with</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="share-wishlist" action="/wishlist/share" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Your friend's email">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Share</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
