<?php

namespace App\Http\Controllers;

use App\Fileentry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

use League\Flysystem\File;
use Mockery\Undefined;
use Symfony\Component\Debug\FatalErrorHandler\UndefinedMethodFatalErrorHandler;

class UserController extends Controller
{
    public function home(){
        //$courses=DB::table('course')->get();
            $teacher=DB::table('course_teacher')->select('course_id')->where('teacher_id','=',\Auth::user()->id)->get();
            $i=0;
            foreach ($teacher as $t) {
                $courses = DB::table('course')->select('course_name', 'course_id')->where('course_id', '=', $t->course_id)->get();
                $coursesA[$i]=$courses;
                $i++;
            }
            if(!isset($coursesA))
                return View('page_404');

        return View('auth.Teacher.home',['courses'=>$coursesA]);

    }
    public function course($id){

        $course=DB::table('course')->where('course_id','=', $id)->get();
        if (count($course)){

            $Text_data=DB::table('text')->where('course_id',$id)->get();
            $file_data=DB::table('file')->where('course_id',$id)->get();

            $data2= DB::table('course_assignment')->select('assignment_id')->where('course_id','=',$id)->get();
            $i=0;
            $assignment_data=null;
           foreach ($data2 as $d){
              $assignment= DB::table('assignment')->where('id','=',$d->assignment_id)->get();
               $assignment_data[$i]= $assignment;
              $i++;
           }
            return View('auth.Teacher.course',['Text_data'=>$Text_data,'file_data'=>$file_data,'assignment_data'=>$assignment_data],['id'=>$id]);
        }
        else return View('page_404');
    }
    public function AddText($id,Request $request){
        $data=$request->all();
            DB::table('text')->insert(array('course_id'=>$id,'text_data' => $data['text'],'created_at'=>date('Y-m-d H:i:s')));
        return redirect('/home/'.$id);
      }
    public function getFile($id,$filename){
        //$file_data=DB::table('file')->where('filename',$filename)->get();
        redirect('/home/'.$id);
        return \response()->download(storage_path().'/app/'.$filename);
    }
    public function AddFile($id,Request $request){
        $file2=$request->only('filepath');

        DB::table('file')->insert(array('course_id'=>$id,'filename'=>$file2['filepath'],'created_at'=>date('Y-m-d H:i:s')));
        Storage::disk('local')->put($file2['filepath'], 'Contents');
        //return \response()->download(storage_path().'/app/'.$file2['filepath']);
        return redirect('/home/'.$id);

    }
}
