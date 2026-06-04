@extends('layouts.app2')
@section('content')
    <div class="card">
        @if (isset($user))
            <h5 class="card-header">Update user</h5>
            <div class="card-body">

                <form action="{{ url('updateUser') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="user-name" class="form-label">User</label>
                        <input type="text" name="name" class="form-control" id="user-name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="form-label">Email</label>
                        <input name="email" class="form-control" id="user-email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="user-password" class="form-label">password</label>
                        <input type="password" name="password" class="form-control" id="user-password"
                            value="{{ $user->password }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Update user
                        </button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger my-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
    </div>
@else
    <div class="card">

        <h5 class="card-header">New user</h5>
        <div class="card-body">

            <form action="createUser" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user-name" class="form-label">User</label>
                    <input type="text" name="name" class="form-control" id="user-name" required>
                </div>
                <div class="mb-3">
                    <label for="user-email" class="form-label">Email</label>
                    <input name="email" class="form-control" id="user-email" required>
                </div>
                <div class="mb-3">
                    <label for="user-password" class="form-label">password</label>
                    <input type="password" name="password" class="form-control" id="user-password" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    Add user
                </button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger my-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    @endif
    <div class="card mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <form action="/deleteUser/{{ $user->id }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                            <form action="/editUser/{{ $user->id }}" method="GET" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-info">
                                    Edit
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
