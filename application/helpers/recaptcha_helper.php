<?php
function get_recaptcha() {
    $site_key = '6LdKVBQqAAAAAMbJ7tl-6-xi4xiZgTf8v_BJn_Gy';
    return '<div class="g-recaptcha" data-sitekey="' . $site_key . '"></div>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>';
}
