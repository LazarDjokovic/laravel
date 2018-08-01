@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Edit product</p>
        <div class="col-md-offset-3 col-md-7">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="col-md-offset-3 col-md-7">
            <form action="{{asset('/adminEditProductEdit/'.$oneProduct->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3>Edit product form</h3><br/>
                Title
                <input type="text" class="form-control" value="{{$oneProduct->title}}" id="title" name="title" />
                Price
                <input type="text" class="form-control" value="{{$oneProduct->price}}" id="price" name="price" />
                Description
                <textarea class="form-control" id="description" name="description" >{{$oneProduct->description}}</textarea>
                Trailer(letters after = in URL address on youtube)
                <input type="text" class="form-control" value="{{$oneProduct->trailer}}" id="trailer" name="trailer" />
                Product picture<br/>
                <img src="{{asset('/images/games/'.$oneProduct->picture)}}"  class="img-rounded img-responsive profilePictureMyProfile" style="width: 150px;height: 200px;"/><br/>
                Change product picture
                <input type="file" class="form-control" id="picture" name="picture" /><br/>
                <input type="submit" value="Edit product" name="btnAddPage" id="btnAddPage" class="btn btn-primary"/>
            </form>
            <br>
        </div>

    </div>
@endsection