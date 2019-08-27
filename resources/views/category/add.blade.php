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
			Add Categories
		</div>
		<div class="card-body">
			<form action="{{url('/categories/store')}}" method="POST" >
		@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="" class="form-control">
			
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add</button>
			
		</div>
		</form>		
	
		</div>
	
	</div>
	

@endsection