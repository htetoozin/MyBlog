@extends('main')


@section('title', "| Edit Comment")

@section('content')

	<div class="row">
		<div class="col-md-8-col-md-offset-2">
			<form action="{{ route('comments.update', $comment->id) }}" method="post">
				{{ csrf_field('') }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value="{{ $comment->name }}" disabled>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" value="{{ $comment->email }}" disabled>
				</div>
				<div class="form-group">
					<label for="comment">Comment</label>
					<textarea name="comment" id="" cols="30" rows="10" class="form-control">{{ $comment->comment }}</textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-success">Update Comment</button>
				</div>
				
			</form>
		</div>
	</div>


@endsection