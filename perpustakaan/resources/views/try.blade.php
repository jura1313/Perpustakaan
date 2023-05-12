<form method="POST" action="{{ url("/post-a") }}" enctype="multipart/form-data">
    {{-- @method('put') --}}
    @csrf
    <div>
        <label for="file" class="form-label">Book file</label>
        <input class="form-control form-control-sm" id="file" name="file" type="file" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
