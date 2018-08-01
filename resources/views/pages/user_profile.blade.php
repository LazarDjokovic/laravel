@extends('layouts.template')
@section('title')
    User profile
@endsection
@section('content')
    @isset($user)
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                    <div class="well well-sm">

                        <div class="row">
                            <div class="col-xs-8 col-sm-6 col-md-4" id="listMyProfile">
                                <img src="{{asset('/images/profile/'.$user->path)}}" alt="{{$user->alt}}" class="img-rounded img-responsive profilePictureMyProfile"/>
                                <input type="hidden" value="{{$user->path}}" id="profilePictureHidden"/>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-8">
                                <h4>{{$user->first_name}} {{$user->last_name}}</h4>
                                <i class="glyphicon glyphicon-envelope"></i> {{$user->email}}
                                <br />
                                <i class="glyphicon glyphicon-user"></i> {{$user->username}}
                                <br />
                                <i class="glyphicon glyphicon-cog"></i> <strong>role:</strong> {{$user->role}}
                                <br />
                                <i class="glyphicon glyphicon-calendar"></i> <strong>joined:</strong> {{$user->joined}}
                                <br/><br/>
                                <!-- Split button -->
                                <div class="btn-group">
                                    <form method="post" action="{{route('change_profile_picture')}}" enctype="multipart/form-data">
                                        <input type="hidden" value="{{$user->user_id}}" id="userId" name="userId"/>
                                        {{csrf_field()}}
                                        <input type='file' name='inputProfilePicture' id='inputProfilePicture'/><br/>
                                        <input type="submit" value='Change profile picture' name='profilePictureSubmit' class='btn btn-primary'/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-9 col-sm-offset-1 col-xs-12">
                    <span id='cancleOrdersResponse'></span>
                    <h3>Your orders</h3>
                    <div id="orders">

                    </div>
                </div>
            </div>
        </div>
    @endisset
@endsection
@section('js')
    @parent
    <script src="{{asset('/js/ajax.js')}}"></script>
@endsection('js')