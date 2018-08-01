@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Edit poll</p>
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
            @isset($onePoll)
                <form action="{{asset('/adminEditPollEdit/'.$onePoll->id)}}" method="POST">
                    {{csrf_field()}}
                    <h3>Add edit page</h3><br/>
                    Question<br/><br/>
                    <input type="text" class="form-control" id="question" name="question" value="{{$onePoll->question}}"/><br/>
                    <input type="submit" value="Edit poll" name="btnEditPoll" id="btnEditPoll" class="btn btn-primary"/>
                </form>
            @endisset
            <br>
        </div>

    </div>
@endsection