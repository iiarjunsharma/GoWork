<?php require_once __DIR__ . '../../controller/main.php'; ?>
<header class="navigation" id="navigation">
    <!-- navbar -->
    <nav class="navbar">
        <!-- section 1 -->
        <div class="nav-bar">
            <div class="menu-btn" id="menu_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="rnavbar" id="rnavbar">
                <ul class="rnavbar-inner">
                <li class="wallet">
                    <!-- Wallet Balance -->
                    <span>
                    <i class="fa-solid fa-wallet"></i>                  
                        <a href="/app/view/add_money.php">Wallet</a>
                    </span>
                        <?php
                        $result = $user->wallet_user_id($user_id);
                        $transactionExist = mysqli_num_rows($result);
                        if ($transactionExist === 0) {
                            $in_out_tolal = "0.00";
                        } else {
                            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            function calculateTotalBalance($rows)
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
                                    $in_out_tolal = $in_totalBalance - $out_totalBalance;
                                }
                                return $in_out_tolal;
                            }
                            $in_out_tolal = calculateTotalBalance($rows);
                        }

                        $_SESSION['wallet_balance'] = $in_out_tolal;
                        if ($in_out_tolal > 0.00) {
                            $in_out_tolal = substr($in_out_tolal, 0, 3) . '&period;&period;';
                        }
                        echo '
                <button type="button" class="wallet-btn"><i class="fa-solid fa-building-columns"></i>
                        <div class="wallet-balance">&#8377; ' . $in_out_tolal . '
                        </div>
                </button>';
                        ?>
                </li>

                <li class="notifications">
                    <!-- notification -->

                    <i class="fa-solid fa-bell"></i>
                    <a id="open_notification">Notification</a>
                    <!-- <button class="notification_btn" id="open_notification">
                    </button> -->
                </li>
                    <li><i class="fa-solid fa-cart-shopping"></i><a href="/app/view/orders.php">Orders</a></li>
                    <li><i class="fa-solid fa-heart"></i><a href="#" class="heart_icon">Save To List</a></li>
                    <li><i class="fa-solid fa-right-from-bracket"></i>
                        <?php
                        if (isset($_GET['logout'])) {
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                session_unset();
                                session_destroy();
                                header("location: /index.php");
                                exit();
                            }
                        }
                        ?>
                        <a name="logout" href="?logout=1">Logout</a>
                    </li>
                </ul>

                
                <div class="noti_wrapper" id="noti_wrapper">
                        <div class="noti_header">
                            <div class="noti_icon">
                            <i class="fa-solid fa-bell"></i>
                            </div>
                            <div class="noti_result">Notifications (0)</div>
                            <div class="close_noti" id="close_noti">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </div>
                        </div>
                        <ul class="noti_mid">
                            <?php $result = mysqli_num_rows($user->receiver_check($user_id));
                            if ($result === 0) { ?>
                                <div class="no_noti">
                                    <span class="no_noti_heading">No Notifications</span>
                                </div>
                            <?php } else {
                                if ($result > 0) {
                                    $rows = mysqli_fetch_all($user->receiver_check($user_id), MYSQLI_ASSOC);
                                    for ($i = 0; $i < count($rows); $i++) {
                                        $row = $rows[$i];
                                        $sender_id = $row['sender_id'];
                                        $S_row = mysqli_fetch_assoc($user->sender_info($sender_id));
                                        $message = $row['message'];
                                        $timestamp = $row['timestamp'];

                                        if (strlen($message) > 30) {
                                            $message = substr($message, 0, 30) . '&period;&period;&period;&period;&period;&period;&period;&period;&period;&period;';
                                        }
                                        echo '<li class="notifiction">
                            <div class="notifiction_pic"><img class="notifiction_pic_inner" src="/assets/img/user - Copy.png" alt=""></div>
                            <div class="notifiction_info">
                                <div class="notification_name">' . $S_row['username'] . '</div>
                                <div class="notification_message">' . $message . '</div>
                                <div class="notification_time">' . date("d M - g:i A", strtotime($timestamp)) . '</div>
                            </div>
                            <a href="/app/view/PersnolChatRoom.php/@' . $S_row['username'] . '" class="message_icon">
                            <i class="fa-solid fa-envelope"></i>
                            </a>
                        </li>';
                                    }
                                }
                            }
                            ?>
                        </ul>
                        <div class="noti_footer"></div>
                    </div>
            </div>
            <a href="/app/view/home.php" id="logo">
                <img id="logo-inner" src="/assets/img/gowork_logo.png" alt="error">
            </a>
        </div>
        <!-- section 2 -->
        <div class="nav">
            <ul class="nav-listing">
                <li class="searching-bar"><input type="search" name="search" id="search-bar" placeholder="What service are you looking for today?" /><span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span></li>
                <li><a href="/app/view/user_profile.php" class="user-pic">
                    <img class="user-pic-inner" src="/assets/img/user - Copy.png" alt="error"></a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- Alerts -->
<?php
if (!empty($ErrorMessage)) {
    echo "<div class='alert $ErrorStatus' role='alert'>$ErrorMessage</div>";
}

if (!empty($SuccessMessage)) {
    echo "<div class='alert $SuccessStatus' role='alert'>$SuccessMessage</div>";
}
?>