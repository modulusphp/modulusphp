{% partials('layouts/error') %}

{% in('title') %}
  This page isn’t working| modulusPHP
{% endin %}

{% in('main') %}
  <div class="flex-center position-ref full-height">
    <div class="content">
      <div class="title m-b-md">
        This page isn’t working
      </div>

      <div class="info">
        <span>500: Internal Server Error</span>
      </div>
    </div>
  </div>

{% endin %}