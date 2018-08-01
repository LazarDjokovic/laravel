@extends('layouts.template')
@section('title')
    All products
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{route('register_check')}}" role="form" method="POST">
                {{csrf_field()}}
                <h2>Registration form</h2>
                <hr/>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="firstName" id="firstName" class="form-control input-lg" placeholder="First Name" tabindex="1"  value="{{ old('firstName') }}"/>
                            <p style="display:none;" id="pFirstName">Must start with capital letter</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="lastName" id="lastName" class="form-control input-lg" placeholder="Last Name" tabindex="2"  value="{{ old('lastName') }}"/>
                            <p style="display:none;" id="pLastName">Must start with capital letter</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="usernameReg" id="usernameReg" class="form-control input-lg" placeholder="Username" tabindex="3"  value="{{ old('usernameReg') }}"/>
                    <p style="display:none;" id="pUsername">Must contain only letters and numbers, min 3 max 20 characters</p>
                </div>
                <div class="form-group">
                    <input type="email" name="emailReg" id="emailReg" class="form-control input-lg" placeholder="Email Address" tabindex="4"  value="{{ old('emailReg') }}"/>
                    <p style="display:none;" id="pEmailReg">Invalid email format</p>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="passwordReg" id="passwordReg" class="form-control input-lg" placeholder="Password" tabindex="5"  value="{{ old('passwordReg') }}"/>
                            <p style="display:none;" id="pPassword">Min 8 characters, must contatin atleast one number, one upper and one lower case letter</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" />
                            <p style="display:none;" id="cPassword">Passwords don't match</p>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row" style="text-align:center;">
                    <div class="col-xs-12 col-md-6"><input type="submit" name="btnRegister" id="btnRegister" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7" disabled="disabled" title="Fill the form first"/></div><!-- disabled="disabled" title="Fill the form first"-->
                </div>
            </form>
        </div>
    </div>
    <!-- row before footer -->
    <div class="row" style="height:50px;"> 
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </div>
    </div>
</div>
@endsection
@section('js')
    @parent
    <script src="{{asset('/')}}js/register_check.js"></script>
@endsection