<?php
if (!empty($_SESSION['fname']) and !empty($_SESSION['lname']) and !empty($_SESSION['id'])) {
    header('location:index.php');die;
}