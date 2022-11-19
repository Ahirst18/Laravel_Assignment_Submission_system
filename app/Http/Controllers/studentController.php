<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Enroll_courses;
use App\Models\User;
use App\Models\SubmittedAssignment;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use DB;

class studentController extends Controller
{
   public function sidebarS(){
    return view('student_panel/sidebarStu');
   }

   public function enroll_course(){
    $all_semester = DB::table('courses')
                   ->groupBy('semester')
                   ->get();
     return view ('student_panel/enroll-course')->with('all_semester', $all_semester); 
   }

   public function fetch(Request $requ){
           $select = $requ->get('select');
           $value = $requ->get('value');
           $dependent = $requ->get('dependent');
           $data = DB::table('courses')
                  ->where('semester' , $value)
                  //->groupBy($dependent)
                  ->get();

           $output = '<option value="">Select '.ucfirst($dependent).'</option>';
           foreach($data as $row){
               $output .= '<option value="'.$row->id.'">'.$row->course_name.'</option>';
           }
           echo $output;
   }

   public function store_enroll_courses(Request $req){
      $enroll_course = new Enroll_courses();
      $enroll_course -> student_id = $req->student_id;
      $enroll_course-> semester = $req->semester;
      $enroll_course-> course_id = $req->course_id;
      $enroll_course-> save();
      Session::flash('msg' , 'Enroll in progress');
      return redirect()->back();
    }

    public function store_work(Request $request){
     
      
      $s_work = new SubmittedAssignment();

      $view_work = $request->view_work;
      $filename = time().'.'.$view_work->getClientOriginalExtension();
      $request->view_work->move('assets', $filename);
      $s_work -> view_work = $filename;

      $s_work -> stu_id = $request->stu_id;
      $s_work -> cname = $request->cname;
      $s_work -> save();
      Session::flash('msg' , 'Successfully submitted');
      return redirect()->back();
    }




   public function view_enroll_course(){
      $view_enroll_req = Enroll_courses::all();
      return view ('student_panel/view-enroll-course' , compact('view_enroll_req'));
   }

   public function class_work(){
      $query = DB::table('enroll_courses')
           ->select('*')
           ->where('status', 'approved')
           ->get();
           return view ('student_panel/classwork' , compact('query'));
   }

   ///For student Authentication
   public function student_login(){
        return view('student_panel/student-login');
   }

   public function student_register(){
      return view('student_panel/student-register');
   }
   

   public function student_log(Request $request){
   
     $credentials = $request->only('email', 'password');
     if (Auth::attempt($credentials)) {
      if (auth()->user()->is_admin == 0){
         return redirect('profile')
         ->withSuccess('You have Successfully loggedin');
      }

        
     }

     return redirect("studentLog")->withError('Oppes! You have entered invalid credentials');
      
   }

   
   public function student_reg(Request $request){
      User::create([
         'name' => $request -> name,
         'email' => $request -> email,
         'password' => \Hash::make($request -> password)
      ]);

      if (\Auth::attempt($request->only('email', 'password'))){
         return redirect('studentLogin');
      }

      return redirect('register')->witherror('Error');

   }

   public function logout(){
      Session::flush();
      Auth::logout();
      return redirect('/');
   }

   
   public function student_profile(){
     
      $query = DB::table('users')
           ->select('*')
           ->where('is_admin', '0')
           ->get();
           return view ('student_panel/profileStu' , compact('query'));
   }

   

  

   public function assignment_submission($course_id){
       
      $query = DB::table('assignments')
           ->select('*')
           ->where('course_id' , $course_id)
           ->get();
           return view ('student_panel/assignmentSubmission' , compact('query'));

      
   }
}
