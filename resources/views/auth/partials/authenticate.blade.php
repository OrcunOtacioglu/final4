<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a href="#register" class="nav-link active" data-toggle="tab" role="tab">
            <i class="wb-user-add"></i> Register
        </a>
    </li>
    <li class="nav-item">
        <a href="#login" class="nav-link" data-toggle="tab" role="tab">
            <i class="wb-unlock"></i> Login
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="register" role="tabpanel" style="padding-top: 25px;">
        @include('auth.register')
    </div>
    <div class="tab-pane" id="login" role="tabpanel" style="padding-top: 25px;">
        @include('auth.login')
    </div>
</div>