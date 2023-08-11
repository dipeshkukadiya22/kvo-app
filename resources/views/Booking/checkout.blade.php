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
                                                {{-- <th>બુકિંગ ID</th> --}}
                                                <th>નામ</th>
                                                {{-- <th>ગામ</th> --}}
                                                <th>રૂમ નંબર </th>
                                                {{-- <th>ડોરમેટરી નંબર</th> --}}
                                                <th>આગમન તારીખ / સમય</th>
                                                <th>ચેક આઉટ તારીખ / સમય</th>
                                                {{-- <th>રૂમની વિગત </th> --}}
                                                {{-- <th>ભાડું</th> --}}
                                                {{-- <th>એક્સટ્રા ચાર્જ</th> --}}
                                                <th>કુલ ભાડું</th>
                                                <th>રોકાણ દિવસ</th>
                                                <th>કુલ રકમ (₹)</th>
                                                <th>ડિપોઝિટ બાદ </th>
                                                <th>બાકી લેવાની / પરત કરવાની  રકમ</th>
                                                <th>Action</th>
                                              </tr>
                                             
                                          </thead>
                                          @foreach($checkout as $check)
                                          <tr>
                                              {{-- <td>1</td> --}}
                                              <td>{{$check->p_id}}</td>
                                              {{-- <td>Mandvi</td> --}}
                                              <td>{{$check->room_no}}</td>
                                              <td>{{$check->check_in_date}}</td>
                                              <td></td>
                                             
                                              <td>1300</td>
                                              <td>1</td>
                                              <td>500</td>
                                              <td>1300</td>
                                              <td>600</td>
                                              <td>
                                                  <div class="d-inline-block">
                                                    <a href="javascript:;" class="text-primary"><img src="./assets/icon/orange-eye.png" width="20px"></a>

                                                    {{-- <a href="javascript:;" class="btn btn-sm btn-icon item-edit" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop"><i class="text-primary ti ti-edit"></i></a> --}}

                                                    <a href="javascript:;" class="btn btn-sm btn-icon item-edit" data-bs-toggle="modal"
                                                    data-bs-target="#exLargeModal"><img src="./assets/icon/orange-edit.png" width="20px"></a>


                                                    {{-- <a href="javascript:;" class="text-danger delete-record"><i class="ti ti-trash"></i></a> --}}
                                                    
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                          
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Enable backdrop (default) Offcanvas -->
                        {{-- <div class="mt-0">
                          
                          <div
                            class="offcanvas offcanvas-end"
                            tabindex="-1"
                            id="offcanvasBackdrop"
                            aria-labelledby="offcanvasBackdropLabel">
                            <div class="offcanvas-header border-bottom">
                              <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Edit Donation Details</h5>
                              <button
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-0 flex-grow-0">

                              <!-- Browser Default -->
                              <form class="browser-default-validation">

                                     <!-- Range Picker-->
                                    <!-- Datetime Picker-->
                                    <div class="col-md-12 mb-2">
                                        <label for="flatpickr-datetime" class="form-label">Check-Out Date</label>
                                        <input type="text" class="form-control" name="check_in_date" placeholder="DD-MM-YYYY HH:MM" id="flatpickr-datetime" />
                                    </div>
                                    <!-- /Range Picker-->
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
                                            <button
                                            type="submit"
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
                        </div> --}}

                        <!-- Extra Large Modal -->
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
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">Booking ID</label>
                                    <input type="text" id="nameExLarge" class="form-control" placeholder="125" readonly/>
                                  </div>

                                  <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">રસિદ નંબર  </label>
                                    <input type="text" id="nameExLarge" class="form-control" placeholder="10" readonly/>
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label"  for="basic-default-dob">તારીખ</label>
                                    <input
                                      type="text"
                                      class="form-control flatpickr-validation"
                                      name="r_date"
                                      id="basic-default-dob1"
                                      required />
                                  </div>    

                                  <div class="col mb-3">
                                    <label for="select2Basic" class="form-label">નામ</label>
                                    <select id="select2Basic" name="name" class="select2 form-select" data-allow-clear="true">
                                      <option value="Bhoomi">Bhoomi</option>
                                      <option value="Jay">Jay</option>
                                      
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
                                    <input type="text" class="form-control" name="check_in_date" placeholder="09-08-2023 17:36" readonly />
                                  </div>

                                  <!-- Datetime Picker-->
                                  <div class="col mb-3">
                                    <label for="flatpickr-datetime" class="form-label">ચેક આઉટ તારીખ / સમય</label>
                                    <input type="text" class="form-control" name="check_out_date" placeholder="DD-MM-YYYY HH:MM" id="flatpickr-datetime" />
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="deposit-amount">ડિપોઝિટ રકમ </label>
                                    <input type="number" class="form-control" name="deposite_rs" id="deposit-amount" placeholder="Deposit Rs" readonly>
                                  </div>
                                  

                                </div>

                                {{-- <div class="row g-3">
                                  <!-- Multiple -->
                                  <div class="col mb-3">
                                    <label for="select2Multiple" class="form-label">A.C. Room.</label>
                                    <select id="select2Multiple" class="select2 form-select" multiple>
                                      <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                      </optgroup>
                                    </select>
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="basic-default-name">કુલ ભાડું (A.C. Room.)</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₹</span>
                                      <input type="number" class="form-control"  name="amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="r_amount" value="800" />
                                    </div>
                                  </div>

                                  <div class="col mb-3">
                                    <label for="select2Multiple" class="form-label">Non. A.C. Room</label>
                                    <select id="select2Multiple2" class="select2 form-select" multiple>
                                      <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                      </optgroup>
                                    </select>
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="basic-default-name">કુલ ભાડું (Non. A.C.)</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₹</span>
                                      <input type="number" class="form-control"  name="amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="r_amount" value="800" />
                                    </div>
                                  </div>

                                  <div class="col mb-3">
                                    <label for="select2Multiple" class="form-label">Door Metri. Room</label>
                                    <select id="select2Multiple3" class="select2 form-select" multiple>
                                      <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                      </optgroup>
                                    </select>
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="basic-default-name">કુલ ભાડું (Door Metri)</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₹</span>
                                      <input type="number" class="form-control"  name="amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="r_amount" value="800" />
                                    </div>
                                  </div>

                                </div>

                                <div class="row g-3">
                                  <div class="col mb-3">
                                    <label class="form-label" for="deposit-amount">એક્સટ્રા ચાર્જ</label>
                                    <input type="number" class="form-control" name="extra_rs" id="extra-amount" placeholder="Extra Amount">
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="deposit-amount">રોકાણ દિવસ</label>
                                    <input type="number" class="form-control" name="extra_rs" id="extra-amount" placeholder="Extra Amount">
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="deposit-amount">કુલ રકમ (₹)</label>
                                    <input type="number" class="form-control" name="extra_rs" id="extra-amount" placeholder="Extra Amount">
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="deposit-amount">ડિપોઝિટ બાદ </label>
                                    <input type="number" class="form-control" name="extra_rs" id="extra-amount" placeholder="Extra Amount">
                                  </div>

                                  <div class="col mb-3">
                                    <label class="form-label" for="deposit-amount">બાકી લેવાની / પરત કરવાની  રકમ</label>
                                    <input type="number" class="form-control" name="extra_rs" id="extra-amount" placeholder="Extra Amount">
                                  </div>

                                </div>

                                <div class="row g-3">
                                  <div class="col-md-4">
                                    <label class="d-block form-label">નાણા મળેલ</label>
                                    <div class="form-check form-check-inline mb-2">
                                      <input
                                        type="radio"
                                        id="basic_default_radio-male"
                                        name="basic_default_radio"
                                        class="form-check-input"
                                        value="cheque"
                                        required />
                                      <label class="form-check-label" for="basic_default_radio">ચેક</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input
                                        type="radio"
                                        id="basic_default_radio-female"
                                        name="basic_default_radio"
                                        class="form-check-input"
                                        value="Draft"
                                        required />
                                      <label class="form-check-label" for="basic_default_radio">ડ્રાફ્ટ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input
                                        type="radio"
                                        id="basic_default_radio-female"
                                        name="basic_default_radio"
                                        class="form-check-input"
                                        value="Cash"
                                        required />
                                      <label class="form-check-label" for="basic_default_radio">રોકડા</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input
                                        type="radio"
                                        id="basic_default_radio-female"
                                        name="basic_default_radio"
                                        class="form-check-input"
                                        value="UPI"
                                        required />
                                      <label class="form-check-label" for="basic_default_radio">UPI</label>
                                    </div>
                                  </div>
                                </div> --}}

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
                                        <td>
                                          ડિલક્સ  રૂમ 
                                        </td>
                                        <td>
                                          <div class="col">
                                            <select id="select2Multiple2" class="select2 form-select" multiple>
                                              <option value="AK">Alaska</option>
                                              <option value="HI">Hawaii</option>
                                            </select>
                                          </div>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1250" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="100" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1500" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="2" readonly/>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1850" />
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          A.C. રૂમ
                                        </td>
                                        <td>
                                          <select id="select2Multiple3" class="select2 form-select" multiple>
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                          </select>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1250" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="100" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1500" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="2" readonly/>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1850" />
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                           Non. A.C. રૂમ
                                        </td>
                                        <td>
                                          <select id="select2Multiple4" class="select2 form-select" multiple>
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                          </select>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1250" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="100" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1500" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="2" readonly/>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1850" />
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          A.C. ડોરમેટરી  
                                        </td>
                                        <td>
                                          <select id="select2Multiple5" class="select2 form-select" multiple>
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                          </select>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1250" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="100" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1500" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="2" readonly/>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1850" />
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          Non. A.C. ડોરમેટરી  
                                        </td>
                                        <td>
                                          <select id="select2Multiple6" class="select2 form-select" multiple>
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                          </select>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1250" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="100" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1500" />
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="2" readonly/>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" value="1850" />
                                        </td>
                                      </tr>

                                      <tr>
                                        <td rowspan="4" colspan="5">
                                          <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-name">અન્ય વિગત</label>
                                            <input
                                              type="text"
                                              class="form-control"
                                              name="remarks"
                                              id="basic-default-name"
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
                                                id="basic_default_radio-male"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                value="cheque"
                                                required />
                                              <label class="form-check-label" for="basic_default_radio">ચેક</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input
                                                type="radio"
                                                id="basic_default_radio-female"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                value="Draft"
                                                required />
                                              <label class="form-check-label" for="basic_default_radio">ડ્રાફ્ટ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input
                                                type="radio"
                                                id="basic_default_radio-female"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                value="Cash"
                                                required />
                                              <label class="form-check-label" for="basic_default_radio">રોકડા</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                              <input
                                                type="radio"
                                                id="basic_default_radio-female"
                                                name="basic_default_radio"
                                                class="form-check-input"
                                                value="UPI"
                                                required />
                                              <label class="form-check-label" for="basic_default_radio">UPI</label>
                                            </div>
                                          </div>
                                        </td>
                                        <td><strong>કુલ રકમ (₹)</strong></td>
                                        <td> <input type="text" class="form-control" value="1850" /></td>
                                      </tr>

                                      <tr>
                                        
                                        <td><strong>ડિપોઝિટ બાદ</strong></td>
                                        <td> <input type="text" class="form-control" value="1850" readonly/></td>
                                      </tr>

                                      <tr>
                                        
                                        <td><strong>બાકી લેવાની /<br> પરત કરવાની રકમ</strong></td>
                                        <td>
                                          <input type="number" class="form-control" name="deposite_rs" id="deposit-amount" >
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
                                <button type="button" class="btn btn-primary">Save changes</button>
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
      $('#basic-default-dob').flatpickr({
      dateFormat: "d M, Y",
      defaultDate: currentDate
    })
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
  function convertToWords() {
  var depositAmount = parseFloat(document.getElementById("deposit-amount").value);
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
document.getElementById("deposit-amount").addEventListener("input", convertToWords);

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



@endsection

@endsection
