@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Update Category</h1>

</div>

<form method="POST" action="{{ url("/update-a-category/$category->slug") }}">
  @csrf

  <div class="input-group mb-3">
      <input type="text" name="category" class="form-control" placeholder="Category" aria-label="Username" aria-describedby="basic-addon1" value="{{ $category->category }}">
      <button type="submit" class="btn btn-primary">Add</button>
  </div>

</form>



@endsection

