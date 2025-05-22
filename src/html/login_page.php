<?php

session_start();
require_once 'database.php';

if(isset($_POST['login'])) {
    $email = $_POST['gbox'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['gbox'] = $user['gbox'];

            if($user['role'] === 'admin') {
                header("Location: page/admin-page.php");

            } 
            else {
                header("Location: page/user-page.php");
            }
            exit();
        }
    }
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}

?>

