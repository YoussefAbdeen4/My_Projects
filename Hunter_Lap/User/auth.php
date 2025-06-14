<?php

//print_r($_SESSION);
if (empty($_SESSION['user-name']) and empty($_SESSION['user-id']) ){
   //print_r($_SESSION);
     header('location:signin.php');die;
}