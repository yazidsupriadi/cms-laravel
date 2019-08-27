
@extends('layouts.app')

@section('content')
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div class="card card-default">
		
		<div class="card-header">
			Edit Categories
		</div>
		<div class="card-body">
			
		<form action="{{url('/categories/'.$categories->id.'/update')}}" method="POST" >
		@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="{{$categories->name}}" class="form-control">
			
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Edit</button>
			
		</div>
	</form>
		</div>
	
	</div>
	

@endsection