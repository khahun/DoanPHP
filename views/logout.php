<?php
session_start();
session_destroy();
header("Location: /DoanPHP/views/login.php");
exit();
?> 