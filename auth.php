<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: /ferreteria/login.php");
    exit;
}
