@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">All users</p>
        <a href="{{route('adminAddUser')}}"><button class="btn btn-success">Add user</button></a><br/><br/>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <?php $i = 1; ?>
                <tr><th>RB</th><th>First name</th><th>Last name</th><th>Username</th><th>Email</th><th>Role</th><th>Joined At</th><th>Edit</th><th>Delete</th></tr>
                @foreach($allUsers as $user)
                    <tr><td>
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $user->first_name }}
                        </td>
                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>
                            {{ $user->username }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->role }}
                        </td>
                        <td>
                            {{ $user->joined }}
                        </td>
                        <td><a href="{{asset('/adminEditUser/'.$user->user_id)}}">Edit</a></td>
                        <td><a href="" onclick="deleteUser({{$user->user_id}})">Delete</a></td>
                    </tr>
                @endforeach
            </table>

            <br>
        </div>

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
@endsection
@section('adminJavaScript')
    @parent
    <script>
        function deleteUser(id) {
            event.preventDefault();

            $.ajax({
                type:'GET',
                url:websiteRoot+'/adminDeleteUser/'+id,
                success:function (podaci) {
                    console.log(podaci['podaci']);
                    window.location.reload(true);
                },
                error:function (greske) {
                    console.log(greske);
                }
            });
        }
    </script>
@endsection