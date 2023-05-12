<form method="POST" action="{{ url("/login") }}">
    @csrf

    <div class="input-group mb-3">
        <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
    </div>

  <button type="submit" class="btn btn-primary">Login</button>

</form>

<div class="col py-3">

    @if (session('status_create'))
    <div class="alert alert-success">
        {{ session('status_create') }}
    </div>
    @elseif(session('status_update'))
        <div class="alert alert-primary">
            {{ session('status_update') }}
        </div>
    @elseif(session('status_delete'))
        <div class="alert alert-danger">
            {{ session('status_delete') }}
        </div>
    @endif

    @yield('content')

</div>
