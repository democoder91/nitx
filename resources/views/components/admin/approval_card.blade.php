<div class="modal fade" id="approval_card" tabindex="-1" aria-labelledby="approval_cardLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <img src="" alt="" id="ad_path" style="width: 100%">
                <video id="ad_path_video" src="" controls style="width: 100%; height: auto"></video>
                <div class="row">
                    <div class="col">
                        <h5>Ad Info</h5>
                        <hr/>
                        <label>Headline</label><br/>
                        <p id="ad_headline"></p>
                        <label>Url</label><br/>
                        <p id="ad_url"></p>
                        <label>Status</label><br/>
                        <p id="ad_status"></p>
                        <label>Upload date</label><br/>
                        <p id="ad_created_at"></p>
                        <label>Start date</label><br/>
                        <p id="ad_from"></p>
                        <label>End date</label><br/>
                        <p id="ad_to"></p>
                    </div>
                    <div class="col">
                        <h5>Advertiser Info</h5>
                        <hr/>
                        <label>Name</label><br/>
                        <p id="advertiser_name"></p>
                        <label>Email</label><br/>
                        <p id="advertiser_email"></p>
                    </div>
                </div>
                <br/>
                <div class="col-12">
                    <div class="row g-32">
                        <div class="col-6 .col-md-2">
                            <form action="" method="post" id="approveAdForm">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                        </div>
                        <div class="col-6 .col-md-2">
                            <button class="btn btn-danger" type="button" data-bs-toggle="collapse"
                             data-bs-target="#ader_massage" aria-expanded="false" aria-controls="ader_massage">
                                Reject
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-24 mb-12"></div> <!--Divider-->

                    <div class="collapse" id="ader_massage">
                        <div class="card card-body">
                            <form action="" id="rejectAdForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="massage">Write a message for the advertiser</label>
                                    <textarea class="form-control" id="massage" rows="3" name="reason"></textarea>
                                </div></br>
                                <button type="submit" class="btn btn-primary">Send to advertiser</button>
                            </form>
                        </div>
                    </div>

                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
