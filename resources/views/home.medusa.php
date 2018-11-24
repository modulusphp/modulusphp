{% using('layouts.app') %}

{% section('title') %}

  Home

{% endsection %}

{% section('main') %}

  <div class="flex--center position--ref full--height">
    <div class="top-right links">
      <a href="{{ url('/logout', true) }}">Logout</a>
    </div>

    <div class="__content __home_box">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card __shadow">
            <div class="card-header __clean-header">Hi, {{ auth()->user()->name }}</div>

            <div class="card-body">
              You are logged in!
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

{% endsection %}
