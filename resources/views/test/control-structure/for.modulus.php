{{-- endpoint: {domain}/test/for --}}

{% for $i = 1; $i <= 10; $i++ %}
  <p>{{ $i }}</p>
{% endfor %}