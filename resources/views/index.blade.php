@extends('layouts.app')

@section('main')

	<div class="wrap-table">
		<a class='btn btn-primary btn-sm' href="{{route('student.create')}}">Add New Student</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				@if(Session::has('success'))
				<p class='alert alert-success'>{{Session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
				@endif
				<a class='badge badge-primary' href="{{route('student.index')}}">Published</a>
                <a class='badge badge-danger' href="{{route('student.trash')}}">Trash</a>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $students)
						<tr>
							<td>1</td>
							<td>{{$students->name}}</td>
							<td>{{$students->email}}</td>
							<td>{{$students->cell}}</td>
							<td><img src="{{URL::to('/')}}/media/students/{{$students->photo}}" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="{{route('student.show', $students->id)}}">View</a>
								<a class="btn btn-sm btn-warning" href="{{route('student.edit', $students->id)}}">Edit</a>
								<a class="btn btn-sm btn-danger" href="{{route('student.goTrash', $students->id)}}">Trash</a>
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	


@endsection