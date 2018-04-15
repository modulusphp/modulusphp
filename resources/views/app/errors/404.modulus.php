{% Modulus::extends('layouts/header', ['pageTitle' => '404 Not Found | modulusPHP']); %}

<div class="flex-center position-ref full-height">
  <div class="content">
    <div class="title m-b-md">
      404 Not Found
    </div>

    <div class="info">
      <span>Requested: %pageURL</span>
      <a href="/">go home</a>
    </div>
  </div>
</div>

{% Modulus::extends('layouts/footer'); %}