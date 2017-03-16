@extends('main')

@section('title', 'Create A New Post')

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content')

<div class="row">
	<div class="col-md-8-col-md-offset-2">
		<h1>Create A New Post </h1>
		<hr>
		<form action="{{ route('posts.store') }}" method="post" data-parsley-validate="">
			{{csrf_field() }}
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" required="" maxlength="255">
			</div>
			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" name="slug" class="form-control" required="" minlength="5" maxlength="255">
			</div>
			<div class="form-group">
				<label for="category">Category</label>
				<select name="category_id" id="" class="form-control">
					@foreach( $categories as $category )
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="tags">Tag</label>
				<select name="tags[]" id="" class="select2-multi form-control"  multiple="multiple">
					@foreach( $tags as $tag )
					<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="body">Body</label>
				<textarea name="body" id="" cols="30" rows="10" class="form-control" required=""></textarea>
			</div>
			<button class="btn btn-block btn-success">Create Post</button>
		</form>
	</div>
</div>

@endsection

@section('script')
	<script src="{{ asset('js/parsley.min.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(".select2-multi").select2();
	</script>
@endsection