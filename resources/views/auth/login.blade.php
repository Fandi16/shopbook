@extends('layouts.app')

@section('content')
<div class="card">
<div class="card-bo
dy login-card-body">
<p class="login-box-msg">Sign in to start your session</p>
    <form action="{{ route('login') }}" method="post">
    @csrf
    
    <div class="input-group mb-3">
<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
name="email" value="{{ old('email') }}" required
autofocus>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
@if ($errors->has('email'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('email') 
}}</strong>
</span>
@endif
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
name="password" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
@if ($errors->has('password'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('password') 
}}</strong>
</span>
@endif
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
</div>
</div>
</form>
<p class="mb-0">
<a href="{{ route('register') }}" class="text-center">Register a new membership</a>
</p>
</div>
<!-- /.login-card-body -->
</div>
@endsection
