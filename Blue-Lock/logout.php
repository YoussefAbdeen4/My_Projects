<?php
session_start();
if (isset($_SESSION['id']))unset($_SESSION['id']);
if (isset($_SESSION['fname']))unset($_SESSION['fname']);
if (isset($_SESSION['lname']))unset($_SESSION['lname']);
header("location:login.php");
