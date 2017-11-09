<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="email" class="control-label">E-Mail Address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong class="text-danger">{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong class="text-danger">{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <button type="submit" class="btn btn-detur btn-block">
                    <i class="wb-unlock"></i> Login
                </button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center">
                <a href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </div>
</form>