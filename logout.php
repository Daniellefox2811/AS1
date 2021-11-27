<?php
require 'header.php';
unset($_SESSION['loggedin']);
echo 'You are now logged out
<a href="login.php">Go to
login.php</a>';
?>

<?php
require 'footer.php';
?>