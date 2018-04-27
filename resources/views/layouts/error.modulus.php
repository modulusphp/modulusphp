<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{% tag("title") %}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

  <!-- stylesheets -->
  {% Modulus::styles([
    'bootstrap.min',
    'main']
  ); %}

  <style>
    body {
      background: #fff;
      color: #000;
      font-weight: unset;
    }

    .info > span, .info > a {
      color: #000;
    }
  </style>
  
</head>
<body>

  <div class="container">
    {% tag("main") %}
  </div>

  <!-- scripts -->
  {% Modulus::scripts([
    'jquery-3.3.1.min',
    'popper.min',
    'bootstrap.min',
    'seshaUI.web'
  ]); %}

</body>
</html>