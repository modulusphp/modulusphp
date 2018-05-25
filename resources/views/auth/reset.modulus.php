{% partials('layouts.auth') %}

{% in('title') %}
  Forgot Password | modulusPHP
{% endin %}

{% in('main') %}

  <form class="form-signin" method="post" action="/password/reset">
    {% crf_form %}

    <h1 class="{{ $success ? true ; 'hidden' }}">Reset password</h1>
    
    {% if isset($error) %}
      <div class="text-center danger">
        {{ $error }}
      </div>
    {% else %}
      {% if $success == true %}
        <p class="success">Your password has been successfully changed. Click <a href="/login">here</a> to login</p>
      {% else %}
        {% if isset($errors['password']) %}
          <p class="danger">
            {{ ? errors['password'][0] }}
          </p>
        {% else %}
          <p class="success">Hello {{ $user->username }}, please update your password.</p>
        {% endif %}

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control password" placeholder="Password" name="password" value="" autofocus="" required="">

        <label for="inputPasswordConfirmation" class="sr-only">Password Conformation</label>
        <input type="password" id="inputPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required="">

        <input type="hidden" name="reset_token" value="{{ $token }}"/>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset password</button>

        <div class="text-center">
          Click <a href="/login">here</a> to login
        </div>
      {% endif %}
    {% endif %}
  </form>

{% endin %}