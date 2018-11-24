<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name='csrf-token' content="{{ $csrf_token }}"/>
  <title>{% yield('title') %}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ url('/css/app.css') }}">
</head>
<body>
  <div id="app">
    {% yield('main') %}
  </div>
</body>
</html>
