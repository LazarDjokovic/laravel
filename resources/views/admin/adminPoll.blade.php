@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">All polls</p>
        <a href="{{route('adminAddPoll')}}"><button class="btn btn-success">Add poll</button></a><br/><br/>
        <button class="btn btn-success" onclick="changeActiveQuestion()">Change active question</button> <span id="pollSuccess" style="color: green;"></span><br/><br/>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <?php $i = 1; ?>
                <tr><th>RB</th><th>Poll</th><th style="text-align: center">Active</th><th>Edit</th><th>Delete</th></tr>
                @foreach($allPolls as $poll)
                    <tr><td>
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $poll->question }}
                        </td>
                        <td style="text-align: center">
                            @if($poll->active=='1')
                                <label><input type="radio" name="optradio" value="{{$poll->id}}" checked="checked"></label>
                            @else
                                <label><input type="radio" name="optradio" value="{{$poll->id}}"></label>
                            @endif
                        </td>
                        <td><a href="{{asset('/adminEditPoll/'.$poll->id)}}">Edit</a></td>
                        <td><a href="" onclick="deletePoll({{$poll->id}})">Delete</a></td>
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
        function deletePoll(id) {
            event.preventDefault();

            $.ajax({
                type:'GET',
                url:websiteRoot+'/adminDeletePoll/'+id,
                success:function (podaci) {
                    console.log(podaci['podaci']);
                    window.location.reload(true);
                },
                error:function (greske) {
                    console.log(greske);
                }
            });
        }

        function changeActiveQuestion() {
            //$('#sliderSuccess').text('Success!');
            event.preventDefault();
            var id=$('input[name=optradio]:checked').val();
            $.ajax({
                type:'GET',
                url:websiteRoot+'/changeActiveQuestion/'+id,
                success:function (podaci) {
                    console.log(podaci['podaci']);
                    window.location.reload(true);

                    $('#pollSuccess').text('Success, active question changed');
                },
                error:function (greske) {
                    console.log(greske);
                }
            });
        }
    </script>
@endsection