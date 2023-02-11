<x-admin.auth-layout>
    <div class="row hp-lock-screen-row mx-auto text-center rounded overflow-hidden pt-42 pb-64 px-8 px-sm-24">
        <h1 class="text-white mb-2 mt-5">Welcome👋!</h1>
        <p class="text-lead text-white">Create new account to nitx platform.</p>
        <div class="col-12">
            <img src="{{ asset('img/svg/illustrations/Artboard 12.svg') }}" alt="Avatar">
        </div>
        <!--Main-->
        <div class="col-12 mt-32 px-32">
                    <!--Alert Message-->
                    <div class="z-index-0">
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<p>:message</p>')) !!}
                        </div>
                        @endif
                    </div><!--End of Alert Message-->
                    <form role="form text-left" action="{{route('AdminRegister')}}" method="POST">
                        @csrf
                        <div class="mb-10">
                            <input type="text" class="form-control ps-8 border-start-0" placeholder="Name" aria-label="Name"
                                   aria-describedby="email-addon" name="name">
                        </div>
                        <div class="mb-10">
                            <input type="email" class="form-control ps-8 border-start-0" placeholder="Email" aria-label="Email"
                                   aria-describedby="email-addon" name="email">
                        </div>
                        <div class="mb-10">
                            <input type="password" class="form-control ps-8 border-start-0" placeholder="Password"
                                   aria-label="Password" aria-describedby="password-addon" name="password">
                        </div>
                        <div class="mb-10">
                            <input type="password" class="form-control ps-8 border-start-0" placeholder="Password"
                                   aria-label="Password" aria-describedby="password-addon"
                                   name="password_confirmation">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100 my-4 mb-2"><strong>Sign up</strong></button>
                        </div>
                    </form>
        </div><!--End of Main-->
        <div class="col-12 mt-18">
            <p class="text-lead text-white">Already have an account? 
                <a href="{{route('AdminLogin')}}" class="btn btn-link hp-text-color-black-60 hp-hover-text-color-success-2">Login</a></p>
        </div>
    </div>
</x-admin.auth-layout>