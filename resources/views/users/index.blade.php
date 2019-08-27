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

			@if($users->count() > 0)
			<table class="table ">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name </th>
						<th>Email</th>
						<th>Role </th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td></td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->role}}</td>
						@if($user->role == 'admin')

						@else
						<td>
							<form action="{{url('users/'.$user->id.'/makeadmin')}}" method="POST" >
								@csrf
								<button type="submit" class="btn btn-success">Make as Admin</button>
							</form>

						</td>
						@endif
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