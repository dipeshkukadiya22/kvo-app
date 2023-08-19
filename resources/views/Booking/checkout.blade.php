@extends('layouts.app')

@section('title', 'Check-out')

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
                    {{-- <div class="row breadcrumbs-top">
                      <div class="col-12">
                        <h4 class="fw-bold py-3">View all Community Donation</h4>
                      </div>
                    </div> --}}
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md mb-4 mb-md-0">
                  <form id="kvo_add_checkout" class="browser-default-validation" method="POST" action="{{route('add_checkout')}}">
                    <div class="card">
                      <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-datatable pt-0">
                                        <table id="DataTables_Table_0" class="datatables-basic table">
                                          <thead>
                                         @csrf
                                              <tr>
                                                <th>નામ</th>
                                                <th>રૂમ નંબર </th>
                                                <th>આગમન તારીખ / સમય</th>
                                                <th>ચેક આઉટ તારીખ / સમય</th>
                                                <th>ભાડું</th>
                                                <th>રોકાણ દિવસ</th>                       
                                                <th>ડિપોઝિટ રકમ(₹) </th>
                                                <th>Action</th>
                                              </tr>
                                          </thead>
                                          @foreach($checkout as $row)
                                          <tr>
                                             <input type="hidden" class="id" value="{{$row->r_id}}">
                                              <td>{{$row->m_name}}</td>
                                              <td>{{$row->room_list}}</td>
                                              <td>{{date("d-m-Y",strtotime($row->check_in_date))}}</td>
                                              <td>{{date("d-m-Y",strtotime($row->check_in_date . '+' .$row->no_of_days . 'days'))}}</td>
                                              <td>{{$row->ac_amount + $row->non_ac_amount + $row->door_mt_amount}}</td>
                                              <td>{{$row->no_of_days}}</td>
                                              <td>{{$row->deposite_rs}}</td>
                                              <td>
                                                  <div class="d-inline-block">
                                                    <a href="{{route('pdf_CheckOut',1)}}" class="text-primary"><img src="./assets/icon/orange-eye.png" width="20px"></a>

                                                    <a href="javascript:;" class="btn btn-sm btn-icon item-edit" data-bs-toggle="modal"
                                                    data-bs-target="#exLargeModal"><img src="./assets/icon/orange-edit.png" width="20px"></a>


                                                    <a href="javascript:;" class="text-danger delete-record"><img src="./assets/icon/orange-trash.png" width="20px"></a> 
                                                    
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                          
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel4">Detail Update</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <div class="d-inline-block">
                                                    <a href="{{route('pdf_CheckOut',1)}}" class="text-primary"><img src="./assets/icon/orange-eye.png" width="20px"></a>
                    </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">Booking ID</label>
                                    <input type="text" id="bookingId" name="bookingId" class="form-control" placeholder="125" readonly/>
                                  </div>

                                  <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">રસિદ નંબર  </label>
                                    <input type="text" id="Rec_no" name="Rec_no" class="form-control" placeholder="10" value="{{$rec_no+1}}" readonly/>
                                  </div>  

                                  <div class="col mb-3">
                                    <label for="select2Basic" class="form-label">નામ</label>
                                    <select id="select2Basic" name="name" class="select2 form-select form-select-lg" data-allow-clear="false">
                                    @foreach($member as $row)
                                      <option value="{{$row->p_id}}">{{$row->m_name}}</option>
                                     
                                    @endforeach
                                      
                                    </select>
                                  </div>


                                  <div class="col mb-3">
                                    <label class="form-label" for="city">ગામ </label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="Bhuj" />
                                  </div>

                                </div>

                                <div class="row g-3">
                                  <!-- Datetime Picker-->
                                  <div class="col mb-3">
                                    <label for="flatpickr-datetime" class="form-label">આગમન તારીખ / સમય</label>
                                    <input type="date" class="form-control" name="check_in_date" id="check_in_date" placeholder="DD-MM-YYYY HH:MM" readonly/>
                                  </div>

                                  <!-- Datetime Picker-->
                                  <div class="col mb-3">
                                    <label for="flatpickr-datetime" class="form-label">ચેક આઉટ તારીખ / સમય</label>
                                    <input type="date" class="form-control" name="check_out_date" id="check_out_date" placeholder="DD-MM-YYYY HH:MM"  />
                                  </div>

  
                                  

                                </div>

                               
                                <!-- Basic Bootstrap Table -->
                                <div class="table-responsive text-nowrap">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>રૂમની વિગત</th>
                                        <th>Selected Room</th>
                                        <th>ભાડું</th>
                                        <th>એક્સટ્રા ચાર્જ</th>
                                        <th>કુલ ભાડું</th>
                                        <th>રોકાણ દિવસ</th>
                                        <th>કુલ રકમ (₹)</th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                      <tr>
                                        <input type="hidden" value="{{!empty($m_data)  ? $m_data:''}}">
                                        <td>
                                          ડિલક્સ  રૂમ 
                                        </td>
                                        <td>
                                          <input type="text" id="dlx_room" name="dlx_room" class="form-control" value=""  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dlx_room_charge" name="dlx_room_charge" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dlx_room_Excharge" name="dlx_room_Excharge" class="form-control"/>
                                        </td>
                                        <td>
                                          <input type="text" id="dlx_amount" name="dlx_amount" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dlx_no_of_days" name="dlx_no_of_days" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dlx_room_total" name="dlx_room_total" class="form-control" readonly/>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          A.C. રૂમ
                                        </td>
                                        <td>
                                          <input type="text" id="ac_room" name="ac_room" class="form-control" value=""  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="ac_room_charge" name="ac_room_charge" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="ac_room_Excharge" name="ac_room_Excharge" class="form-control"/>
                                        </td>
                                        <td>
                                          <input type="text" id="ac_amount" name="ac_amount" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="ac_no_of_days" name="ac_no_of_days" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="ac_room_total" name="ac_room_total" class="form-control" readonly/>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                           Non. A.C. રૂમ
                                        </td>
                                        <td>
                                          <input type="text" id="non_ac_room" name="non_ac_room" class="form-control" value=""  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_ac_room_charge" name="non_ac_room_charge" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_ac_room_Excharge" name="non_ac_room_Excharge" class="form-control" />
                                        </td>
                                        <td>
                                          <input type="text" id="non_ac_amount" name="non_ac_amount" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_ac_no_of_days" name="non_ac_no_of_days" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_ac_room_total" name="non_ac_room_total" class="form-control" readonly/>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          A.C. ડોરમેટરી  
                                        </td>
                                        <td>
                                          <input type="text" id="dmt_ac_room" name="dmt_ac_room" class="form-control" value=""  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dmt_ac_room_charge" name="dmt_ac_room_charge" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dmt_ac_room_Excharge" name="dmt_ac_room_Excharge" class="form-control" />
                                        </td>
                                        <td>
                                          <input type="text" id="dmt_ac_amount" name="dmt_ac_amount" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dmt_ac_no_of_days" name="dmt_ac_no_of_days" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="dmt_ac_room_total" name="dmt_ac_room_total" class="form-control" readonly/>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          Non. A.C. ડોરમેટરી  
                                        </td>
                                        <td>
                                          <input type="text" id="non_dmt_ac_room" name="non_dmt_ac_room" class="form-control" value=""  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_dmt_ac_room_charge" name="non_dmt_ac_room_charge" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_dmt_ac_room_Excharge" name="non_dmt_ac_room_Excharge" class="form-control"/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_dmt_ac_amount" name="non_dmt_ac_amount" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_dmt_ac_no_of_days" name="non_dmt_ac_no_of_days" class="form-control"  readonly/>
                                        </td>
                                        <td>
                                          <input type="text" id="non_dmt_ac_room_total" name="non_dmt_ac_room_total" class="form-control" readonly/>
                                        </td>
                                      </tr>

                                      <tr>
                                        <td rowspan="4" colspan="5">
                                          <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-name">અન્ય વિગત</label>
                                            <input
                                              type="text"
                                              class="form-control"
                                              name="remark"
                                              id="remark"
                                              {{-- placeholder="John Doe" --}}
                                              required />
                                          </div>

                                          <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-name">અંકે રૂપિયા</label>
                                            <input type="text" class="form-control" name="rs_word" id="rupees-in-words" placeholder="Rupees in words" readonly>
                                            

                                          </div>

                                          <div class="col-md-6">
                                            <label class="d-block form-label">નાણા મળેલ</label>
                                            <div class="form-check form-check-inline mb-2">
                                              <input
                                                type="radio"
                                                id="CHEQUE"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                required />
                                              <label class="form-check-label" for="basic_default_radio">ચેક</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input
                                                type="radio"
                                                id="DRAFT"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                 />
                                              <label class="form-check-label" for="basic_default_radio">ડ્રાફ્ટ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input
                                                type="radio"
                                                id="CASH"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                checked />
                                              <label class="form-check-label" for="basic_default_radio">રોકડા</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input
                                                type="radio"
                                                id="UPI"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                 />
                                              <label class="form-check-label" for="basic_default_radio">UPI</label>
                                            </div>
                                            <div class="form-check form-check-inline" hidden>
                                            <input type="text" id="payment" name="payment" class="form-control" />
                                            <label class="form-check-label" for="basic-default-radio">payment</label>
                                        </div>
                                          </div>
                                        </td>
                                        <td><strong>કુલ રકમ (₹)</strong></td>
                                        <td> <input type="number" id="total" name="total" class="form-control" readonly/></td>
                                      </tr>

                                      <tr>
                                        
                                        <td><strong>ડિપોઝિટ બાદ</strong></td>
                                        <td> <input type="text" id="deposite" name="deposite" class="form-control"  readonly/></td>
                                      </tr>

                                      <tr>
                                        
                                        <td><strong>બાકી લેવાની /<br> પરત કરવાની રકમ</strong></td>
                                        <td>
                                          <input type="text" class="form-control amount-input" name="net_amount" id="net_amount" aria-label="Amount (to the nearest dollar)"  onkeypress="return onlyNumbers(event);">
                                          

                                        </td>
                                      </tr>

                                    </tbody>
                                  </table>

                                <!--/ Basic Bootstrap Table -->
                          

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        
                        
                    </section>
                     <!--/ Basic table -->
                  </div>
                    </form>
                </div>
            </div>
        </div>

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
      var currentDate = new Date();
      $('#check_out_date').flatpickr({
      dateFormat: "d-m-Y H:i",
      enableTime: true,
      defaultDate: currentDate
      });

      $('#check_in_date').flatpickr({
      dateFormat: "Y-m-d H:i",
      });
    });

    $("#CASH").change(function(){
        document.getElementById("payment").value="CASH";
      });
      $("#CHEQUE").change(function(){
        document.getElementById("payment").value="CHEQUE";
      });
      $("#DRAFT").change(function(){
        document.getElementById("payment").value="DRAFT";
      });
      $("#UPI").change(function(){
        document.getElementById("payment").value="UPI";
      });
    </script>

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
            },
            {
              extend: 'excel',
              text: '<i class="ti ti-file-spreadsheet me-1"></i>Excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
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

    
    $('div.head-label').html('<h5 class="card-title mb-0">Checkout</h5>');

    </script>

<script>
  

  $(document).ready(function () {
      // Select all input fields with class 'amount-input'
      $('.amount-input').on('input', function () {
          var net_amount = 0;

          // Convert the total to words and update the 'અંકે રૂપિયા' input field
          NumToWord(net_amount, 'rupees-in-words');
      });
  });

  function onlyNumbers(evt) {
      var e = event || evt; // For trans-browser compatibility
      var charCode = e.which || e.keyCode;

      if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
      return true;
  }

  function NumToWord(inputNumber, outputControl) {
      // Your NumToWord function implementation
      // Make sure it works correctly separately
  }
</script>

<script>
  function convertToWords() {
  var depositAmount = parseFloat(document.getElementById("net_amount").value);
 
  var inWords = numberToWords(depositAmount);
  document.getElementById("rupees-in-words").value = inWords;
}

function numberToWords(number) {
  var units = [
    "Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine",
    "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen",
    "Eighteen", "Nineteen"
  ];

  var tens = [
    "", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"
  ];

  var words = "";

  if (number === 0) {
    return "Zero";
  }

  if (number < 0) {
    words += "Minus ";
    number = Math.abs(number);
  }

  if (Math.floor(number / 10000000) > 0) {
    words += numberToWords(Math.floor(number / 10000000)) + " Crore ";
    number %= 10000000;
  }

  if (Math.floor(number / 100000) > 0) {
    words += numberToWords(Math.floor(number / 100000)) + " Lakh ";
    number %= 100000;
  }

  if (Math.floor(number / 1000) > 0) {
    words += numberToWords(Math.floor(number / 1000)) + " Thousand ";
    number %= 1000;
  }

  if (Math.floor(number / 100) > 0) {
    words += numberToWords(Math.floor(number / 100)) + " Hundred ";
    number %= 100;
  }

  if (number > 0) {
    if (words !== "") {
      words += "and ";
    }

    if (number < 20) {
      words += units[number];
    } else {
      words += tens[Math.floor(number / 10)];
      if (number % 10 > 0) {
        words += "-" + units[number % 10];
      }
    }
  }

  return words.trim();
}

// Add event listener to deposit amount input field
document.getElementById("net_amount").addEventListener("input", convertToWords);

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      
  {{-- <script>
    // Get all elements with class "delete-record"
    const deleteLinks = document.querySelectorAll(".delete-record");

    // Loop through each delete link and attach a click event listener
    deleteLinks.forEach(link => {
        link.addEventListener("click", function() {
            // Show a confirmation dialog using SweetAlert2
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                // If the user confirms the deletion, proceed with the deletion logic
                if (result.isConfirmed) {
                    // Write your deletion logic here
                    // For example, you can remove the entire row from the table:
                    const row = this.closest("tr");
                    if (row) {
                        row.remove();
                    }

                    // Show a success message using SweetAlert2
                    Swal.fire("Deleted!", "The record has been deleted.", "success");
                }
            });
        });
    });
</script> --}}

<script>
  
const editLinks = document.querySelectorAll(".item-edit");
    // Loop through each delete link and attach a click event listener
    editLinks.forEach(link => {
        link.addEventListener("click", function() {
            // Show a confirmation dialog using SweetAlert2
            var id=$(this).closest("tr").find(".id").val();
           /* var member_id=[];
            var temp=document.getElementById('select2Basic');
             for(i=0;i<temp.options.length;i++)
                  {
                    member_id[i]=temp.options[i].value;
                  }*/
            $.ajax({
                url:"{{url('get_booking_data')}}" +"/"+ id,
                type:'GET',
                  success:function(response){
                      var sr_no=response[0]['m_id'];
                      $("#bookingId").val(response[0]['r_id']);
                      $("#city").val(response[0]['city']);
                      $("#check_in_date").val(response[0]['check_in_date']);
                      $("#deposite").val(response[0]['deposite_rs']);
                      var room=response[0]['room_list'];
                    
                      var ArrNames =room .split(",");
                      ArrNames.forEach(myFunction);
                      function myFunction(room, index) {
                         
                        
                      
                      if(room==301 || room==302 || room==401 || room==402)
                      {
                        $("#dlx_room").val(room);
                        $("#dlx_room_charge").val(response[0]['ac_amount']);
                        $("#dlx_no_of_days").val(response[0]['no_of_days']);
                        $("#dlx_amount").val(response[0]['no_of_days'] * response[0]['ac_amount']);
                        $("#dlx_room_total").val(response[0]['no_of_days'] * response[0]['ac_amount']);
                      }
                      if(room==303 || room==304 ||room==305 || room==306 || room==403)
                      {
                        $("#ac_room").val(room);
                        $("#ac_room_charge").val(response[0]['ac_amount']);
                        $("#ac_no_of_days").val(response[0]['no_of_days']);
                        $("#ac_amount").val(response[0]['no_of_days'] * response[0]['ac_amount']);
                        $("#ac_room_total").val(response[0]['no_of_days'] * response[0]['ac_amount']);
                      }
                      if(room==201 || room==202 ||room==203 || room==204 ||room==205 || room==206 || room==404 || room==405 || room==406)
                      {
                        $("#non_ac_room").val(room);
                        $("#non_ac_room_charge").val(response[0]['non_ac_amount']);
                        $("#non_ac_no_of_days").val(response[0]['no_of_days']);
                        $("#non_ac_amount").val(response[0]['no_of_days'] * response[0]['non_ac_amount']);
                        $("#non_ac_room_total").val(response[0]['no_of_days'] * response[0]['non_ac_amount']);
                      }
                      
                      if(room==1 || room==2 ||room==3 || room==4 ||room==5 || room==6 ||room==7 || room==8 ||room==9 || room==10)
                      {
                        $("#non_dmt_ac_room").val(room);
                        $("#non_dmt_ac_room_charge").val(response[0]['door_mt_amount']);
                        $("#non_dmt_ac_no_of_days").val(response[0]['no_of_days']);
                        $("#non_dmt_ac_amount").val(response[0]['no_of_days'] * response[0]['door_mt_amount']);
                        $("#non_dmt_ac_room_total").val(response[0]['no_of_days'] * response[0]['door_mt_amount']);
                      }

                      if(room==11 || room==12 ||room==13 || room==14 ||room==15 || room==16 ||room==17 || room==18 ||room==19 || room==20)
                      {
                        $("#dmt_ac_room").val(room);
                        $("#dmt_ac_room_charge").val(response[0]['door_mt_amount']);
                        $("#dmt_ac_no_of_days").val(response[0]['no_of_days']);
                        $("#dmt_ac_amount").val(response[0]['no_of_days'] * response[0]['door_mt_amount']);
                        $("#dmt_ac_room_total").val(response[0]['no_of_days'] * response[0]['door_mt_amount']);
                      }
                    }
                    var a=document.getElementById("ac_room").value;
                          if (a == "") {
                              $("#ac_room_Excharge").prop('disabled', true);
                          } else {
                              $("#ac_room_Excharge").val ("0");
                          }
                        var l=document.getElementById("non_ac_room").value;
                          if (l == "") {
                              $("#non_ac_room_Excharge").prop('disabled', true);
                          } else {
                              $("#non_ac_room_Excharge").val ("0");
                          }
                          var m=document.getElementById("non_dmt_ac_room").value;
                          if (m == "") {
                              $("#non_dmt_ac_room_Excharge").prop('disabled', true);
                          } else {
                              $("#non_dmt_ac_room_Excharge").val ("0");
                          }
                          var p=document.getElementById("dmt_ac_room").value;
                          if (p == "") {
                              $("#dmt_ac_room_Excharge").prop('disabled', true);
                          } else {
                              $("#dmt_ac_room_Excharge").val ("0");
                          }
                          var k=document.getElementById("dlx_room").value;
                          if (k == "") {
                              $("#dlx_room_Excharge").prop('disabled', true);
                          } else {
                              $("#dlx_room_Excharge").val ("0");
                          }
                          
                          
                          
                 
                    

                      // $("#total").val(dlx+ac+non_ac+dmt_ac+dmt_non_ac);
                      // member_id.forEach(myFunction)
                      //   function myFunction(item, index, arr) {
                      //       if((member_id[index])==5)
                      //       {
                      //         $("#select2Basic option[value=" + sr_no + "]").attr('selected', 'selected'); 
                      //       }
                      //   }
                        
                      // }
                  }
                });
              
            });
        });
</script>
<!-- <script>
$(document).ready(function() {
    const dlxtamount = parseInt($('#dlx_room_total').val()) || 0;
    const acamount = parseInt($('#ac_room_total').val()) || 0;
    const nonacamount = parseInt($('#non_ac_room_total').val()) || 0;
    const nonacdmtamount = parseInt($('#non_dmt_ac_room_total').val()) || 0;
    const acdmtamount = parseInt($('#dmt_ac_room_total').val()) || 0;

    const totalAmount = dlxtamount + acamount + nonacamount + nonacdmtamount + acdmtamount;
    alert(totalAmount);
    $('#total').text(totalAmount);
});
</script> -->


<script>
    $(document).ready(function() {

     
   
  $("#dlx_room_Excharge").change(function(){
    var amt=parseInt(document.getElementById("dlx_amount").value); 
    var excharge=parseInt(document.getElementById("dlx_room_Excharge").value); 
    var deposite=parseInt(document.getElementById("deposite").value);
    $("#dlx_room_total").val(amt+excharge);
    // var total=parseInt(document.getElementById("dlx_room_total").value);
    // $("#total").val(total);
    
    const dlxtamount = parseInt($('#dlx_room_total').val()) || 0;
    const acamount = parseInt($('#ac_room_total').val()) || 0;
    const nonacamount = parseInt($('#non_ac_room_total').val()) || 0;
    const nonacdmtamount = parseInt($('#non_dmt_ac_room_total').val()) || 0;
    const acdmtamount = parseInt($('#dmt_ac_room_total').val()) || 0;
    const totalAmount = dlxtamount + acamount + nonacamount + nonacdmtamount + acdmtamount;
    $('#total').val(totalAmount);
    $("#net_amount").val(totalAmount-deposite);
   
  });

  $("#ac_room_Excharge").change(function(){
    var amt=parseInt(document.getElementById("ac_amount").value); 
    var excharge=parseInt(document.getElementById("ac_room_Excharge").value); 
    var deposite=parseInt(document.getElementById("deposite").value);
    $("#ac_room_total").val(amt+excharge);
    // var total=parseInt(document.getElementById("ac_room_total").value);
    // $("#total").val(total);
    // $("#net_amount").val(total-deposite);
    const dlxtamount = parseInt($('#dlx_room_total').val()) || 0;
    const acamount = parseInt($('#ac_room_total').val()) || 0;
    const nonacamount = parseInt($('#non_ac_room_total').val()) || 0;
    const nonacdmtamount = parseInt($('#non_dmt_ac_room_total').val()) || 0;
    const acdmtamount = parseInt($('#dmt_ac_room_total').val()) || 0;
    const totalAmount = dlxtamount + acamount + nonacamount + nonacdmtamount + acdmtamount;
    $('#total').val(totalAmount);
    $("#net_amount").val(totalAmount-deposite);
  });

  $("#non_ac_room_Excharge").change(function(){
    var amt=parseInt(document.getElementById("non_ac_amount").value); 
    var excharge=parseInt(document.getElementById("non_ac_room_Excharge").value); 
    var deposite=parseInt(document.getElementById("deposite").value);
    $("#non_ac_room_total").val(amt+excharge);
    // var total=parseInt(document.getElementById("non_ac_room_total").value);
    // $("#total").val(total);
    // $("#net_amount").val(total-deposite);
    const dlxtamount = parseInt($('#dlx_room_total').val()) || 0;
    const acamount = parseInt($('#ac_room_total').val()) || 0;
    const nonacamount = parseInt($('#non_ac_room_total').val()) || 0;
    const nonacdmtamount = parseInt($('#non_dmt_ac_room_total').val()) || 0;
    const acdmtamount = parseInt($('#dmt_ac_room_total').val()) || 0;
    const totalAmount = dlxtamount + acamount + nonacamount + nonacdmtamount + acdmtamount;
    $('#total').val(totalAmount);
    $("#net_amount").val(totalAmount-deposite);
  });

  $("#non_dmt_ac_room_Excharge").change(function(){
    var amt=parseInt(document.getElementById("non_dmt_ac_amount").value); 
    var excharge=parseInt(document.getElementById("non_dmt_ac_room_Excharge").value); 
    var deposite=parseInt(document.getElementById("deposite").value);
    $("#non_dmt_ac_room_total").val(amt+excharge);
    // var total=parseInt(document.getElementById("non_dmt_ac_room_total").value);
    // $("#total").val(total);
    // $("#net_amount").val(total-deposite);
    const dlxtamount = parseInt($('#dlx_room_total').val()) || 0;
    const acamount = parseInt($('#ac_room_total').val()) || 0;
    const nonacamount = parseInt($('#non_ac_room_total').val()) || 0;
    const nonacdmtamount = parseInt($('#non_dmt_ac_room_total').val()) || 0;
    const acdmtamount = parseInt($('#dmt_ac_room_total').val()) || 0;
    const totalAmount = dlxtamount + acamount + nonacamount + nonacdmtamount + acdmtamount;
    $('#total').val(totalAmount);
    $("#net_amount").val(totalAmount-deposite);
  
  });

  $("#dmt_ac_room_Excharge").change(function(){
    var amt=parseInt(document.getElementById("door_mt_amount").value); 
    var excharge=parseInt(document.getElementById("dmt_ac_room_Excharge").value); 
    var deposite=parseInt(document.getElementById("deposite").value);
    $("#dmt_ac_room_total").val(amt+excharge);
    // var total=parseInt(document.getElementById("dmt_ac_room_total").value);
    // $("#total").val(total);
    // $("#net_amount").val(total-deposite);
    const dlxtamount = parseInt($('#dlx_room_total').val()) || 0;
    const acamount = parseInt($('#ac_room_total').val()) || 0;
    const nonacamount = parseInt($('#non_ac_room_total').val()) || 0;
    const nonacdmtamount = parseInt($('#non_dmt_ac_room_total').val()) || 0;
    const acdmtamount = parseInt($('#dmt_ac_room_total').val()) || 0;
    const totalAmount = dlxtamount + acamount + nonacamount + nonacdmtamount + acdmtamount;
    $('#total').val(totalAmount);
    $("#net_amount").val(totalAmount-deposite);
  });
});
  </script>



@endsection

@endsection