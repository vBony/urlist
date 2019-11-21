<?php
session_start();
unset($_GET['login']);
unset($_GET['id']);
session_destroy();

header("Location: ../../index.php");
?>