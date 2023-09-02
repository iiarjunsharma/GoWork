<?php
require_once __DIR__ . '../../controller/main.php';
if (isset($Email)) {
    $row = mysqli_fetch_assoc($user->show_username($Email));
    $info_row = mysqli_fetch_assoc($user->showing_info($user_id));
    $username = $row['username'];
    $timestamp = $row['timestamp'];
    $date = date("d F Y", strtotime($timestamp));
    $name = $info_row['display_name'];
    $desc = $info_row['description'];
    if (empty($name)) {
        $name = "Your Display Name";
    }
}
echo '<div class="user-profile">
<div class="user-profile-info">
    <div class="user-dp">
        <span><img src="/assets/img/user.png" alt="error"></span>
    </div>
    <div class="user-profile-label">
    <span class="users-name">' . $name . '</span>
    <span class="users-name">@' . $username . '</span>
    </div>
    <div class="buttons-wrapper">
        <a href="/app/view/edit_profile.php" class="edit-btn">
            <span class="edit-btn-inner">Edit GoWork Profile</span>
        </a>
        <a href="/app/view/PersnolChatRoom.php" class="contact-btn">
            <span class="contact-btn-inner">ChatRoom</span>
        </a>
    </div>

    <div class="user-stats-desc">
        <ul>
            <li>
                <span>From</span>
                <span class="text-style">United Kingdom</span>
            </li>
            <li>
                <span>Member since</span>
                <span class="text-style">' . $date . '</span>
            </li>
        </ul>
    </div>
</div>
<div class="profile-info">
<div class="description">
<h3>Description</h3>
<p>' . $desc . '</p>
</div>
</div>
</div>
<!-- gigs -->
<section class="seller-gigs">
    <div class="status_filter_bar">
        <div class="seller_gig_head">Your GIGS</div>
    </div>
    <!-- <ul class="status-filter-bar">
        <li class="selected-filter">ACTIVE GIGS</li>
        <li class="selected-filter">DRAFTS</li>
    </ul> -->
    <div class="gig-card-base">';

$rows  = mysqli_fetch_all($user->seller_gigs($user_id), MYSQLI_ASSOC);
for ($i = 0; $i < count($rows); $i++) {
    $row = $rows[$i];
    $gig_id = $row['gig_id'];
    $hash = password_hash($user_id, PASSWORD_DEFAULT);
    $gig_title = $row['gig_title'];
    $images = $row['images'];
    echo
    '<a class="seller-gig-card" href="/app/view/gig_update.php?gig_id=' . $gig_id . '&gig_pass=' . $hash . '">
    <div class="gig-card-img">
    <img class="gig-card-img-inner" src="/assets/img/' . $images . '" alt="error">
    </div>
    <hr class="line" style="margin: 0px 4px 0px 4px;">
    <span class="gig-card-title">
    <h3 class="gig-card-title-inner">' . $gig_title . '</h3>
    </span>
    </a>';
}
echo '<a class="add-new-gig" href="/app/view/add-new-gig.php">
            <img class="add-new-gig-icon" src="/assets/img/plus.svg" alt="error">
            <h4 class="add-new-gig-heading">Create a new Gig</h4>
        </a>
    </div>
</section>';
