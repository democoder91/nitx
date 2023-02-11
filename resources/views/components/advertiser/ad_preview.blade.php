<style>
    .container-upload .wrapper {
        position: relative;
        height: 300px;
        width: 100%;
        border-radius: 10px;
        background: #fff;
        border: 2px dashed #c2cdda;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .wrapper.active {
        border: none;
    }

    .wrapper .image {
        position: absolute;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wrapper img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        display: none;

    }

    .wrapper .icon i {
        font-size: 80px;
        color: #2630EA;
        padding-left: 0.6em;
        padding-bottom: 0.1em;
    }

    .wrapper .text {
        font-size: 20px;
        font-weight: 500;
        color: #5B5B7B;
    }

    .wrapper #cancel-btn i {
        position: absolute;
        font-size: 20px;
        right: 15px;
        top: 15px;
        color: #2630EA;
        cursor: pointer;
        display: none;
    }

    .wrapper.active:hover #cancel-btn i {
        display: block;
    }

    .wrapper #cancel-btn i:hover {
        color: #e74c3c;
    }

    .wrapper .file-name {
        position: absolute;
        bottom: 0px;
        width: 100%;
        padding-left: 1em !important;
        padding: 8px 0px;
        font-size: 18px;
        color: #fff;
        display: none;
        background: linear-gradient(135deg, #3a8ffe 0%, #2630EA 100%);
    }

    .wrapper.active:hover .file-name {
        display: block;
    }

    .container-upload #custom-btn,
    #browseFile {
        margin-top: 10px;
        display: block;
        width: 100%;
        height: 50px;
        border: none;
        outline: none;
        border-radius: 25px;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        background: linear-gradient(135deg, #3a8ffe 0%, #2630EA 100%);
    }


    .my-hide {
        display: none;
    }

    .my-show {
        display: inline;
    }
</style>
<div class="row ">
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Design Your Ad:</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="AderName">Name of Business:</label>
                        <input type="text" class="form-control" id="AderName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="from">from:</label>
                        <input type="date" class="form-control" id="from" onchange="handleChangeToDate()"
                               name="from" required>
                    </div>
                    <div class="form-group">
                        <label for="to">to:
                        </label><input type="date" class="form-control" id="to" onchange="handleChangeToDate()"
                                       name="to" required>
                    </div>
                    <div class="form-group">
                        <label for="AdHeadline">Headline:</label>
                        <input type="text" class="form-control" id="AdHeadline" name="headline">
                    </div>
                    <div class="form-group">
                        <label for="URL">URL:
                        </label>

                        <input type="text" class="form-control" id="URL" name="url">
                    </div>
                    <div class="form-group">
                        <label>Screen Orientation*</label>
                        <div class="form-check">
                            <input class="" type="radio" name="orientation" id="orientation"
                                   value="horizontal" checked>
                            <label class="" for="orientation">Horizontal Screens</label>
                        </div>
                        <div class="form-check">
                            <input class="" type="radio" name="orientation" id="orientation"
                                   value="vertical">
                            <label class="" for="orientation">Vertical Screens</label>
                        </div>
                    </div>

                    <small id="emailHelp" class="form-text text-muted">if you want to keep your ad as it is, leave
                        the fields empty</small>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Preview:</h3>
            </div>
                <div class="card-body">
                    <div class="container-upload">
                        <div class="card-footer p-4" style="display: none">
                            <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
                        </div>
                        <div class="wrapper">
                            <div class="image">
                                <img id="img-upload" alt="">
                            </div>
                            <div class="content">
                                <div class="icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="text">
                                    No file chosen, yet!
                                </div>
                            </div>
                            <div id="cancel-btn">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="file-name">
                                File name here
                            </div>
                        </div>

                        <button class="btn btn-primary" id="browseFile" type="button">Choose your file</button>

                        <div style="display: none" class="progress mt-3" style="height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 75%; height: 100%">75%
                            </div>
                        </div>

                        <input type="hidden" name="ad_file" id="ad_file">
                        <input type="hidden" name="ad_type" id="ad_type">
                        <input type="hidden" name="totalPrice" id="totalPrice">
                        <div class="alert alert-danger" role="alert" style="display: none" id="alert-danger">
                            alert: this format is not accepted, please use PNG, JPG or MP4
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
                    <script>

                        initDateInterval();
                        const fileName = document.querySelector(".file-name");
                        const customBtn = document.querySelector("#custom-btn");
                        const cancelBtn = document.querySelector("#cancel-btn i");
                        const videoSource = document.querySelector("#video-source");
                        const videoUpload = document.querySelector("#video-upload");
                        const alert = document.querySelector("#alert-danger");
                        const video = document.querySelector(".video");
                        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;


                        function initDateInterval() {
                            const today = new Date().toISOString().split('T')[0];
                            document.getElementsByName("from")[0].setAttribute('min', today);
                            const todayParts = today.split("-");
                            let tomorrow = todayParts[0] + "-" + todayParts[1] + "-" + (parseInt(todayParts[2]) + 1)
                            document.getElementsByName("to")[0].setAttribute('min', tomorrow);
                        }

                        let fromDate1, toDate1, diffDays1;
                        document.getElementById("from").addEventListener("change", function () {
                            fromDate1 = this.value;
                            console.log(fromDate1)
                            console.log(toDate1)
                            diffDays1 = getDaysDifference(fromDate1, toDate1)
                            console.log(diffDays1)
                        });

                        document.getElementById("to").addEventListener("change", function () {
                            toDate1 = this.value;
                            console.log(fromDate1)
                            console.log(toDate1)
                            diffDays1 = getDaysDifference(fromDate1, toDate1)
                            console.log(diffDays1)
                        });

                        const getDaysDifference = (date1, date2) => {
                            const from = new Date(date1);
                            const to = new Date(date2);
                            const diffTime = Math.abs(from - to);
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            return diffDays
                        }

                        function handleChangeToDate() {
                            isValidEndDate()
                            const fromDate = document.getElementById("from").value;
                            const fromDateParts = fromDate.split("-")
                            let toDate = fromDateParts[0] + "-" + fromDateParts[1] + "-" + (parseInt(fromDateParts[2]) + 1)
                            document.getElementsByName("to")[0].setAttribute('min', toDate)
                        }

                        function isValidEndDate() {
                            let fromDate = document.getElementById("from").value;
                            let toDate = document.getElementById("to").value;
                            if (Date.parse(toDate) <= Date.parse(fromDate)) {
                                console.log(`error: from date can't be greater than the to date`)
                            }
                        }
                    </script>

