
<?php
require_once __DIR__ . '../../controller/main.php';
$contact_user = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '@') + 1);

$exist_user = mysqli_num_rows($user->username($contact_user));
if ($exist_user > 0) {
    // Add Contact List
    $CU_row = mysqli_fetch_assoc($user->username($contact_user));
    $CU_User_id = $CU_row['user_id'];
    $result = mysqli_num_rows($user->C_user_check($CU_User_id, $user_id));
    if ($result > 0) {
        $exist_contact = mysqli_num_rows($user->contact_user($contact_user, $user_id));
        if ($exist_contact === 0) {
            $user->add_contact($user_id, $contact_user);
        }
    }
    // REQUEST_METHOD
    if ($_SERVER["REQUEST_METHOD"] === "POST"  && isset($_POST['send_message'])) {
        $message = $_POST['type_message'];
        if (empty($message)) {
            $ErrorMessage = 'Message Is Empty';
            $ErrorStatus = "alert-danger";
        } else {
            $CL_row = mysqli_fetch_assoc($user->username($contact_user));
            $CU_user_id = $CL_row['user_id'];
            // Update Conversations And Send Message
            $CV_row = mysqli_fetch_assoc($user->conversations_user($user_id, $CU_user_id));
            $conversation_id = $CV_row['conversation_id'];
            if ($user->update_conversations($message, $conversation_id) && $user->send_message($conversation_id, $user_id, $CU_user_id, $message)) {
                $SuccessMessage = "Successfully Send Message";
                $SuccessStatus = "alert-success";
            }
        }
    }
}

echo '<div class="contact_container">
    <div class="contact_list" id="contact_list">
        <div class="contact_list_head">
            <h3 class="chat_heading">ChatRoom</h3>
        </div>
        <ul class="contact_list_inner">';
$C_List = mysqli_num_rows($user->contact_list($user_id));
if ($C_List === 0) {
    echo '<li class="no_chat">
<span class="no_chat_heading">No Chat</span>
</li>';
} else {
    if ($C_List > 0) {
        $rows = mysqli_fetch_all($user->contact_list($user_id), MYSQLI_ASSOC);
        for ($c = 0; $c < count($rows); $c++) {
            $row = $rows[$c];
            $contact_id = $row['contact_id'];
            $user_id = $row['user_id'];
            $profile_picture = $row['profile_picture'];
            $contact_username = $row['contact_username'];

            $CL_row = mysqli_fetch_assoc($user->username($contact_username));
            $CU_user_id = $CL_row['user_id'];
            $CV_row = mysqli_fetch_assoc($user->conversations_user($user_id, $CU_user_id));

            $last_message = $CV_row['last_message'];
            $last_message_time = $CV_row['last_message_timestamp'];
            $L_time = date("d M Y - g:i:s A", strtotime($last_message_time));
            $L_message = substr($last_message, 0, 30);

            echo '<a href="/app/view/PersnolChatRoom.php/@' . $contact_username . '" class="contact_lister" id="contact_lister">
<div class="lister_img">
    <img src="/assets/img/user - Copy.png" class="lister_img_inner" alt="error">
</div>
<div class="lister_section">
    <div class="up_section">
        <span class="username">' . $contact_username . '</span>
        <span class="chat_time">' . $L_time . '</span>
    </div>
    <div class="down_section">
        <span class="chat_view">' . $L_message . '</span>
    </div>
</div>
</a>';
        }
    }
}
echo '</ul>
    </div>';
$CL_users = mysqli_num_rows($user->contact_user($contact_user, $user_id));
if ($CL_users === 1) {
    echo '<div class="contact_chat" id="contact_chat">
        <div class="up_section">

        <div class="close_arrow" id="close_arrow">
            <i class="fa-solid fa-arrow-left"></i>
        </div>

            <div class="lister_info">
                <div class="lister_img">
                    <img src="/assets/img/user - Copy.png" class="lister_img_inner" alt="error">
                </div>
                <span class="username">' . $contact_user . '</span>
            </div>
        </div>
        <div class="down_section">
            <ul class="chating_section" id="chat_messages">';
    $CL_row = mysqli_fetch_assoc($user->username($contact_user));
    $CU_user_id = $CL_row['user_id'];

    $CV_row = mysqli_fetch_assoc($user->conversations_user($user_id, $CU_user_id));
    $conversation_id = $CV_row['conversation_id'];
    $m_rows = mysqli_fetch_all($user->fetch_messages($conversation_id), MYSQLI_ASSOC);

    for ($m = 0; $m < count($m_rows); $m++) {
        $row = $m_rows[$m];
        // $conversation_id = $row['conversation_id'];
        $sender_id = $row['sender_id'];
        // $receiver_id = $row['receiver_id'];
        $message = $row['message'];
        $timestamp = $row['timestamp'];
        $time = date("d M Y - g:i:s A", strtotime($timestamp));

        if ($sender_id === $user_id) {
            $S_row = mysqli_fetch_assoc($user->sender_info($sender_id));
            $username = $S_row['username'];
            echo '<li class="sender_chat">
                <div class="sender_user_pic">
                    <img class="user_pic_inner" src="/assets/img/user - Copy.png" alt="error">
                </div>
                <div class="sende_user_info">
                    <div class="username">' . $username . '</div>
                    <p class="user_chat">' . $message . '</p>
                    <span class="timestamp">' . $time . '</span>
                </div>
            </li>';
        } else {
            if ($sender_id !== $user_id) {
                $S_row = mysqli_fetch_assoc($user->sender_info($sender_id));
                $username = $S_row['username'];
                echo '<li class="receiver_chat">
                         <div class="receiver_user_pic">
                             <img class="user_pic_inner" src="/assets/img/user - Copy.png" alt="error">
                         </div>
                         <div class="receiver_user_info">
                             <div class="username">' . $username . '</div>
                             <p class="user_chat">' . $message . '</p>
                             <p class="timestamp">' . $time . '</p>
                         </div>
                     </li>';
            }
        }
    }

    echo '</ul>
            <form class="chating_footer" method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <div class="smiley"><i class="smiley_inner fa-solid fa-face-smile"></i></div>
                <div class="folder"><i class="folder_inner fa-solid fa-file-arrow-up"></i></div>
                <div class="type_message_box">
                    <input type="text" class="type_message" name="type_message" placeholder="Type a message">
                    <input type="submit" class="send_message" name="send_message" value="SEND">
                </div>
            </form>
        </div>
    </div>';
} else {

    if ($CL_users === 0) {
        echo '<div class="start_chat" id="start_chat">
            <div class="start_chat_inner">
                <div class="logo">
                    <img class="logo_inner" src="/assets/img/gowork_logo.png" alt="error">
                </div>
                <p class="info">Start Your Chatting</p>
            </div>
            <div class="styleing"></div>
        </div>';
    }
}
echo '</div>';
?>
