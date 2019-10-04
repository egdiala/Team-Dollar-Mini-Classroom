<?php
SESSION_START();
$name = '';

if (isset($_SESSION["id"])) {
    $name = $_SESSION["name"];
}
