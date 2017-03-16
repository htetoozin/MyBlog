@extends('main')

@section('title', '| All Categories')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h2>Categories</h2>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	</div> <!-- end of Category Table-->
	<div class="col-md-3">
		<div class="well">
			<h2> New Category</h2>
			<form action="{{ route('categories.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="text" name="name" class="form-control">
				</div>
				<button class="btn btn-primary btn-block">Create New Category</button>
			</form>
		</div>
	</div>
</div>


@endsection
