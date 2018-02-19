<form id="register-form" method="POST" action="{{ route('register') }}">
{{ csrf_field() }}

<!-- Name and Surname Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="control-label">
                    Name<span class="red color-red">*</span>
                </label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="surname" class="control-label">
                    Surname<span class="red color-red">*</span>
                </label>
                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                @if ($errors->has('surname'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Email and Phone Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="control-label">
                    E-Mail Address<span class="red color-red">*</span>
                </label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone" class="control-label">
                    Phone Number<span class="red color-red">*</span>
                </label>
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                @if ($errors->has('phone'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Citizenship and Address Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="citizenship" class="control-label">
                    Citizenship<span class="red color-red">*</span>
                </label>
                <select name="citizenship" id="citizenship" class="form-control{{ $errors->has('citizenship') ? ' is-invalid' : '' }}" required>
                    <option value="TR">Turkish</option>
                    <option value="NonTR">Non-Turkish</option>
                </select>

                @if ($errors->has('citizenship'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('citizenship') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="identifier">
                    Citizenship | Passport Number<span class="red color-red">*</span>
                </label>
                <input id="identifier" type="text" class="form-control{{ $errors->has('identifier') ? ' is-invalid' : '' }}" name="identifier" value="{{ old('identifier') }}" required>

                @if ($errors->has('identifier'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('identifier') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- ZIP Code and Province Fields -->
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="country" class="control-label">
                    Country<span class="red color-red">*</span>
                </label>
                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>

                @if ($errors->has('country'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="province" class="control-label">
                    Province<span class="red color-red">*</span>
                </label>
                <input id="province" type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" value="{{ old('province') }}" required>

                @if ($errors->has('province'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('province') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="zip_code" class="control-label">
                    ZIP Code<span class="red color-red">*</span>
                </label>
                <input id="zip_code" type="text" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="{{ old('zip_code') }}" required>

                @if ($errors->has('zip_code'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('zip_code') }}</strong>
                     </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Country Field -->
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="address" class="control-label">
                    Address<span class="red color-red">*</span>
                </label>
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                @if ($errors->has('address'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Password Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password" class="control-label">
                    Password<span class="red color-red">*</span>
                </label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="form-text">
                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <button type="submit" class="btn_1 orange has-spinner relative btn-block radius-50">
                    <i class="wb-user-add"></i> Register
                </button>
            </div>
        </div>
    </div>
</form>
