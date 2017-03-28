@extends('main')

@section('title', "| $post->title Edit Post")

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
		tinymce.init({ 
			selector:'textarea',
			plugins : 'link lists code',
			menubar: 'false'

		});
	</script>
@endsection


@section('content')


<div class="row">
	<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
		{{ csrf_field('') }}
		{{ method_field('PATCH') }}
		<div class="col-md-12">
			<div class="col-md-8">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{ $post->title }}">
				</div>
				<div class="form-group">
					<label for="slug">Slug</label>
					<input type="text" name="slug" class="form-control" value="{{ $post->slug }}">
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<select name="category_id" id="" class="form-control">
						@foreach( $categories as $category )
						<option {{ ( $category->id == $post->category_id ) ? 'selected' : ''}} value="{{ $category->id }}" >
							{{ $category->name }}
						</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
				  <label for="tags">Tags</label>
				  <select class="form-control select2-multi" multiple="multiple" id="" name="tags[]">
				        @foreach ($tags as $tag)
				          <option {{ ($tag->id == $post->category_id) ? 'selected' : '' }} value="{{ $tag->id }}">
				            {{ $tag->name }}
				          </option>
				        @endforeach
				      </select>
    			</div>﻿
    			<div class="form-group">
					<label for="featured_image">Update Featured Image</label>
					<input type="file" name="featured_image">
				</div>
				<div class="form-group">
					<label for="body">Body</label>
					<textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at) ) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Updated At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at) ) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-block btn-success">Save Changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection

@section('script')
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(".select2-multi").select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
	</script>

@endsection
