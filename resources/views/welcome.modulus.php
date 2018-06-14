{% partials('layouts.default') %}

{% in('title') %}
  Home | modulusPHP
{% endin %}

{% in('main') %}

  <router-view></router-view>

{% endin %}