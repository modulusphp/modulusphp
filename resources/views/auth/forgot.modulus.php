{% partials('layouts.auth') %}

{% in('title') %}
  Forgot Password | modulusPHP
{% endin %}

{% in('main') %}

  <form class="form-signin" method="post" action="/password/forgot">
    {% crf_form %}
    
    <h2 class="form-signin-heading">Forgot Password</h2>

    {{ ? form['error'] }}

    {% if isset($message) %}
      <div class="success">
        {{ % $message }}
      </div>
    {% endif %}

    {% if isset($errors['username']) %}
      <span class="help-block">
        {{ ? errors['username'][0] }}
      </span>
    {% endif %}

    <span class="help-block">
      {{ ? failed['username'] }}
    </span>

    <label for="inputUsername" class="sr-only">Email address or Username</label>
    <input type="text" id="inputUsername" class="form-control forgot" placeholder="Email address or Username" name="username" value="{{ ? form['username'] }}" autofocus="" required="">
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Continue</button>
    
    <div class="text-center">
      Click <a href="/login">here</a> to login
    </div>
  </form>

{% endin %}