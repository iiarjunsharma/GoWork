<?php
require_once __DIR__ . '../../controller/main.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['up_gig']) && isset($_FILES['images'])) {
        $gig_id = $_GET['gig_id'];
        $up_gig_title = $_POST['up_gig_title'];
        $up_package_name = $_POST['up_package_name'];
        $up_package_describe = $_POST['up_package_describe'];
        $up_delivery_time = $_POST['up_delivery_time'];
        $up_package_price = $_POST['up_package_price'];

        if (empty($gig_id) || empty($up_gig_title) || empty($up_package_name) || empty($up_package_describe) || empty($up_delivery_time) || empty($up_package_price)) {
            $ErrorMessage = 'Please fill out this (*) fields';
            $ErrorStatus = "alert-danger";
        } else {
            // Check if a new image is selected
            if ($_FILES["images"]["error"] === 4) {
                // No new image selected, keep the existing image
                $row = mysqli_fetch_assoc($user->gig_edit_id($gig_id));
                $newImageName = $row['images'];
            } else if ($_FILES["images"]["error"] !== 0) {
                // Handle image upload error
                $ErrorMessage = 'Image Does Not Exist';
                $ErrorStatus = "alert-danger";
            } else {
                // Process image upload
                $fileName = $_FILES["images"]["name"];
                $fileSize = $_FILES["images"]["size"];
                $tmpName = $_FILES["images"]["tmp_name"];

                $validImageExtension = ['jpg', 'jpeg', 'png'];
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));
                if (!in_array($imageExtension, $validImageExtension)) {
                    $ErrorMessage = 'Invalid Image Extension';
                    $ErrorStatus = "alert-danger";
                } else if ($fileSize > 1000000) {
                    $ErrorMessage = 'Image Size Is Too Large';
                    $ErrorStatus = "alert-danger";
                } else {
                    $newImageName = uniqid();
                    $newImageName .= '.' . $imageExtension;
                    move_uploaded_file($tmpName, 'C:/xampp/htdocs/assets/img/' . $newImageName);
                }
            }

            // Update gig details including the new/unchanged image
            if ($user->gig_update($up_gig_title, $up_package_name, $up_package_describe, $up_delivery_time, $up_package_price, $newImageName, $gig_id)) {
                $SuccessMessage = "Successfully Update Your Gig";
                $SuccessStatus = "alert-success";
            }
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
    <?php require_once __DIR__ . '../../../view/component/header.php'; ?>
    <?php
    $gig_id = $_GET['gig_id'];
    $gig_pass = $_GET['gig_pass'];
    if (!password_verify($user_id, $gig_pass)) {
        echo "pass not match";
    } else {
        $row = mysqli_fetch_assoc($user->gig_edit_id($gig_id));
        // $seller_user_id = $row['seller_user_id'];
        $gig_title =  $row['gig_title'];
        $package_name =  $row['package_name'];
        $package_describe =  $row['package_describe'];
        $delivery_time =  $row['delivery_time'];
        $package_price =  $row['package_price'];
        $images =  $row['images'];
        $server_uri = $_SERVER['REQUEST_URI'];
        echo '<form class="gig-edit-create-form" action="' . $server_uri . '" method="post" enctype="multipart/form-data">
<div class="create-gig-input">
<div class="gig-title-group">
<h3 class="gig-title-heading required">Overview</h3>
<div class="gig-title-container">
<div class="input-label">
<span class="title-heading">Gig title</span>
<p class="title-para">As your Gig storefront, your <strong>title is the most important
place</strong> to include keywords that buyers would likely use to search for a service
like
yours.</p>
</div>
<div class="gig-title-input">
<textarea name="up_gig_title" class="gig-title-area" minlength="15" maxlength="80" placeholder="do something I`m really good at" role="textbox" class="gig-title-textarea">' . $gig_title . '</textarea>
<span class="chars-count">0 / 80 max</span>
</div>
</div>
</div>
<div class="gig-pricing-input">
<div class="gig-packages-input-heading">
<h3 class="packages-heading required">Packages</h3>
</div>
<div class="package-name">
<textarea name="up_package_name" class="package-name-area" maxlength="35" placeholder="Name your package">' . $package_name . '</textarea>
</div>
<div class="package-describe">
<textarea name="up_package_describe" class="package-describe-area" maxlength="100" placeholder="Describe the details of your offering">' . $package_describe . '</textarea>
</div>
<div class="delivery-time">
<select name="up_delivery_time" class="delivery-time-inner">
<option selected>' . $delivery_time . '</option>
<option>1 day Delivery</option>
<option>2 day Delivery</option>
<option>3 day Delivery</option>
<option>4 day Delivery</option>
<option>5 day Delivery</option>
<option>6 day Delivery</option>
<option>7 day Delivery</option>
<option>10 day Delivery</option>
<option>14 day Delivery</option>
<option>21 day Delivery</option>
<option>30 day Delivery</option>
<option>45 day Delivery</option>
<option>60 day Delivery</option>
<option>75 day Delivery</option>
<option>90 day Delivery</option>
</select>
</div>
<div class="price-section">
<span class="price-heading">Price &ndash;</span>
<div class="icon-price-input">
<span class="price-icon">&#8377;</span>
<input name="up_package_price" class="price-input" type="number" step="5" min="5" max="10000" value="' . $package_price . '">
</div>
</div>
</div>
<div class="gallery-item-wrapper">
<h3 class="gallery-item-heading required">Gallery</h3>
<h4 class="upload-img-heading">Images (up to 1)</h4>
<div class="upload-img">
<div class="gallery-icon">
<img class="gallery-icon-inner" id="selected-image" src="/assets/img/' . $images . '" alt="error">
</div>
<span class="gallery-text">Drag & drop a Photo or</span>
<label for="images" class="browse-file">Browse
<input class="input-browse" type="file" id="images" name="images" multiple=""></label>
</div>
</div>
<div class="update">
<a href="/app/view/user_profile.php" class="cancal-btn">Cancal</a>
<button class="update-btn" name="up_gig" type="submit">Update</button>
</div>
</div>
</form>';
    }
    ?>
    <script>
        <?php require_once __DIR__ . '../../../../assets/js/add_img.js'; ?>
    </script>
</body>

</html>