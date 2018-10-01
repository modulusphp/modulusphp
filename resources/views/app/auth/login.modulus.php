{% using('layouts.app') %}

{% section('title') %}

  Login | modulusPHP

{% endsection %}

{% section('main') %}

  <form class="form--auth" method="post" action="{{ url('/login', true) }}">

    <h2 class="text-center __heading">Please sign in</h2>

    {% if Variable::has('message') %}

      <div class="__success">{{ Variable::get('message') }}</div>

    {% elseif Variable::has('error') %}

      <div class="__danger">{{ Variable::get('error') }}</div>

    {% endif %}

    {% csrf_token %}

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" autofocus="" required="">

    {% if $errors->has('email') %}
      {% foreach $errors->get('email') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">

    {% if $errors->has('password') %}
      {% foreach $errors->get('password') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <div class="float-right __auth-links">
      <a href="{{ url('/password/forgot', true) }}">Forgot password</a>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <div class="text-center __auth-links __magic-link">
      Or use a magic
      <a href="{{ url('/login/email', true) }}">link</a>
    </div>

    <div class="text-center __auth-links">
      Don't have an account?
      <a href="{{ url('/register', true) }}">Create One</a>
    </div>

  </form>

{% endsection %}