@extends('main')

@section('title', "| $post->title View Post")


@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="col-md-8">
			<img src="{{ asset('images/' . $post->image) }}" alt="" width="800" height="400">
			<h1>{{ $post->title }}</h1>
			<p class="lead"> {!! $post->body !!}</p>
			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
				@endforeach	
			</div>
			<div class="row">
				<div class="col-md-8-col-md-offset-2">
					<div id="backend-comments" style="margin-top: 50px;">
						<h1>Comment <small>{{ $post->comments()->count() }} total</small></h1>
						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Comment</th>
									<th width="50"></th>
								</tr>
							</thead>
							<tbody>
								@foreach( $post->comments as $comment)
								<tr>
									<td>{{ $comment->name }}</td>
									<td>{{ $comment->email }}</td>
									<td>{{ $comment->comment }}</td>
									<td>
										
										<div class="col-md-6" >
											<a href="{{ route('comments.edit', $comment->id ) }}" class="glyphicon glyphicon-pencil btn btn-sm btn-primary"></a>
										</div>
										<div class="col-md-6">
											<form action="{{ route('comments.destroy', $comment->id) }}" method="post">
												{{ csrf_field('') }}
												{{ method_field('delete') }}
												<div class="form-group">
													<button class="glyphicon glyphicon-trash btn btn-sm btn-danger" Onclick="return ConfirmDelete();"></button>
												</div>
											</form>
										</div>
										
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					
				</div>
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
						<form action="{{ route('posts.destroy', $post->id ) }}" method="post">
							{{ csrf_field('') }}
							{{ method_field('DELETE') }} 
							<button class="btn btn-danger btn-block" Onclick="return ConfirmDelete();">Delete</button>
						</form>
					</div>
				</div>
				<div class="row" style="margin-top: 15px;">
					<div class="col-md-12">
						<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"> << See All Posts</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('script')
<script>
	function ConfirmDelete()
	{
		var x = confirm("Are you sure you want to delete?");
		if (x)
			return true;
		else
			return false;
	}
</script>
@endsection
