@extends('layouts.auth')

@section('title')
  Forgot Password | modulusPHP
@endsection

@section('main')

  <form class="form-signin" method="post" action="/password/reset">

    <h1 class="{{ $success ? true ; 'hidden' }}">Reset password</h1>

    @csrf

    @if (isset($message))
      <div class="text-center danger">{{ $message }}</div>
    @else
      @if ($success == true)
        <p class="success">Your password has been successfully changed. Click <a href="/login">here</a> to login</p>
      @else
        <p class="success">Hello {{ $user->username }}, please update your password.</p>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control password" placeholder="Password" name="password" value="" autofocus="" required="">

        @if ($errors->has('password'))
          @foreach ($errors->get('password') as $error)
            <small class="form-text validation-error">{{ $error }}</small>
          @endforeach
        @endif

        <label for="inputPasswordConfirmation" class="sr-only">Password Conformation</label>
        <input type="password" id="inputPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required="">

        @if ($errors->has('password_confirmation'))
          @foreach ($errors->get('password_confirmation') as $error)
            <small class="form-text validation-error">{{ $error }}</small>
          @endforeach
        @endif

        <input type="hidden" name="reset_token" value="{{ $token }}"/>

        <button class="btn btn-lg btn-primary btn-block button-submit" type="submit">Reset password</button>

        <div class="text-center">
          Click <a href="/login">here</a> to login
        </div>
      @endif
    @endif
  </form>

@endsection