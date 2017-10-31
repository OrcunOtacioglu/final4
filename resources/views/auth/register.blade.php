<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <!-- Name and Surname Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                <label for="surname" class="control-label">Surname</label>
                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                @if ($errors->has('surname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Email and Phone Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="control-label">Phone Number</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Citizenship and Address Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('citizenship') ? ' has-error' : '' }}">
                <label for="citizenship" class="control-label">Citizenship / Passport Number</label>
                <input id="citizenship" type="text" class="form-control" name="citizenship" value="{{ old('citizenship') }}" required>

                @if ($errors->has('citizenship'))
                    <span class="help-block">
                        <strong>{{ $errors->first('citizenship') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="control-label">Address</label>
                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- ZIP Code and Province Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
                <label for="zip_code" class="control-label">ZIP Code</label>
                <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}" required>

                @if ($errors->has('zip_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('zip_code') }}</strong>
                     </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                <label for="province" class="control-label">Province</label>
                <input id="province" type="text" class="form-control" name="province" value="{{ old('province') }}" required>

                @if ($errors->has('province'))
                    <span class="help-block">
                        <strong>{{ $errors->first('province') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Country Field -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country" class="control-label">Country</label>
                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required>

                @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Password Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password-confirm" class="control-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 col-md-6">
            <div class="form-group">
                <button type="submit" class="btn btn-detur btn-block">
                    <i class="wb-user-add"></i> Register
                </button>
            </div>
        </div>
    </div>
</form>
