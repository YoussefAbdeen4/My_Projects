<?php
function validate_register($f_name,$l_name,$email,$phone,$pass,$c_pass) : bool{
    $flag=true;
    $pattern="/^[A-Z][a-z]+$/";
    if (!preg_match($pattern,$f_name)) {
        $_SESSION['first_name-error'] = "First name is not valid...!";
        $flag = false;
    }
    if (!preg_match($pattern,$l_name)) {
        $_SESSION['last_name-error'] = "Last name is not valid...!";
        $flag = false;
    }
    $pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
    if (!preg_match($pattern,$email)) {
        $_SESSION['email-error'] = "Email is not valid...!";
        $flag = false;
    }
    $pattern = "/^\+?\d{1,3}[-.\s]?\(?\d{1,4}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}$/";
    if (!preg_match($pattern,$phone)){
        $_SESSION['phone-error']="Phone number is not valid...!";
        $flag=false;
    }
    $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/";
    if (!preg_match($pattern,$pass)) {
        $_SESSION['pass-error'] = "At Least 8 Characters, Uppercase, Lowercase, Digits, Special Characters (@$!%*?&)...!";
        $flag = false;
    }else if ($pass!=$c_pass){
        $_SESSION['c-pass-error'] = "Password is not conformed...!";
        $flag=false;
    }
    if (!$flag){
        $_SESSION['first_name'] = $f_name;
        $_SESSION['last_name'] = $l_name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['pass'] = $pass;
    }
    return $flag;
}
function validate_login($email,$pass) : bool{
    $flag=true;
    $pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
    if (!preg_match($pattern,$email)) {
        $_SESSION['email-error'] = "Email is not valid...!";
        $flag = false;
    }
    $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/";
    if (!preg_match($pattern,$pass)) {
        $_SESSION['pass-error'] = "At Least 8 Characters, Uppercase, Lowercase, Digits, Special Characters (@$!%*?&)...!";
        $flag = false;
    }
    return $flag;
}
function validate_category($category) : bool{
    $flag=true;
    $pattern="/^[a-zA-Z\s]+$/";
    if (!preg_match($pattern,$category)) {
        $_SESSION['category-error'] = "Enter English alphabet and spaces only...!";
        $flag = false;
    }
    return $flag;
}
function validate_product($name , $desc , $quantity , $price ) : bool
{
    $flag=true;
    $pattern = "/^[a-zA-Z0-9\s]+$/";
    if (!preg_match($pattern,$name)){
        $_SESSION['name-error']="Enter english characters , spaces and digits only...!";
        $flag = false;
    }
    $pattern = "/^[a-zA-Z0-9._%+,\s-]+$/";
    if (!preg_match($pattern,$desc)){
        $_SESSION['desc-error']="Enter english characters , spaces , digits and (._-+%)...!";
        $flag = false;
    }
    $pattern = "/^[0-9.]/";
    if (!preg_match($pattern,$price)){
        $_SESSION['price-error']="Enter digits only...!";
        $flag = false;
    }
    if (!preg_match($pattern,$quantity)){
        $_SESSION['quantity-error']="Enter digits only...!";
        $flag = false;
    }
    return $flag;
}
function validate_bayment($email,$phone,$address,$credit_card) : bool{
    $flag=true;
    $pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
    if (!preg_match($pattern,$email)) {
        $_SESSION['email-error'] = "Email is not valid...!";
        $flag = false;
    }
    $pattern = "/^\+?\d{1,3}[-.\s]?\(?\d{1,4}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}$/";
    if (!preg_match($pattern,$phone)){
        $_SESSION['phone-error']="Phone number is not valid...!";
        $flag=false;
    }
    $pattern = "/^[a-zA-Z0-9._%+,\s-]+$/";
    if (!preg_match($pattern,$address)) {
        $_SESSION['add-error'] = "Enter english characters , spaces , digits and (._-+%)...!";
        $flag = false;
    }
    $pattern = "/^\d{16}$/";
    if (!preg_match($pattern,$credit_card)){
        $_SESSION['credit_card-error'] = "Only 16 digit...!";
        $flag=false;
    }
    return $flag;
}