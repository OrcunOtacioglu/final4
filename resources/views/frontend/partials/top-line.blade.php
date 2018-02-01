<!-- Top Line -->
<div id="top_line" class="visible_on_mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-5 font-13 call">
                <i class="icon-phone mr5"></i>+90 212 217 77 60
            </div>
            <div class="col-md-8 col-sm-8 col-xs-7 top-icons">
                <ul id="top_links">
                    <!-- Authentication Menu -->
                    <li>
                        <div class="dropdown dropdown-access">
                            <div class="userloading" style="display:none; float:right; padding-right:25px;">
                                <i class="font-15 loading-icon icon-spin6 animate-spin" style="position: absolute; z-index: 1;"></i>
                            </div>

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link">Sign in</a>

                            <div class="dropdown-menu">
                                <div class="row">
                                    <h2 class="mt0 mb15 font-20 w100 t-center font-300">USER LOGIN</h2>
                                </div>
                                <div class="form-group relative">
                                    <i class="pe-7s-user"></i>
                                    <input type="text" class="form-control pl40" id="inputUsernameEmail" placeholder="User name">
                                </div>
                                <div class="form-group relative">
                                    <i class="pe-7s-unlock"></i>
                                    <input type="password" class="form-control pl40" id="inputPassword" placeholder="Password">
                                </div>
                                <a id="forgot_pw" class="t-center">Forgot Password</a>
                                <input type="button" name="Sign_in" value="Sign in" id="Sign_in" class="btn_1 green medium w100">
                                <div id="loadinguserinfo" style="display:none;">
                                    <h5 class="font-300 mb20">Please wait</h5>
                                    <i class="font-50 loading-icon icon-spin6 animate-spin"></i>
                                </div>
                            </div>
                        </div>
                        <!-- End Authentication Menu -->
                    </li>
                    <!-- Language Selection -->
                    <li>
                        <div class="dropdown dropdown-mini">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="lang_link">English</a>
                            <div class="dropdown-menu">
                                <ul id="lang_menu">
                                    <li>
                                        <a href="#" class="ng-binding">
                                            <img src="/frontend/img/flag/en.png" class="mr5"> English
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="ng-binding">
                                            <img class="mr5" src="/frontend/img/flag/tr.png"> Türkçe
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- End Language Selection -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Top Line -->