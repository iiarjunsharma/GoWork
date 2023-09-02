<?php require_once __DIR__.'../../core/controller/logInOutChacking.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/orders.css">
  <style>
    .container {
      margin-top: 95px;
    }
  </style>
</head>

<body>
  <?php require_once __DIR__.'../../view/component/header.php'; ?>
  <div class="container">
    <div><a href="/app/core/controller/logout.php">LOGOUT</a></div>
  </div>
</body>

</html>