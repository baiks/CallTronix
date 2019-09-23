<?php

include('../connect.php');
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$password = openssl_encrypt($password, "AES-128-ECB", "baiksoft");
$mobile = $_POST['mobile'];
$role = $_POST['role'];
$branchid = $_POST['branch'];


//Check if user exist
$qry = "SELECT * FROM user WHERE username='$username'";
$result = $db->prepare($qry);
$result->execute();
$row = $result->fetch();
//Check whether the query was successful or not
if (count($row) > 1) {
    header("location: index.php?page=usermanagement");
} else {
    $sql = "INSERT INTO user (name,username,password,mobile,position,branch_id) VALUES (:name,:username,:password,:mobile,:role,:branch_id)";
    $q = $db->prepare($sql);
    $q->execute(array(':name' => $name, ':username' => $username, ':password' => $password, ':mobile' => $mobile, ':role' => $role, ':branch_id' => $branchid));
    header("location: index.php?page=usermanagement");
}
?>