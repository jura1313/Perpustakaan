@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Store Your New Book</h1>

</div>

<div class="col-lg-8">
    <form method="POST" action="{{ url("/post-a-book") }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}" >
            @error('title')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>


          <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
              @error('slug')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="category_id" class="form-label">Category</label>
              <select name="category_id" id="category_id" class="form-select form-select-sm" required>

                  @foreach ($category as $category)
                      @if (old('category_id'gory_id) == $category->id)
                          <option value="{{ $category->id }}" selected>{{ $category->category}}</option>
                      @else
                          <option value="{{ $category->id }}">{{ $category->category}}</option>
                      @endif
                  @endforeach
                </select>
          </div>
          <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              @error('description')
              <p class="text-danger">
                  {{ $message }}
              </p>
              @enderror
              <input id="description" type="hidden" name="description" value="{{ old('description') }}">
              <trix-editor input="description"></trix-editor>

          </div>
          <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
              @error('author')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="publisher" class="form-label">Publisher</label>
              <input type="text" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher') }}" id="publisher" name="publisher">
              @error('publisher')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
              <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit') }}" id="tahun_terbit" name="tahun_terbit">
              @error('tahun_terbit')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

{{-- <form method="POST" action="{{ url("/post-a-book") }}">
    @csrf

    <div class="input-group mb-3">
        <input type="text" name="title" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="mb-3">
        <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
            @foreach ($category as $category)
            <option value="{{ $category->id }}">{{ $category->category}}</option>
            @endforeach
        </select>

    </div>

    <div class="input-group mb-3">
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none;" required placeholder="Description"></textarea>
    </div>

    <div class="input-group mb-3">
        <input type="text" name="author" class="form-control" placeholder="Author" aria-label="Author" aria-describedby="basic-addon2">
    </div>

    <div class="input-group mb-3">
        <input type="text" name="publisher" class="form-control" placeholder="Publisher" aria-label="Publisher" aria-describedby="basic-addon2">
    </div>

    <div class="input-group mb-3">
        <input type="text" name="tahun_terbit" class="form-control" placeholder="Year of Released" aria-label="Year of Released" aria-describedby="basic-addon2">
    </div>

  <button type="submit" class="btn btn-primary">Upload</button>

</form> --}}



<script>
    const title =document.querySelector('#title');
    const slug =document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('slug?title= ' +title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>

@endsection
