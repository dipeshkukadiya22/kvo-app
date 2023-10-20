@extends('layouts.app')

@section('title', 'Room List')

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

<link rel="stylesheet" href="{{ ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ ('assets/vendor/libs/pickr/pickr-themes.css') }}" />


<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


    

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
.booked-date {
    display: table-caption;
}
.booked-day {
    background-color: #f8f8f8;
    border-radius: 50%;
    color: #aaa;
  }
  .eventClass a {
            background-color: #dda919 !important;
            color: #FFF !important;
        }
.box{
  margin:12px;
}
.status-0 {
        background-color:#1d3456  !important;
}
.status-not-0 {
    background-color: #ca5300 !important;
}


.inner-box{
  padding:12px;
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
                    <div class="content-header-left col-md-6 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                              <h4 class="fw-bold py-3"><span class="text-muted fw-light">Room /</span> Room List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="content-header-right d-flex justify-content-end col-md-6 col-12">
                      
                        <div class="form-group breadcrumb-right py-3 d-inline-flex">

                          <ul class="nav nav-pills mb-3 me-2" role="tablist">
                            <li class="nav-item">
                              <button
                                type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-allroom" aria-controls="navs-pills-top-allroom" aria-selected="true">
                                All Rooms <span id="allRoomsCount">0</span>
                              </button>
                            </li>
                          </ul>
                          
                        
                          <div class="mt-0">
                            <button
                              class="btn btn-primary"
                              type="button"
                              data-bs-toggle="offcanvas"
                              data-bs-target="#offcanvasBackdropAddRoom"
                              aria-controls="offcanvasBackdrop">
                              <span class="ti-xs ti ti-plus me-1"></span>Add Room
                            </button>
                            <div
                              class="offcanvas offcanvas-end"
                              tabindex="-1"
                              id="offcanvasBackdropAddRoom"
                              aria-labelledby="offcanvasBackdropLabel">
                              <div class="offcanvas-header border-bottom">
                                <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Add Room</h5>
                                <button
                                  type="button"
                                  class="btn-close text-reset"
                                  data-bs-dismiss="offcanvas"
                                  aria-label="Close"></button>
                              </div>
                              <div class="offcanvas-body mx-0 flex-grow-0">
    
                              
                                <form class="browser-default-validation" method="POST" action="{{route('RoomList')}}">
                                  @csrf
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">Room Name</label>
                                    <input type="text" class="form-control"  style="text-transform:uppercase" name="room_name" id="basic-default-name" placeholder="Deluxe"/>
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Room Type</label>
                                    <select class="form-select" name="room_type" id="exampleFormControlSelect1" aria-label="Default select example">
                                      <option value=""></option>
                                      <option value=""></option>
                                      <option value="Double Bed">Double Bed</option>
                                      <option value="3 Bed">3 Bed</option>
                                      <option value="4 Bed">4 Bed</option>
                                    </select>
                                  </div>
      
                                   <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Room Facility</label>
                                    <select class="form-select" name="room_facility" id="exampleFormControlSelect2" aria-label="Default select example">
                                      <option value="">Select Room</option>
                                      <option value="A.C. ROOM">A.C. ROOM</option>
                                      <option value="NON A.C ROOM">NON A.C ROOM</option>
                                      <option value="DOOR METRI A.C ROOM">DOOR METRI A.C ROOM</option>
                                      <option value="DOOR METRI NON A.C ROOM">DOOR METRI NON A.C ROOM</option>
                                    </select>
                                  </div>

                                   <div class="row">
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
                                      <button
                                        type="button"
                                        class="btn btn-label-secondary d-grid w-100"
                                        data-bs-dismiss="offcanvas">
                                        Cancel
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              
    
                                
                              </div>
                            </div>
                          </div>
                        
                        </div>
                    </div> -->
                </div>
                <div class="row mb-4">
                  <div class="col-md mb-4 mb-md-0">
                    <div class="card">
                      <!-- Basic table -->
                      <section id="basic-datatable">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="navs-pills-top-allroom" role="tabpanel">
                                  <div class="card-datatable table-responsive pt-0">
                                    <table id="DataTables_Table_0" class="datatables-basic table">
                                      <!-- <thead>
                                        @csrf
                                        <tr>
                                          <th></th>
                                          <th>Room No</th>
                                          <th>Room Name</th>
                                          <th>Room Type</th>
                                          <th>Room Facility</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr> -->
                                      <div class="box">
                                        <div class="row">
                                          @foreach ($list as $room)
                                          <div class="col-md-2 mt-3">
                                              <a href="#">
                                                  <div class="card inner-box text-white  {{$room->status == 0 ? 'status-0' : 'status-not-0' }}">
                                                      <div class="card-header text-center">{{$room->room_no}}&nbsp;{{ $room->room_name }}</div>
                                                  </div>
                                              </a>
                                          </div>

                                          @endforeach
                                        </div>
                                      </div>
                                      </thead>
                                    </table>
                                  </div>
                                </div>
                                  
                                
                        

                                
                                
                              
                              </div>
                            </div>
                          </div>
                        </div>


                          <!-- Enable backdrop (default) Offcanvas -->
                          <div class="mt-0">
                            
                            <div
                              class="offcanvas offcanvas-end"
                              tabindex="-1"
                              id="offcanvasBackdropEditRoom"
                              aria-labelledby="offcanvasBackdropLabel">
                              <div class="offcanvas-header border-bottom">
                                <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Edit Room</h5>
                                <button
                                  type="button"
                                  class="btn-close text-reset"
                                  data-bs-dismiss="offcanvas"
                                  aria-label="Close"></button>
                              </div>
                              <div class="offcanvas-body mx-0 flex-grow-0">

                                <!-- Browser Default -->
                                <form id="kvo_edit_roomdata" method="POST" action="{{route('update_roomdata')}}">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">Room No</label>
                                    @csrf
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="room_no"
                                      name="room_no"
                                      readonly
                                      />
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">Room Name</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="room_name"
                                      name="room_name"
                                      />
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">Room Type</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="room_type"
                                      name="room_type"
                                      />
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-email">Room Facility</label>
                                    <input
                                      type="text"
                                      id="room_facility"
                                      name="room_facility"
                                      class="form-control"
                                
                                      />
                                  </div>
                                

                                  <div class="row">
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
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
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>

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
    $('div.head-label').html('<h5 class="card-title mb-0">Details for all Rooms</h5> ');

    </script>


    <script>
    // Function to update room counters
    function updateRoomCounters() {
      const allRoomsCount = document.getElementById('DataTables_Table_0').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
      const availableRoomsCount = document.getElementById('DataTables_Table_1').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
      const bookedRoomsCount = document.getElementById('DataTables_Table_2').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
      const canceledRoomsCount = document.getElementById('DataTables_Table_3').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;

      document.getElementById('allRoomsCount').textContent = allRoomsCount;
      document.getElementById('availableRoomsCount').textContent = availableRoomsCount;
      document.getElementById('bookedRoomsCount').textContent = bookedRoomsCount;
      document.getElementById('canceledRoomsCount').textContent = canceledRoomsCount;
    }

    // Call the updateRoomCounters function on page load
    window.addEventListener('load', updateRoomCounters);
   </script>


<!-- <script>
 $(document).ready(function() {
  let currentStep = 1;

  // Retrieve booked dates from the input field and format them as an array of Date objects
  const bookedDates = $('#flatpickr-datetime-booked').val().split(',').map(dateStr => new Date(dateStr.trim()));

  // Initialize the flatpickr instance
  const flatpickrInstance = flatpickr("#flatpickr-datetime", {
    enableTime: true,
    dateFormat: "d-m-Y",
    onDayCreate: function(dObj, dStr, fp, dayElem) {
      // Check if the current day is booked and apply a custom class
      if (bookedDates.some(bookedDate => isSameDay(dObj, bookedDate))) {
        dayElem.classList.add('booked-day');
      }
    }
  });

  // Function to check if two dates are the same day
  function isSameDay(date1, date2) {
    return date1.getDate() === date2.getDate() &&
           date1.getMonth() === date2.getMonth() &&
           date1.getFullYear() === date2.getFullYear();
  }
});
</script> -->
<script>
 /*  jQuery(document).ready(function($){
    var date1 = new Date('08/09/2023'); 

    var date2 = new Date('08/12/2023');


eventDates[date1] = date1;
eventDates[date2] = date2;
      $('#cal').datepicker({
         beforeShowDay: function(date) {
            var highlight = eventDates[date];
            if (highlight) {
               return [true, "event", 'Tooltip text'];
            } else {
               return [true, '', ''];
            }
         }
      });
   });*/
   

  jQuery(document).ready(function($){

    const flatpickrInstance = flatpickr("#cal", {
    enableTime: true,
    dateFormat: "d-m-Y",
    onDayCreate: function(dObj, dStr, fp, dayElem) {
      // Check if the current day is booked and apply a custom class
      if (bookedDates.some(bookedDate => isSameDay(dObj, bookedDate))) {
        dayElem.classList.add('booked-day');
      }
    }
  });

  var eventDates = {};
  eventDates[ new Date( '08/09/2023' )] = new Date( '08/09/2023' );
  eventDates[ new Date( '08/12/2023' )] = new Date( '08/12/2023' );

  $('#cal').datepicker({
        beforeShowDay: function( date ) {
            var highlight = eventDates[date];
            if( highlight ) {
                 return [true, "event", 'Tooltip text'];
            } else {
                 return [true, '', ''];
            }
        }
    });
  });
</script>
 <script>
  function edit(id)
  {
    const myOffcanvas = document.getElementById('offcanvasBackdropEditRoom');
          let a=new bootstrap.Offcanvas(myOffcanvas);
          a.show();
          $("#room_name").val("61234");
          $.ajax({
              url:"{{url('get_roomdata')}}" +"/"+ id,
              type:'GET',
                success:function(response){
                  $("#room_name").val(response[0]['room_name']);
                  $("#room_facility").val(response[0]['room_facility']);
                  $("#room_no").val(response[0]['room_no']);
                  $("#room_type").val(response[0]['room_type']);
                }
              });
  }
  </script>






@endsection

@endsection


