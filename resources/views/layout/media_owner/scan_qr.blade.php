<x-page-layout>
    <div class="mt-24 mb-24"></div><!--Dividers-->

    <!-- main #################################################################### -->
    <div class="container">
        <!-- Title -->
        <div class="row mb-5 justify-content-center text-center">
            <a class="navbar-brand" href="{{route('index')}}" style="margin-bottom: 2em; margin-top:1em">
                <img alt="nitx logo" src="{{asset('img/brand/logo_color.svg')}}" style="height: 60px;">
            </a>
            <div class="col-12">
                <h2 class=" mt-4">Start Scanning</h2>
                <h3><strong>Open this URL on your Screen </br>
                    <a href="{{route('newScreen')}}" target="_blank">{{route('newScreen')}}</a></strong></h3>
                <h4>Scan the QR or Enter the screen id then press " Enter"</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-text">{{route('newScreen')}}</span>
                <input type="text" id="url-qr" aria-label="#" class="form-control">
            </div>
        </div>
        <br>
        <div class="col-12">
            <div id="qr-reader"></div>
        </div>
        <br>
        <div class="col-12">
            <div class="col-12 alert alert-primary d-flex align-items-center">
             <p style="font-size:1.2em;"><i class="ri-computer-line  hp-text-color-primary-1"></i> 
                / This screen will be assigned to Nitx standard Plan (27.00 SR per screen/month)</p>
         </div>
        </div>
    </div>
    <!-- progress nav #################################################################### -->


    <!-- Core JS  -->

    <script src="../../.../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>


    <script>
        document.getElementById("url-qr").addEventListener("keydown",
            function (event) {
                if (!event) {
                    var event = window.event;
                }
                if (event.keyCode == 13) {
                    if (document.getElementById('url-qr').value.trim()) {
                        changeText2();
                    }
                }
                function changeText2() {
                    var userInput = document.getElementById('url-qr').value.trim();
                    window.location = "{{URL::to('/newScreen')}}/" + userInput;
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

            // If you want to prefer back camera
            html5QrCode.start({
                facingMode: "environment"
            }, config, onScanSuccess);


            // var html5QrcodeScanner = new Html5QrcodeScanner(
            //     "qr-reader", { fps: 10, qrbox: qrboxFunction,formatsToSupport: formatsToSupport },
            //     /* verbose= */ false);


            // Optional callback for error, can be ignored.
            function onScanError(qrCodeError) {
                // This callback would be called in case of qr code scan error or setup error.
                // You can avoid this callback completely, as it can be very verbose in nature.
            }

            html5QrcodeScanner.render(onScanSuccess, onScanError);
        });
    </script>
</x-page-layout>

