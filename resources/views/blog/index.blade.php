@extends('main')


@section('title', '|All Blog')


@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Blog</h1>
			@foreach($posts as $post)
				<div>
					<h2>{{ $post->title }}</h2>
					<h5>Published: {{ date('M j: Y', strtotime( $post->created_at ))}}</h5>
					<p>{{ substr($post->body, 0, 250) }} {{ strlen($post->body) > 250 ? "..." : ""}}</p>
					<a href = "{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
					<hr>
				</div>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{{ $posts->links() }}
			</div>
		</div>
	</div>

@endsection