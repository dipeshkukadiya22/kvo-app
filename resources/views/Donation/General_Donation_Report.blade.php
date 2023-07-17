@extends('layouts.app')

@section('title', 'All Members')

@section('pagecss')

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/node-waves/node-waves.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/tagify/tagify.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    

<!-- Page CSS -->
<style>

.form-label {
    font-weight: bold;
}
.form-select-sm {
    display: block;
    width: 100%;
    padding: 0.422rem 2.45rem 0.422rem 0.875rem;
}

</style>

@endsection

@section ('content')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">
        
        
            @include('layouts.header')

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="content-header row">
                  <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                      <div class="col-12">
                        <h4 class="fw-bold py-3">જનરલ ડોનેશન રિપોર્ટ</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md mb-4 mb-md-0">
                    <div class="card">
                      <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table id="DataTables_Table_0" class="datatables-basic table">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Name</th>
                                                  <th>સંસ્થા</th>
                                                  <th>સર્વ સાધારણ</th>
                                                  <th>જીવદયા</th>
                                                  <th>વૈયાવચ</th>
                                                  <th>સાધાર્મિક</th>
                                                  <th>ચાતુર્માસ</th>
                                                  <th>કાયમી તિથી</th>
                                                  <th>દેવદ્રવ્ય</th>
                                                  <th>કેશર સુખડ</th>
                                                  <th>ધુપ-દીપ</th>
                                                  <th>સ્નાત્રપૂજા</th>
                                                  <th>આંગીપૂજા</th>
                                                  <th>મોટીપૂજા</th>
                                                  <th>ધૃતની બોલી</th>
                                                  <th>અન્યખાતે</th>
                                                  <th>અન્ય વિગત</th>
                                                  <th>નાણા મળેલ</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tr>
                                            <th>1</th>
                                            <th>Dhiraj Shah</th>
                                            <th>Vijaynagar</th>
                                            <th>65000</th>
                                            <th>500000</th>
                                            <th>15000</th>
                                            <th>6500</th>
                                            <th>4556</th>
                                            <th>5645</th>
                                            <th>8976</th>
                                            <th>5677</th>
                                            <th>34545</th>
                                            <th>65654</th>
                                            <th>6787</th>
                                            <th>568778</th>
                                            <th>568788</th>
                                            <th>78678</th>
                                            <th>jivdaya</th>
                                            <th>Cash</th>
                                              <td>
                                                  <div class="d-inline-block">
                                                    <a href="javascript:;" class="btn btn-sm btn-icon item-edit" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop"><i class="text-primary ti ti-edit"></i></a>
                                                    <a href="javascript:;" id="confirm-text" class="text-danger delete-record"><i class="ti ti-trash"></i></a>
                                                  </div>
                                              </td>
                                          </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Enable backdrop (default) Offcanvas -->
                        <div class="mt-0">
                          
                          <div
                            class="offcanvas offcanvas-end"
                            tabindex="-1"
                            id="offcanvasBackdrop"
                            aria-labelledby="offcanvasBackdropLabel">
                            <div class="offcanvas-header border-bottom">
                              <h5 id="offcanvasBackdropLabel" class="offcanvas-title">New Member</h5>
                              <button
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-0 flex-grow-0">

                              <!-- Browser Default -->
                              <form class="browser-default-validation">
                                <div class="mb-3">
                                  <label class="form-label" for="basic-default-name">Name</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="basic-default-name"
                                    placeholder="John Doe"
                                    />
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="basic-default-email">Email</label>
                                  <input
                                    type="email"
                                    id="basic-default-email"
                                    class="form-control"
                                    placeholder="john.doe"
                                    />
                                </div>

                                <div class="mb-3">
                                  <label class="form-label" for="multicol-phone">Phone Number</label>
                                  <input
                                    type="number"
                                    id="multicol-phone"
                                    class="form-control phone-mask"
                                    placeholder="658 799 8941"
                                    aria-label="658 799 8941" />
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="city">City</label>
                                  <input type="text" class="form-control" id="city" placeholder="Bhuj" />
                                </div>
      
                                <div class="mb-3">
                                  <label class="form-label" for="collapsible-address">Address</label>
                                  <textarea
                                    name="collapsible-address"
                                    class="form-control"
                                    id="collapsible-address"
                                    rows="2"
                                    placeholder="1456, Mall Road"></textarea>
                                </div>
                                
                                <div class="row">
                                  <div class="col-12">
                                    <button type="button" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
                                    <button
                                      type="button"
                                      class="btn btn-label-secondary d-grid w-100"
                                      data-bs-dismiss="offcanvas">
                                      Cancel
                                    </button>
                                  </div>
                                </div>
                              </form>
                              <!-- /Browser Default -->

                              
                            </div>
                          </div>
                        </div>
                        
                    </section>
                     <!--/ Basic table -->
                  </div>
                </div>
            </div>
        </div>

@section('pagejs')


   

    <!-- Vendors JS -->
    <script src="{{ asset ('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>

    <!-- BEGIN: Page JS-->
   <script>
    
    var dt_basic_table = $('.datatables-basic');
    var dt_basic = dt_basic_table.DataTable({

      columnDefs: [
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          
        }
      ],
        
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-primary dropdown-toggle',
          text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-1" ></i>Print',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1 ,2, 3, 4, 5, 6],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function (win) {
                //customize print view for dark
                $(win.document.body)
                  .css('color', config.colors.headingColor)
                  .css('border-color', config.colors.borderColor)
                  .css('background-color', config.colors.bodyBg);
                $(win.document.body)
                  .find('table')
                  .addClass('compact')
                  .css('color', 'inherit')
                  .css('border-color', 'inherit')
                  .css('background-color', 'inherit');
              }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-1" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'excel',
              text: '<i class="ti ti-file-spreadsheet me-1"></i>Excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-description me-1"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-1" ></i>Copy',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }
            
          ]
        },
        
      ],
      
      
    });
    $('div.head-label').html('<h5 class="card-title mb-0">DataTable with Buttons</h5>');
    

    </script>


    

@endsection

@endsection


