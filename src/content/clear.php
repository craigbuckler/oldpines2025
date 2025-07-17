---
slug: clear/index.php
index: false
---
<?php
header('Clear-Site-Data: "*"');

foreach ( $_COOKIE as $key => $value ) {
  setcookie( $key, $value, 1, '/' );
}

echo '<p style="font-family:sans-serif">Your browser cache has been cleared for this site.<br><a href="/">Please return to the home page&hellip;</a></p>';
