{% partials('layouts/error') %}

{% in('title') %}
  404 Not Found | modulusPHP
{% endin %}

{% in('main') %}
  <div class="flex-center position-ref full-height">
    <div class="content">
      <div class="title m-b-md">
        404 Not Found
      </div>

      <div class="info">
        <span>Requested: {{ $_SERVER['REQUEST_URI'] }}</span>
        <a href="/">go home</a>
      </div>
    </div>
  </div>
{% endin %}