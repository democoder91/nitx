<x-page-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container" style="height: 100%, overflow: hidden;" id="container">

        <!-- Logo -->
        <div class="col-12 mb-5 justify-content-center text-center" style="margin-bottom: 5em; margin-top: 3em">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img alt="nitx logo" src="{{ asset('img/brand/logo_color.svg') }}"
                     style="height: 60px; margin-left:30px;">
            </a>
        </div>

        <div class="row mb-32 gy-32" id="screen-qr">
            <!-- QR Code -->
            <div class="col-6">
                <h2 class=" mt-4">Link your screen with QR code:</h2>
                <h4 class=" mt-4">use your camera from nitx website to read the code</h4>
                <h4><strong>Step1</strong></h4>
                <p>create a free nitx account at nitx.io</p>
                <h4><strong>Step2</strong></h4>
                <p>from the main page on your dashboard click add new screen then scan the QR code</p>
                @php
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 5; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $url = route('newScreenEvent', $randomString);
                @endphp
                <p style="margin-top: 2em">
                    {!! QrCode::size(200)->style('square')->eye('circle')->color(38, 48, 234)->backgroundColor(240, 242, 245)->generate($url) !!}
                </p>
            </div>
            <!-- ID Code -->
            <div class="col-6">
                <h2 class=" mt-4">Link your screen with ID code:</h2>
                <h4 class=" mt-4">use your mobile device or computer to open your media owner account on nitx then do
                    the following steps</h4>
                <h4><strong>Step1</strong></h4>
                <p>create a free nitx account at nitx.io</p>
                <h4><strong>Step2</strong></h4>
                <p>from the main page on your dashboard click add new screen then enter the ID code</p>
                <h2>Screen ID:<strong> {{ $randomString }}</strong></h2>
            </div>
            <a class="col-12 alert alert-primary d-flex align-items-center"
               data-bs-toggle="modal" data-bs-target="#Relink">
                <p style="font-size:1.5em;"><strong>have an old screen relink it now!</strong></p>
            </a>
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


    <div class="modal fade" id="Relink" tabindex="-1" aria-labelledby="RelinkLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RelinkLabel">Relink Your Screen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="relinkForm">
                        <input type="text" name="screenId" id="screenId" class="form-control mb-16"
                               placeholder="Screen ID:"
                               aria-label="Screen ID:">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Relink</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-page-layout>
<script>
    document.getElementById("relinkForm").addEventListener('submit', (e) => {
        e.preventDefault()
        let screenId = document.getElementById('screenId').value;
        window.location.href = '/rs/' + screenId
    })
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    window.Echo.channel(`newScreen.{{ $randomString }}`)
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
