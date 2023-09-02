<?php
require_once __DIR__ . '../../controller/main.php';
$result = $user->current_balance($user_id);
$transactionExist = mysqli_num_rows($result);
if ($transactionExist === 0) {
    $current_balance = "0.00";
} else {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    function current_balance($rows)
    {
        $in_totalBalance = 0;
        $out_totalBalance = 0;
        foreach ($rows as $row) {
            $balance = $row['balance'];
            $in_out = $row['type(in,out)'];
            if ($in_out === 'in') {
                $in_totalBalance += $balance;
            } elseif ($in_out === 'out') {
                $out_totalBalance += $balance;
            }
            $current_balance = $in_totalBalance - $out_totalBalance;
        }
        return $current_balance;
    }
    $current_balance = current_balance($rows);
}
echo "&#8377; $current_balance";
