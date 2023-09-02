<?php require_once __DIR__ . '../../core/controller/logInOutChacking.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/assets/css/home.css">
</head>

<body>
  <?php
  require_once __DIR__ . '../../view/component/header.php';
  ?>
  <div class="gig-page" id="gig_page">
    <?php require_once __DIR__ . '../../core/controller/gigcard.php' ?>
    <script>
      <?php require_once __DIR__ . '../../../assets/js/continue_ClickSidebar.js'; ?>
    </script>
  </div>
</body>

</html>