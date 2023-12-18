@if (session('Success'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">
          x
        </button>
        <p>{{ session('status') }}</p>
    </div>
@endif