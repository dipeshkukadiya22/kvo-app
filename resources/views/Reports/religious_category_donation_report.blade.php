@extends('layouts.app')

@section('title', 'Religious Donation Report')

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

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    

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
.form-control[readonly] {
      background-color: #efefef;
      opacity: 1;
}

button.swal2-cancel.btn.btn-label-danger {
    display: none !important;
}


/* Increase the width of th and td elements in the DataTable */
.datatables-basic th, .datatables-basic td {
    min-width: 85px;
}

div.card-datatable [class*=col-md-] {
    padding-right: 2.1rem !important;
    padding-left: 2.1rem !important;
}
.form-control[readonly] {
      background-color: #efefef;
      opacity: 1;
  }

.btn-block {
    display: block;
    width: 100%;
}
.submit-button {
    margin-top: 2.8em;
}
</style>

@endsection


@section ('content')

<body>
    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
          <div class="layout-container">
            
            
                @include('layouts.header')
    
                <!-- Content -->
    
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="content-header row">
                      <div class="content-header-left col-md-9 col-12 mb-2">
                        {{-- <div class="row breadcrumbs-top">
                          <div class="col-12">
                            <h4 class="fw-bold py-3">View all Community Donation</h4>
                          </div>
                        </div> --}}
                      </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md mb-4 mb-md-0">
                          <div class="card">
                            
                            <!-- Browser Default -->
                            <div class="col-md mb-4 mb-md-0">
                                <div class="card">
                                <div class="card-body">
                                    <form id="kvo_religious_category_donation_report" method="GET" class="browser-default-validation" action="{{route('show_religious_category_donation_report')}}">
                                        <div class="row g-3">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="basic-default-country">સંસ્થા</label>
                                                <select class="form-select" id="basic-default-country" name="trust" required>
                                                <option value="VIJAYNAGAR" {{ ($trust == "VIJAYNAGAR") ? "selected" :""}}>વિજયનગર</option>
                                                <option value="NAVNEETNAGAR" {{ ($trust == "NAVNEETNAGAR") ? "selected" :""}}>નવનીતનગર</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="basic-default-country">Donation Details</label>
                                                <select class="form-select" id="category" name="category" required>
                                                <option value="sarv_sadharan" {{ ($category == "sarv_sadharan") ? "selected" :""}}>શ્રી સર્વ સાધારણ ખાતે</option>
                                                <option value="jiv_daya" {{ ($category == "jiv_daya") ? "selected" :""}}>શ્રી જીવદયા ખાતે</option>
                                                <option value="shadhu_shdhvi" {{ ($category == "shadhu_shdhvi") ? "selected" :""}}>શ્રી સાધુ સાધ્વી વૈયાવચ્છ ખાતે</option>
                                                <option value="sadharmik" {{ ($category == "sadharmik") ? "selected" :""}}>શ્રી સાધર્મિક ખરડા ખાતે</option>
                                                <option value="chaturmas" {{ ($category == "chaturmas") ? "selected" :""}}>શ્રી ચાતુર્માસ ખરડા ખાતે</option>
                                                <option value="kayami_tithi" {{ ($category == "kayami_tithi") ? "selected" :""}}>શ્રી કાયમી તિથી ફંડ ખાતે</option>
                                                <option value="devdravya" {{ ($category == "devdravya") ? "selected" :""}}>શ્રી દેવદ્રવ્ય ખાતે</option>
                                                <option value="kesar_sukhad" {{ ($category == "kesar_sukhad") ? "selected" :""}}>શ્રી કેસર સુખડ ખાતે</option>
                                                <option value="dhoop_deep" {{ ($category == "dhoop_deep") ? "selected" :""}}>શ્રી ધુપ-દીપ ખાતે</option>
                                                <option value="snatra_puja" {{ ($category == "snatra_puja") ? "selected" :""}}>શ્રી સ્નાત્ર પૂજા ખાતે</option>
                                                <option value="agani_pooja" {{ ($category == "agani_pooja") ? "selected" :""}}>શ્રી આંગી પૂજા ખાતે</option>
                                                <option value="moti_pooja" {{ ($category == "moti_pooja") ? "selected" :""}}>શ્રી મોટી પૂજા ખાતે</option>
                                                <option value="drut_boli" {{ ($category == "drut_boli") ? "selected" :""}}>શ્રી ધૃતની બોલી ખાતે</option>
                                                <option value="other_account_name" {{ ($category == "other_account_name") ? "selected" :""}}>શ્રી અન્ય ખાતે</option>
                                              
                                                </select>
                                            </div>
                                            
                                           <!-- Range Picker-->
                                            <div class="col-md-3 col-12 mb-4">
                                                <label for="flatpickr-range" class="form-label">Date</label>
                                                <input
                                                type="text"
                                                name="daterange"
                                                id="daterange"
                                                class="form-control"
                                                placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                                value="{{$daterange}}"
                                                 />
                                            </div>
                                            <!-- /Range Picker-->
                                            <div class="col-md-3 submit-button">
                                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Browser Default -->

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
                                            <div class="card-datatable pt-0">
                                                <table id="DataTables_Table_0" class="datatables-basic table">
                                                <thead>
                                                  <tr>
                                                    <th id="display_category" colspan="5" style="text-align:center;">{{$category}}</th>
                                                  </tr>
                                                    <tr>
                                                        <th>નામ</th>
                                                        <th>તારીખ</th>
                                                        <th>હસ્તે</th>
                                                        <th>રકમ</th>
                                                        <th>નાણા મળેલ</th>
                                                    </tr>
                                                </thead>
                                                @foreach($donation as $row)
                                                <tr>
                                                        <td>{{$row->m_name}}</td>
                                                        <td>{{Date("d-m-Y",strtotime($row->r_date))}}</td>
                                                        <td>{{$row->haste}}</td>
                                                        <td>{{$row->amount}}</td>
                                                        <td>{{$row->payment_mode}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Total Amount:</td>
                                                        <td>{{$total[0]->amount}}</td>
                                                        <td></td>
                                                </tr>
                                          
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </section>
                            <!--/ Basic table -->
                      </div>
                    </div>
                </div>
            </div>
    



<!-- BEGIN: Page JS-->
<script>
    
    var dt_basic_table = $('.datatables-basic');
    var dt_basic = dt_basic_table.DataTable({

        
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
                columns: [1 ,2, 3, 4, 5],
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
                columns: [1 ,2, 3, 4, 5],
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
                columns: [1 ,2, 3, 4, 5],
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
                columns: [1 ,2, 3, 4, 5],
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
      
     
       // Scroll options
       scrollX: true,
      
    });

    

    </script>


@section('pagejs')


    <!-- Vendors JS -->
    <script src="{{ asset ('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <script src="{{ asset ('assets/js/forms-selects.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>

    
    
   
    <!-- Page JS -->
    <script src="{{ asset ('assets/js/form-validation.js') }}"></script>

 
    <script>
      jQuery(document).ready(function($){
        $('#basic-default-dob').flatpickr({
        dateFormat: "d M, Y",
      });
      let c=document.getElementById("category").value;
        switch(c) {
            case "sarv_sadharan":
              $('#display_category').html("શ્રી સર્વ સાધારણ ખાતે");
              break;
              case "jiv_daya":
              $('#display_category').html("શ્રી જીવદયા ખાતે");
              break;
              case "shadhu_shdhvi":
              $('#display_category').html("શ્રી સાધુ સાધ્વી વૈયાવચ્છ ખાતે");
              break;
              case "sadharmik":
              $('#display_category').html("શ્રી સાધર્મિક ખરડા ખાતે");
              break;
              case "chaturmas":
              $('#display_category').html("શ્રી ચાતુર્માસ ખરડા ખાતે");
              break;
              case "kayami_tithi":
              $('#display_category').html("શ્રી કાયમી તિથી ફંડ ખાતે");
              break;
              case "devdravya":
              $('#display_category').html("શ્રી દેવદ્રવ્ય ખાતે");
              break;
              case "kesar_sukhad":
              $('#display_category').html("શ્રી કેસર સુખડ ખાતે");
              break;
              case "dhoop_deep":
              $('#display_category').html("શ્રી ધુપ-દીપ ખાતે");
              break;
              case "snatra_puja":
              $('#display_category').html("શ્રી સ્નાત્ર પૂજા ખાતે");
              break;
              case "agani_pooja":
              $('#display_category').html("શ્રી આંગી પૂજા ખાતે");
              break;
              case "moti_pooja":
              $('#display_category').html("શ્રી મોટી પૂજા ખાતે");
              break;
              case "drut_boli":
              $('#display_category').html("શ્રી ધૃતની બોલી ખાતે");
              break;
              case "other_account_name":
              $('#display_category').html("શ્રી અન્ય ખાતે");
              break;
            default:
              // code block
          }
     
/*
    <option value="dhoop_deep" {{ ($category == "dhoop_deep") ? "selected" :""}}>શ્રી ધુપ-દીપ ખાતે</option>
    <option value="snatra_puja" {{ ($category == "snatra_puja") ? "selected" :""}}>શ્રી સ્નાત્ર પૂજા ખાતે</option>
    <option value="agani_pooja" {{ ($category == "agani_pooja") ? "selected" :""}}>શ્રી આંગી પૂજા ખાતે</option>
    <option value="moti_pooja" {{ ($category == "moti_pooja") ? "selected" :""}}>શ્રી મોટી પૂજા ખાતે</option>
    <option value="drut_boli" {{ ($category == "drut_boli") ? "selected" :""}}>શ્રી ધૃતની બોલી ખાતે</option>
    <option value="other_account_name" {{ ($category == "other_account_name") ? "selected" :""}}>શ્રી અન્ય ખાતે</option>*/
});
    </script>

    <!-- BEGIN: Page JS-->
   <script>
    
    var dt_basic_table = $('.datatables-basic');
    var dt_basic = dt_basic_table.DataTable({

      
        
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
                columns: [0,1 ,2, 3, 4],
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
                columns: [0,1 ,2, 3, 4],
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
                columns: [0,1 ,2, 3, 4],
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
                columns: [0,1 ,2, 3, 4],
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
      
     
       // Scroll options
       scrollX: true,
      
    });

    
   // $('div.head-label').html('<h5 class="card-title mb-0">Religious Donation Report</h5>');

    </script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
            opens: 'left'
            }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>



@endsection


@endsection