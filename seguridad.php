<?php
session_start();
if (!isset($_SESSION['conectado']))
    header('location:Login.php');
?>