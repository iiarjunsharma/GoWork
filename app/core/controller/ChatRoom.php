<?php
require_once __DIR__ . '../../controller/main.php';
$contact_user = $_SESSION['contact_user'];
// REQUEST_METHOD
if ($_SERVER["REQUEST_METHOD"] === "POST"  && isset($_POST['send_message'])) {
    $CL_row = mysqli_fetch_assoc($user->username($contact_user));
    $CU_user_id = $CL_row['user_id'];
    if ($user_id === $CU_user_id) {
        $ErrorMessage = "Can't Message Yourself";
        $ErrorStatus = "alert-danger";
    } else {
        $message = $_POST['type_message'];
        if (empty($message)) {
            $ErrorMessage = 'Message Is Empty';
            $ErrorStatus = "alert-danger";
        } else {
            $exist_contact = mysqli_num_rows($user->contact_user($contact_user, $user_id));
            if ($exist_contact === 0) {
                // Add Contact List
                $user->add_contact($user_id, $contact_user);
            }
            $exist_conversations = mysqli_num_rows($user->conversations_user($user_id, $CU_user_id));
            if ($exist_conversations === 0) {
                // Add conversations
                $user->add_conversations($user_id, $CU_user_id);
            }
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

$exist_contact = mysqli_num_rows($user->contact_user($contact_user, $user_id));
if ($exist_contact > 0) {
    $CL_row = mysqli_fetch_assoc($user->username($contact_user));
    $CU_user_id = $CL_row['user_id'];

    $CV_row = mysqli_fetch_assoc($user->conversations_user($user_id, $CU_user_id));
    $last_message = $CV_row['last_message'];
    $last_message_time = $CV_row['last_message_timestamp'];
    $L_message = substr($last_message, 0, 30);
    $L_time = date("d M Y - g:i:s A", strtotime($last_message_time));
}
if (!isset($L_message)) {
    $L_message = '';
}
if (!isset($L_time)) {
    $L_time = '';
}
echo '<a href="/app/view/ChatRoom.php/@' . $contact_user . '" class="contact_lister" id="contact_lister">
                    <div class="lister_img">
                        <img src="/assets/img/user - Copy.png" class="lister_img_inner" alt="error">
                    </div>
                    <div class="lister_section">
                        <div class="up_section">
                            <span class="username">' . $contact_user . '</span>
                            <span class="chat_time">' . $L_time . '</span>
                        </div>
                        <div class="down_section">
                            <span class="chat_view">' . $L_message . '</span>
                        </div>
                    </div>
                </a>';



echo '</ul>
    </div>';
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
// if (isset($contact_user)) {
$exist_contact = mysqli_num_rows($user->contact_user($contact_user, $user_id));
if ($exist_contact > 0) {

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
    </div>
    </div>';
