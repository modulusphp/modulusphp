<!--%L2xheW91dHMvZG9jcw==%-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    Documentations | {{ config('app.name') }}
  </title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="description" content="Description">
  <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  {% foreach config('docsify.sheets') as $sheet %}
    <link rel="stylesheet" href="{{ $sheet }}">
  {% endforeach %}
</head>
<body>
  <div id="app"></div>

  <script>
    window.$docsify = {% configToJson('docsify.config') %}
  </script>

  {% foreach config('docsify.scripts') as $script %}
    <script src="{{ $script }}"></script>
  {% endforeach %}
</body>
</html>

