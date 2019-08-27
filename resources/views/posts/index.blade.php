@extends('layouts.app')

@section('content')
		@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong>{{ $message }}</strong>
	</div>
@endif


	<div class="d-flex justify-content-end mb-3">
		
		<a href="{{url('/posts/create')}}" title="" class="btn btn-success">Add a Post</a>

	</div>

	<div class="card card-default">
			
		<div class="card-header">
			Posts
		</div>
		<div class="card-body">

			@if($posts->count() > 0)
			<table class="table ">
				<thead>
					<tr>
						<th>Image</th>
						<th>Title </th>
						<th>Category</th>
						<th> </th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td><img src="{{asset('/image/posts/'.$post->image)}}" width="50px" height="50px" alt=""></td>
						<td>{{$post->title}}</td>
						<td>
							<a href="{{url('/categories/'.$post->category->id.'/edit')}}" title="">{{$post->category->name}}</a>
						</td>
						<td><a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-info btn-sm text-white"title="">Edit</a></td>
						<td><form action="{{url('posts/'.$post->id)}}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm">{{$post->trashed() ? 'Delete' : 'Trashed'}}</button>
						</form></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
				<h3 class="text-center"> No Post Yet</h3>
			@endif

		</div>
	
	</div>
	

@endsection