<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AssignmentController extends Controller
{
    public function Assignment($id,Request $request){
        $data=$request->all();
        //return $data['date'].' '.$data['time'].':00';
        $id2=DB::table('assignment')->insertGetId(['title'=>$data['title'],
                                        'end_as'=>$data['date'].' '.$data['time'].':00',
                                        'file'=>$data['file']]);
        DB::table('course_assignment')->insert(['course_id'=>$id,'Assignment_id'=>$id2]);
        Storage::disk('local')->put($data['file'], 'Contents');
        //DB::table('assignment')->select('id')->where('')
        return redirect('/home/'.$id);


    }
    public function show($courseId,$AssignmentId){
       // $assignments=

        //  return DB::table('Assignment_Submit')->crossJoin('students')->where('assignment_id',$AssignmentId)->where('students.id','Assignment_Submit.student_id')->get();

        $assignments= DB::table('Assignment_Submit')
            ->join('students', function ($join) {
                $join->on('students.id', '=', 'Assignment_Submit.student_id');
            })->where('assignment_id',$AssignmentId)->
            select('students.id','students.username','Assignment_Submit.file')
            ->get();

        return View('auth.Teacher.assignment',['assignments'=>$assignments,'AssignmentId'=>$AssignmentId,'courseId'=>$courseId]);

    }

    public function install($id1,$id2,$filename){
        redirect()->back();
        return \response()->download(storage_path().'/app/'.$filename);
    }



}
