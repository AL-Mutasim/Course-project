@extends('auth.Student.index')
@section('courses')

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
                    <a class="title" href="{{url('/my/'.$id.'/'.$file->filename)}}">{{$file->filename}}</a>
                </div>
            </article>

        </div>
    @endforeach

    <div class="breadcrumbs"><h3 style="color: #3f3f3f;">Course Assignments</h3></div>
    @foreach($assignments as $as)
        <div class="list-unstyled timeline" style="padding-top: 50px;">
            <article class="media event">
                <a class="pull-left" style="width: 60px;">
                    <span class="fa fa-file fa-2x" style="width: 100px;"></span>

                </a>
                <div class="media-body">
                    <a class="title" href="{{url('/my/'.$id.'/'.$as->assignment_id)}}">{{$as->title}}</a>
                </div>
            </article>

        </div>
    @endforeach
    <div class="breadcrumbs"><h3 style="color: #3f3f3f;">Course Quizzes</h3></div>
@endsection


