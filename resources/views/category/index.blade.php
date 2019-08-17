@extends('master')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card card-default">
		<div class="card-header text-center bg-primary ">
			<h6>Category </h6>
		</div>
		<div class="card-body">
			<ul>
				@foreach($categories as $category)
				<li>
					{{$category->name}}
				<a href="{{url('/categories/'.$category->id.'/edit')}}" class="btn btn-primary btn-sm text-white float-right">Edit</a>

				<a href="{{url('/categories/'.$category->id.'/delete')}}" class="btn btn-danger btn-sm text-white float-right">Delete</a>
				</li>
				@endforeach
			</ul>
		</div>
		
	</div>	

	</div>
		
</div>
	

@endsection