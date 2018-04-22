<!-- endpoint: {domain}/test/foreach -->

{% foreach $data as $info %}
  <p>{{ $info }}</p>
{% endforeach %}