<?php require_once __DIR__ . '../../core/controller/logInOutChacking.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="/assets/css/ChatRoom.css">
</head>

<body>
    <!-- Navbar -->
    <?php require_once __DIR__ . '../../view/component/header.php'; ?>
    <!-- contact -->
    <?php require_once __DIR__ . '../../core/controller/ChatRoom.php'; ?>
    <!-- js -->
    <script>
        <?php
       require_once __DIR__ . '../../../assets/js/ChatRoom.js';
        ?>
    </script>
</body>

</html>