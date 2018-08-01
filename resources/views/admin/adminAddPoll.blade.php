@extends('layouts.admin')
@section('adminContent')
    <div class="col-md-12">
        <p class="lead">Add poll</p>
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
            <form action="{{route('adminAddPollAdd')}}" method="POST">
                {{csrf_field()}}
                <h3>Add poll form</h3><br/>
                Question<br/><br/>
                <input type="text" class="form-control" placeholder="Question" id="question" name="question" value="{{ old('question') }}"/><br/>
                <input type="submit" value="Add poll" name="btnAddPoll" id="btnAddPoll" class="btn btn-primary"/>
            </form>
            <br>
        </div>

    </div>
@endsection