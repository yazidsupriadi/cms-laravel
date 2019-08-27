@extends('layouts.app')

@section('content')
	
	<div class="d-flex justify-content-end mb-3">
		
		<a href="{{url('/categories/add')}}" title="" class="btn btn-success">Add Category</a>

	</div>
	<div class="card card-default">
		
		<div class="card-header">
			Categories
		</div>
		<div class="card-body">

			<table class="table ">
				<thead>
					<tr>
						<th>Name</th>
						<th>Category Count</th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->name}}</td>
						<td>{{$category->posts->count()}}</td>
						<td><a href="{{url('categories/'.$category->id.'/edit')}}" class="btn btn-info btn-sm text-white"title="">Edit</a>  <a href="{{url('categories/'.$category->id.'/delete')}}" class="btn btn-danger btn-sm" title="" onclick="confirm('are you sure..??')">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	
	</div>
	

@endsection