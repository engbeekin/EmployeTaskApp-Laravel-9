@extends('layouts.main-layout')
@section('title')
    <h3>Edit </h3>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Simple Datatable
        </div>
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
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <i class="bi bi-eye-fill " style="color: rgb(9, 180, 180)"></i><i
                                    style="color: rgb(212, 50, 50)" class="bi bi-trash-fill"></i>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
