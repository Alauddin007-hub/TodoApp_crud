@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo</div>

                <div class="card-body">
                    <h3>New Task</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{route('todo.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="description">Title</label>
                            <input class="form-control" name="title" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" cols="20" rows="10"></textarea>
                            <!-- <input class="form-control" name="description" /> -->
                        </div><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection