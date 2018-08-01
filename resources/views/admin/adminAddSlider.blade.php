@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Add slider</p>
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
            <form action="{{route('adminAddSliderAdd')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3>Add slider form</h3><br/>
                Alt
                <input type="text" class="form-control" placeholder="Name" id="alt" name="alt"/>
                Picture
                <input type="file" class="form-control" id="picture" name="picture"/><br/>
                <input type="submit" value="Add slider" name="btnAddPage" id="btnAddPage" class="btn btn-primary"/>
            </form>
            <br>
        </div>

    </div>
@endsection