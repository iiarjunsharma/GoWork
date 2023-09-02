<?php
require_once __DIR__ . '../../controller/main.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['pay'])) {
    $add_money = $_POST['add_money'];
    $transaction_type_in = "in";
    if (empty($add_money)) {
      $ErrorMessage = 'please add the money transaction';
      $ErrorStatus = "alert-danger";
    } else {
      if ($add_money < 5) {
        $ErrorMessage = "Minimum Deposit Limit ₹5";
        $ErrorStatus = "alert-danger";
      } else {
        $typeDebit = "debit";
        if ($user->add_money_wallet($user_id, $add_money, $transaction_type_in) && $user->add_money_transaction($user_id, $add_money, $typeDebit)) {
          $SuccessMessage = "Successfully Add Money";
          $SuccessStatus = "alert-success";
        }
      }
    }
  }
}