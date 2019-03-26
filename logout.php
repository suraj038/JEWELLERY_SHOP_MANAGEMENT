<?php
session_start();
$_SESSION['name'] = '';
$_SESSION['username'] = '';

header('Location: login.php');
?>