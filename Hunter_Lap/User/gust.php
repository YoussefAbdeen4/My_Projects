<?php
if (!empty($_SESSION['user-name']) and !empty($_SESSION['user-id'])) {
    header('location:index.php');die;
}