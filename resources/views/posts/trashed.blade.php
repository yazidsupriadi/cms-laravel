@extends('layouts.app')

@section('content')
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong>{{ $message }}</strong>
	</div>
@endif
	<div class="card card-default">
		
		<div class="card-header">
			Posts
		</div>
		<div class="card-body">
			@if($trashed->count() > 0)
			<table class="table ">
				<thead>
					<tr>
						<th>Image</th>
						<th>Title </th>
						<th> </th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					@foreach($trashed as $trash)
					<tr>
						<td><img src="{{asset('/image/posts/'.$trash->image)}}" width="50px" height="50px" alt=""></td>
						<td>{{$trash->title}}</td>
						<td><form action="{{url('posts/'.$trash->id)}}" method="POST">
							@csrf
							@method('PUT')
							<button type="submit" class="btn btn-info btn-sm">{{$trash->trashed() ? 'Restore' : 'Edit'}}</button>
						</form></td>
						<td><form action="{{url('posts/'.$trash->id)}}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm">{{$trash->trashed() ? 'Delete' : 'Trashed'}}</button>
						</form></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
				<h3 class="text-center">No Trashed Post yet</h3>
			@endif

		</div>
	
	</div>
	

@endsection