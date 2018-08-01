@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Add product</p>
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
            <form action="{{route('adminAddProductAdd')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3>Add product form</h3><br/>
                Title
                <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{ old('title') }}"/>
                Price
                <input type="text" class="form-control" placeholder="Price" id="price" name="price" value="{{ old('price') }}"/>
                Description
                <textarea class="form-control" placeholder="Description" id="description" name="description" value="{{ old('description') }}"></textarea>
                Trailer(letters after = in URL address on youtube)
                <input type="text" class="form-control" placeholder="Trailer" id="trailer" name="trailer" value="{{ old('trailer') }}"/>
                Product picture
                <input type="file" class="form-control" id="picture" name="picture" value="{{ old('picture') }}"/><br/>
                <input type="submit" value="Add product" name="btnAddPage" id="btnAddPage" class="btn btn-primary"/>
            </form>
            <br>
        </div>

    </div>
@endsection