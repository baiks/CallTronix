<?php

include('./connect.php');
//Start session
session_start();

//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

//Sanitize the POST values
$login = stripslashes(@trim($_POST['username']));
$password = stripslashes(@trim($_POST['password']));

//Input Validations
if ($login == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

//If there are input validations, redirect back to the login form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
}
$password = openssl_encrypt($password, "AES-128-ECB", "calltronix");
//Create query
$qry = "SELECT * FROM user WHERE username='$login' AND password='$password'";
 
$result = $db->prepare($qry);
$result->execute();
$row = $result->fetch();
if (count($row) > 1) {
    //User is deleted/incative/disabled
    if ($row["deleted"] == "1") {
        //Login Failed
        $errmsg_arr[] = "User is inactive/Disabled";
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        header("location: index.php");
    } else {
        //Login Successful
        session_regenerate_id();
        $_SESSION['SESS_MEMBER_ID'] = $row['id'];
        $_SESSION['SESS_FIRST_NAME'] = $row['name'];
        $_SESSION['ROLE'] = $row['position'];
        $_SESSION['SESS_USERNAME'] = $row['username'];
        $_SESSION['SESS_BRANCH_ID'] = $row['departmentid'];
        $_SESSION['SESS_BRANCH_NAME'] = "Nairobi";
        $_SESSION['logged_in'] = true; //set you've logged in
        $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
        $_SESSION['expire_time'] = 10 * 60 * 60; //expire time in seconds: three hours (you must change this)
        session_write_close();
        header("location: main/index.php?page=main");
        exit();
    }
} else {
    //Login Failed
    $errmsg_arr[] = "Invalid Username or Password";
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    header("location: index.php");
}
?>