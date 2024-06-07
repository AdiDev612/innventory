<?php
session_start();
session_destroy();
header('location:LogIn.php?login=You have been logged out.');
?>