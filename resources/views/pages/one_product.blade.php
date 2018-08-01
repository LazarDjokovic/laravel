@extends('layouts.template')
@section('title')
    One product
@endsection
@section('content')
<div class="container">
    @isset($oneProduct)
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <h1>{{$oneProduct->title}}</h1>\

        <img src="{{asset('/images/games/'.$oneProduct->picture)}}" alt="Produt" class="img-rounded allProductsPicture"/>
    </div>
    <div class="row" style="padding:15px;">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h1>{{$oneProduct->price}}$</h1>

                <hr/>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <p>
                    {{$oneProduct->description}}
                </p>
                <hr/>
                @isset($isOrdered)
                    @if($isOrdered!=0)
                        <p style="color:#008000"><strong>Product added</strong></p>
                    @else
                        <form action="{{asset('/add_to_cart')}}" method="post">
                       {{csrf_field()}}
                        <input type="hidden" id="game_title" name="game_title" value="{{$oneProduct->title}}"/>
                        <input type="hidden" id="product_id" name="product_id" value="{{$oneProduct->id}}"/>
                            @if(session()->has('user'))
                                <input type="hidden" id="user_id" name="user_id" value="{{session('user')[0]->user_id}}"/>
                            @endif
                        <input type="hidden" id="price" name="price" value="{{$oneProduct->price}}"/>
                        <button type="submit" class='btn btn-primary' style='cursor: pointer' >Add to cart</button>
                        </form>
                    @endif
                @endisset
            </div>
    </div>
</div>
<br/>
<div class="container" style="text-align:center;">
	<div class="row" style="text-align:center;">
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$oneProduct->trailer}}"></iframe>
			</div>
		</div>
	</div><br/>
</div>
@endisset
@endsection