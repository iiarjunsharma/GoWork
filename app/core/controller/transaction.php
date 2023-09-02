<?php
require_once __DIR__ . '../../controller/main.php';
$rows  = mysqli_fetch_all($user->transactions($user_id), MYSQLI_ASSOC);
for ($i = 0; $i < count($rows); $i++) {
  $row = $rows[$i];
  $amount = $row['amount'];
  $type = $row['type(credit,debit)'];
  $transaction_time = $row['created_at'];
  $typeCredit = "credit";
  $typeDebit = "debit";
  if ($type === $typeDebit) {
    echo '
<div class="transaction-inner">
<ul class="transaction-info">
<li class="transaction-info-inner">to admin</li>
<li class="transaction-time">' . $transaction_time . '</li>
</ul>
<div class="cr_de-info de-info">&plus; ' . $amount . '</div>
</div>';
  } else {
    if ($type === $typeCredit) {
      echo '
<div class="transaction-inner">
<ul class="transaction-info">
<li class="transaction-info-inner">to admin</li>
<li class="transaction-time">' . $transaction_time . '</li>
</ul>
<div class="cr_de-info cr-info">&minus; ' . $amount . '</div>
</div>';
    }
  }
}
