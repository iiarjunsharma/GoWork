<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: /app/view/home.php");
    exit();
}
?>
<?php require_once __DIR__ . '../../core/controller/signup.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/notLogin.css">
</head>
<body>
    <!-- navbar -->
    <?php require_once __DIR__ . '/component/notLogin.php'; ?>
    <!-- Sing up -->
    <div class="sign-up-container">
        <section>
            <form class="sign-up-inner" method="post" action="<?php $_SERVER['REQUEST_URI'] ?>">
                <div class="inputs">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="pass" id="pass" placeholder="Password">
                    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">
                </div>
                <div class="user-name">
                    <input type="text" name="userName" id="userName" placeholder="Choose user name">
                </div>
                <button type="submit">Join</button>
            </form>
            <div class="login-with-google">
                <div class="orDiv">OR</div>
                <button class="google-log">Login With Google</button>
            </div>
        </section>
    </div>
</body>

</html>