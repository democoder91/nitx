<x-page-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container" style="height: 100%, overflow: hidden;" id="container">
        <!-- Title -->
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-12">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img alt="nitx logo" src="{{ asset('img/brand/logo_color.svg') }}"
                         style="height: 60px; margin-left:30px;">
                </a>
                <h2 class=" mt-4">Scan The QR Code</h2>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center" id="screen-qr">
                    {!! QrCode::size(300)->style('square')->eye('circle')->color(38, 48, 234)->backgroundColor(240, 242, 245)->generate(route('relinkScreenQR', $screen_id)) !!}
                    <br>
                    <br>
                    <h2>Screen Id: {{ $screen_id }}</h2>
                </div>
            </div>
            <div id="wait" style="display: none" class="text-center">
                <h2><strong>Please fill your screen information</strong></h2>
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon
                        src="https://cdn.lordicon.com/iahpzgqp.json"
                        trigger="loop"
                        colors="primary:#2516c7,secondary:#30e8bd"
                        style="width:350px;height:350px">
                </lord-icon>
            </div>


        </div>
    </div>
</x-page-layout>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    window.Echo.channel(`newScreen.{{ $screen_id }}`)
        .listen('RegisterScreen', () => {
            $("#screen-qr").hide()
            $("#wait").show()
        })
        .listen('ScreenData', (e) => {
            const date = new Date();
            date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
            let expires = "expires=" + date.toUTCString();
            document.cookie = "screenId=" + (e.db_id) + ";" + expires + ";path=/";
            location.replace("{{ route('screen.show') }}")
        })
</script>


