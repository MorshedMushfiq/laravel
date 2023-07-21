<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //load main page
    public function index(){
        $students_data = Student::all();
        return view('index', [
            "data" => $students_data
        ]);
    }

    //load student create form page
    public function create(){
        return view('create');
    }

    //store method insert into database 
    public function store(Request $request){

        $this->validate($request, [
            "name" => ['required'],
            "email" => ['required', 'unique:students'],
            "cell" => ['required', 'unique:students'],
            "username" => ['unique:students'],
            "photo" => ['required']
        ]);

        if($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = md5(time(). rand()). "." . $img->getClientOriginalExtension();
            $img->move(public_path("media/students"), $unique_name);
        }

        Student::create([
            "name" => $request ->name,
            "email" => $request ->email,
            "cell" => $request ->cell,
            "username" => $request ->uname,
            "photo" => $unique_name
        ]);

        return back()->with("success", "Your $request->name Data Added Successful");
    }

    public function show($id){
        $data = Student::find($id);
        return view('profile',[
            'single_student' => $data
        ]);
    }

    public function edit($id){
        $data = Student::find($id);
        return view('edit',[
            'edit_student' => $data
        ]);
    }

    public function goTrash($id){
        $data = Student::find($id);
        $data ->delete();
        return back()->with("success", "Your Data Trashed Succesfull");
    }

    public function trash(){
        $trashed_student = Student::onlyTrashed()->get();
        return view("trash", [
            'trash_data' => $trashed_student
        ]);
    }

    public function restore($id){
        $data = Student::withTrashed()->find($id);
        $data->restore();
        return back()->with("success", "Data Restore Successful");
        
    }

    public function forceDelete($id){
        $data = Student::withTrashed()->find($id);
        $data->forceDelete();
        return back()->with("success", "Data Delete Permanently Successful");
        
    }

    public function update(Request $request, $id){


        $update_data = Student::find($id);
        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->cell = $request->cell;
        $update_data->username = $request->uname;

        if($request->hasFile('photo')){
            $destination = "media/students/". $update_data->photo;
            if(File::exists($destination)){
                File::Delete($destination);
            }


            $img = $request->file('photo');
            $unique_name = md5(time(). rand()). "." . $img->getClientOriginalExtension();
            $img->move(public_path("media/students"), $unique_name);
        }
        $update_data->photo = $unique_name;


        $update_data ->update();
        return back()->with("success", " $request->name Data Updated Success");
    }


}
