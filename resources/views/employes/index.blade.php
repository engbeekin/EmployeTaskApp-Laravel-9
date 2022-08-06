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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department Name</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @php
                            $i;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->department->dep_name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if ($user->status == 1)
                                    <a href={{ route('employe.suspendedEmp', ['id' => $user->id, 'status' => 0]) }}
                                        class="btn btn-success">Active</a>
                                @else
                                    <a href={{ route('employe.suspendedEmp', ['id' => $user->id, 'status' => 1]) }}
                                        class="btn btn-danger">inActive</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('employe.edit', $user->id) }}"><i class="bi bi-eye-fill "
                                        style="color: rgb(9, 180, 180)"></i></a>
                                <form action="{{ route('employe.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="submit"><i style="color: rgb(212, 50, 50)"
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
