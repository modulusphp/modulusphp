@extends('layouts.auth')

@section('title')
  Login | modulusPHP
@endsection

@section('main')

  <form class="form-signin" method="post" action="/login">

    <h2 class="form-signin-heading">Please sign in</h2>

    @csrf

    <label for="inputUsername" class="sr-only">Email address or Username</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="Email address or Username" name="username" value="{{ old('username') }}" autofocus="" required="">

    @if ($errors->has('username'))
      @foreach ($errors->get('username') as $error)
        <small class="form-text validation-error">{{ $error }}</small>
      @endforeach
    @endif

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">

    @if ($errors->has('password'))
      @foreach ($errors->get('password') as $error)
        <small class="form-text validation-error">{{ $error }}</small>
      @endforeach
    @endif

    <div class="float-right forgot-pass">
      <a href="/password/forgot">Forgot password</a>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <div class="text-center">
      Don't have an account?
      <a href="/register">Create One</a>
    </div>
  </form>

@endsection