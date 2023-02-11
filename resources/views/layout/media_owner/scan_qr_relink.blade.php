<x-page-layout>
    <div class="mt-24 mb-24"></div>
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-8">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img alt="nitx logo" src="{{asset('img/brand/logo_color.svg')}}" style="height: 60px;">
                </a>
                <h2 class=" mt-4">Start Scanning</h2>
                <h5>
                    <b>Open this URL on your Screen
                        <a href="{{route('scanQRRelink', $screen_id)}}"
                           target="_blank">{{route('scanQRRelink', $screen_id)}}
                        </a>
                    </b>
                </h5>
                @if ($errors->any())
                    <div class="container">
                        <div class="alert alert-danger">
                            {!! implode('', $errors->all('<p>:message</p>')) !!}
                        </div>
                    </div>
                @endif
                <div class="alert alert-danger" id="screenIDSMismatch" style="display: none">The entered ID screen does
                    not match with the ID
                    of requested screen
                </div>
                <p>Scan the barcode or Enter the screen id then press " Enter"</p>
            </div>
        </div>
    </div>

    <div class="container1">
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <div class="">
                <div class="input-group">
                    <span class="input-group-text"><a
                                href="{{route('scanQRRelink', $screen_id)}}">{{route('scanQRRelink', $screen_id)}}</a></span>
                    <input type="text" id="screenId" aria-label="#" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="">
            <div class="col-10 col-md-6 offset-1 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div id="qr-reader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../.../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        document.getElementById("screenId").addEventListener("keydown",
            async function (event) {
                if (!event) {
                    let event = window.event;
                }
                if (event.keyCode == 13) {
                    if (document.getElementById('screenId').value.trim()) {
                        await submit();
                    }
                }

                async function submit() {
                    let enteredScreenId = document.getElementById('screenId').value.trim();
                    let actualScreenId = {{$screen_id}};
                    if (parseInt(enteredScreenId) !== actualScreenId) {
                        document.getElementById('screenIDSMismatch').style.display = 'block'
                    } else {
                        window.location.href = `/MediaOwner/relink_screen/${enteredScreenId}/${actualScreenId}`
                    }
                }
            }, false);
    </script>

    <script>
        if (window) {
            if (!Html5QrcodeScanner) {
                var Html5QrcodeScanner = window.__Html5QrcodeLibrary__.Html5QrcodeScanner;
            }
            if (!Html5Qrcode) {
                var Html5Qrcode = window.__Html5QrcodeLibrary__.Html5Qrcode;
            }
            if (!Html5QrcodeSupportedFormats) {
                var Html5QrcodeSupportedFormats = window.__Html5QrcodeLibrary__.Html5QrcodeSupportedFormats
            }
            if (!Html5QrcodeScannerState) {
                var Html5QrcodeScannerState = window.__Html5QrcodeLibrary__.Html5QrcodeScannerState;
            }
            if (!Html5QrcodeScanType) {
                var Html5QrcodeScanType = window.__Html5QrcodeLibrary__.Html5QrcodeScanType;
            }
        }
    </script>
    <script>

        function docReady(fn) {
            if (document.readyState === "complete" || document.readyState === "interactive") {
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        let qrboxFunction = function (viewfinderWidth, viewfinderHeight) {
            let minEdgePercentage = 0.7; // 70%
            let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
            let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
            return {
                width: qrboxSize,
                height: qrboxSize
            };
        }

        const formatsToSupport = [
            Html5QrcodeSupportedFormats.QR_CODE,
            Html5QrcodeSupportedFormats.UPC_A,
            Html5QrcodeSupportedFormats.UPC_E,
            Html5QrcodeSupportedFormats.UPC_EAN_EXTENSION,
        ];

        docReady(function () {
            const html5QrCode = new Html5Qrcode("qr-reader");

            function onScanSuccess(decodedText, decodedResult) {
                window.location.href = decodedText;
                html5QrcodeScanner.clear();
            }

            const config = {
                fps: 10,
                formatsToSupport: formatsToSupport
            };

            html5QrCode.start({
                facingMode: "environment"
            }, config, onScanSuccess);

            function onScanError(qrCodeError) {

            }

            html5QrcodeScanner.render(onScanSuccess, onScanError);
        });
    </script>
</x-page-layout>

