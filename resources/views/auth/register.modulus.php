{% partials('layouts/header.modulus') %}

<div class="container">

  <form class="form-signin" method="post" action="/register">
    {% crf_form %}
    
    <h2 class="form-signin-heading">Sign up</h2>

    {{ ? form['error'] }}

    {% if isset($errors['username']) %}
      <span class="help-block">
        {{ ? errors['username'][0] }}
      </span>
    {% endif %}

    <span class="help-block">
      {{ ? failed['username'] }}
    </span>

    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" value="{{ ? form['username'] }}" autofocus="">

    {% if isset($errors['email']) %}
      <span class="help-block">
        {{ ? errors['email'][0] }}
      </span>
    {% endif %}

    <span class="help-block">
      {{ ? failed['email'] }}
    </span>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control reg" placeholder="Email address" name="email" value="{{ ? form['email'] }}" autofocus="">
    
    {% if isset($errors['password']) %}
      <span class="help-block">
        {{ ? errors['password'][0] }}
      </span>
    {% endif %}
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    
    <div class="text-center">
      Already have an account?
      <a href="/login">Login</a>
    </div>
  </form>

</div>

{% partials('layouts/footer.modulus') %}