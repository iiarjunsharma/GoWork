<?php require_once __DIR__ . '../../core/controller/logInOutChacking.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/add-new-gig.css">
</head>

<body>
    <?php require_once __DIR__ . '../../core/controller/add-new-gig.php'; ?>
    <?php require_once __DIR__ . '../../view/component/header.php'; ?>
    
        <form class="gig-edit-create-form" action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
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
                            <textarea name="gig_title" class="gig-title-area" minlength="15" maxlength="80" placeholder="do something I'm really good at" role="textbox" class="gig-title-textarea"></textarea>
                            <span class="chars-count">0 / 80 max</span>
                        </div>
                    </div>
                </div>
                <div class="gig-pricing-input">
                    <div class="gig-packages-input-heading">
                        <h3 class="packages-heading required">Packages</h3>
                    </div>
                    <div class="package-name">
                        <textarea name="package_name" class="package-name-area" maxlength="35" placeholder="Name your package"></textarea>
                    </div>
                    <div class="package-describe">
                        <textarea name="package_describe" class="package-describe-area" maxlength="100" placeholder="Describe the details of your offering"></textarea>
                    </div>
                    <div class="delivery-time">
                        <select name="delivery_time" class="delivery-time-inner">
                            <option selected>DELIVERY TIME</option>
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
                            <!-- <input type="hidden" value="0"> -->
                        </select>
                    </div>
                    <div class="price-section">
                        <span class="price-heading">Price &ndash;</span>
                        <div class="icon-price-input">
                            <span class="price-icon">&#8377;</span>
                            <input name="package_price" class="price-input" type="number" step="5" min="5" max="10000" value="5">
                        </div>
                    </div>
                </div>
                <div class="gallery-item-wrapper">
                    <h3 class="gallery-item-heading required">Gallery</h3>
                    <h4 class="upload-img-heading">Images (up to 1)</h4>
                    <div class="upload-img">
                        <div class="gallery-icon">
                            <img class="gallery-icon-inner" id="selected-image" src="/assets/img/icon-gallery.png" alt="error">
                        </div>
                        <span class="gallery-text">Drag & drop a Photo or</span>
                        <label for="images" class="browse-file">Browse
                            <input class="input-browse" type="file" id="images" name="images" multiple="">
                        </label>
                        <script>
                            <?php require_once __DIR__ . '../../../assets/js/add_img.js'; ?>
                        </script>
                    </div>
                </div>
                <div class="publish">
                    <button class="publish-btn" name="submit" type="submit">Publish</button>
                </div>
            </div>
        </form>
</body>

</html>