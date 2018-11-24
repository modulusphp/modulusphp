{% using('layouts.app') %}

{% section('title') %}

  {{ $title }}

{% endsection %}

{% section('main') %}

  <div class="flex--center position--ref full--height">
    <div class="__content">
      <div class="__error __m-b-md" style="{{ $statusCode == 429 || $statusCode == 500 ? 'font-size: 43px;' : '' }}">
        {{ $message }}
      </div>
    </div>
  </div>

{% endsection %}
