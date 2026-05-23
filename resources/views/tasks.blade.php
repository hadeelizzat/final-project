@extends('layouts.app')

@section('content')
        <div class="card">
@if (isset($task))
  <h5 class="card-header">Update task</h5>
  <div class="card-body">

    <form action="{{url('update')}}" method="POST">
@csrf
<input type="hidden" name="id" value="{{$task->id}}">
  <div class="mb-3">
    <label for="task-name" class="form-label">Task</label>
    <input type="text" name="name" class="form-control" id="task-name" value="{{$task->name}}" >
  </div>
  <div>
  <button type="submit" class="btn btn-primary">
    Update task
</button>
  </div>
</form>
  </div>
</div>

        @else
<div class="card">

  <h5 class="card-header">New task</h5>
  <div class="card-body">

    <form action="create" method="POST">
@csrf
  <div class="mb-3">
    <label for="task-name" class="form-label">Task</label>
    <input type="text" name="name" class="form-control" id="task-name" >
  </div>
  <button type="submit" class="btn btn-primary">
    Add task
</button>
</form>
  </div>
</div>
@endif
<div class="card mt-4">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Task</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task )
  <tr>
      <td>{{$task->name}}</td>
      <td>
        <form action="/delete/{{$task->id}}" method="POST" class="d-inline" >
            @csrf
            <button type="submit" class="btn btn-danger">
             Delete
            </button>
        </form>
        <form action="/edit/{{$task->id}}" method="POST" class="d-inline" >
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
