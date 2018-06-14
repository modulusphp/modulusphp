{% partials('layouts.auth') %}

{% in('title') %}
  Forgot Password | modulusPHP
{% endin %}

{% in('main') %}

  <form class="form--auth" method="post" action="/password/forgot">

    <h2 class="__heading">Forgot Password</h2>

    {% csrf %}

    {% if isset($message) %}
      <div class="__success">{{ $message }}</div>
    {% endif %}

    <label for="inputUsername" class="sr-only">Email address or Username</label>
    <input type="text" id="inputUsername" class="form-control __forgot" placeholder="Email address or Username" name="username" value="{{ old('username') }}" autofocus="" required="">

    {% if $errors->has('username') %}
      {% foreach $errors->get('username') as $error %}
        <small class="form-text __validation-error">{{ $error }}</small>
      {% endforeach %}
    {% endif %}

    <button class="btn btn-lg btn-primary btn-block __button-submit" type="submit">Continue</button>

    <div class="text-center">
      Click <a href="/login">here</a> to login
    </div>
  </form>

{% endin %}