{% using('layouts.default') %}

{% section('title') %}

  {{ $title }}

{% endsection %}

{% section('main') %}

  <div class="flex--center position--ref full--height">
    <div class="__content">
      <div class="__title __m-b-md">
        {{ $message }}
      </div>
    </div>
  </div>

{% endsection %}