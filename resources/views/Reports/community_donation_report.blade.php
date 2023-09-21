@extends('layouts.app')

@section('title', 'Community Donation Report')

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
                            <h4 class="fw-bold py-3">Community Donation Report</h4>
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
                                    <form id="kvo_community_donation_trport" method="GET" class="browser-default-validation" action="{{route('show_community_donation_report')}}">
                                        <div class="row g-3">
                                            @csrf
                    
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
                                                        <th style="font-size:15px"><b>Name</b></th>
                                                        <th style="font-size:15px"><b>Date</b></th>
                                                        <th style="font-size:15px"><b> Medical Checkup center</b></th>
                                                        <th style="font-size:15px"><b>Mahajan Mameru</b></th>
                                                        <th style="font-size:15px"><b>Navnit Bhojanshala</b></th>
                                                        <th style="font-size:15px"><b>Educational</b></th>
                                                        <th style="font-size:15px"><b>Lavajam</b></th>
                                                        <th style="font-size:15px"><b>Oxygen Donation</b></th>
                                                        <th style="font-size:15px"><b>Ambulance Donation</b></th>
                                                        <th style="font-size:15px"><b>Other</b></th>
                                                        <th style="font-size:15px"><b>Total</b></th>
                                                    </tr>
                                                </thead>
                                                  <tr>
                                                    <td></td>  <td></td>  <td></td>  <td></td>  <td></td>  <td></td>  <td></td>  <td></td>  <td></td>
                                                      <td><b>Total Amount</b></td>
                                                      <td><b>{{$total[0]->amount}}</b></td>
                                                    </tr>
                                                @foreach($donation as $row)
                                                    <tr>
                                                        <td>{{$row->m_name}}</td>
                                                        <td>{{Date("d-m-Y",strtotime($row->d_date))}}</td>
                                                        <td>{{$row->medical_checkup}}</td>
                                                        <td>{{$row->mahajan}}</td>
                                                        <td>{{$row->bhojanshala}}</td>
                                                        <td>{{$row->shaikshanik}}</td>
                                                        <td>{{$row->lavajam}}</td>
                                                        <td>{{$row->oxygen}}</td>
                                                        <td>{{$row->ambulance}}</td>
                                                        <td>{{$row->other}}</td>
                                                        <td>{{$row->total}}</td>
                                                    </tr>
                                                @endforeach
                                                   
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
    })
    });
    </script>

    <!-- BEGIN: Page JS-->
   <script>
      var daterange=document.getElementById("daterange").value;
      var documentTitle = 'Community Donation Report ['+ daterange.split() + ']';
     
    
    var dt_basic_table = $('.datatables-basic');
    var dt_basic = dt_basic_table.DataTable({

      
        
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      order : [0,'desc'],
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
              title:documentTitle,
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
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
              title:documentTitle,
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9,10],
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
              title:documentTitle,
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9,10],
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
              orientation: 'landscape',
              text: '<i class="ti ti-file-description me-1"></i>Pdf',
              className: 'dropdown-item',
              title:documentTitle,
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9,10],
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

    
    $('div.head-label').html('<h5 class="card-title mb-0">સામજિક દાન રિપોર્ટ</h5>');

    </script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
            opens: 'left'
            }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script> -->
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'DD-MM-YYYY'
                }
                
            }, function(start, end, label) {
                $('input[name="daterange"]').val(start.format("DD-MM-YYYY"));
            });
        });
    </script>




@endsection


@endsection
