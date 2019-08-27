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
			Add Post
		</div>
		<div class="card-body">
			<form action="{{url('/posts/store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Title</label>
			<input type="text" name="title" value="" class="form-control">
			
		</div>

		<div class="form-group">
			<label>Description</label>
			<textarea name="description" class="form-control" rows="6" cols="6"></textarea>	
		</div>

		<div class="form-group">
			<label>Content</label>
			<textarea name="content" class="form-control" rows="6" cols="6"></textarea>	
		</div>

		<div class="form-group">
			<label>Image</label>
			<input type="file" name="image" value="" class="form-control">
			
		</div>

		<div class="form-group">
			<label>Published at</label>
			<input type="text" name="published_at" value="{{date('Y-m-d')}}" class="form-control">
			
		</div>

		<div class="form-group">
			<label>Category</label>
			<select name="category_id">
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
			</select>
		</div>

		
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add</button>
			
		</div>
		</form>		
	
		</div>
	
	</div>
	

@endsection