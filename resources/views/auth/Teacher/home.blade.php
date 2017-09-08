@extends('index')
@section('content')
    <h2>Course overview</h2>

    @foreach($courses as $c=>$v)
        @foreach($v as $k)
    <div class="card card--a  path fx fxaic" style="margin-top: 10px;     box-shadow: 2px 2px 2px #505050;">
        <a href="/home/{{$k->course_id}}">
            <div class="bucket bucket--flag path-bucket">
                <div class="bucket-content">
                    <h2 class="h h--2 path-title">
                        <span class="link path-title-link twl">{{$k->course_name}}</span>

                    </h2></div>
            </div><a href="/home/{{$k->course_id}}">
            </div><a href="/home/{{$k->course_id}}">
            @endforeach
    @endforeach


    @endsection

@section('side')
    @foreach($courses as $c=>$v)
        @foreach($v as $k)
                    <li><a href="/home/{{$k->course_id}}" title="">{{$k->course_name}}</a></li>

        @endforeach
    @endforeach
    @endsection
