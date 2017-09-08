@extends('index')
@section('course')

    <div class="pull-right " >
        <div class="btn-group" role="group" >

        <button style="width: 120px; height: 50px; background-color: inherit; color: #2e3436; border: #3d3d3d solid 1px" data-toggle="modal" data-target=".grid-system"  class="btn btn-flat box-shadow-outset" type="button">Add Note</button>
        <button style="width: 120px; height: 50px; background-color: inherit; color: #2e3436; border: #3d3d3d solid 1px" data-toggle="modal" data-target=".add-file" class="btn box-shadow-outset" type="button">Add Files</button>
        <button style="width: 120px; height: 50px; background-color: inherit; color: #2e3436; border: #3d3d3d solid 1px" data-toggle="modal" data-target=".add-assignment"   class="btn box-shadow-outset" type="button">Add Assignment</button>
        <button style="width: 120px; height: 50px; background-color: inherit; color: #2e3436; border: #3d3d3d solid 1px"  class="btn box-shadow-outset" type="button">Add Quiz</button>

        </div>
        {{--<a type="button" class="" data-toggle="modal" data-target=".grid-system">Using the Grid systems in Modal</a>--}}
    </div>


    </div>
    <h2>Course Content</h2>

    <div class="breadcrumbs"><h3 style="color: #3f3f3f;">Course Notes</h3></div>
    <div class="x_content">
        <ul class="list-unstyled timeline">
            @foreach($Text_data as $d)
            <li>
                <div class="block">

                    <div class="block_content">
                        <h2 class="title">
                        </h2>

                        <p class="excerpt">{{$d->text_data}}
                        </p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

    </div>
    <div class="breadcrumbs"><h3 style="color: #3f3f3f;">Course Files</h3></div>
        @foreach($file_data as $file)
        <div class="list-unstyled timeline" style="padding-top: 50px;">
            <article class="media event">
                <a class="pull-left" style="width: 60px;">
                        <span class="fa fa-file fa-2x" style="width: 100px;"></span>

                </a>
                <div class="media-body">
                    <a class="title" href="{{url('/home/'.$id.'/'.$file->filename)}}">{{$file->filename}}</a>
                </div>
            </article>

        </div>
        @endforeach

    <div class="breadcrumbs"><h3 style="color: #3f3f3f;">Course Assignments</h3></div>
    @if($assignment_data!=null)
    @foreach($assignment_data as $k=> $v)
    @foreach($v as $k2)

        <div class="list-unstyled timeline" style="padding-top: 50px;">
            <article class="media event">
                <a class="pull-left" style="width: 60px;">
                    <span class="fa fa-file fa-2x" style="width: 100px;"></span>

                </a>

                <div class="media-body">
                    <a class="title" href="{{url('/home/'.$id.'/'.$k2->id)}}">{{$k2->title}}</a>
                </div>
            </article>

        </div>
    @endforeach
    @endforeach
    @endif
    <div class="breadcrumbs"><h3 style="color: #3f3f3f;">Course Quizzes</h3></div>
    @endsection


@section('modal')

    <div class="modal fade grid-system " tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add your note hear</h4>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{ url('/home/'.$id.'/textData') }}">
                        {{ csrf_field() }}
                        <textarea rows="5" type="textarea" class="form-control" name="text" id="textarea-1495650791195"></textarea>



                </div>
                <div class="modal-footer">
                    <button type="button" class="c-btn large red-bg" data-dismiss="modal">Close</button>
                    <button type="submit" class="pull-right c-btn  large green-bg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection

@section('addFileDialog')

    <div class="modal fade add-file " tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 802px;">
                <div class="modal-header">
                    <h4 class="modal-title">Add your note hear</h4>
                </div>
                <form  method="get" action="{{ url('/home/'.$id.'/file/sd') }}" enctype="multipart/form-data">

                <div class="modal-body">
{{--                    {!! Form::open(array('url=>/home/'.$id.'/filedata','files'=>true)) !!}--}}
                        {{ csrf_field() }}
                        <div class="file-upload">

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

@section('addAssignmentDialog')



    <div class="modal fade add-assignment " tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title">Add your note hear</h4>
                </div>
                <form  method="get" action="{{$id}}/handelAssignment" enctype="multipart/form-data">

                    <div class="modal-body">
                        {{--                    {!! Form::open(array('url=>/home/'.$id.'/filedata','files'=>true)) !!}--}}
                        {{ csrf_field() }}
                        <label>End Date Assignment</label>
                        <input type="date" class="form-control" class="date" name="date" />
                        <label>End Time Assignment</label>
                        <input type="time" class="form-control" class="date" name="time" />
                        <label>Title</label>
                        <textarea type="text" class="form-control" class="date" name="title"></textarea>
                        <label>Add file</label>
                        <input type="file" class="file-field file-path" name="file" />
                        <br>
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