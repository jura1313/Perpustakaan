@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  @if (Auth::check())
  <h1 class="h2">Welcome back, {{ auth()->user()->fullname }}</h1>
  @endif
  @if (empty(Auth::check()))
  <h1 class="h2">Welcome</h1>
  @endif
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
      <span data-feather="calendar" class="align-text-bottom"></span>
      This week
    </button>
  </div>
</div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


      @foreach ($books as $book)

        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ $book->book_cover }}" alt="" class="bd-placeholder-img card-img-top" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <div class="card-body">
              <h5>{{ $book->title }}</h5>
              <p class="card-text">Writer {{ $book->author }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="view/{{ $book->slug }}"><button type="button" class="btn btn-sm btn-outline-secondary"><span data-feather="eye"></span> View</button></a>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

      @endforeach

    </div>
  </div>

@endsection


