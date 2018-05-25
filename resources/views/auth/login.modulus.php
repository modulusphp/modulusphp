{% partials('layouts.auth') %}

{% in('title') %}
  Login | modulusPHP
{% endin %}

{% in('main') %}

  <form class="form-signin" method="post" action="/login">
    {% crf_form %}
    
    <h2 class="form-signin-heading">Please sign in</h2>

    {{ ? form['error'] }}

    {% if isset($errors['username']) %}
      <span class="help-block">
        {{ ? errors['username'][0] }}
      </span>
    {% endif %}
    <label for="inputUsername" class="sr-only">Email address or Username</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="Email address or Username" name="username" value="{{ ? form['data']['username'] }}" autofocus="" required="">
    
    {% if isset($errors['password']) %}
      <span class="help-block">
        {{ ? errors['password'][0] }}
      </span>
    {% endif %}
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">
  
    <div class="float-right forgot-pass">
      <a href="/password/forgot">Forgot password</a>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    
    <div class="text-center">
      Don't have an account?
      <a href="/register">Create One</a>
    </div>
  </form>

{% endin %}