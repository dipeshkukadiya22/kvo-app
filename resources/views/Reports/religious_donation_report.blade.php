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
                            <h4 class="fw-bold py-3">Religious Donation Report</h4>
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
                                    <form id="kvo_religious_donation_trport" method="GET" class="browser-default-validation" action="{{route('show_religious_donation_report')}}">
                                        <div class="row g-3">
                                            @csvf
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="basic-default-country">સંસ્થા</label>
                                                <select class="form-select" id="basic-default-country" name="trust" required>
                                                <option value="VIJAYNAGAR">વિજયનગર</option>
                                                <option value="NAVNEETNAGAR">નવનીતનગર</option>
                                                </select>
                                            </div>
                                            
                                           
                                            
                                           <!-- Range Picker-->
                                            <div class="col-md-3 col-12 mb-4">
                                                <label for="flatpickr-range" class="form-label">Date</label>
                                                <input
                                                type="text"
                                                name="daterange"
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
                                                        <th>નામ</th>
                                                        <th>તારીખ</th>
                                                        <th>હસ્તે</th>
                                                        <th>શ્રી સર્વ સાધારણ ખાતે</th>
                                                        <th>શ્રી જીવદયા ખાતે</th>
                                                        <th>શ્રી સાધુ સાધ્વી વૈયાવચ્છ ખાતે</th>
                                                        <th>શ્રી સાધર્મિક ખરડા ખાતે</th>
                                                        <th>શ્રી ચાતુર્માસ ખરડા ખાતે</th>
                                                        <th>શ્રી કાયમી તિથી ફંડ ખાતે</th>
                                                        <th>શ્રી દેવદ્રવ્ય ખાતે</th>
                                                        <th>શ્રી કેસર સુખડ ખાતે</th>
                                                        <th>શ્રી ધુપ-દીપ ખાતે</th>
                                                        <th>શ્રી સ્નાત્ર પૂજા ખાતે</th>
                                                        <th>શ્રી આંગી પૂજા ખાતે</th>
                                                        <th>શ્રી મોટી પૂજા ખાતે</th>
                                                        <th>શ્રી ધૃતની બોલી ખાતે</th>
                                                        <th>શ્રી અન્ય ખાતે</th>
                                                        <th>ટોટલ</th>
                                                    </tr>
                                                </thead>
                                                @foreach($donation as $row)
                                                    <tr>
                                                        <td>{{$row->m_name}}</td>
                                                        <td>{{Date("d-m-Y",strtotime($row->r_date))}}</td>
                                                        <td>{{$row->haste}}</td>
                                                        <td>{{$row->sarv_sadharan}}</td>
                                                        <td>{{$row->jiv_daya}}</td>
                                                        <td>{{$row->shadhu_shdhvi}}</td>
                                                        <td>{{$row->sadharmik}}</td>
                                                        <td>{{$row->chaturmas}}</td>
                                                        <td>{{$row->kayami_tithi}}</td>
                                                        <td>{{$row->devdravya}}</td>
                                                        <td>{{$row->kesar_sukhad}}</td>
                                                        <td>{{$row->dhoop_deep}}</td>
                                                        <td>{{$row->snatra_puja}}</td>
                                                        <td>{{$row->agani_pooja}}</td>
                                                        <td>{{$row->moti_pooja}}</td>
                                                        <td>{{$row->drut_boli}}</td>
                                                        <td>{{$row->other_account_amount}}</td>
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
<script>

	// Class definition
	var KTDatatablesExample = function () {
		// Shared variables
		var table = '#DataTables_Table_0';
		var datatable;
		
    // Private functions
    var initDatatable = function () {
       

	   // Init datatable --- more info on datatables: https://datatables.net/manual/
	   datatable = $('#ticket_data').DataTable({
		   "info": true,
		   'pageLength': 10,
		   "ordering": false
	   });
	   //console.log(datatable);
   }

		// Hook export buttons
		var exportButtons = () => {
			
			const documentTitle = 'Weighment Report';
			var buttons = new $.fn.dataTable.Buttons(table, {
				buttons: [
					{
						extend: 'copyHtml5',
						title: documentTitle
					},
					{
						extend: 'excelHtml5',
						title: documentTitle
					},
					{
						extend: 'csvHtml5',
						title: documentTitle
					},
					{
						extend: 'pdf',
                    	title: documentTitle,
						customize: function (doc) {
                                // Here's where you can control the cell padding
                                doc.styles.tableHeader.margin =
                                  doc.styles.tableBodyOdd.margin =
                                  doc.styles.tableBodyEven.margin = [3, 3, 3, 3];
								  doc.pageMargins = [10, 10, 10,10];
								  doc.defaultStyle.fontSize = 8;
								  doc.styles.tableHeader.fontSize = 9;
								  doc.styles.title.fontSize = 20;
								  doc.content[1].margin = [ 25, 0, 25, 0 ] //left, top, right, bottom
                            },

						
						orientation: 'landscape',
						pageSize: 'a4',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7,8,9,10,11],
						}
					}
				]
			}).container().appendTo($('#ticket_data_buttons'));
	
			// Hook dropdown menu click event to datatable export buttons
			const exportButtons = document.querySelectorAll('#ticket_data_export_menu [data-kt-export]');
			exportButtons.forEach(exportButton => {
				exportButton.addEventListener('click', e => {
					e.preventDefault();
	
					// Get clicked export value
					const exportValue = e.target.getAttribute('data-kt-export');
					const target = document.querySelector('.dt-buttons .buttons-' + exportValue);
	
					// Trigger click event on hidden datatable export buttons
					target.click();
				});
			});
		}
	
		// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
		var handleSearchDatatable = () => {
			const filterSearch = document.querySelector('[data-kt-customer-table-filter]');
			filterSearch.addEventListener('keyup', function (e) {
				datatable.search(e.target.value).draw();
			});
		}
		
		// Public methods
		return {
			init: function () {
				table = document.querySelector('#DataTables_Table_0');
	
				if ( !table ) {
					return;
				}
	
			initDatatable();
            exportButtons();
            handleSearchDatatable();
			}
		};
	}();
	
	// On document ready
	KTUtil.onDOMContentLoaded(function () {
		KTDatatablesExample.init();
	});
	
</script>    
    $('div.head-label').html('<h5 class="card-title mb-0">Checkout</h5>');

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
    })
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
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,15,16,17],
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
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,15,16,17],
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
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,15,16,17],
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
                columns: [1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
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

    
    $('div.head-label').html('<h5 class="card-title mb-0">Religious Donation Report</h5>');

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
