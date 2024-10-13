<?php
session_start();
$_SESSION = array();
session_destroy();
echo "<script>location.replace('login.php');</script>";
exit();
