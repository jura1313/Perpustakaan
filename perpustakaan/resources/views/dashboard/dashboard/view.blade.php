
  @extends('dashboard.layouts.main')

  @section('container')

  @if (Auth::id() == $book->user_id)
  <div class="btn-group">
    <a href="/view/{{ $book->slug }}"><button type="button" class="btn btn-sm btn-outline-secondary m-1"><span data-feather="eye"></span></button></a>
    <form action="delete-a-book/{{ $book->slug }}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button class="btn btn-sm btn-outline-danger m-1" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
    </form>
  </div>
  @endif

  <main class="px-3 text-center py-5">

    <div>
      <img src="{{ $book->book_cover }}" class="img-fluid" alt="{{ $book->title }}" style="max-width:100%;height:auto;">
    </div>

    <h1>{{ $book->title }}</h1>
    <h4>Writer {{ $book->author }}</h4>
    <h5>Category {{ $book->category->category }}</h5>
    {!! $book->description !!}
    <p class="lead">
      <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">Learn more</a>
    </p>
  </main>

  @endsection

