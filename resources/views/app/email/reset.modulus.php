{% partials('layouts/email') %}

{% in('title') %} {{ $subject }} {% endin %}

{% in('main') %}

  <p>Hi {{ $username }},</p>
  <p>{{ $body }}</p>
  <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
    <tbody>
      <tr>
        <td align="left">
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td>
                  <a href="{{ host(true).'/password/reset/'.$token }}" target="_blank">Reset</a>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  {{-- <p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>
  <p>Good luck! Hope it works.</p> --}}

{% endin %}