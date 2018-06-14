{% partials('layouts.error') %}

{% ('title') %}
  This page isn’t working | modulusPHP
{% endin %}

{% in('main') %}

  <div class="flex--center position--ref full--height">
    <div class="__content">
      <div class="__title __m-b-md">
        This page isn’t working
      </div>

      <div class="__info">
        <span>500: Internal Server Error</span>
      </div>
    </div>
  </div>

{% endin %}
