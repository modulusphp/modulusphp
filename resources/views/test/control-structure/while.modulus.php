<!-- endpoint: {domain}/test/while -->

{% $age = 1 %}

{% while $age < 18 %}
  <p>{{ $age }}? Still young!</p>
  {% $age++ %}
{% endwhile %}

<p>{{ $age }}? You are old enough</p>