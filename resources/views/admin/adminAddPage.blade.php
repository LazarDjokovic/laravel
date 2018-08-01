@extends('layouts.admin')
@section('adminContent')
<div class="col-md-12">
    <p class="lead">Add page</p>
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
        <form action="{{route('adminAddPageAdd')}}" method="POST">
            {{csrf_field()}}
            <h3>Add page form</h3><br/>
            Name
            <input type="text" class="form-control" placeholder="Name" id="name" name="name"/>
            Path
            <input type="text" class="form-control" placeholder="Path" id="path" name="path"/><br/>
            <input type="submit" value="Add page" name="btnAddPage" id="btnAddPage" class="btn btn-primary"/>
        </form>
        <br>
    </div>

</div>
@endsection