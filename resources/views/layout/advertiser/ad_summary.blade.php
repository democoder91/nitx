


<body>
    <section class="accordion-section clearfix mt-3 slice slice-lg  bg-section-secondary"
        aria-label="Question Accordions">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-8">
                    <a class="navbar-brand" href="/">
                        <img alt="nitx logo" src="../../../img/brand/logo_color.svg" style="height: 60px;">
                    </a>
                </div>
            </div>
            <h2>Ad Summary</h2>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse"
                                data-parent="#accordion" href="#collapse0" aria-expanded="true"
                                aria-controls="collapse0">
                                Ad Screens
                            </a>
                        </h3>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                        <div class="panel-body px-3 mb-4">
                            {{-- needs to be bassed from the backend --}}
                            @foreach ($screens as $screen)
                                <ul>
                                    <li>$screen->name</li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse"
                                data-parent="#accordion" href="#collapse0" aria-expanded="true"
                                aria-controls="collapse0">
                                Ad categorie
                            </a>
                        </h3>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                        <div class="panel-body px-3 mb-4">
                            {{-- needs to be bassed from the backend --}}
                            @foreach ($categories as $categorie)
                                <ul>
                                    <li>$categorie->category</li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse"
                                data-parent="#accordion" href="#collapse1" aria-expanded="true"
                                aria-controls="collapse1">
                                Ad Preview
                            </a>
                        </h3>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                        <x-advertiser.ad_preview />
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse"
                                data-parent="#accordion" href="#collapse2" aria-expanded="true"
                                aria-controls="collapse2">
                                Ad Location
                            </a>
                        </h3>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <x-advertiser.ad_location />
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
                        <h3 class="panel-title">
                            <a class="collapsed" role="button" title="" data-toggle="collapse"
                                data-parent="#accordion" href="#collapse3" aria-expanded="true"
                                aria-controls="collapse3">
                                Payment
                            </a>
                        </h3>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body px-3 mb-4">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi obcaecati accusamus
                                nam aliquid vero eos! Autem amet nesciunt iusto architecto sit nisi, voluptate quas, ad
                                incidunt, saepe in iure. Quidem autem iste recusandae explicabo reprehenderit incidunt
                                ut? Iste, optio quos odit, est consequuntur assumenda nihil, labore expedita omnis
                                veniam amet placeat aspernatur nulla doloremque quidem! Provident veniam qui error ad
                                in! Provident, labore. Nesciunt saepe corporis iure necessitatibus voluptatem molestias
                                doloremque aut nihil, praesentium odio. Minus ea obcaecati magnam temporibus enim
                                excepturi maxime impedit dolorum illum placeat quam corporis odit quod alias tempore id
                                doloribus voluptatum quidem, tenetur ipsam rem?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="submit">Publish</button>
    </section>


</body>
