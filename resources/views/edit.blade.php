@extends('layouts.app')

@section("main")

<div class="wrap">
	<a class='btn btn-primary btn-sm' href="{{route('student.index')}}">Back</a>
	<br>
	<br>
	<div class="card shadow">
		<div class="card-body">
			<h2>Edit {{$edit_student->name}} Student</h2>
			@if(Session::has('success'))

			<p class='alert alert-success'>{{Session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>

			@elseif($errors->any())
			<p class='alert alert-danger'>{{$errors->first()}} <button class='close' data-dismiss='alert'>&times;</button> </p>

			@endif
			<form action="{{route('student.update', $edit_student->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="">Name</label>
					<input name='name' class="form-control" value='{{$edit_student->name}}' type="text">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input name='email' value='{{$edit_student->email}}' class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="">Cell</label>
					<input name='cell' class="form-control" value='{{$edit_student->cell}}' type="text">
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<input name='uname' value='{{$edit_student->username}}' class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="">Photo</label>
					<input name='photo' value="{{URL::to('/')}}/media/students/{{$edit_student->photo}}" class="form-control" type="file">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Update Student">
				</div>
			</form>
		</div>
	</div>
</div>


@endsection
