<x-admin.layout>
    
<!--Transactions Table-->
<div class="col-12">
    <h2>Subscriptions 💸</h2>
    <div class="card table-responsive text-nowrap">
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
    </div>
</div>
<!--End of Transactions Table-->


<!--Plan Info mpdal-->
<div class="modal fade" id="PlanInfoModal" tabindex="-1" aria-labelledby="PlanInfoModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="xlModalLabel">Thestage TV Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">


                <div class="col-12 alert alert-primary d-flex align-items-center" role="alert">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-3">
                            <i class="iconly-Light-User text-primary" style="font-size: 5em;"></i>
                        </div>
                        <div class="col-8">
                            <h6 class="mb-0 text-black-80 hp-text-color-dark-30">User Info:</h6>
                            <h4 class="mb-4 mt-8">Thestage TV</h4>
                            <h4 class="mb-4 mt-8">eq@thestage.sa</h4>
                        </div>
                    </div>

                </div>

                <ul class="nav nav-tabs mb-12 hp-overflow-x-auto flex-nowrap" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation" style="font-size: 1.5em">
                      <button class="nav-link d-inline-block text-truncate active" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info" aria-selected="true">
                        <i class="iconly-Light-InfoSquare  text-primary"></i>
                        Plan Info</button>
                    </li>
                    <li class="nav-item" role="presentation" style="font-size: 1.5em">
                      <button class="nav-link d-inline-block text-truncate" id="settings-tab" data-bs-toggle="tab" data-bs-target="#pills-settings" type="button" role="tab" aria-controls="pills-settings" aria-selected="false">
                        <i class="iconly-Light-Setting  text-primary" ></i>
                        Plan Settings</button>
                    </li>
                    <li class="nav-item" role="presentation" style="font-size: 1.5em">
                        <button class="nav-link d-inline-block text-truncate" id="content-tab" data-bs-toggle="tab" data-bs-target="#pills-content" type="button" role="tab" aria-controls="pills-content" aria-selected="false">
                          <i class="iconly-Light-Video  text-primary" ></i>
                          Content Settings</button>
                      </li>
                  </ul>

                  <form class="mt-16 mt-sm-32 mb-8" method="post" action="">
                      @csrf
                      <div class="tab-content" id="pills-tabContent">
                          <!--Plan Info-->
                          <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                          <p class="hp-p1-body mb-0">
                                <div class="row">
                                    <div class="mb-24 col-12 col-sm-6">
                                        <label class="form-label"><strong>Plan Name:</strong></label> 
                                        <select class="form-select">
                                            <option>Demo</option>
                                            <option>Basic</option>
                                            <option>Standard</option>
                                            <option>Premium</option>
                                            <option>Enterprise</option>
                                          </select>
                                    </div>
                                    <div class="mb-24 col-12 col-sm-6">
                                        <label class="form-label"><strong>Plan Status:</strong></label> 
                                        <select class="form-select">
                                            <option>Canceled</option>
                                            <option>about to end</option>
                                            <option>Active</option>
                                          </select>
                                    </div>
            
                                    <div class="mb-24 col-12 col-sm-6">
                                        <label class="form-label"><strong>Plan Start at:</strong></label> 
                                        <input type="date" class="form-control">
                                    </div>
            
                                    <div class="mb-24 col-12 col-sm-6">
                                        <label class="form-label"><strong>Plan End at:</strong></label> 
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
    
                                <div class="mb-24 col-12 col-sm-6">
                                    <label class="form-label"><strong>Payment Status:</strong></label> 
                                    <select class="form-select">
                                        <option style="color: red;">Unpaid</option>
                                        <option>Paid</option>
                                    </select>
                                </div>
                          </p>
                        </div><!--End of Plan Info-->
                        <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">
                          <p class="hp-p1-body mb-0">
                            <div class="row">
                                <div class="mb-24 col-12 col-sm-6">
                                    <label class="form-label"><strong>Number of Screen Allowed:</strong></label> 
                                    <input class="form-control" type="number" min="1" value="1">
                                    <div class="form-check" style="margin-top: 0.5em">
                                        <input class="form-check-input" type="checkbox" value="" id="Checkscreens">
                                        <label class="form-check-label" for="Checkscreens">
                                          Allow unlimited number of screens
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-24 col-12 col-sm-6">
                                    <label class="form-label"><strong>Number of Sequences Allowed:</strong></label> 
                                    <input class="form-control" type="number" min="1" value="1">
                                    <div class="form-check" style="margin-top: 0.5em">
                                        <input class="form-check-input" type="checkbox" value="" id="Checksequences">
                                        <label class="form-check-label" for="Checksequences">
                                          Allow unlimited number of sequences
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-24 col-12 col-sm-6">
                                    <label class="form-label"><strong>Number of Groups Allowed:</strong></label> 
                                    <input class="form-control" type="number" min="1" value="1">
                                    <div class="form-check" style="margin-top: 0.5em">
                                        <input class="form-check-input" type="checkbox" value="" id="Checkgroups">
                                        <label class="form-check-label" for="Checkgroups">
                                          Allow unlimited number of groups
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-24 col-12 col-sm-6">
                                    <label class="form-label"><strong>is templates allowed?</strong></label> 
                                    <select class="form-select">
                                        <option>No</option>
                                        <option>yes</option>
                                      </select>
                                </div>
                            </div>
                        </p>
                        </div>
                        <div class="tab-pane fade" id="pills-content" role="tabpanel" aria-labelledby="pills-content-tab">
                            <p class="hp-p1-body mb-0">
                                <div class="row">
                                    <div class="mb-24 col-12 col-sm-6">
                                        <label class="form-label"><strong>Content type:</strong></label> 
                                        <select class="form-select" id="example-multiple" multiple>
                                            <option value="">Choose type</option>
                                            <option class="btn btn-primary" value="PNG" selected>PNG</option>
                                            <option value="JPG">JPG</option>
                                            <option value="GIF" selected>GIF</option>
                                            <option value="MP4">MP4</option>
                                            <option value="PDF">PDF</option>
                                        </select>
                                    </div>
                                    <div class="mb-24 col-12 col-sm-4">
                                        <label class="form-label"><strong>Storage limit:</strong></label> 
                                        <div class="input-group">
                                            <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="uint">
                                            <span class="input-group-text" id="uint">MB</span>
                                        </div>
                                    </div>
                                </div>
                            </p>
                        </div>
                      </div>
                  </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End of Plan Info mpdal-->


</x-admin.layout>