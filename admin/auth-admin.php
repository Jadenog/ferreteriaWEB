<?php
require_once "../auth.php";

if ($_SESSION['id_cargo'] != 1) {
    header("Location: /ferreteria/login.php");
    exit;
}
