<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(){
         //return \Auth::user()->id;
        //$course_id=
            //return DB::table('student_course')->select('course_id')->where('student_id','=',\Auth::user()->id)->get();
        $i=0;
        $course_id= DB::table('student_course')->select('course_id')->where('student_id','=',\Auth::guard('student')->user()->id)->get();
        foreach ($course_id as $t) {
            $courses = DB::table('course')->select('course_name', 'course_id')->where('course_id', '=', $t->course_id)->get();
            $coursesA[$i]=$courses;
            $i++;
        }
        return View('auth.Student.home',['courses'=>$coursesA]);
    }

    public function showCourses($id){
        $course=DB::table('course')->where('course_id','=', $id)->get();
        if (count($course)){
            //return $course
            $Text_data=DB::table('text')->where('course_id',$id)->get();
            $file_data=DB::table('file')->where('course_id',$id)->get();
            $assignments=DB::table('assignment')
                ->join('course_assignment', function ($join) {
                    $join->on('course_assignment.Assignment_id', '=', 'assignment.id');
                })
                ->where('course_assignment.course_id',$id)
                ->select('course_assignment.assignment_id','assignment.title')
                ->get();
            return View('auth.Student.course',['Text_data'=>$Text_data,'file_data'=>$file_data,'assignments'=>$assignments],['id'=>$id]);
        }
        else return View('page_404');
    }



    public function get($id,$filename){

        redirect('/my/'.$id);
        return \response()->download(storage_path().'/app/'.$filename);
    }


    public function ShowAssignment($course_id,$assignment_id){
        $assignments=DB::table('assignment')
            ->join('course_assignment', function ($join) {
                $join->on('course_assignment.Assignment_id', '=', 'assignment.id');
            })
            ->where('course_assignment.course_id',$course_id)
            ->where('assignment.id',$assignment_id)
            ->first();




                 if($assignments->end_as > date('Y-m-d H:i:s')){
                     DB::table('assignment')
                         ->where('id', $assignments->id)
                         ->update(['validity' => 'enable']);
                     $ass=Carbon::parse($assignments->end_as);
                     $now=Carbon::now();

                     $now= $now->diff($ass);

                     $now=$now->d.' day  '.$now->h.' hours';
                      $file=DB::table('Assignment_Submit')->where('Assignment_id',$assignments->id)->first();
                     $submit=DB::table('Assignment_Submit')->where('student_id',\Auth::guard('student')->user()->id)->
                         where('Assignment_id',$assignments->id)->first();
//                     return $submit;
                     return View('auth.Student.assignment',['assignments'=>$assignments,'remaining'=>$now,'file'=>$file,'submit'=>$submit]);
                }
                else if($assignments->end_as <= date('Y-m-d H:i:s')){
                    DB::table('assignment')
                        ->where('id', $assignments->id)
                        ->update(['validity' => 'disable']);

                    $ass=Carbon::parse($assignments->end_as);
                    $now=Carbon::now();
                    $now= $now->diff($ass);
                    $now='Assignment was submitted  '.$now->d.' day  '.$now->h.' hours early';
                    $file=DB::table('Assignment_Submit')->where('Assignment_id',$assignments->id)->first();
                    $submit=DB::table('Assignment_Submit')->where('student_id',\Auth::guard('student')->user()->id)->
                    where('Assignment_id',$assignments->id)->first();

                    return View('auth.Student.assignment',['assignments'=>$assignments,'remaining'=>$now,'file'=>$file,'submit'=>$submit]);
                }


    }

    public function addFileToSubmission($course_id,$assignment_id,Request $request){
        $data=$request->only('filepath');

        DB::table('Assignment_Submit')->insert(['student_id'=>\Auth::guard('student')->user()->id,'Assignment_id'=>$assignment_id,'file'=>$data['filepath']]);
        Storage::disk('local')->put($data['filepath'], 'Contents');


        return redirect()->intended('my/'.$course_id.'/'.$assignment_id);
    }
    public function EditFileToSubmission($course_id,$assignment_id,Request $request){
        $data=$request->only('filepath');

        DB::table('Assignment_Submit')->where('student_id',\Auth::guard('student')->user()->id)->where('Assignment_id',$assignment_id)
            ->update(['file'=>$data['filepath']]);
        Storage::disk('local')->put($data['filepath'], 'Contents');
        return redirect()->intended('my/'.$course_id.'/'.$assignment_id);
    }


}
