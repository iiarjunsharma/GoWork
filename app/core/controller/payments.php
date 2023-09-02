<?php
require_once __DIR__ . '../../controller/main.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['gig_id'])) {
        $pay_gig_id = $_SESSION['pay_gig_id'];
        $gig_pass = $_GET['gig_id'];
        if (!password_verify($pay_gig_id, $gig_pass)) {
            echo "gigpass not match";
        } else {
            $row = mysqli_fetch_assoc($user->pay_gig_id($pay_gig_id));
            $package_price = $row['package_price'];
            $wallet_balance = $_SESSION['wallet_balance'];
            $transaction_type_out = "out";
            $typeCredit = "credit";
            if ($package_price > $wallet_balance) {
                echo "please add '$package_price' money";
            } else {
                if ($user->pay_wallet($user_id, $package_price, $transaction_type_out) &&  $user->pay_transaction($user_id, $package_price, $typeCredit)) {
                    echo "successful order";
                }
            }
        }
    }
}
