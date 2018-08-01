@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Gallery</p>
        <a href="{{route('adminAddGallery')}}"><button class="btn btn-success">Add picture</button></a><br/><br/>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <tr><th>ID</th><th>Picture</th><th>Alt</th><th>Delete</th></tr>
                @foreach($gallery as $g)
                    <tr>
                        <td>
                            {{ $g->id }}
                        </td>
                        <td>
                            {{ $g->path }}
                        </td>
                        <td>
                            {{ $g->alt }}
                        </td>
                        <td><a href="" onclick="deleteGallery({{$g->id}})">Delete</a></td>
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
        function deleteGallery(id) {
            event.preventDefault();

            $.ajax({
                type:'GET',
                url:websiteRoot+'/adminDeleteGallery/'+id,
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