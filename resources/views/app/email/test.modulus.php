{% partials('layouts.email') %}

{% in('title') %} {{ $subject }} {% endin %}

{% in('main') %}

  <p>{{ $body }},</p>
  <p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>
  <p>Good luck! Hope it works.</p>

{% endin %}