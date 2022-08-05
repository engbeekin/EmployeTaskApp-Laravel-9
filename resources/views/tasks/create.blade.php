@extends('layouts.mainlayout')
@section('content')
    <form action="{{ route('task.store') }}" method="POST">
        @csrf

        <label for="">Task Name</label>
        <input type="text" name="task_name">
        <label for="">Description</label>
        <textarea type="text" name="description"></textarea>


        <select name="department_id">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->dep_name }}</option>
            @endforeach
        </select>
        <button type="submit">Add Task</button>
    </form>
@endsection
