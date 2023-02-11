<x-admin.layout>
<!--Inbox -->
<div class="col-12">
    <div class="card pb-0 pb-sm-64">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-sm-6 flex-grow-1">
                            <h1 class="mb-8">Inbox 📥</h1>
                        </div>
                        <div class="col-12 col-sm-6 hp-flex-none w-auto">
                            <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#NewMessageModal">
                                <i class="iconly-Light-Plus" style="margin-right: 0.5em; font-size:1em"></i>
                                Create New Message
                            </a>
                        </div>
                    </div>
                    <div class="mt-24 mb-12"></div><!--Dividers-->
                    <!--Inbox Tab Menu-->
                    <ul class="nav nav-pills mb-12 hp-overflow-x-auto flex-nowrap" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <h5 class="nav-link d-inline-block text-truncate active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            All <span class="badge text-dark hp-bg-danger-3 hp-bg-dark-danger border-danger ms-8"><strong>300</strong></span></h5> 
                        </li>
                        <li class="nav-item" role="presentation">
                            <h5 class="nav-link d-inline-block text-truncate" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Ticket<span class="badge text-dark hp-bg-danger-3 hp-bg-dark-danger border-danger ms-8"><strong>3</strong></span></h5> 
                          </li>
                        <li class="nav-item" role="presentation">
                          <h5 class="nav-link d-inline-block text-truncate" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Inquiry <span class="badge text-dark hp-bg-danger-3 hp-bg-dark-danger border-danger ms-8"><strong>3</strong></span></h5> 
                        </li>
                        <li class="nav-item" role="presentation">
                            <h5 class="nav-link d-inline-block text-truncate" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Withdraw Request<span class="badge text-dark hp-bg-danger-3 hp-bg-dark-danger border-danger ms-8"><strong>3</strong></span></h5> 
                          </li>
                        <li class="nav-item" role="presentation">
                          <h5 class="nav-link d-inline-block text-truncate" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Ads Report <span class="badge text-dark hp-bg-danger-3 hp-bg-dark-danger border-danger ms-8"><strong>3</strong></span></h5> 
                        </li>
                    </ul><!--End of Inbox Tab Menu-->
                    <div class="divider"></div><!--Dividers-->
                    <!--Inbox Tab-->
                    <div class="tab-content hp-overflow-x-auto flex-nowrap" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                          <p class="hp-p1-body mb-0">
                            <table class="table table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Plan Name</th>
                                        <th scope="col">Screen</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit plan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><h5>Thestage TV</h5></th>
                                        <td><h5>Standard Plan</h5></td>
                                        <td><h5>12 / Screens</h5></td>
                                        <td>
                                            <span class="badge bg-danger-4 hp-bg-dark-danger text-dark border-danger" hidden>Canceled</span>
                                            <span class="badge bg-warning-4 hp-bg-dark-warning text-dark border-warning" hidden>about to end</span>
                                            <span class="badge bg-success-4 hp-bg-dark-success text-dark border-success">Active</span>
                                        </td>
                                        <td><a href="#PlanInfoModal" type="button"  data-bs-toggle="modal" data-bs-target="#PlanInfoModal"><i class="iconly-Light-Edit"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                          </p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <p class="hp-p1-body mb-0">
                            Content of Tab Pane 2
                          </p>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                          <p class="hp-p1-body mb-0">
                            Content of Tab Pane 3
                          </p>
                        </div>
                    </div><!--End of Inbox Tab-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Inbox -->



<!-- New Message mpdal-->
<div class="modal fade" id="NewMessageModal" tabindex="-1" aria-labelledby="NewMessageModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="xlModalLabel">New Message</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="mt-16 mt-sm-32 mb-8" method="post" action="">
                    @csrf
                    <div class="row">
                        <div class="mb-24 col-12 col-sm-6">
                            <label class="form-label"><strong>Send To:</strong></label> 
                            <select class="form-select" id="example-search">
                                <option value="">Choose User</option>
                                <option value="User1">User1</option>
                                <option value="User2">User2</option>
                            </select>
                        </div>

                        <div class="mb-24 col-12 col-sm-6">
                            <label class="form-label"><strong>Message Taype:</strong></label> 
                            <select class="form-select">
                                <option>Email</option>
                                <option>Message</option>
                                <option>Push Notification</option>
                            </select>
                        </div>
                        <div class="mb-24 col-12 col-sm-6">
                            <label class="form-label"><strong>Send From:</strong></label> 
                            <select class="form-select">
                                <option>Email</option>
                                <option>Message</option>
                                <option>Push Notification</option>
                            </select>
                        </div>
                        <div class="form-group">
                             <label class="form-label"><strong>Message Content:</strong></label> 
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"><i class="iconly-Light-Send"></i>Send</button>
            </div>
        </div>
    </div>
</div>
<!--End of  New Message mpdal-->

</x-admin.layout>