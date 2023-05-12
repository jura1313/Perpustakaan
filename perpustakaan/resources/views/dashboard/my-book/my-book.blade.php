@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

  <h1 class="h2">Hello {{ auth()->user()->fullname }}, It's Your Books</h1>

  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="post-a-book"><button type="button" class="btn btn-sm btn-outline-primary">New Book</button></a>
    </div>
  </div>

</div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


      @foreach ($my_book as $book)

        <div class="col">
          <div class="card shadow-sm">
            {{-- <div width="100%" height="225" style="height: 220px;"> --}}
            <img src="{{ $book->book_cover }}" alt="" class="bd-placeholder-img card-img-top" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="{{ $book->cover }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $book->title }} image</title><rect width="100%" height="100%" fill="#55595c"/><text x="5%" y="80%" fill="#eceeef" dy=".3em">{{ $book->excerpt }}</text></svg> --}}
            {{-- <title>{{ $book->title }} image</title><rect width="100%" height="100%" fill="#55595c"/><text x="5%" y="80%" fill="#eceeef" dy=".3em">{{ $book->excerpt }}</text> --}}
            {{-- </div> --}}
            <div class="card-body">
              <h5>{{ $book->title }}</h5>
              <p class="card-text">Writer {{ $book->author }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="view/{{ $book->slug }}"><button type="button" class="btn btn-sm btn-outline-primary m-1"><span data-feather="eye"></span></button></a>
                  <a href="update-a-book/{{ $book->slug }}"><button type="button" class="btn btn-sm btn-outline-secondary m-1"><span data-feather="eye"></span></button></a>
                  <form action="delete-a-book/{{ $book->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-outline-danger m-1" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                  </form>
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



