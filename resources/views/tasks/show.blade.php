@extends('layouts.main-layout')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title">{{ $task->task_name }}</h4>
                <p class="card-text">{{ $task->description }}
                </p>

                <small class=" text-muted">created_at: {{ $task->created_at }}</small>
            </div>

        </div>
    </div>
    </div>
@endsection
