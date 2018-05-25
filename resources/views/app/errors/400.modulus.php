{% partials('layouts.error') %}

{% in('title') %}
  400 Bad Request| modulusPHP
{% endin %}

{% in('main') %}
  <div class="flex-center position-ref full-height">
    <div class="content">
      <div class="title m-b-md">
        400 Bad Request
      </div>

      <div class="info">
        <a href="/">go home</a>
      </div>
    </div>
  </div>

{% endin %}