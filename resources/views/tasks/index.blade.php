@extends('layouts.main-layout')
@section('title')
    <h3>All Employee List </h3>
@endsection
@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> {{ session('success') }}
            </div>
        @elseif (session('delete'))
            <div class="alert alert-light-danger color-danger"> <i class="bi bi-exclamation-circle"> </i>
                {{ session('delete') }}
            </div>
        @endif

        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task Name</th>
                        <th>Email</th>
                        <th>Department Name</th>
                        <th>Created At</th>

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        @php
                            $i;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->task_name }}</td>

                            <td>{{ $task->department->dep_name }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>

                                @if (auth()->check() && auth()->user()->role == 1)
                                    <a href="{{ route('task.edit', $task->id) }}" type="button"><i class="bi bi-eye-fill "
                                            style="color: rgb(9, 180, 180)"></i></a>
                                    <form action="{{ route('task.destroy', $task) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit"><i style="color: rgb(212, 50, 50)"
                                                class="bi bi-trash-fill"></i></button>

                                    </form>
                                @endif
                                <a href="{{ route('task.show', $task) }}">show</a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
