<?php
session_start();
session_destroy();
echo "Successful Logout!";
header('Refresh: 1; URL=testlogin.php');

?>