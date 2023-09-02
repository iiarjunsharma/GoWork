<?php
require_once __DIR__ . '../../controller/main.php';
$id = $_GET['gig_id'];
$row = mysqli_fetch_assoc($user->gig_card_id($id));
$gig_id = $_SESSION['pay_gig_id'] = $row['gig_id'];
$gig_id_hash = password_hash($gig_id, PASSWORD_DEFAULT);
$seller_user_id = $row['seller_user_id'];
$gig_title = $row['gig_title'];
$package_name = $row['package_name'];
$package_describe = $row['package_describe'];
$delivery_time = $row['delivery_time'];
$package_price = $row['package_price'];
$images = $row['images'];
$row  = mysqli_fetch_assoc($user->gig_card_sellerId($seller_user_id));
$seller_id = $row['user_id'];
$hash = password_hash($seller_id, PASSWORD_DEFAULT);
$username = $row['username'];
echo '<div class="main" id="main">
<div class="gig-overview">
<h1 class="gig-page-title">' . $gig_title . '</h1>
<div class="seller-overview">
<div class="seller-img"><img src="/assets/img/user - Copy.png" class="seller-img-inner" alt="error"></div>
<div class="seller-view">
<a href="/app/view/user_show_profile.php/@'.$username.'" class="seller-name">' . $username . '</a>
</div>
</div>
</div>

<div class="gig-gallery-component">
<div class="gig-img"><img class="gig-img-inner" src="/assets/img/' . $images . '" alt=""></div>
</div>

<h2 class="section-title">
<span class="section-title-inner">About the seller</span>
</h2>


<div class="profile-info">
<div class="user-profile-image">
<img class="user-profile-image-inner" src="/assets/img/user - Copy.png" alt="error">
</div>
<div class="user-profile-label">
<a href="/app/view/user_show_profile.php/@'.$username.'" class="seller-name">' . $username . '</a>
</div>
</div>
</div>

<aside class="sidebar-content">
<div class="packages-tabs">
<div class="nav-container">
<span class="basic">Packages</span>
</div>
<div class="package-content">
<div class="price-wrapper">
<span class="price-heading">Price</span>
<span name="package_price" id="package_price" class="price">&#8377; ' . $package_price . '</span>
</div>

<div class="package-title-desc">
<h3 class="package-title">' . $package_name . '</h3>
<div class="package-describe">' . $package_describe . '</div>
</div>

<div class="delivery-wrapper">' . $delivery_time . '</div>
<!-- tab-footer work -->
<footer class="tab-footer">

<!-- Button to open the sidebar -->
<button id="open-button" class="continue-btn">
<span class="continue-heading">Continue</span>
<span class="right-arrow">&rarr;</span>
</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar" class="sidebar">
<!-- Cross (X) button to close the sidebar -->
<div class="sidebar-header">
<h3 class="side-heading">Order options</h3>
<div class="close-button" id="close-button">
<i class="fa-solid fa-xmark"></i>

</div>
</div>

<!-- Sidebar content -->
<div class="content">
<div class="packages_box">
<div class="package_head">
<div class="packages_heading">Packages</div>
<div class="packages_price">&#8377;' . $package_price . '</div>
</div> 
<div class="packages_desc">Basic I will create 2d animated explainer video or whiteboard animation</div>
<div class="gig-quantity">
<div class="gig-quant-heading">Gig Quantity</div>
<div class="gig-quant-btns">
<div class="quant-btn"><img class="quant-btn-inner" src="/assets/img/minus.png" alt="error"></div>
<div class="quant-num">1</div>
<div class="quant-btn"><img class="quant-btn-inner"  src="/assets/img/plus.svg" alt="error"></div>
</div>
</div>

</div>
</div>
<div class="continue-container">
<a href="/app/view/payments.php?gig_id=' . $gig_id_hash . '" class="continue-Btn" name="submit_transaction">Continue (&#8377;' . $package_price . ')</a>
<small class="continue-btn-desc">You won’t be charged yet</small>
</div>
</div>
</footer>

</div>
</div>
</aside>';
