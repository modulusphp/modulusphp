<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{% tag("title") %}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

  <!-- stylesheets -->
  {% styles([
    'bootstrap.min',
    'main']
  ); %}

  <style>
    body {
      background: #fff;
      color: #616161;
      font-weight: unset;
    }

    .info > span, .info > a {
      color: #616161;
    }
  </style>
  
</head>
<body>

  <div class="container">
    {% tag("main") %}
  </div>

</body>
</html>