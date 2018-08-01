@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Slider</p>
        <a href="{{route('adminAddSlider')}}"><button class="btn btn-success">Add picture</button></a><br/><br/>
        <button class="btn btn-success" onclick="changeFirstPicture()">Change first picture</button> <span id="sliderSuccess" style="color: green;"></span><br/><br/>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <tr><th>ID</th><th>Picture</th><th>Alt</th><th style="text-align: center">First image</th><th>Delete</th></tr>
                @foreach($slider as $slide)
                    <tr>
                        <td>
                            {{ $slide->id }}
                        </td>
                        <td>
                            {{ $slide->picture }}
                        </td>
                        <td>
                            {{ $slide->alt }}
                        </td>
                        <td style="text-align: center">
                            @if($slide->active=='first')
                                <label><input type="radio" name="optradio" value="{{$slide->id}}" checked="checked"></label>
                            @else
                                <label><input type="radio" name="optradio" value="{{$slide->id}}"></label>
                            @endif
                        </td>
                        <td><a href="" onclick="deletePage({{$slide->id}})">Delete</a></td>
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
        function deletePage(id) {
            event.preventDefault();

            $.ajax({
                type:'GET',
                url:websiteRoot+'/adminDeleteSlider/'+id,
                success:function (podaci) {
                    console.log(podaci['podaci']);
                    window.location.reload(true);
                },
                error:function (greske) {
                    console.log(greske);
                }
            });
        }

        function changeFirstPicture() {
            //$('#sliderSuccess').text('Success!');
            event.preventDefault();
            var id=$('input[name=optradio]:checked').val();
            $.ajax({
                type:'GET',
                url:websiteRoot+'/changeFirstPicture/'+id,
                success:function (podaci) {
                    console.log(podaci['podaci']);
                    window.location.reload(true);

                    $('#sliderSuccess').text('Success, first picture changed');
                },
                error:function (greske) {
                    console.log(greske);
                }
            });
        }
    </script>
@endsection
