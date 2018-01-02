<!-- Password Reset Modal -->
<div id="resetpasswordmodal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 300px; margin: 0 auto;">
            <div class="modal-header">
                <h2 class="modal-title">
                    Reset Password
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h2>
            </div>
            <div class="modal-body">
                <div id="resetform" class="dropdown-access">
                    <div class="form-group relative">
                        <i class="pe-7s-user"></i>
                        <input type="text" class="form-control pl40" id="inputUsernameEmailReset" placeholder="Email Address">
                    </div>
                    <div class="form-group relative">
                        <i class="pe-7s-unlock"></i>
                        <input type="password" class="form-control pl40" id="inputPasswordReset" placeholder="Password">
                    </div>

                    <div class="form-group relative">
                        <i class="pe-7s-unlock"></i>
                        <input type="password" class="form-control pl40 w100" id="inputConfirmPassword" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary fr">Reset</a>
                <div id="loadingresetpassword" style="display:none; float:right">
                    Please wait
                    <i class="font-35 loading-icon icon-spin6 animate-spin"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Password Reset -->