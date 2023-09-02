<?php
require_once __DIR__ . '../../controller/main.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && isset($_FILES['images'])) {
        $gig_title = $_POST['gig_title'];
        $package_name = $_POST['package_name'];
        $package_describe = $_POST['package_describe'];
        $delivery_time = $_POST['delivery_time'];
        $package_price = $_POST['package_price'];
        $delivery_time_error = "DELIVERY TIME";
        if (empty($user_id) || empty($gig_title) || empty($package_name) || empty($package_describe) || empty($delivery_time) || empty($package_price)) {
            $ErrorMessage = 'Please fill out this (*) fields';
            $ErrorStatus = "alert-danger";
        } else {
            if ($delivery_time == $delivery_time_error) {
                $ErrorMessage = 'Please select delivery_time';
                $ErrorStatus = "alert-danger";
            } else {
                // image>>
                if ($_FILES["images"]["error"] !== 0) {
                    $ErrorMessage = 'Image Does Not Exist';
                    $ErrorStatus = "alert-danger";
                } else {
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

                        // move_uploaded_file($tmpName, 'img/'.$newImageName);
                        move_uploaded_file($tmpName, 'C:/xampp/htdocs/assets/img/' . $newImageName);


                        // Insert into Database
                        if ($user->add_new_gig($user_id, $gig_title, $package_name, $package_describe, $delivery_time, $package_price, $newImageName)) {
                            $SuccessMessage = "successfully created gig";
                            $SuccessStatus = "alert-success";
                        }
                    }
                }
            }
        }
    }
}
?>