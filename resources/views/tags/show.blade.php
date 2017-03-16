@extends('main')

@section('title', "$tag->name")

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{ $tag->name }} Tag <small>{{$tag->posts()->count() }} Posts</small></h1> 
		<hr>
	</div>
	<div class="col-md-2">
		<a href="{{ route('tags.edit', $tag->id) }}" style="margin-top:20px;" class="btn btn-block btn-pullright btn-primary">Edit</a>
	</div>
	<div class="col-md-2">
		<form action="{{ route('tags.destroy', $tag->id ) }}" method="post" onclick="return confirm()">
				{{ csrf_field('') }}
				{{ method_field('DELETE') }} 
				<button class="btn btn-danger btn-block" style="margin-top:20px;" >Delete</button>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tag->posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>
						@foreach($post->tags as $tag)
							<span class="label label-default">{{ $tag->name }}</span>
						@endforeach
					</td>
					<td><a href="{{ route('posts.show', $post->id) }}"  class="btn btn-xs btn-default">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@endsection