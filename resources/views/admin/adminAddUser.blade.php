@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Add user</p>
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
            <form action="{{route('adminAddUserAdd')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3>Add user form</h3><br/>
                First name
                <input type="text" class="form-control" placeholder="First name" id="firstName" name="firstName" value="{{ old('firstName') }}"/>
                Last name
                <input type="text" class="form-control" placeholder="Last name" id="lastName" name="lastName" value="{{ old('lastName') }}"/>
                Username
                <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="{{ old('username') }}"/>
                Email
                <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}"/>
                Password
                <input type="password" class="form-control" placeholder="Password" id="password" name="password"/>
                Profile picture(optional)
                <input type="file" class="form-control" id="picture" name="picture" value="{{ old('picture') }}"/><br/>
                Role
                <div class="radio">
                    <label><input type="radio" name="optradio" checked="checked" value="user">User</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="optradio" value="admin">Admin</label>
                </div>
                <input type="submit" value="Add user" name="btnAddPage" id="btnAddPage" class="btn btn-primary"/>
            </form>
            <br>
        </div>

    </div>
@endsection