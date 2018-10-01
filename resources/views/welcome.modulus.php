{% using('layouts.app') %}

{% section('title') %}

  Welcome

{% endsection %}

{% section('main') %}

  <div class="flex--center position--ref full--height">
    {% if auth()->isGuest() %}
      <div class="top-right links">
        <a href="{{ url('/login', true) }}">Login</a>
        <a href="{{ url('/register', true) }}">Register</a>
      </div>
    {% else %}
      <div class="top-right links">
        <a href="{{ url('/home', true) }}">Home</a>
      </div>
    {% endif %}

    <div class="__content">
      <div class="__title __m-b-md">
        modulusPHP
        <span class="loader loader-circles"></span>
      </div>

      <div class="__info">
        <span>bootstrap: 4.1.3</span>
        <span>react.js: 16.4.2</span>
        <span>jquery: 3.3.1</span>
        <span>moment: 2.22.2</span>
      </div>
    </div>
  </div>

{% endsection %}