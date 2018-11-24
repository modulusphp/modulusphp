{% using('layouts.app') %}

{% section('title') %}

  Login with Email | modulusPHP

{% endsection %}

{% section('main') %}

  <form class="form--auth" method="post" action="{{ url('/login/email', true) }}">

    <h2 class="text-center __heading">Sign in with email</h2>

    {% csrf_token %}

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control __forgot" placeholder="Email address" name="email" value="{{ old('email') }}" autofocus="" required="">

    {% if $errors->has('email') %}
      {% foreach $errors->get('email') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <button class="btn btn-lg btn-primary btn-block __button-submit" type="submit">Continue</button>

    <div class="text-center __auth-links __magic-link">
      Use password
      <a href="{{ url('/login', true) }}">login</a> instead
    </div>

    <div class="text-center __auth-links">
      Don't have an account?
      <a href="{{ url('/register', true) }}">Create One</a>
    </div>

  </form>

{% endsection %}