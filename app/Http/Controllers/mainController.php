<?php

namespace App\Http\Controllers;
use App\Models\Enroll_courses;
use App\Models\Assignment;
use App\Models\User;
use App\Models\SubmittedAssignment;

use Illuminate\Http\Request;
use App\Models\Courses;
use Session;
use Validator;
use Auth;
use DB;

class mainController extends Controller
{

    ///admin authentication
    public function admin_login(){
        return view('admin-login');
   }

   public function admin_register(){
      return view('admin-register');
   }
   

   public function admin_log(Request $request){
   
     $credentials = $request->only('email', 'password');
     if (Auth::attempt($credentials)) {
        if (auth()->user()->is_admin == 1){
            return redirect('dashboard');
         }
     }
     else{
        return redirect("adminLogin")->withError('Oppes! You have entered invalid credentials');
     }
     
      
   }

   
   public function admin_reg(Request $request){
      User::create([
         'name' => $request -> name,
         'email' => $request -> email,
         'password' => \Hash::make($request -> password)
      ]);

      if (Auth::attempt($request->only('email', 'password'))){
         return redirect('adminLogin');
      }

      return redirect('adminRegister')->witherror('Error');

   }

   public function logout(){
      Session::flush();
      Auth::logout();
      return redirect('/');
   }




    public function welcome_page(){
        return view('welcome');
    }

    public function show_data(){
        return view('show-data');
    }

    public function create_course(){
        return view('create-course');
    }

    public function store_course(Request $req){
    $rules = [
        'sem' => 'required',
        'courseName' => 'required',
        'courseCode' => 'required',
    ];
    $this->validate($req , $rules);

    $courses = new Courses();
    $courses->semester = $req->sem;
    $courses->course_name = $req->courseName;
    $courses->course_code = $req->courseCode;
    $courses->save();
    Session::flash('msg' , 'Course successfully Created');

        return redirect()->back();
    }

    public function available_course(){
        $available_course = Courses::paginate(6);
        return view ('available-courses' , compact('available_course'));
    }

    public function edit_course($id=null){
           $edit_courses = Courses::find($id);
           return view('edit-courses', compact('edit_courses'));     
    }

    public function update_course(Request $req , $id){
        $rules = [
            'sem' => 'required',
            'courseName' => 'required',
            'courseCode' => 'required',
        ];
        $this->validate($req , $rules);
    
        $courses = Courses::find($id);
        $courses->semester = $req->sem;
        $courses->course_name = $req->courseName;
        $courses->course_code = $req->courseCode;
        $courses->save();
        Session::flash('msg' , 'Course successfully Updated');
    
            return redirect()->back();
        }


        public function delete_course($id=null){
             $delete_course = Courses::find($id);
             $delete_course->delete();
             Session::flash('msg' , 'Course successfully Deleted');
             return redirect()->back();
        }

    



    public function Dashboard(){
        return view('admin_dashboard');
    }

    public function create_assignment(){
        return view ('create-assignment');
    }


    public function enrolled_student(){
        $query = DB::table('enroll_courses')
           ->select('*')
           ->where('status', 'approved')
           ->get();
        
           return view ('enrolled-student' , compact('query'));
     }

     public function delete_enrolled_student($id){
        $delete_enroll = Enroll_courses::find($id);
        $delete_enroll->delete();
        Session::flash('msg' , 'Enrolled student successfully Deleted');
        return redirect()->back();
     }


    public function store_assignment_data(Request $request){
        $assigment = new Assignment();
        $assigment-> course_name= $request->course_name;
        $assigment-> assignment_name = $request->assignment_name;
        $assigment-> submit_date = $request->submit_date;
        $assigment-> submit_time = $request->submit_time;
        $assigment-> score = $request-> score;
        $assigment-> instruction = $request->instruction;
        $assigment-> figure = $request->figure;
        $assigment-> save();
        Session::flash('msg' , 'Assignment created successfullly');
        return redirect()->back();
    }

    public function view_assignment(){
        $view = Assignment::all();
        return view ('view-assignment' , compact('view'));
       
    }

    public function delete_assignment($id){
        $delete_assign = Assignment::find($id);
        $delete_assign ->delete();
        Session::flash('msg' , 'Enrolled student successfully Deleted');
        return redirect()->back();
    }

    public function enroll_request(){
        $enroll_req = Enroll_courses::all();
        return view ('enroll-request' , compact('enroll_req'));
    }

    public function approved($id){
        $enroll_req = Enroll_courses::find($id);

        $enroll_req->status='approved';
        $enroll_req-> save();

        return redirect()->back();
    }

    public function canceled($id){
        $enroll_req = Enroll_courses::find($id);

        $enroll_req->status='canceled';
        $enroll_req-> save();

        return redirect()->back();
    }

    public function viewSubmitted(){
        $view = SubmittedAssignment::all();
        return view ('view_submitted_assignment' , compact('view'));
        
    }


    public function download(Request $request, $view_work){
        return response()->download(public_path('assets/'.$view_work));
    }

    public function view($id){
        $data = SubmittedAssignment::find($id);
        return view('view_file', compact('data'));
    }
}
