@extends('layouts.template')
@section('title')
    Gallery
@endsection
@section('content')
<div class="container" style="text-align:center;">
    <h1>GALLERY</h1>
    <hr/>
    <br/>
    <div class="row" style="padding:15px; text-align:center;">
        @isset($gallery)
            @foreach($gallery as $image)
                <div class='col-md-4 col-sm-6 col-xs-12'>
                    <br/>
                    <a  class='example-image-link'  data-lightbox='example-set' data-title='' href="{{asset('/images/gallery/'.$image->path)}}">
                        <img class='example-image img-rounded allProductsPicture' src='{{asset('/images/gallery/'.$image->path)}}' alt='{{$image->alt}}' style='width:200px;height:267px;'/>
                    </a>
                    <hr/>
                </div>
            @endforeach
        @endisset
    </div>
</div>
@endsection