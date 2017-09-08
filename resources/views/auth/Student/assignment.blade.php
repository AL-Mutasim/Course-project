@extends('auth.Student.index')
@section('assignment')
    <h3>{{$assignments->title}}</h3>
    <br>
    <h2>Submission status</h2>
    <table class="table table-striped">
        <tr><td class="col-lg-4">Due date</td><td>{{\Carbon\Carbon::parse($assignments->end_as)
        ->toDayDateTimeString()}}</td></tr>
        <tr><td class="col-lg-4">Time remaining</td><td class="red">{{$remaining}}</td></tr>
        <tr><td class="col-lg-4">Last modified</td><td>@if($file!=null){{$file->file}}@endif<button data-toggle="modal" data-target=".edit" style="width: 80px;" class="col-lg-offset-5 btn btn-primary">Edit</button> </td></tr>

    </table>
<br>
<br>
    @if(strcmp($assignments->validity,'disable')!=0)
        @if($submit==null)
    <button data-toggle="modal" data-target=".submit"  style="width: 200px; height: 50px; font-size: 15px; color: #fff;" class='center btn btn-flat btn-lg '>Add submission</button>
    @endif
    @endif

    @endsection

@section('addSupmition')
    <div class="modal fade submit " tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title">Add your note hear</h4>
                </div>
                <form  method="get" action="{{url('/my/'.$assignments->course_id.'/'.$assignments->id.'/addFileToSubmission')}}" enctype="multipart/form-data">

                    <div class="modal-body">
                        {{--                    {!! Form::open(array('url=>/home/'.$id.'/filedata','files'=>true)) !!}--}}
                        {{ csrf_field() }}
                        <div class="file-upload " style="width: 440px;">

                            <div class="image-upload-wrap">

                                <input name="filepath" class="file-upload-input" type="file" onchange="readURL(this)"/>
                                <div class="drag-text">
                                    <h3>Drag and drop a file </h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>
                            {{--{!! Form::close() !!}--}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Close</button>
                        <button type="submit" class="pull-right c-btn  large green-bg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    @endsection
@section('EditSupmition')
    <div class="modal fade edit " tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title">Add your note hear</h4>
                </div>
                <form  method="get" action="{{url('/my/'.$assignments->course_id.'/'.$assignments->id.'/EditFileToSubmission')}}" enctype="multipart/form-data">

                    <div class="modal-body">
                        {{--                    {!! Form::open(array('url=>/home/'.$id.'/filedata','files'=>true)) !!}--}}
                        {{ csrf_field() }}
                        <div class="file-upload " style="width: 440px;">

                            <div class="image-upload-wrap">

                                <input name="filepath" class="file-upload-input" type="file" onchange="readURL(this)"/>
                                <div class="drag-text">
                                    <h3>Drag and drop a file </h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>
                            {{--{!! Form::close() !!}--}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Close</button>
                        <button type="submit" class="pull-right c-btn  large green-bg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    @endsection