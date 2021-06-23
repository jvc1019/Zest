<div id="deleteAccountModal<?php echo $user['user_ID']; ?>" class="modal fade" role="dialog" aria-labelledby="User Details" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="POST" action="profile_delete.php?user_ID=<?php echo $user_ID; ?>">
                    <input type="hidden" name="userID" value="<?php echo $user['user_ID']; ?>">
                    <h5 class="text-center">Are you sure you want to delete your account?</h5><br>
                    <h8 class="text-center" style="font-style: italic; font-size: 12px;">Please enter your password to continue.</h8><br><br>
                    <div> Password: <input type="password" class="font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="verifyPass" required>
                    </div><br>
                    <h8 class="text-center" style="font-style: italic; font-size: 12px;">Note: This action is permanent. You cannot retrieve your account back anymore.</h8>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-danger btn-sm">Yes</button>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>