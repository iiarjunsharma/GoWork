<?php
require_once __DIR__ . '../../controller/main.php';
echo '<section class="name_section">
<h2 class="name-heading">';
$row = mysqli_fetch_assoc($user->username_display($Email));
echo 'Hello, ' . $row['username'];
echo '</h2>
</section>
<!-- All Categories -->
<main>
<div class="user-account-container">
<div class="gigs">
<h2 class="gigs-heading">All Categorys &#61;&gt;</h2>
<div class="gig-wrapper">';
$rows = mysqli_fetch_all($user->fetch_all_gigs(), MYSQLI_ASSOC);
for ($i = 0; $i < count($rows); $i++) {
    $row = $rows[$i];
    $gig_id = $row['gig_id'];
    $seller_user_id = $row['seller_user_id'];
    $gig_title = $row['gig_title'];
    $package_price = $row['package_price'];
    $images = $row['images'];
    $p_info_row = mysqli_fetch_assoc($user->fetch_gig_username($seller_user_id));
    // $seller_id = $p_info_row['user_id'];
    // $hash = password_hash($seller_id, PASSWORD_DEFAULT);
    $username = $p_info_row['username'];
    echo '<div class="gig-wrapper-items">
<img src="/assets/img/' . $images . '" alt="error">
<div class="inner-wrapper">
<span class="user_img" ><img class="user_img_inner" src="/assets/img/user.png" alt="error"></span>
<div class="name-level">
<div class="user-name">
<a href="/app/view/user_show_profile.php/@'.$username.'" class="text-style">' . $username . '</a>
</div>
</div>
</div>
<div class="seller-info">
<h3><a href="/app/view/gigCard.php?gig_id=' . $gig_id . '" class="text-style">' . $gig_title . '</a></h3>
<div class="collect-package">
<div class="collect-package-btn">
<i class="fa-solid fa-heart"></i>
</div> 
<div class="price-info">
<small>STARTING AT</small>
<span>&#8377; ' . $package_price . '</span>
</div>
</div>
</div>
</div>';
}
echo ' </div>
</div>
</div>
</main>';