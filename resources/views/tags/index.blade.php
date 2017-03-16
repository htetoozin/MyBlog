@extends('main')

@section('title', '| All Tags')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h2>Tags</h2>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tags as $tag)
				<tr>
					<td>{{ $tag->id }}</td>
					<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	</div> <!-- end of Category Table-->
	<div class="col-md-3">
		<div class="well">
			<h2> New Tag</h2>
			<form action="{{ route('tags.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="text" name="name" class="form-control">
				</div>
				<button class="btn btn-primary btn-block">Create New Tag</button>
			</form>
		</div>
	</div>
</div>


@endsection
