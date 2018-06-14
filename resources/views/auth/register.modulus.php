{% partials('layouts.auth') %}

{% in('title') %}
  Register | modulusPHP
{% endin %}

{% in('main') %}

  <form class="form--auth" method="post" action="/register">

    <h2 class="__heading">Sign up</h2>

    {% csrf %}

    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" autofocus="" required="">

    {% if $errors->has('username') %}
      {% foreach $errors->get('username') as $error %}
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

    <div class="text-center">
      Already have an account?
      <a href="/login">Login</a>
    </div>

  </form>

{% endin %}