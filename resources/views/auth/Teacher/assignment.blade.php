@extends('index')
@section("AssContent")
<h2>Submitted Student</h2>
<div class="inline"></div>
<table class="table">
<table class="table ">
<thead>

<tr><th>#</th><th>name</th><th>file</th></tr>
</thead>
    <tbody>
    @foreach($assignments as $as)
    <tr><td>{{$as->id}}</td><td>{{$as->username}}</td><td><a href="{{url('/home/'.$courseId.'/'.$AssignmentId.'/'.$as->file)}}"><span class="fa fa-file fa-2x col-md-1"></span>{{$as->file}}</a></td></tr>

        @endforeach
    </tbody>




</table>


@endsection