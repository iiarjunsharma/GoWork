<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: /app/view/home.php");
    exit();
} else { ?>
    <header class="navigation" id="navigation">
        <!-- navbar -->
        <nav class="navbar">
            <!-- section 1 -->
            <div class="nav-bar">
                <a href="#" id="logo">
                    <img id="logo-inner" src="/assets/img/gowork_logo.png" alt="error">
                </a>
            </div>
            <!-- section 2 -->
            <div class="nav">
                <ul class="nav-listing">
                    <li><a href="/index.php">Sign in</a></li>
                    <li><a href="/app/view/signup.php">Join</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <?php
    if (!empty($ErrorMessage)) {
        echo "<div class='alert $ErrorStatus' role='alert'>$ErrorMessage</div>";
    }

    if (!empty($SuccessMessage)) {
        echo "<div class='alert $SuccessStatus' role='alert'>$SuccessMessage</div>";
    }
    ?>
    <script>
        <?php require_once __DIR__ . '../../../../assets/js/notLogin.js'; ?>
    </script>
<?php } ?>