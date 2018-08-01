<nav class="navbar navbar-inverse" role="navigation">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <div class="container-fluid">
        <!-- LOGO -->
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <a href="{{asset('/')}}" class="navbar-brand">ZOLATRADE</a>
        </div>

        <!-- Manu items-->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                @isset($pages)
                    @foreach($pages as $p)
                        @if($p->path!='register' && $p->path!='#popUpWindow')
                            <li><a href="{{route($p->path)}}">{{$p->name}}</a></li>
                        @endif
                    @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right" >
               <li>
                   @if(session()->has('user') && session()->get('user')[0]->role=='user')
                        <input type="hidden" value="{{session()->get('user')[0]->user_id}}"/>
                        <li><a href='{{asset('/user_profile/'.session()->get('user')[0]->user_id)}}'><span class='glyphicon glyphicon-shopping-cart' id='shoppingCart' style="color:#CCC">
                           <span id="numberOfOrders"></span>
                        </span></a></li>
                        <li><a href='{{asset('/user_profile/'.session()->get('user')[0]->user_id)}}'>User profile</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                   @elseif(session()->has('user') && session()->get('user')[0]->role=='admin')
                    <input type="hidden" value="{{session()->get('user')[0]->user_id}}"/>
                    <li><a href="{{route('admin')}}"><strong style="color: #ff0000;">Admin</strong></a></li>
                    <li><a href='{{asset('/user_profile/'.session()->get('user')[0]->user_id)}}'>User profile</a></li>
                    <li><a href='{{asset('/user_profile/'.session()->get('user')[0]->user_id)}}'><span class='glyphicon glyphicon-shopping-cart' id='shoppingCart' style="color:#CCC">
                           <span id="numberOfOrders"></span>
                        </span></a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                @else
                       @foreach($pages as $p)
                           @if($p->path=='#popUpWindow')
                               <button type='button' class='btn btn-success' data-toggle='modal' data-target='{{$p->path}}'>{{$p->name}}</button>
                           @endif
                       @endforeach
                       <div class="modal fade" id="popUpWindow">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <!-- header-->
                                   <div class="modal-header">
                                       <button tupy="button" class="close" data-dismiss="modal">&times;</button>
                                       <h3 class="modal-title">Log In Form</h3>
                                   </div><!-- body (form)-->
                                   <form action="{{route('login')}}" method="POST" id="loginForm" name="loginForm">
                                       {{csrf_field()}}
                                       <div class="modal-body">
                                           <div class="form-group">
                                               <input type="username" class="form-control" placeholder="Username" name="username" id="username"/>
                                           </div>
                                           <div class="form-group">
                                               <input type="password" class="form-control" placeholder="Password" name="password" id="password"/>
                                           </div>
                                       </div>
                                       <!-- footer (button)-->
                                       <div class="modal-footer">
                                           <button type="submit" class="btn btn-primary btn-block" name="btnLogin" id="btnLogin">Log In</button><br/>
                                           @foreach($pages as $p)
                                               @if($p->path=='register')
                                                   Not registered yet? <a href="{{route($p->path)}}">{{$p->name}}</a>
                                               @endif
                                           @endforeach
                                           @endisset
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   @endif
               </li>
            </ul>
        </div>
    </div>
</nav>
