{% using('layouts.app') %}

{% section('title') %}

  Register | modulusPHP

{% endsection %}

{% section('main') %}

  <form class="form--auth" method="post" action="{{ url('/register', true) }}">

    <h2 class="text-center __heading">Sign up</h2>

    {% if Variable::has('message') %}

      <div class="__success">{{ Variable::get('message') }}</div>

    {% elseif Variable::has('error') %}

      <div class="__danger">{{ Variable::get('error') }}</div>

    {% endif %}

    {% csrf_token %}

    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" autofocus="" required="">

    {% if $errors->has('name') %}
      {% foreach $errors->get('name') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control __reg" placeholder="Email address" name="email" value="{{ old('email') }}" autofocus="" required="">

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

    <button class="btn btn-lg btn-primary btn-block __button-submit" type="submit">Sign up</button>

    <div class="text-center __auth-links">
      Already have an account?
      <a href="{{ url('/login', true) }}">Login</a>
    </div>

  </form>

{% endsection %}