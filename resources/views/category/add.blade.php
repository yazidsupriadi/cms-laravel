@extends('master')

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
<div class="container">
	<div class="row">
		<div class="col-md-8">
			
	<form action="{{url('/categories/store')}}" method="POST" >
		@csrf
		<label>Name</label>
		<input type="text" name="name" value="" class="form-control">
		<button type="submit" class="btn btn-primary">Add</button>
	</form>		
		</div>
	</div>

</div>