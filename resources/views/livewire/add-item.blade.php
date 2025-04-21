 <div class="card mb-5 mb-xl-10">
     <!--begin::Card header-->
     <!--begin::Card title-->
     @if (session()->has('message'))
         <div class="alert alert-success row">
             {{ session('message') }}
         </div>
     @endif

     <!--end::Card title-->
     <!--begin::Card header-->
     <!--begin::Content-->
     <div id="kt_account_settings_profile_details" class="collapse show">
         <!--begin::Form-->
         <form wire:submit="addItem">
             <!--begin::Card body-->
             <div class="card-body border-top p-9">
                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-semibold fs-6">Item Image</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                         <!--begin::Image input-->
                         <div class="image-input image-input-outline" data-kt-image-input="true">
                             <!--begin::Preview existing avatar-->
                             <div class="image-input-wrapper w-125px h-125px">
                                 @if ($image)
                                     <img src="{{ $image->temporaryUrl() }}" width="100%">
                                 @endif
                             </div>

                             <!--end::Preview existing avatar-->
                             <!--begin::Label-->
                             <label
                                 class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                 data-kt-image-input-action="change" title="Change item image">
                                 <i class="bi bi-pencil-fill fs-7"></i>
                                 <!--begin::Inputs-->
                                 <input wire:model.live="image" type="file" name="avatar"
                                     accept=".png, .jpg, .jpeg .gif" />
                                 <input type="hidden" name="avatar_remove" />
                                 <!--end::Inputs-->
                             </label>
                             <!--end::Label-->


                         </div>
                         <!--end::Image input-->



                         <!--begin::Hint-->
                         <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                         @error('image')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                         <!--end::Hint-->
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->

                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-semibold fs-6">Item Type</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                         <!--begin::Row-->
                         <div class="row">
                             <!--begin::Col-->
                             <div class="col-lg-12 fv-row">
                                 <input type="text" wire:model.live="type"
                                     class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                     placeholder="Item Type" value="" />
                                 @error('type')
                                     <span class="text-danger">{{ $message }}</span>
                                 @enderror
                             </div>
                             <!--end::Col-->

                         </div>
                         <!--end::Row-->
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->
                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-semibold fs-6">Item Name</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                         <!--begin::Row-->
                         <div class="row">
                             <!--begin::Col-->
                             <div class="col-lg-12 fv-row">
                                 <input type="text" wire:model.live="name"
                                     class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                     placeholder="Item Name" value="" />
                                 @error('name')
                                     <span class="text-danger">{{ $message }}</span>
                                 @enderror
                             </div>
                             <!--end::Col-->

                         </div>
                         <!--end::Row-->
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->
                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-semibold fs-6">Item Description</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                         <textarea type="text" wire:model.live="description" class="form-control form-control-lg form-control-solid"
                             placeholder="Item Description" value=""></textarea>
                         @error('description')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->

                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-semibold fs-6">
                         <span class="required">Category</span>
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                         <select wire:model.live="category" aria-label="Select a Country" data-control="select2"
                             data-placeholder="Select a category..."
                             class="form-select form-select-solid form-select-lg fw-semibold">
                             <option value="">Select a Category...</option>
                             @foreach ($categories as $category)
                                 <option value="{{ strtolower($category) }}">{{ $category }}</option>
                             @endforeach

                         </select>

                         @error('category')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->


                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-semibold fs-6">
                         <span class="required">Stacks</span>
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                         <input type="number" wire:model.live="stack"
                             class="form-control form-control-lg form-control-solid" placeholder="Stacks"
                             value="1" />
                         @error('number')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->

                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-semibold fs-6">
                         <span class="required">Price</span>
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                         <input type="number" wire:model.live="amount"
                             class="form-control form-control-lg form-control-solid" placeholder="Price"
                             value="" />
                         @error('price')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->

                 <!--begin::Input group-->
                 <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-semibold fs-6">
                         <span class="required">Discount</span>
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                         <input type="number" wire:model.live="discount"
                             class="form-control form-control-lg form-control-solid" placeholder="Discount"
                             value="" />
                         @error('discount')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <!--end::Col-->
                 </div>
                 <!--end::Input group-->





                 <!--begin::Input group-->
                 <div class="row mb-0">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-semibold fs-6">Show Item</label>
                     <!--begin::Label-->
                     <!--begin::Label-->
                     <div class="col-lg-8 d-flex align-items-center">
                         <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                             <input wire:model.live="show" class="form-check-input w-45px h-30px" type="checkbox"
                                 id="allowmarketing" checked="checked" />
                             <label class="form-check-label" for="allowmarketing"></label>
                         </div>
                     </div>
                     <!--begin::Label-->
                 </div>
                 <!--end::Input group-->
             </div>
             <!--end::Card body-->
             <!--begin::Actions-->
             <div class="card-footer d-flex justify-content-end py-6 px-9">
                 <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Add
                     Item</button>
             </div>
             <!--end::Actions-->
         </form>
         <!--end::Form-->
     </div>
     <!--end::Content-->
 </div>
