<?php
session_start();
session_destroy();
header("Location: connect.php");
exit();
?>


