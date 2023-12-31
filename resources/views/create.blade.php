@extends('layouts.app')

@section("main")

<div class="wrap">
	<a class='btn btn-primary btn-sm' href="{{route('student.index')}}">Back</a>
	<br>
	<br>
	<div class="card shadow">
		<div class="card-body">
			<h2>Sign Up</h2>
			@if(Session::has('success'))
			<p class='alert alert-success'>{{Session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
			@elseif($errors->any())
			<p class='alert alert-danger'>{{$errors->first()}} <button class='close' data-dismiss='alert'>&times;</button> </p>



			@endif
			<form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="">Name</label>
					<input name='name' class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input name='email' class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="">Cell</label>
					<input name='cell' class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<input name='uname' class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="">Photo</label>
					<input name='photo' class="form-control" type="file">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Sign Up">
				</div>
			</form>
		</div>
	</div>
</div>








@endsection
