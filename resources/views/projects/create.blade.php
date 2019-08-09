@extends('layout')

@section('content')

    <h1>Create Project</h1>

    <form method="POST" action="/projects">
        @csrf
        <div>
            <input class="" type="text" name="title" placeholder="Project title" required value="{{old('title')}}">
        </div>
        <div>
            <textarea name="description" id="" cols="30" rows="10" placeholder="Project info" required value="{{old('description')}}"></textarea>
        </div>
        <div>
          <button type="submit">Create Project</button>  
        </div>
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>    
            @endif
            
        </div>
    </form>

   
@endsection
