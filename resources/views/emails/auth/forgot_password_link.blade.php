<x-media_owner.auth-layout>
    <div class="row align-items-center justify-content-center h-100 mx-4 mx-sm-n32">
        <div class="col-12 col-md-9 col-xl-7 col-xl-9 px-8 px-sm-0 pt-24 pb-48">
            <div class="col-md-8">
                <h1 class="mb-0 mb-sm-24">{{ __('Reset Password') }}</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('reset.password.post') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group row mb-4">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                            Address</label>
                        <div class="col-md-8">
                            <input type="text" id="email_address" class="form-control" name="email"
                                   autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-8">
                            <input type="password" id="password" class="form-control" name="password"
                                   autofocus>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                            Password</label>
                        <div class="col-md-8">
                            <input type="password" id="password-confirm" class="form-control"
                                   name="password_confirmation" autofocus>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-media_owner.auth-layout>



