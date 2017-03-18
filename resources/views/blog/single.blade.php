@extends('main')

<?php  $title = htmlspecialchars($post->title) ?>
@section('title', "| $title ")

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->body }}</p>
		<hr>
		<p>Posted in {{ $post->category->name }} </p>
	</div>

	<div class="col-md-8 col-md-offset-2">
		<h3 class="comment-title">{{ $post->comments()->count() }} Comments</h3>
		@foreach($post->comments as $comment)
			<div class="comment">
				<div class="author-info">
					<img src="{{ "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment->email))) . "?s=50&d=mm"}}" class="author-image">
					<div class="author-name">
						<h4>{{ $comment->name }}</h4>
						<p class="author-time">{{ date('F nS, Y  - g:iA', strtotime($comment->created_at)) }}</p>
					</div>
				</div>
				<div class="comment-content">
					{{ $comment->comment }}
				</div>
				
			</div>
		@endforeach
	</div>

		<div class="row">
			<div id="comment-form" class="col-md-8 col-md-offset-2">
				<form action="{{ route('comments.store', $post->id) }}" method="post">
					{{ csrf_field() }}
						<div class="col-md-6">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" placeholder="Fill Your Name ...">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" placeholder="Fill Your Email ...">
							</div>	
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea name="comment" id="" cols="30" rows="5" class="form-control">
								</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<button class="btn btn-success btn-block">Add Comment</button>
						</div>
			
				</form>
			</div>
		</div>
</div>


@endsection