@extends('layouts.main-layout')
@section('title')
    <h3>Edit </h3>
@endsection
@section('content')
    <div class="p-5 card">
        @if (session('success'))
            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('employe.update', $user) }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                @method('Put')
                <div class="col-6">
                    <div class="form-group">
                        <label for="basicInput">Employee Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Employee Name"
                            value="{{ $user->name }}">
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

                <div class="col-6">
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Mobile no</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Employee mobile no"
                            value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Employee address"
                            value="{{ $user->address }}">
                    </div>
                </div>
                <div class="col-12">
                    <label for="exampleFormControlTextarea1" class="form-label">Employee Photo</label>
                    <input type="file" name="photo" class="form-control">
                    <img src="{{ '/storage/employePhoto/' . $user->photo }}" class="w-25" alt="image" />
                </div>

                <div class="col-6">
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Employee Role </label>
                        <select name="role" class="form-control" value="{{ $user->role }}">
                            <option disabled selected>Choose Role</option>
                            <option value="1">Admin</option>
                            <option value="0">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Employee Status</label>
                        <select name="status" class="form-control">
                            <option disabled selected>Choose status</option>
                            <option value="1">Active</option>
                            <option value="0">inActive</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Employee Email"
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Employee passowrd">
                    </div>
                </div>

                <div class="col-8">

                    <button class=" btn btn-primary offset-6 w-50" type="submit">Edit Employee</button>

                </div>
            </div>
        </form>
    </div>
@endsection
