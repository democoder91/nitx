<div class="mt-24 mb-12"></div><!--Dividers-->
<div class="container">
    <div class="py-18 px-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100 mb-32 overflow-scroll hp-scrollbar-x-hidden">
        <ul class="progresss d-flex align-items-center justify-content-between">
            <li class="d-flex align-items-center" data-step="1" id="categories-process">
                <span class="bg-primary text-white border-primary border rounded-circle me-8 hp-caption lh-normal d-flex align-items-center justify-content-center" style="min-width: 24px; height: 24px;">1</span>
                <a><span class="text-black-100 hp-text-color-dark-0 text-nowrap">Objective</span></a>
            </li>
            <div class="divider flex-grow-1 mx-16"></div><!--Dividers-->
            <li class="d-flex align-items-center" data-step="2" id="preview-process">
                <span class="bg-white hp-bg-dark-30 text-black-60 hp-text-color-dark-100 border-black-60 hp-border-color-dark-30 border rounded-circle me-8 hp-caption lh-normal d-flex align-items-center justify-content-center" style="min-width: 24px; height: 24px;">2</span>
                <a><span class="text-black-60 hp-text-color-dark-30 text-nowrap">Design</span></a>
            </li>
            <div class="divider flex-grow-1 mx-16"></div><!--Dividers-->
            <li class="d-flex align-items-center" data-step="3" id="location-process">
                <span class="bg-white hp-bg-dark-30 text-black-60 hp-text-color-dark-100 border-black-60 hp-border-color-dark-30 border rounded-circle me-8 hp-caption lh-normal d-flex align-items-center justify-content-center" style="min-width: 24px; height: 24px;">3</span>
                <a><span class="text-black-60 hp-text-color-dark-30 text-nowrap">Publish</span></a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-2" style="margin-top: 2em;">
        <button class="btn btn-outline-primary" onclick="back()">Back</button>
    </div>
    <div class="col-2" style="margin-top: 2em;">
        <button class="btn btn-primary" onclick="next()" id="next">Next</button>

        <button type="button btn-primary" class="btn btn-primary" style="display: none" data-bs-toggle="modal"
                data-bs-target="#exampleModal" id="submit" onclick="getAdSummary()">
            Submit
        </button>

    </div>
</div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Summary</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <h5>Screens</h5>
                                <h5 id='screens-summary'></h5>

                                <h5>Name of Business</h5>
                                <h5 id='name-of-business' style="display: none"></h5>
                                </br>
                                <h5>Date</h5>
                                <h5>
                                    From <span id='from-date' style="display: none"></span> To
                                    <span id='to-date' style="display: none"></span>
                                </h5>

                                <h5>Headline</h5>
                                <h5 id='headline' style="display: none"></h5>

                                <h5>Url</h5>
                                <h5 id='adURL' style="display: none"></h5>

                                <h5>Screen Orientation</h5>
                                <h5 id='screen-orientation' style="display: none"></h5>

                                <h5>Category</h5>
                                <h5 id="category" style="display: none"></h5>

                                {{-- <h5>Location</h5>
                                <p class="category"></p> --}}
                                <h5>Price</h5>
                                <h5 id="price" style="display: none"></h5>
                                <h6 class="mt-2">Note: **You will receive the payment details in your email
                                </h6>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="submit()">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


<script>
    function getAdSummary() {
        // category
        let categoriesRadioButtons = document.querySelectorAll('input[name=\'category[]\']')
        for (let i = 0; i < categoriesRadioButtons.length; i++) {
            if (categoriesRadioButtons[i].type === 'radio' && categoriesRadioButtons[i].checked === true) {
                console.log(categoriesRadioButtons[i].id)
                const label = document.querySelector(`label[for="${categoriesRadioButtons[i].id}"]`);
                const italic = label.childNodes[1]
                const h6 = italic.childNodes[1];
                const category = h6.innerHTML
                document.querySelector('#category').style.display = 'inline'
                document.querySelector('#category').classList.add('my-background')
                document.querySelector('#category').innerHTML = h6.innerHTML
            }
        }

        // name-of-business
        const aderName = document.querySelector('#AderName');
        document.querySelector('#name-of-business').style.display = 'inline'
        document.querySelector('#name-of-business').classList.add('my-background')
        document.querySelector('#name-of-business').innerHTML = aderName.value ? aderName.value :
            'Not specified'

        // from-date
        const fromDate = document.querySelector('#from');
        document.querySelector('#from-date').style.display = 'inline'
        document.querySelector('#from-date').classList.add('my-background')
        document.querySelector('#from-date').innerHTML = fromDate1 ? fromDate1 :
            'Not specified'

        // to-date
        const toDate = document.querySelector('#from');
        console.log(toDate.innerHTML)
        document.querySelector('#to-date').style.display = 'inline'
        document.querySelector('#to-date').classList.add('my-background')
        document.querySelector('#to-date').innerHTML = toDate1 ? toDate1 :
            'Not specified'

        // headline
        const headline = document.querySelector('#AdHeadline');
        document.querySelector('#headline').style.display = 'inline'
        document.querySelector('#headline').classList.add('my-background')
        document.querySelector('#headline').innerHTML = headline.value ? headline.value :
            'Not specified'

        // url
        const url = document.querySelector('#URL');
        document.querySelector('#adURL').style.display = 'inline'
        document.querySelector('#adURL').classList.add('my-background')
        document.querySelector('#adURL').innerHTML = url.value ? url.value :
            'Not specified'


        // screen-orientation
        let orientationButtons = document.querySelectorAll('input[name=\'orientation\']')
        for (let i = 0; i < orientationButtons.length; i++) {
            if (orientationButtons[i].type === 'radio' && orientationButtons[i].checked === true) {
                document.querySelector('#screen-orientation').style.display = 'inline'
                document.querySelector('#screen-orientation').classList.add('my-background')
                document.querySelector('#screen-orientation').innerHTML = orientationButtons[i].value ?
                    orientationButtons[i].value.charAt(0).toUpperCase() + orientationButtons[i].value.slice(1) :
                    'Not specified'
            }
        }

        const screenSummary = document.querySelector('#screens-summary')
        const allAvillableScreens = document.querySelectorAll("input[name='screen[]']:checked")
        if (allAvillableScreens.length > 0) {
            screenSummary.classList.add('my-list-background')
        }
        let screenCounter = allAvillableScreens.length;
        screenSummary.innerHTML = '' // for reseting the screens :)
        allAvillableScreens.forEach(screen => {
            if (allAvillableScreens.length > 2)
                screenSummary.innerHTML += document.querySelector(`td[for='${screen.id}']`).textContent + ', '
            else
                screenSummary.innerHTML += document.querySelector(`td[for='${screen.id}']`).textContent
        });

        // price
        document.querySelector('#price').style.display = 'inline'
        document.querySelector('#price').classList.add('my-background')
        document.querySelector('#price').innerHTML = screenCounter * 33 * diffDays1 + " SAR"
        $('#totalPrice').val(screenCounter * 33 * diffDays1)
        console.log($('#totalPrice'))

    }
</script>
