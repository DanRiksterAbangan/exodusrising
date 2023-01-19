  <div class="app-main flex-column flex-row-fluid">
      <!--begin::Content wrapper-->
      <div class="d-flex flex-column flex-column-fluid">
          <!--begin::Toolbar-->
          <div class="app-toolbar py-3 py-lg-6">
              <!--begin::Toolbar container-->
              <div class="app-container container-xxl d-flex flex-stack">
                  <!--begin::Page title-->
                  <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                      <!--begin::Title-->
                      <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                          Itemmall</h1>
                      <!--end::Title-->
                  </div>
                  <!--end::Page title-->
                  @if (auth()->check() &&
                          auth()->user()->isAdmin())
                      <!--begin::Actions-->
                      <div class="d-flex align-items-center gap-2 gap-lg-3">
                          <!--begin::Filter menu-->
                          <div class="d-flex">

                              <a href="{{ route('itemmall.additem') }}" class="btn  btn-sm btn-success ">
                                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                  <span class="svg-icon svg-icon-2">
                                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                              height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                              fill="currentColor" />
                                          <rect x="4.36396" y="11.364" width="16" height="2"
                                              rx="1" fill="currentColor" />
                                      </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                                  Add Item
                              </a>
                          </div>

                      </div>
                      <!--end::Actions-->
                  @endif
              </div>
              <!--end::Toolbar container-->
          </div>
          <!--end::Toolbar-->

          <!--begin::Content-->
          <div class="app-content flex-column-fluid">
              <!--begin::Content container-->
              <div class="app-container container-xxl">
                  <!--begin::Card-->
                  <div class="card">
                      <!--begin::Card header-->
                      <div class="card-header border-0 pt-6">
                          <!--begin::Card title-->
                          <div class="card-title">
                              <!--begin::Search-->
                              <div class="d-flex align-items-center position-relative my-1">
                                  <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                  <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                              height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                              fill="currentColor" />
                                          <path
                                              d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                              fill="currentColor" />
                                      </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                                  <input wire:model="search" type="text" wire:keydown.enter="searchData"
                                      class="form-control form-control-solid w-250px ps-14" placeholder="Search Item" />
                              </div>
                              <!--end::Search-->
                          </div>
                          <!--begin::Card title-->

                          <!--begin::Card toolbar-->
                          <div class="card-toolbar">
                              <!--begin::Toolbar-->
                              <div class="d-flex justify-content-end " style="align-items:flex-start">
                                  <!--begin::Filter-->


                                  <div style="width:200px" wire:ignore>
                                      <select class="form-select form-select-solid fw-bold"
                                          data-placeholder="Select category">
                                          <option style="color: #fff; background-color: #333; padding-top: 10px"
                                              value="all" selected>
                                              All</option>
                                          @foreach ($categories as $category)
                                              <option value="{{ strtolower($category ?? '') }}">{{ $category }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>



                              </div>
                              <!--end::Toolbar-->

                          </div>
                          <!--end::Card toolbar-->
                      </div>
                      <!--end::Card header-->
                      <!--begin::Card body-->
                      <div class="card-body py-4">
                          <!--begin::Table-->
                          <table class="table align-middle table-row-dashed fs-6 gy-5">
                              <!--begin::Table head-->
                              <thead>
                                  <!--begin::Table row-->
                                  <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                      <th>Image</th>
                                      <th class="min-w-125px">Item</th>
                                      <th class="min-w-125px">Stack</th>
                                      <th class="min-w-125px">Amount</th>
                                      <th class="min-w-125px">Actions</th>
                                  </tr>
                                  <!--end::Table row-->
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
                              <tbody class="text-gray-600 fw-semibold">
                                  <!--begin::Table row-->
                                  @forelse($items as $item)
                                      <tr>

                                          <!--begin::User=-->
                                          <td class="d-flex align-items-center">
                                              <!--begin:: Avatar -->
                                              <div class="symbol symbol-50px overflow-hidden me-3">
                                                  <a href="view.html">
                                                      <div class="symbol-label">
                                                          <img src="{{ Storage::url($item->image) }}"
                                                              alt="{{ $item->name }}" class="w-100" />
                                                      </div>
                                                  </a>
                                              </div>
                                              <!--end::Avatar-->

                                              <!--begin::User details-->
                                          </td>
                                          <!--end::User=-->
                                          <!--begin::Role=-->
                                          <td>
                                              <!--begin::User details-->
                                              <div class="d-flex flex-column">
                                                  <a href="view.html"
                                                      class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</a>
                                                  <span>{{ $item->description }}</span>
                                              </div>
                                          </td>
                                          <!--end::Role=-->
                                          <!--begin::Last login=-->
                                          <td>
                                              <div class="badge badge-light fw-bold">{{ $item->stack }}</div>
                                          </td>
                                          <!--end::Last login=-->
                                          <!--begin::Two step=-->
                                          <td>
                                              <span> {{ $item->discounted_price }}</span>
                                              @if ($item->discount > 0)
                                                  <div class="badge badge-warning fw-bold">-{{ $item->discount }}%
                                                  </div>
                                              @endif
                                          </td>
                                          <!--end::Two step=-->
                                          <td>
                                              <button class="btn btn-primary btn-sm">Buy Now</button>
                                          </td>

                                      </tr>
                                  @empty
                                      <tr>
                                          <td colspan="5" class="text-center">
                                              No records
                                          </td>
                                      </tr>
                                  @endforelse



                              </tbody>
                              <!--end::Table body-->
                          </table>
                          <!--end::Table-->
                      </div>
                      <!--end::Card body-->
                  </div>
                  <!--end::Card-->
              </div>
              <!--end::Content container-->
          </div>
          <!--end::Content-->
      </div>
      <!--end::Content wrapper-->
  </div>
  @push('scripts')
      <script>
          $(document).ready(function() {
              $('.form-select').select2();
              $('.form-select').on('change', function(e) {
                  @this.set('category', e.target.value);
              });
          });
      </script>
  @endpush
