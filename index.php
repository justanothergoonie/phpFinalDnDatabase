<?php
session_start();

$is_logged_in = $_SESSION['is_logged_in'];

if ($is_logged_in) {
    header("Location:views/dn-dashboard.php");
} else {
    header("Location:views/login.php");
};