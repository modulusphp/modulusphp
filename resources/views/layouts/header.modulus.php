<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ ? pageTitle }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

  <!-- stylesheets -->
  {% Modulus::styles([
    'bootstrap.min']
  ); %}

  {% if @$pageTitle == 'Login | modulusPHP' || @$pageTitle == 'Register | modulusPHP' %}
    <link rel="stylesheet" href="/css/signin.css">
  {% else %}
    <link rel="stylesheet" href="/css/main.css">
  {% endif %}
  
</head>
<body>