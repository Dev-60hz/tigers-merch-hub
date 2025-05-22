<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();


function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCF Tigers</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<header>
    <div class="navbar">
        <div class="namelogo">
            <img class="ncf" src="css/ncflogo.png"> </img>
        </div>
        <ul> 
            <li><a href="home.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="products.php">PRODUCTS</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>
        
    </div>
    <nav>...</nav>
</header>
<body>
    <div class="main">
        
        <div class="logins <?= isActiveForm('login', $activeForm); ?>">
            <form action="login_page.php" method="post">
                <h2>LOGINS</h2>
                <?= showError($errors['login']); ?>
                <input type="email" name="gbox" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login" class="loginbtn"><a>LOGIN</a></button>

                <p class="info">Dont have an account?<br>Please ask to NCF Admins</p>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    

</body>
</html>