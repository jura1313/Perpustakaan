@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Categories List</h1>

  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="post-a-category"><button type="button" class="btn btn-sm btn-outline-primary">New Category</button></a>
      {{-- <button type="button" class="btn btn-sm btn-outline-primary" data-bs-target="#formTambah" data-bs-toggle="modal">New Category</button> --}}
    </div>
  </div>

</div>

<div class="table-responsive">
    {{-- <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category</th>
          <th scope="col">Total Posts</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
@foreach ($categories as $category)

        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->category }}</td>
          <td>{{ $category->BookStore->count('pivot.category_id') }} Posts</td>
          <td>
            <a href="update-a-category/{{ $category->slug }}"><button type="button" class="btn btn-sm btn-outline-primary">Update</button></a>
            <a href="delete-a-category/{{ $category->slug }}"><button type="button" class="btn btn-sm btn-outline-primary">Delete</button></a>
          {{-- </td>
        </tr>

@endforeach


      </tbody>
    </table>  --}}


    {{-- Album --}}
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



          @foreach ($categories as $category)
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
              <div class="card-body">
                <h5>{{ $category->category }}</h5>
                <p class="card-text">Total {{ $category->BookStore->count('pivot.category_id') }} Posts</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn">
                    <a href="view/{{ $category->slug }}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                    <a href="update-a-category/{{ $category->slug }}"><button type="button" class="btn btn-sm btn-outline-secondary">Update</button></a>
                    <a href="delete-a-category/{{ $category->slug }}"><button type="button" class="btn btn-sm btn-outline-secondary">Delete</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @endforeach

      </div>
    </div>

  </div>



  <!-- Modal Tambah -->
<div class="modal fade" id="formTambah" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ url("/post-a-category") }}">
          @csrf
            <div class="input-group mb-3">
              <input type="text" name="category" class="form-control" placeholder="Category" aria-label="category" aria-describedby="basic-addon1">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah Data</button>
            </div>

        </form>

      </div>
    </div>
  </div>
</div>

  <!-- Modal Ubah -->
  <div class="modal fade" id="formUbah" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="judulModal">Tambah Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="POST" action="{{ url("/post-a-category") }}">
            @csrf
              <div class="input-group mb-3">
                <input type="text" name="category" class="form-control" placeholder="Category" aria-label="category" aria-describedby="basic-addon1" value="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah Data</button>
              </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
