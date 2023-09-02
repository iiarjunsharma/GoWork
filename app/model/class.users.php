<?php
require_once __DIR__ . '../../model/class.database.php';

class Users extends Database
{
    // Methods

    // Home
    function username_display($Email)
    {
        $sql = "SELECT * FROM `users` WHERE email='$Email'";
        $result = $this->query($sql);
        return $result;
    }

    // all_gigs
    function fetch_all_gigs()
    {
        $sql = "SELECT * FROM `gigs` ORDER BY upload_time DESC";
        $result = $this->query($sql);
        return $result;
    }
    function fetch_gig_username($seller_user_id)
    {
        $sql = "SELECT * FROM `users` WHERE user_id=$seller_user_id";
        $result = $this->query($sql);
        return $result;
    }
    // wallet
    function wallet_user_id($user_id)
    {
        $sql = "SELECT * FROM `wallet` WHERE user_id=$user_id";
        $result = $this->query($sql);
        return $result;
    }
    // gigCard & seller edit gig
    function gig_card_id($id)
    {
        $sql = "SELECT * FROM `gigs` WHERE gig_id=$id";
        $result = $this->query($sql);
        return $result;
    }
    function gig_card_sellerId($seller_user_id)
    {
        $sql = "SELECT * FROM `users` WHERE user_id=$seller_user_id";
        $result = $this->query($sql);
        return $result;
    }
    // payments
    function pay_gig_id($gig_id)
    {
        $sql = "SELECT * FROM `gigs` WHERE gig_id=$gig_id";
        $result = $this->query($sql);
        return $result;
    }
    function pay_transaction($user_id, $package_price, $typeCredit)
    {
        $transaction_sql = "INSERT INTO `transaction` (`wallet_id`, `amount`, `type(credit,debit)`, `created_at`) VALUES ('$user_id', '$package_price', '$typeCredit', current_timestamp());";
        $transaction_result = $this->query($transaction_sql);
        return $transaction_result;
    }
    function pay_wallet($user_id, $package_price, $transaction_type_out)
    {
        $sql = "INSERT INTO `wallet` (`user_id`, `balance`, `type(in,out)`, `updated_at`) VALUES ('$user_id ', '$package_price', '$transaction_type_out', current_timestamp());";
        $result = $this->query($sql);
        return $result;
    }
    // add Money
    function add_money_wallet($user_id, $add_money, $transaction_type_in)
    {
        $sql = "INSERT INTO `wallet` (`user_id`, `balance`, `type(in,out)`, `updated_at`) VALUES ('$user_id ', '$add_money', '$transaction_type_in', current_timestamp());";
        $result = $this->query($sql);
        return $result;
    }
    function add_money_transaction($user_id, $add_money, $typeDebit)
    {
        $transaction_sql = "INSERT INTO `transaction` (`wallet_id`, `amount`, `type(credit,debit)`, `created_at`) VALUES ('$user_id', '$add_money', '$typeDebit', current_timestamp());";
        $transaction_result = $this->query($transaction_sql);
        return $transaction_result;
    }
    // current_balance
    function current_balance($user_id)
    {
        $sql = "SELECT * FROM `wallet` WHERE user_id=$user_id";
        $result = $this->query($sql);
        return $result;
    }
    // transaction
    function transactions($user_id)
    {
        $sql = "SELECT * FROM `transaction` WHERE wallet_id=$user_id ORDER BY created_at DESC";
        $result = $this->query($sql);
        return $result;
    }
    // userProfile
    function show_username($Email)
    {
        $sql = "SELECT * FROM `users` WHERE email='$Email'";
        $result = $this->query($sql);
        return $result;
    }
    function seller_gigs($user_id)
    {
        $sql = "SELECT * FROM `gigs` WHERE seller_user_id='$user_id'";
        $result = $this->query($sql);
        return $result;
    }
    function add_new_gig($user_id, $gig_title, $package_name, $package_describe, $delivery_time, $package_price, $newImageName)
    {
        $sql = "INSERT INTO `gigs` (`seller_user_id`, `gig_title`, `package_name`, `package_describe`, `delivery_time`, `package_price`, `images`, `upload_time`) VALUES ('$user_id', '$gig_title', '$package_name', '$package_describe', '$delivery_time', '$package_price', '$newImageName', current_timestamp())";
        $result = $this->query($sql);
        return $result;
    }
    // edit_profile
    function display_name_up($name, $user_id)
    {
        $sql = "UPDATE `user_profile` SET `display_name` = '$name' WHERE `user_profile`.`user_id` = $user_id";
        $result = $this->query($sql);
        return $result;
    }
    function desc_up($desc, $user_id)
    {
        $sql = "UPDATE `user_profile` SET `description` = '$desc' WHERE `user_profile`.`user_id` = $user_id";
        $result = $this->query($sql);
        return $result;
    }
    // gig_edit
    function gig_edit_id($gig_id)
    {
        $sql = "SELECT * FROM `gigs` WHERE gig_id=$gig_id";
        $result = $this->query($sql);
        return $result;
    }

    // userProfile & edit_profile
    function showing_info($user_id)
    {
        $sql = "SELECT * FROM `user_profile` WHERE (`user_id`)='$user_id'";
        $result = $this->query($sql);
        return $result;
    }
    // userProfile & gig_update
    function gig_update($up_gig_title, $up_package_name, $up_package_describe, $up_delivery_time, $up_package_price, $newImageName, $gig_id)
    {
        $sql = "UPDATE `gigs` SET `gig_title` = '$up_gig_title',`package_name` = '$up_package_name',`package_describe` = '$up_package_describe',`delivery_time` = '$up_delivery_time',`package_price` = '$up_package_price',`images` = '$newImageName'WHERE `gigs`.`gig_id` = $gig_id";
        $result = $this->query($sql);
        return $result;
    }
    // show userProfile
    function seller_info($seller_username)
    {
        $sql = "SELECT * FROM `users` WHERE (`username`) = '$seller_username'";
        $result = $this->query($sql);
        return $result;
    }
    // show seller_info
    function show_seller_info($s_user_id)
    {
        $sql = "SELECT * FROM `user_profile` WHERE (`user_id`) = '$s_user_id'";
        $result = $this->query($sql);
        return $result;
    }
    // fetch_seller_gigs
    function fetch_seller_gigs($s_user_id)
    {
        $sql = "SELECT * FROM `gigs` WHERE (`seller_user_id`) = '$s_user_id'";
        $result = $this->query($sql);
        return $result;
    }
    // Notifications
    function receiver_check($user_id)
    {
        $sql = "SELECT * FROM `messages` WHERE (`receiver_id`)= '$user_id' ORDER BY `timestamp` DESC ";
        $result = $this->query($sql);
        return $result;
    }
    function C_user_check($CU_User_id, $user_id)
    {
        $sql = "SELECT * FROM `messages` WHERE (`sender_id`)= '$CU_User_id' AND (`receiver_id`)= '$user_id'";
        $result = $this->query($sql);
        return $result;
    }
    function sender_info($sender_id)
    {
        $sql = "SELECT * FROM `users` WHERE (`user_id`)='$sender_id'";
        $result = $this->query($sql);
        return $result;
    }
    // contact_list

    function contact_list($user_id)
    {
        $sql = "SELECT * FROM `contact_list` WHERE (`user_id`)= '$user_id'";
        $result = $this->query($sql);
        return $result;
    }
    function username($contact_user)
    {
        $sql = "SELECT * FROM `users` WHERE (`username`)= '$contact_user'";
        $result = $this->query($sql);
        return $result;
    }
    function add_contact($user_id, $contact_user)
    {
        $sql = "INSERT INTO `contact_list` (`user_id`, `profile_picture`, `contact_username`, `timestamp`) VALUES ('$user_id', '', '$contact_user', current_timestamp())";
        $result = $this->query($sql);
        return $result;
    }
    function contact_user($contact_user, $user_id)
    {
        $sql = "SELECT * FROM `contact_list` WHERE (`user_id`)= '$user_id' AND (`contact_username`)='$contact_user'";
        $result = $this->query($sql);
        return $result;
    }
    function conversations_user($user_id, $CU_user_id)
    {
        $sql = "SELECT * FROM `conversations` WHERE (`participant_1_id`)= '$user_id' AND (`participant_2_id`)='$CU_user_id' OR (`participant_1_id`)= '$CU_user_id' AND (`participant_2_id`)='$user_id'";
        $result = $this->query($sql);
        return $result;
    }
    function add_conversations($user_id, $CU_user_id)
    {
        $sql = "INSERT INTO `conversations` (`participant_1_id`, `participant_2_id`, `last_message`, `last_message_timestamp`, `unread_message_count`) VALUES ('$user_id', '$CU_user_id', '', current_timestamp(), '');";
        $result = $this->query($sql);
        return $result;
    }
    function update_conversations($message, $conversation_id)
    {
        $sql = "UPDATE `conversations` SET `last_message` = '$message',`last_message_timestamp` = current_timestamp() WHERE `conversations`.`conversation_id` = $conversation_id;";
        $result = $this->query($sql);
        return $result;
    }
    function fetch_messages($conversation_id)
    {
        $sql = "SELECT * FROM `messages` WHERE (`conversation_id`) = '$conversation_id'";
        $result = $this->query($sql);
        return $result;
    }
    function send_message($conversation_id, $sender_id, $receiver_id, $message)
    {
        $sql = "INSERT INTO `messages` (`conversation_id`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES ('$conversation_id', '$sender_id', '$receiver_id', '$message', current_timestamp())";
        $result = $this->query($sql);
        return $result;
    }
}
