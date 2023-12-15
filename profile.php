<?php require_once "views/header.php" ?>
<?php
    session_start();
?>

<link href="assets/css/profile.css" rel="stylesheet">

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
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
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Last name</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 32px;">
                    <h4 class="text-right">Update Your Profile </h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">City</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Postcode</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" style="background-color: #72A3EC">Save Profile</button>
                        <button class="btn btn-primary profile-button" type="reset" style="background-color: rgba(255, 99, 71);">Discard</button>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 32px;">
                    <h4 class="text-right">Change Password</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Password</label>
                        <input type="password" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">New password *</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Re-enter password *</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" style="background-color: #72A3EC">Confirm</button></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <span class="border px-3 p-1 add-experience">
                        <a href="views/content.php">Back to Tasks</a>
                    </span>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center experience">
                    <span class="border px-3 p-1 add-experience">
                        <a href="views/completed_tasks.php">Completed Tasks</a>
                    </span>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>




<?php require_once "views/bootstrap_footer.php" ?>
