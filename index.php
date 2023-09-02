<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("location: /app/view/home.php");
    exit();
}
?>
<?php require_once __DIR__ . '/app/core/controller/signin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/notLogin.css">
</head>

<body>
    <!-- navbar -->
    <?php require_once __DIR__ . '/app/view/component/notLogin.php'; ?>
    <!-- sing in  -->
    <div class="sign-in-container">
        <section>
            <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" class="sign-in-inner">
                <div class="inputs">
                    <input type="text" name="userName" id="userName" placeholder="Username">
                    <input class="pass" type="password" name="pass" id="pass" placeholder="Password">
                </div>
                <div class="sub-up-btn">
                    <button type="submit">Sign in</button>
                </div>
            </form>
            <div class="login-with-google">
                <button class="google-log">Login With Google</button>
            </div>
        </section>
    </div>
</body>

</html>