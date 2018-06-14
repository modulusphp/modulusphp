@extends('layouts.auth')

@section('title')
  Forgot Password | modulusPHP
@endsection

@section('main')

  <form class="form-signin" method="post" action="/password/forgot">

    <h2 class="form-signin-heading">Forgot Password</h2>

    @csrf

    @if (isset($message))
      <div class="success">{{ $message }}</div>
    @endif

    <label for="inputUsername" class="sr-only">Email address or Username</label>
    <input type="text" id="inputUsername" class="form-control forgot" placeholder="Email address or Username" name="username" value="{{ old('username') }}" autofocus="" required="">

    @if ($errors->has('username'))
      @foreach ($errors->get('username') as $error)
        <small class="form-text validation-error">{{ $error }}</small>
      @endforeach
    @endif

    <button class="btn btn-lg btn-primary btn-block button-submit" type="submit">Continue</button>

    <div class="text-center">
      Click <a href="/login">here</a> to login
    </div>
  </form>

@endsection