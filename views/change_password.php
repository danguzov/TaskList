<?php require_once "content_nav.php" ?>

<div class="p-3 py-5">
    <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top: 32px;">
        <h4 class="text-right">Change Password</h4>
    </div>

    <form method="post" action="../controllers/change_password.php">
        <div class="row mt-2">
            <div class="col-md-12">
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

        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Confirm</button></div>
        <div class="mt-5 text-center"><button class="btn btn-danger profile-button" type="reset">Cancel</button></div>
    </form>
</div>