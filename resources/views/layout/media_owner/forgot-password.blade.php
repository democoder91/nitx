<x-media_owner.auth-layout>
    <div class="row align-items-center justify-content-center h-100 mx-4 mx-sm-n32">
        <div class="col-12 col-md-9 col-xl-7 col-xl-9 px-8 px-sm-0 pt-24 pb-48">
            <h1 class="mb-0 mb-sm-24">Reset Password</h1>
            <p class="mt-sm-8 mt-sm-0 text-black-60">Sorry to hear that from you 💔, please enter your email to receive a
                reset password link</p>

            @error('failed')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form class="mt-16 mt-sm-32 mb-8" method="POST" action="">
                @csrf
                <div class="mb-16">
                    <label class="form-label">Email address</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <input type="hidden" name="user" value="media_owner"/>
                <button type="submit" class="btn btn-primary w-100">Send</button>

                <div class="col-12 hp-form-info" style="margin-top: 0.5em">
                    <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">haven't received an email</span>
                    <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption" href="">send again</a>
                </div>
            </form>
            <form class="mt-16 mt-sm-32 mb-8" method="POST" action="" hidden>
                <div class="mb-16">
                    <div class="d-flex justify-content-between">
                        <label for="loginPassword" class="form-label">{{ __('Password') }} </label>
                        <div class="mb-2">
                            <a onclick=" show_pass()" class="small text-muted text-underline--dashed border-primary"
                               data-toggle="password-text" data-target="#input-password"
                               style="cursor: pointer;">{{ __('Show password') }}</a>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-16">
                    <label for="loginPassword" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Confirm password</button>
            </form>
        </div>
    </div>
</x-media_owner.auth-layout>
