@extends('layouts.main-layout')

@section('title')
    <h3 class="mb-3">Create New Task</h3>
@endsection
@section('content')
    <div class="p-5 card">
        <form action="{{ route('task.update', $task->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="basicInput">Task Name</label>
                        <input type="text" class="form-control" name="task_name" placeholder="Enter Task Name"
                            value="{{ $task->task_name }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="basicInput">Choose Department</label>
                        <select class="form-control" name="department_id">
                            <option selected disabled>Choose Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->dep_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $task->description }}</textarea>
                    </div>
                </div>
                <div class="col-8">

                    <button class=" btn btn-primary offset-6 w-50" type="submit">Edit Task</button>

                </div>
            </div>
        </form>
    </div>
@endsection
