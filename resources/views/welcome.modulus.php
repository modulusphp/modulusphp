{% partials('layouts/default') %}

{% in('title') %}
  Home | modulusPHP
{% endin %}

{% in('main') %}
  <div class="flex-center position-ref full-height">
    <div class="content">
      <div class="title m-b-md">
        modulusPHP
        <span class="loader loader-circles"></span>
      </div>

      <div class="info">
        <span>bootstrap: 4.0</span>
        <span>popper.js: 1.12.3</span>
        <span>seshaui: 0.4</span>
        <span>jquery: 3.3.1</span>
        {% if auth()->isGuest() == false %}
          <a href="/logout">Logout</a>
        {% elseif auth()->isGuest() == true %}
          <a href="/login">Login</a>
        {% endif %}
      </div>
    </div>
  </div>
{% endin %}