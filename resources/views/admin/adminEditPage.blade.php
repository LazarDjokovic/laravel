@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Edit page</p>
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
            @isset($onePage)
            <form action="{{asset('/adminEditPageEdit/'.$onePage->id)}}" method="POST">
                {{csrf_field()}}
                <h3>Add edit page</h3><br/>
                Name
                <input type="text" class="form-control" id="name" name="name" value="{{$onePage->name}}"/>
                Path
                <input type="text" class="form-control" id="path" name="path" value="{{$onePage->path}}"/><br/>
                <input type="submit" value="Edit page" name="btnAddPage" id="btnAddPage" class="btn btn-primary"/>
            </form>
            @endisset
            <br>
        </div>

    </div>
@endsection