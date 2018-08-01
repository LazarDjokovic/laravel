@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">All pages</p>
        <a href="{{route('adminAddPage')}}"><button class="btn btn-success">Add page</button></a><br/><br/>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <tr><th>ID</th><th>Name</th><th>Path</th><th>Edit</th><th>Delete</th></tr>
                @foreach($allPages as $page)
                    <tr>
                        <td>
                            {{ $page->id }}
                        </td>
                        <td>
                            {{ $page->name }}
                        </td>
                        <td>
                            {{ $page->path }}
                        </td>
                        <td><a href="{{asset('/adminEditPage/'.$page->id)}}">Edit</a></td>
                        <td><a href="" onclick="deleteSlider({{$page->id}})">Delete</a></td>
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
        function deleteSlider(id) {
            event.preventDefault();

            $.ajax({
                type:'GET',
                url:websiteRoot+'/adminDeletePage/'+id,
                success:function (podaci) {
                    window.location.reload(true);
                },
                error:function (greske) {
                    console.log(greske);
                }
            });
        }
    </script>
@endsection
