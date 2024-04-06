<?php require_once "../include/header.php" ?>
<?php require_once "content_nav.php" ?>
<?php require_once "../class/EditProfile.php" ?>
<?php require_once "../class/User.php" ?>
<?php require_once  "../class/Database.php" ?>
<?php require_once "../controllers/editProfileController.php" ?>

<link href="../assets/css/profile.css" rel="stylesheet">

<div class="container rounded bg-white mt-5 mb-5">
    <form class="row" action="../controllers/editProfileController.php" method="post">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?= $user_id = $_SESSION['user_first_name']?></span>
            </div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Edit Profile Settings</h4>
                </div>


                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">First name</label>
                        <input type="text" class="form-control" name="first_name" value="<?= $user_id; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Last name</label>
                        <input type="text" class="form-control" name="last_name" value="<?= $last_name ?>">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">E-mail</label>
                        <input type="text" class="form-control" name="first_name" value="<?= $email ?>">
                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 32px;">
                    <h4 class="text-right">Update Your Profile</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile_number" pattern="[0-9]+" title="Enter only numbers" value="<?= $mobile_number ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">City</label>
                        <input type="text" class="form-control" name="city" value=" <?= $city ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" name="address" value=" <?= $address ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Postcode</label>
                        <input type="text" class="form-control" name="postcode" value="<?= $postcode ?>">
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" style="background-color: #72A3EC">Save</button>
                        <button class="btn btn-primary profile-button" type="reset" style="background-color: rgba(255, 99, 71);">Discard</button>
                    </div>
                </div>
        </form>
    </div>


    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 32px;">
            <h4 class="text-right">Change Password</h4>
        </div>

        <form method="post" action="../controllers/change_password.php">
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="labels">Current Password *</label>
                    <input type="password" name="current_password" class="form-control" placeholder="" value="" required>
                </div>

                <div class="col-md-6">
                    <label class="labels">New password *</label>
                    <input type="password" name="new_password" class="form-control" placeholder="" value="" required>
                </div>

                <div class="col-md-6">
                    <label class="labels">Re-enter password *</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="" value="" required>
                </div>
            </div>

            <div class="mt-5 text-center">
                <button class="btn btn-primary profile-button" type="submit" style="background-color: #72A3EC">Save</button>
                <button class="btn btn-primary profile-button" type="reset" style="background-color: rgba(255, 99, 71);">Discard</button>
            </div>
        </form>
    </div>

<?php require_once "../include/scripts.php" ?>
