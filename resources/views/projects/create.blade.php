@extends('layout')

@section('content')

    <h1>Create Project</h1>

    <form method="POST" action="/projects">
        @csrf
        <div>
            <input type="text" name="title" placeholder="Project title">
        </div>
        <div>
            <textarea name="description" id="" cols="30" rows="10" placeholder="Project info"></textarea>
        </div>
        <div>
          <button type="submit">Create Project</button>  
        </div>
    </form>

   
@endsection
