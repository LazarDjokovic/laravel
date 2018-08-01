@extends('layouts.template')
@section('title')
    Contact
@endsection
@section('content')
    <div class="container">
	<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="well well-sm">
                    <form class="form-horizontal" action="{{route('contact_send')}}" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <legend class="text-center">Contact us</legend>
                            <!-- Name input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="name">Name</label>
                              <div class="col-md-9">
                                <input id="name" name="name" type="text" placeholder="Your name" class="form-control" onBlur="nameCheck();">
                                    <p style="display:none;" id="pName">Invalid format</p>
                              </div>
                            </div>
                            <!-- Email input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="email">Your E-mail</label>
                              <div class="col-md-9">
                                <input id="email" name="email" type="text" placeholder="Your email" class="form-control" onBlur="emailCheck();">
                                    <p style="display:none;" id="pEmail">Incorrect email address</p>
                              </div>
                            </div>
                            <!-- Message body -->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="message">Your message</label>
                              <div class="col-md-9">
                                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" onBlur="yourMessageCheck();"></textarea>
                                    <p style="display:none;" id="pMessageS">Message is to short</p>
                                    <p style="display:none;" id="pMessageL">Message is to long. You can't send more than 10000 characters</p>
                              </div>
                            </div>
                            <!-- Form actions -->
                            <div class="form-group">
                              <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary btn-lg" id="sendForm" name="sendForm">Submit</button>
                              </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
	</div>
</div>
@endsection
