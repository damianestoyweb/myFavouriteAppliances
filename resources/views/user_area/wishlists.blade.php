@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(!empty($wishlists))
                @foreach($wishlists as $wishlist)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="card" style="margin: 10px 0">
                            <div class="card-body">
                                {{$wishlist}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
