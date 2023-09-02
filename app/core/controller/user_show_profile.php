<?php
require_once __DIR__ . '../../controller/main.php';

$seller_username = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '@') + 1);

$s_info_r = mysqli_fetch_assoc($user->seller_info($seller_username));
$s_user_id = $s_info_r['user_id'];

$row = mysqli_fetch_assoc($user->seller_info($seller_username));
$username = $row['username'];
$timestamp = $row['timestamp'];
$date = date("d F Y", strtotime($timestamp));

$info_row = mysqli_fetch_assoc($user->show_seller_info($s_user_id));
$name = $info_row['display_name'];
$desc = $info_row['description'];
if (empty($name)) {
    $name = $username;
}
$_SESSION['contact_user'] = $username;
echo '<main>
<div class="user-account-container">
<div class="user-profile" id="user_profile">
<div class="user-profile-info">
<div class="user-dp">
<span><img src="/assets/img/user.png" alt="error"></span>
</div>
<div class="user-profile-label">
<span class="users-name">' . $name . '</span>
<span class="users-name">@' . $username . '</span>
</div>
<div class="buttons-wrapper">
<a href="/app/view/ChatRoom.php/@' . $username . '" class="chat-btn">
<span class="chat-btn-inner">Contact Me</span>
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
<section class="seller-gigs" id="seller_gigs">
<div class="status_filter_bar">
<div class="seller_gig_head">' . $username . '&apos;s GIGS</div>
</div>
<!-- <ul class="status-filter-bar">
<li class="selected-filter">ACTIVE GIGS</li>
<li class="selected-filter">DRAFTS</li>
</ul> -->
<div class="gig-card-base">';
$rows  = mysqli_fetch_all($user->fetch_seller_gigs($s_user_id), MYSQLI_ASSOC);
for ($i = 0; $i < count($rows); $i++) {
    $row = $rows[$i];
    $gig_id = $row['gig_id'];
    $gig_title = $row['gig_title'];
    $images = $row['images'];
    echo
    '<a class="seller-gig-card" href="/app/view/gigCard.php?gig_id=' . $gig_id . '">
<div class="gig-card-img">
<img class="gig-card-img-inner" src="/assets/img/' . $images . '" alt="error">
</div>
<hr class="line" style="margin: 0px 4px 0px 4px;">
<span class="gig-card-title">
<h3 class="gig-card-title-inner">' . $gig_title . '</h3>
</span>
</a>';
}
echo '
</div>
</section>
</div>
</main>';
