@extends('main')

@section('title', "| $post->title View Post")


@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead"> {{ $post->body }}</p>
			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach	
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
				  <label>Url:</label>
				  <p><a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug) }} </a></p>
				</dl>
				<dl class="dl-horizontal">
				  <label>Category:</label>
				  <p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
				  <label>Created At:</label>
				  <p>{{ date('M j, Y h:ia', strtotime($post->updated_at) ) }}</p>
				</dl>

				<dl class="dl-horizontal">
				  <label>Updated At:</label>
				  <p>{{ date('M j, Y h:ia', strtotime($post->updated_at) ) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
						<form action="{{ route('posts.destroy', $post->id ) }}" method="post" onclick="return confirm()">
							{{ csrf_field('') }}
							{{ method_field('DELETE') }} 
							<button class="btn btn-danger btn-block">Delete</button>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"> << See All Posts</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

<script>

	function confirm(){
		var(x) = confirm('Are You Sure to delete this data');

		if(x)
			return true;
		else
			return false;
	}

</script>