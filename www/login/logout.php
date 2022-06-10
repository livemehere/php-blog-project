<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['passwd']);
header('Location: /www'); //TODO: www 제거
?>
