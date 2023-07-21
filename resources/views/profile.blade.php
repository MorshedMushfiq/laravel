@extends('layouts.app')


@section('main')

    <div class="wrap">
        <a class='btn btn-primary btn-sm' href="{{route('student.index')}}">Back</a>
        
        <div class="card p-5">
            <img src="{{URL::to('/')}}/media/students/{{$single_student->photo}}" alt="">
            <p>{{$single_student->username}}</p>
            <div class="card-body">
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
                        <tr>
                            <td>1</td>
                            <td>{{$single_student->name}}</td>
                            <td>{{$single_student->email}}</td>
                            <td>{{$single_student->cell}}</td>
                            <td><img style='width: 100px;' src="{{URL::to('/')}}/media/students/{{$single_student->photo}}" alt=""></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection