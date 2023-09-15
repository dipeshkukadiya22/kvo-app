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
                                    <form id="kvo_religious_category_donation_report" method="GET" class="browser-default-validation" action="{{route('show_community_category_donation_report')}}">
                                        <div class="row g-3">
  
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="basic-default-country">Donation Details</label>
                                                <select class="form-select" id="category" name="category" required>
                                                <option value="medical_checkup" {{ ($category == "medical_checkup") ? "selected" :""}}>શેઠશ્રી રતનશી ટોકરશી વોરા મેડિકલ ચેકઅપ સેન્ટર</option>
                                                <option value="mahajan" {{ ($category == "mahajan") ? "selected" :""}}>મહાજનનું મામેરું</option>
                                                <option value="bhojanshala" {{ ($category == "bhojanshala") ? "selected" :""}}>માતુશ્રી લાખણીબાઈ રામજી તેજશી ગાલા નવનીત ભોજનશાળા</option>
                                                <option value="shaikshanik" {{ ($category == "shaikshanik") ? "selected" :""}}>શૈક્ષણિક</option>
                                                <option value="lavajam" {{ ($category == "lavajam") ? "selected" :""}}>લવાજમ</option>
                                                <option value="oxygen" {{ ($category == "oxygen") ? "selected" :""}}>ઑક્સીજન ડોનેશન</option>
                                                <option value="ambulance" {{ ($category == "ambulance") ? "selected" :""}}>એમ્બ્યુલન્સ ડોનેશન</option>
                                                <option value="other" {{ ($category == "other") ? "selected" :""}}>ઈતર</option>
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
                                                <button type="submit" class="btn btn-block btn-primary" id="submitbtn">Submit</button>
                                               
                                            </div>
                                            <div class="col-md-3 submit-button" hidden>
                                            <input type="text" id="report_date" name="report_date" />
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
                                                    <th id="display_category" colspan="5" style="text-align:center;"></th>
                                                  </tr>
                                                    <tr>
                                                        <th style="font-size:15px"><b>Name</b></th>
                                                        <th style="font-size:15px"><b>Date</b></th>
                                                        <th style="font-size:15px"><b>Amount</b></th>
                                                        <th style="font-size:15px"><b>Payment Mode</b></th>
                                                    </tr>
                                                </thead>
                                                @foreach($donation as $row)
                                                <tr>
                                                        <td>{{$row->m_name}}</td>
                                                        <td>{{Date("d-m-Y",strtotime($row->d_date))}}</td>
                                                        <td>{{$row->amount}}</td>
                                                        <td>{{$row->payment_mode}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                      <td></td>
                                                        <td><b>Total Amount:</b></td>
                                                        <td><b>{{$total[0]->amount}}</b></td>
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
$('#daterange').change(function() {
    $('#report_date').val($(this).val());
});
 
</script>

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
                columns: [0,1 ,2, 3],
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
                columns: [0,1 ,2, 3],
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
                columns: [0,1 ,2, 3],
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
                columns: [0,1 ,2, 3],
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

    
    $('div.head-label').html('<h5 class="card-title mb-0">Community Donation Report</h5>');

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

    $(document).ready(function() {
    // let currentStep = 1;
    // var currentDateTime = new Date();

    // $('#flatpickr-datetime').flatpickr({
    //   enableTime: true,
    //   dateFormat: "d-m-Y H:i",
    //   defaultDate: currentDateTime
    // });
    <script>
      jQuery(document).ready(function($){

        $('#basic-default-dob').flatpickr({
        dateFormat: "d M, Y",
      });
      let c=document.getElementById("category").value;
        switch(c) {
            case "medical_checkup":
              $('#display_category').html("શેઠશ્રી રતનશી ટોકરશી વોરા મેડિકલ ચેકઅપ સેન્ટર");
              break;
              case "mahajan":
              $('#display_category').html("મહાજનનું મામેરું");
              break;
              case "bhojanshala":
              $('#display_category').html("માતુશ્રી લાખણીબાઈ રામજી તેજશી ગાલા નવનીત ભોજનશાળા");
              break;
              case "shaikshanik":
              $('#display_category').html("શૈક્ષણિક");
              break;
              case "lavajam":
              $('#display_category').html("લવાજમ");
              break;
              case "oxygen":
              $('#display_category').html("ઑક્સીજન ડોનેશન");
              break;
              case "ambulance":
              $('#display_category').html("એમ્બ્યુલન્સ ડોનેશન");
              break;
              case "other":
              $('#display_category').html("ઈતર");
              break;
            
            default:
              // code block
          }

});
    </script>
    <!-- BEGIN: Page JS-->
   <script>
      var category=document.getElementById("category").value;
      var daterange=document.getElementById("daterange").value;
    
      var documentTitle = 'Community Donation Report [' + category.charAt(0).toUpperCase() + category.substr(1).toLowerCase() + '] ['+daterange.split()+'] ';

      
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
              title:'document',
              exportOptions: {
                columns: [0,1 ,2, 3],
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
                columns: [0,1 ,2, 3],
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
                columns: [0,1 ,2, 3],
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
              customize: function (doc) {
                                // Here's where you can control the cell padding
                                  doc.styles.tableHeader.margin = [0, 5, 5, 5];
                                  doc.styles.tableBodyOdd.margin =
                                  doc.styles.tableBodyEven.margin = [50, 5, 12, 12];
                                  doc.pageMargins = [10, 30, 10,10];
                                  doc.defaultStyle.fontSize = 10;
                                  doc.styles.tableHeader.fontSize = 10;
                                  doc.styles.title.fontSize = 15;
                                  doc.content[1].margin = [ 25, 0, 25, 0 ] //left, top, right, bottom
                                            },
              title:documentTitle,
              exportOptions: {
                columns: [0,1 ,2, 3],
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
