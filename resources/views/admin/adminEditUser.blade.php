@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Edit user</p>
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
            @isset($oneUser)
                <form action="{{asset('/adminEditUserEdit/'.$oneUser->user_id)}}" method="POST">
                    {{csrf_field()}}
                    <h3>Edit user form</h3><br/>
                    <strong>Username and email are unique</strong><br/><br/>
                    First name
                    <input type="text" class="form-control" value="{{$oneUser->first_name}}" id="firstName" name="firstName" />
                    Last name
                    <input type="text" class="form-control" value="{{$oneUser->last_name}}" id="lastName" name="lastName" />

                    Password
                    <input type="text" class="form-control" value="{{$oneUser->password}}" id="password" name="password"/><br/>

                    Role
                    @if($oneUser->role=='user')
                        <div class="radio">
                            <label><input type="radio" name="optradio" checked="checked" value="user">User</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio" value="admin">Admin</label>
                        </div>
                    @elseif($oneUser->role=='admin')
                        <div class="radio">
                            <label><input type="radio" name="optradio" value="user">User</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio" checked="checked" value="admin">Admin</label>
                        </div>
                    @endif
                    <input type="submit" value="Edit user" name="btnAddPage" id="btnAddPage" class="btn btn-primary"/>
                </form>
            @endisset
            <br>
        </div>

    </div>
@endsection