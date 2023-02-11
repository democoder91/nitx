<x-media_owner.layout :name="$name">
    @section('components.media_owner.sidebar')
        @section('active7', __('btn btn-primary-4'))    @section('components.media_owner.sidebar')
            @section('active7', __('btn btn-primary-4'))
            @section('active-txt-7', __('hp-text-color-primary-1'))
        @endsection



            <div class="card pb-0 pb-sm-64">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row align-items-center justify-content-between">
                                <div class="col flex-grow-1">
                                    <h1 class="mb-8">Template</h1>
                                </div>
                                <div class="col hp-flex-none w-auto">
                                    <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#newTemplateModal">
                                        <i class="iconly-Light-Plus" style="margin-right: 0.5em; font-size:1em"></i>
                                        Create New Template
                                    </a>
                                </div>
                            </div>
                            <div class="mt-24 mb-12"></div><!--Dividers-->
                    </div>
                </div>
            </div>
        </div>





<!--New Template Modal-->
<div class="modal fade" id="newTemplateModal" tabindex="-1" aria-labelledby="newTemplateModalLabel" aria-hidden="true">
   <div class="modal-dialog  modal-lg modal-dialog-centered ">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="newTemplateModalLabel">Templates</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">

               <div class="row g-16">
                   <div class="col-6 hp-flex-none w-auto">
                       <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                           <i class="iconly-Bold-PaperPlus text-primary hp-text-color-dark-primary-2"
                              style="font-size: 24px;"></i>
                       </div>
                   </div>
                   <div class="col">
                       <h3 class="mb-4 mt-8">Choose your template</h3>
                       <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">you can change it later</p>
                   </div>
               </div>

               <div class="mt-24 mb-12"></div><!--Dividers-->


               <div class="modal-footer">
                   <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Create</button>
               </div>
           </div>
       </div>
   </div>
</div><!--End of New Template Modal-->


</x-media_owner.layout>
