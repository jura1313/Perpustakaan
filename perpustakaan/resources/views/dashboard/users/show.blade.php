@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Users Data</h1>

  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="#"><button type="button" class="btn btn-sm btn-outline-primary">New User</button></a>
    </div>
  </div>

</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User Name</th>
          <th scope="col">Role</th>
          <th scope="col">Total Posts</th>
        </tr>
      </thead>
      <tbody>
@foreach ($users as $user)

        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->fullname }}</td>
          <td>{{ $user->role }}</td>
          <td>{{ $user->BookStore->count('pivot.uploader_id') }} Posts</td>
        </tr>

@endforeach


      </tbody>
    </table>
  </div>

@endsection

