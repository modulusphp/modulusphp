<!-- endpoint: {domain}/test/if/{name} -->

{% if ucfirst($name) == 'Donald' %}
  <p>{{ ucfirst($name) }} is the creator of modulusPHP.</p>
{% else %}
  <p>{{ ucfirst($name) }}? I don't know who that is.</p>
{% endif %}