@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo</div>

                <div class="card-body">
                    <h3>Task List</h3>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @foreach($tasks as $task)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$task->title}}</h5>
                            <p class="card-text">{{$task->description}}</p>
                        </div>
                        @if(!$task->isCompleted())
                        <form class="d-grid gap-2" action="{{route('todo.update', $task->id )}}" method="POST">
                            @csrf
                            <button class="btn btn-info" input="submit">Complete</button>
                        </form>
                        @else
                        <form class="d-grid gap-2" action="{{ route('todo.delete', $task->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-block" input="submit">Delete</button>
                        </form>
                        @endif
                    </div>
                    @endforeach
                    <br><a href="{{route('todo.create')}}" class="btn btn-primary btn-lg btn-block">New Task</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection