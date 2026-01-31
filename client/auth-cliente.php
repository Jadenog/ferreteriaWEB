<?php
require_once "../auth.php";

if ($_SESSION['id_cargo'] != 2) {
    header("Location: /ferreteria/login.php");
    exit;
}
