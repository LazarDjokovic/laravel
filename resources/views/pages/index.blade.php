@extends('layouts.template')
@section('content')
<div class="container">
    @include('components.slider')
    <div class="content">
            <div class="row" style="padding:15px; text-align:center;">
                    <h1>The most popular products</h1>
            </div>
            <div class="row" style="padding:15px; text-align:center;">
                    @isset($firstSixProducts)
                            @foreach($firstSixProducts as $product)
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                            <h3>{{$product->title}}</h3>
                                            <hr/>
                                            <a href="{{asset('/one_product/'.$product->id)}}"><img src="{{asset('/images/games/'.$product->picture)}}" alt="Product" class="img-rounded allProductsPicture"/></a>
                                            <hr/>
                                    </div>
                            @endforeach
                    @endisset
            </div>
            <div class="row" style="text-align:center; padding:15px;">
                    <div class="col-xs-12">
                            <a href="{{asset('/all_products')}}">View all products</a>
                    </div>
            </div>
    </div>
</div>
@endsection
