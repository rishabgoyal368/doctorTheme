@if(Session::has('error'))
<div class="alert alert-danger">
    {!! session('error') !!}
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success">
    {!! session('success') !!}
</div>
@endif
