@extends('main')

@section('title', "| Edit Tag")


@section('content')

 <form action="{{ route('tags.update', $tag->id) }}" method="post">
 	{{ csrf_field('') }}
 	{{ method_field('PATCH') }}

 	<div class="form-group">
 		<label for="name">Title</label>
 		<input type="text" name="name" class="form-control" value="{{ $tag->name }}">
 	</div>

	<button class="btn btn-success">Save Changes</button>
 </form>

@endsection