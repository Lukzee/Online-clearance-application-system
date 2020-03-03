<?php
SESSION_START();

// log out users
unset($_SESSION['id']);
SESSION_DESTROY();
header("location: index.php");
exit();

?>