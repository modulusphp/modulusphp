{% using('layouts.app') %}

{% section('title') %}

  Forgot Password | modulusPHP

{% endsection %}

{% section('main') %}

  <form class="form--auth" method="post" action="{{ url('/password/forgot', true) }}">

    <h2 class="text-center __heading">Forgot Password</h2>

    {% if Variable::has('message') %}

      <div class="__success">{{ Variable::get('message') }}</div>

    {% endif %}

    {% csrf_token %}

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control __forgot" placeholder="Email address" name="email" value="{{ old('email') }}" autofocus="" required="">

    {% if $errors->has('email') %}
      {% foreach $errors->get('email') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <button class="btn btn-lg btn-primary btn-block __button-submit" type="submit">Continue</button>

    <div class="text-center __auth-links">
      Click
      <a href="{{ url('/login', true) }}">here</a> to login
    </div>

  </form>

{% endsection %}