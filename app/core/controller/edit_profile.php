<?php
require_once __DIR__ . '../../controller/main.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name_save'])) {
        $name = $_POST['name_input'];
        if ($user->display_name_up($name, $user_id)) {
            $SuccessMessage = 'Successfully Update Your Display Name';
            $SuccessStatus = 'alert-success';
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['desc_up'])) {
        $desc = $_POST['editing_desc'];
        if ($user->desc_up($desc, $user_id)) {
            $SuccessMessage = 'Successfully Update Your Description';
            $SuccessStatus = 'alert-success';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/user_profile.css">
</head>

<body>
    <!-- navbar -->
    <?php require_once __DIR__ . '../../../view/component/header.php' ?>
    <!-- edit_profile_container -->
    <div class="edit_pro_container">
        <?php
        $row = mysqli_fetch_assoc($user->showing_info($user_id));
        $name = $row['display_name'];
        $desc = $row['description'];
        $server_uri = $_SERVER['REQUEST_URI'];
        echo '
<div class="display_name">
<div id="show_display_name">
    <div class="name_head">
        <div class="name_heading">Your Display Name &ndash;</div>
        <span id="open_name_Button" class="edit_name">Edit</span>
    </div>
    <span class="show_name">';
        if (!empty($name)) {
            echo $name;
        } else {
            echo "Your Display Name";
        }

        echo '</span>
</div>
<form id="edit_display_name" method="post" action="' . $server_uri . '">
    <div class="name_heading">Choose your display name &ndash;</div>
    <p class="name_head">We suggest using your first name and first initial of your last name.</p>
    <input type="text" name="name_input" maxlength="15" value="' . $name . '" class="name_input" placeholder="Type your display name">
    <p class="name_foot">You’ll still see your unique username in some areas.</p>
    <div class="name_btns">
        <button id="close_name_Button" class="name_cancel">Cancel</button>
        <button id="close_name_Button" name="name_save" type="submit" class="name_save">Save display name</button>
    </div>
</form>
</div>
<div class="description">
<div id="show_description">
    <div class="desc_head">
        <div class="desc_heading">Description &ndash;</div>
        <span id="open_desc_Button" class="edit_desc">Edit</span>
    </div>
    <p class="show_desc">';
        if (!empty($desc)) {
            echo $desc;
        } else {
            echo "Please tell us about any hobbies, additional expertise, or anything else you’d like to add.";
        }
        echo '
    </p>
</div>
<form id="edit_description" method="post" action="' . $server_uri . '">
    <div class="desc_heading">Description &ndash;</div>
    <textarea class="editing_desc" minlength="150" name="editing_desc" maxlength="600" placeholder="Please tell us about any hobbies, additional expertise, or anything else you’d like to add.">' . $desc . '</textarea>
    <div class="desc_btns">
        <button id="close_desc_Button" class="desc_cancel">Cancel</button>
        <button id="close_desc_Button" class="desc_up" name="desc_up">Update</button>
    </div>
</form>
</div>';
        ?>

    </div>
    <script>
        // editing_open_close

        // Get the elements for display name editing
        const show_display_name = document.getElementById('show_display_name');
        const edit_display_name = document.getElementById('edit_display_name');
        const open_name_Button = document.getElementById('open_name_Button');
        const close_name_Button = document.getElementById('close_name_Button');
        // Function to open the display name editor
        function openEditDisplayName() {
            show_display_name.style.display = 'none';
            edit_display_name.style.display = 'block';
        }
        // Function to close the display name editor
        function closeEditDisplayName() {
            edit_display_name.style.display = 'none';
            show_display_name.style.display = 'block';
        }
        // Add event listeners to the display name buttons
        open_name_Button.addEventListener('click', openEditDisplayName);
        close_name_Button.addEventListener('click', closeEditDisplayName);
        // Get the elements for description editing
        const show_description = document.getElementById('show_description');
        const edit_description = document.getElementById('edit_description');
        const open_desc_Button = document.getElementById('open_desc_Button');
        const close_desc_Button = document.getElementById('close_desc_Button');
        // Function to open the description editor
        function openEditDescription() {
            show_description.style.display = 'none';
            edit_description.style.display = 'block';
        }
        // Function to close the description editor
        function closeEditDescription() {
            edit_description.style.display = 'none';
            show_description.style.display = 'block';
        }
        // Add event listeners to the description buttons
        open_desc_Button.addEventListener('click', openEditDescription);
        close_desc_Button.addEventListener('click', closeEditDescription);
    </script>
</body>

</html>