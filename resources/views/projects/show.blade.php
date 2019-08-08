@extends('layout')

@section('content')
    <h1>{{$project->title}}</h1>
    <div>
        {{$project->description}}
    </div>
    <div>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </div>
@endsection