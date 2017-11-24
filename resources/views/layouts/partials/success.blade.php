@if (session()->has('success'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session()->get('success') }}
  </div>
@endif
