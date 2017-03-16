@extends('main')

@section('title', '| Contact')

@section('content')
        <div class="row">
            <div class="col-md-12">
                  <h1>Contact Me</h1>
                  <hr>
                  <form action="{{ url('contact') }}" method="post">
                        {{ csrf_field() }}
                  	<div class="form-group">
                  		<label for="email">Email:</label>
                  		<input type="text" name="email" class="form-control">
                  	</div>

                  	<div class="form-group">
                  		<label for="subject">Subject:</label>
                  		<input type="text" name="subject" class="form-control">
                  	</div>

                  	<div class="form-group">
                  		<label for="subject">Message:</label>
                  		<textarea name="message" id="" cols="30" rows="10" class="form-control">Type your message here...</textarea>
                  	</div>
                  	<button class="btn btn-success">Send Message</button>
                  </form>
            </div>
        </div>
@endsection