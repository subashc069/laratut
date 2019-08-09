@extends('layout')

@section('content')
    <h1>{{$project->title}}</h1>
    <div>
        {{$project->description}}
    </div>
    @if ($project->tasks->count())
        <div>
            @foreach ($project->tasks as $task)

            <div>
                <form action="/tasks/{{ $task->id}}" method="POST" >
                    @csrf
                    @method('PATCH')

                    <label for="completed" class="{{$task->completed ? 'is-complete' : ''}}" >
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked': ''}}>
                        {{ $task->description}}
                    </label>

                </form>
            </div>
                
            @endforeach
        </div>   
    @endif
    
    <div>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </div>
@endsection