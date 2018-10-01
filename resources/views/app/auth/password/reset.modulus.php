{% using('layouts.app') %}

{% section('title') %}

  Reset Password | modulusPHP

{% endsection %}

{% section('main') %}

  <form class="form--auth" method="post" action="{{ url('/password/reset', true) }}">

    <h2 class="text-center __heading">Reset Password</h2>

    {% csrf_token %}

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control __password" name="password" placeholder="Password" required="">

    {% if $errors->has('password') %}
      {% foreach $errors->get('password') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <label for="inputPasswordConfirmation" class="sr-only">Password Conformation</label>
    <input type="password" id="inputPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required="">

    {% if $errors->has('password_confirmation') %}
      {% foreach $errors->get('password_confirmation') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <button class="btn btn-lg btn-primary btn-block __button-submit" type="submit">Reset password</button>

    <div class="text-center __auth-links">
      CLick
      <a href="{{ url('/register', true) }}">here</a> to login
    </div>

  </form>

{% endsection %}