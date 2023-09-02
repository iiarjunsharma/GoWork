<?php require_once __DIR__ . '../../core/controller/logInOutChacking.php'; ?>
<?php require_once __DIR__ . '../../core/controller/add_money.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/assets/css/add_money.css">
</head>

<body>
  <?php require_once __DIR__ . '../../view/component/header.php'; ?>
  <div class="add-money">
    
      <div class="current_balance">
        <h2 class="cb_heading">Current balance :-</h2>
        <p class="balance">
          <?php require_once __DIR__ . '../../core/controller/current_balance.php'; ?>
        </p>
      </div>
      <form class="add-money-input" method="post" action="<?php $_SERVER['REQUEST_URI'] ?>">
        <input type="number" class="add_input" name="add_money" id="add-money" placeholder="add-money">
        <button type="submit" class="money-btn" name="pay">Pay</button>
      </form>
      <div class="transaction">
        <?php
        require_once __DIR__ . '../../core/controller/transaction.php';
        ?>
      </div>
  </div>
</body>

</html>