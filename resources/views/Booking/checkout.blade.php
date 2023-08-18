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

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />

<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/dropzone/dropzone.css') }}" />



    

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

  .bs-stepper.wizard-icons.wizard-icons-example.mt-2 {
      box-shadow: unset !important;
  }
  .bs-stepper .step.active .bs-stepper-icon svg {
    color: var(--bs-primary) !important;
  }
  .bs-stepper .step.crossed .step-trigger .bs-stepper-icon svg {
    color: var(--bs-primary) !important;
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
                                          <tr>
                                              {{-- <td>1</td> --}}
                                              <td>Dipesh K</td>
                                              {{-- <td>Mandvi</td> --}}
                                              <td>Room 1</td>
                                              <td>25 Jul, 2023</td>
                                              <td></td>
                                              {{-- <td></td> --}}
                                              {{-- <td>Delux A.C. Room</td> --}}
                                              {{-- <td>1200</td> --}}
                                              {{-- <td>100</td> --}}
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
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                 
                                  <!-- Default Icons Wizard -->
                                  <div class="col-12 mb-4">

                                      

                                    <div class="bs-stepper wizard-icons wizard-icons-example mt-2">
                                      <div class="bs-stepper-header">
                                        <div class="step" data-target="#account-details">
                                          <button type="button" class="step-trigger">
                                            <span class="bs-stepper-icon">
                                              <svg viewBox="0 0 24 24">
                                                <use xlink:href=" {{ asset('assets/svg/icons/form-wizard-user-plus.svg#wizardUserPlus') }}"></use>
                                              </svg>
                                            </span>
                                            <span class="bs-stepper-label">Personal Info</span>
                                          </button>
                                        </div>
                                        <div class="line">
                                          <i class="ti ti-chevron-right"></i>
                                        </div>
                                        <div class="step" data-target="#personal-info">
                                          <button type="button" class="step-trigger">
                                            <span class="bs-stepper-icon">
                                              <svg viewBox="0 0 24 24">
                                                <use xlink:href="{{ asset('assets/svg/icons/form-wizard-booking.svg#wizardBooking') }}"></use>
                                              </svg>
                                            </span>
                                            <span class="bs-stepper-label">Booking Details</span>
                                          </button>
                                        </div>
                                        <div class="line">
                                          <i class="ti ti-chevron-right"></i>
                                        </div>
                                        <div class="step" data-target="#address">
                                          <button type="button" class="step-trigger">
                                            <span class="bs-stepper-icon">
                                              <svg viewBox="0 0 24 24">
                                                <use xlink:href="{{ asset('assets/svg/icons/form-wizard-members.svg#wizardMembers') }}"></use>
                                              </svg>
                                            </span>
                                            <span class="bs-stepper-label">Member Details</span>
                                          </button>
                                        </div>
                                        
                                        <div class="line">
                                          <i class="ti ti-chevron-right"></i>
                                        </div>
                                        <div class="step" data-target="#review-submit">
                                          <button type="button" class="step-trigger">
                                            <span class="bs-stepper-icon">
                                              <svg viewBox="0 0 54 54">
                                                <use xlink:href="{{ asset('assets/svg/icons/form-wizard-submit.svg#wizardSubmit') }}"></use>
                                              </svg>
                                            </span>
                                            <span class="bs-stepper-label">Review & Submit</span>
                                          </button>
                                        </div>
                                      </div>
                                      <div class="bs-stepper-content">
                                      <form action="" method="POST">
                                          <!-- Account Details -->
                                          <div id="account-details" class="content">
                                            <div class="content-header mb-3">
                                              <small>Enter Your Personal Details.</small>
                                            </div>
                                            <div class="row g-3">
                                              
                                                <!-- Basic -->
                                              <div class="col-md-4">
                                                  <label for="select2Basic" class="form-label" >Name</label>
                                                  <select id="select2Basic" class="select2 form-select" data-allow-clear="true" name="name" placeholder="select name" required>
                                                    <option value="Bhoomi">Bhoomi</option>
                                                    <option value="Jay">Jay</option>
                                                  </select>
                                                  
                                                  <input type="hidden" id="email_user" value="{{!empty($m_data)  ? $m_data:''}}">
                                                </div>
                      
                                                <div class="col-md-4">
                                              
                                                    <label class="form-label" for="basic-default-email">Email</label>
                                                    <input type="email" id="member_email" name="email" class="form-control" placeholder="john.doe" />

                                                </div>                                                                                                            

                      
                                                <div class="col-md-4">
                                                  
                                                  <label class="form-label" for="multicol-phone">Phone Number</label>
                                                  <input type="number" id="member-phone" name="phone_no" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" maxlength="10" minlength="10" required/>
                                                </div>

                                                <div class="col-md-4">
                                                  <label class="form-label" for="basic-default-name">Age</label>
                                                  <input type="text" class="form-control" name="age" id="basic-default-age" placeholder="Age" />
                                                </div>
                      
                                                <div class="col-4">
                                                  <label class="form-label" for="collapsible-address">Address</label>
                                                
                                                  
                                                  
                                                  <textarea name="collapsibleaddress"  class="form-control" id="member-address" rows="1" placeholder="1456, Mall Road"></textarea>
                                                </div>
                                                                          
                                                
                                                <!-- Basic -->
                                                <div class="col-md-4">
                                                  <label for="select2Basic" class="form-label">Community</label>
                                                  <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                  </select>
                                                </div>

                                                

                                                
                                                <div class="col-md-4">
                                                  <label for="defaultFormControlInput" class="form-label">Sub Community</label>
                                                  <input type="text" class="form-control" name="community" id="defaultFormControlInput" placeholder="John Doe" aria-describedby="defaultFormControlHelp" />
                                                </div>

                                                
                                                
                                                <div class="col-md-4">
                                                  <label for="defaultFormControlInput" class="form-label">City</label>
                                                  <input type="text" class="form-control" name="city" id="member_city" placeholder="John Doe" aria-describedby="defaultFormControlHelp" />
                                                </div>

                                                <div class="col-md-4">
                                                  <label class="d-block form-label">Gender</label>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="MALE" />
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="FEMALE" />
                                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                                  </div>
                                                  
                                                </div>
                      
                                              <div class="col-12 d-flex justify-content-end">
                                                {{-- <button class="btn btn-label-secondary btn-prev" disabled>
                                                  <i class="ti ti-arrow-left me-sm-1"></i>
                                                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button> --}}
                                                {{-- <div>
                                                <input type="button" class="btn btn-primary btn-next">
                                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                  <i class="ti ti-arrow-right"></i>
                                                </div> --}}

                                                <button type="button" class="btn btn-primary btn-next">
                                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                  <i class="ti ti-arrow-right"></i>
                                                </button>
                                                
                                              
                                              </div>
                                            </div>
                                          </div>
                                          <!-- Personal Info -->
                                          <div id="personal-info" class="content">
                                            <div class="content-header mb-3">
                                              <small>Enter Your Booking Details.</small>
                                            </div>
                                            <div class="row g-3">
                                              
                                            
                                              <!-- /Datetime Picker-->
                                              
                                              

                                                <!-- Primary -->
                                              {{-- <div class="col-md-4">
                                                <label for="select3Primary" class="form-label">Room Facility</label>
                                                <div class="select2-primary">
                                                  <select id="select3Primary1" name="room_list" class="select2 form-select" multiple>
                                                    <option value="">Select Room</option>
                                                      <option value="A.C. Room No" name="room_facility"> A.C. Room.</option>
                                                      <option value="Non. A.C. Room No" name="room_facility">Non. A.C. Room</option>
                                                      <option value="Door Metri. Room No" name="room_facility">Door Metri. Room.</option>
                                                  </select>
                                                </div>
                                              </div> --}}


                                              <!-- Primary -->

                                              
                                              <div class="row g-3 mt-0 mb-3">

                                                <!-- Custom Suggestions: List -->
                                                  <div class="col-md-2">
                                                    <label for="TagifyCustomListSuggestion" class="form-label">A.C. Room.</label>
                                                    <input id="TagifyCustomListSuggestion" name="TagifyCustomListSuggestion" class="form-control" placeholder="Select Roomlist" />
                                                  </div>

                                                  <div class="col-md-2">
                                                    <label class="form-label" for="basic-default-name">Amount</label>
                                                    <div class="input-group">
                                                      <span class="input-group-text">₹</span>
                                                      <input type="number" class="form-control"  name="amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="r_amount" value="800" />
                                                    </div>
                                                  </div>


                                                  <div class="col-md-2">
                                                    <label for="TagifyCustomListSuggestion1" class="form-label">Non. A.C. Room</label>
                                                    <input id="TagifyCustomListSuggestion1" name="TagifyCustomListSuggestion1" class="form-control" placeholder="Select Roomlist" />
                                                  </div>

                                                  <div class="col-md-2">
                                                    <label class="form-label" for="basic-default-name">Amount</label>
                                                    <div class="input-group">
                                                      <span class="input-group-text">₹</span>
                                                      <input type="number" class="form-control"  name="amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="r_amount" value="800" />
                                                    </div>
                                                  </div>

                                                  <div class="col-md-2">
                                                    <label for="TagifyCustomListSuggestion2" class="form-label">Door Metri. Room </label>
                                                    <input id="TagifyCustomListSuggestion2" name="TagifyCustomListSuggestion2" class="form-control" placeholder="Select Roomlist" />
                                                  </div>

                                                  <div class="col-md-2">
                                                    <label class="form-label" for="basic-default-name">Amount</label>
                                                    <div class="input-group">
                                                      <span class="input-group-text">₹</span>
                                                      <input type="number" class="form-control"  name="amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="r_amount" value="800" />
                                                    </div>
                                                  </div>
                    
                                              </div>

                                              
                                          
                                              <hr>
                                              
                                              <div class="col-md-4">
                                                <label class="form-label" for="basic-default-name">No. of Person</label>
                                                <input type="text" class="form-control"  name="no_of_person" id="no_of_person_id" placeholder="No of Person" min="1" max="10"/>
                                              </div>
                                              <!-- Datetime Picker-->
                                              <div class="col-md-4">
                                                <label for="flatpickr-datetime" class="form-label">Check-In Date</label>
                                                <input type="text" class="form-control" name="check_in_date" placeholder="DD-MM-YYYY HH:MM" id="flatpickr-datetime" />
                                              </div>

                                              <div class="col-md-4">
                                                <label class="form-label" for="basic-default-name">Deposit No</label>
                                                <input type="text" class="form-control" name="deposit_no" id="basic-default-name" placeholder="Deposit No" />
                                              </div>

                                            
                    
                                              <div class="col-md-4">
                                                <label class="form-label" for="deposit-amount">Deposit Rs</label>
                                                <input type="number" class="form-control" name="deposite_rs" id="deposit-amount" placeholder="Deposit Rs">
                                              </div>
                                              
                                              <div class="col-md-4">
                                                <label class="form-label" for="rupees-in-words">Deposit Rs (rupees in words)</label>
                                                <input type="text" class="form-control" name="rs_word" id="rupees-in-words" placeholder="Rupees in words" readonly>
                                              </div>

                                              <!-- Multi  -->
                                              <div class="col-12">
                                                <div action="/upload" class="dropzone needsclick" id="dropzone-multi">
                                                  <div class="dz-message needsclick">
                                                    Drop files here or click to upload
                                                    <span class="note needsclick"
                                                      >(This is just a demo dropzone. Selected files are <strong>not</strong> actually
                                                      uploaded.)</span
                                                    >
                                                  </div>
                                                  <div class="fallback">
                                                    <input name="file" type="file" />
                                                  </div>
                                                </div>
                                              </div>
                                              <!-- Multi  -->

                                              
                                              <div class="col-12 d-flex justify-content-between">
                                                <button class="btn btn-label-secondary btn-prev">
                                                  <i class="ti ti-arrow-left me-sm-1"></i>
                                                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                {{-- <div>
                                                <input type="button" id="repeat-next"  class="btn btn-primary btn-next" >
                                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                  <i class="ti ti-arrow-right"></i>
                                                </div> --}}
                                                <button type="button" class="btn btn-primary btn-next">
                                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                  <i class="ti ti-arrow-right"></i>
                                                </button>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- All No of Person -->
                                          <div id="address" class="content">
                                            <div class="content-header">
                                              <small>Enter Member Details.</small>
                                            </div>
                                            
                                            <div class="row g-3">
                                              <!-- Form Repeater -->
                                            
                                              <div id="step2FormsContainer "class="col-12">
                                                <div class="dynamic-form">
                                                <div class="all-members" data-repeater-list="group-a">
                                                <div data-repeater-item>
                                              
                                              <div class="rep-form1">
                                            
                                                  <div class="row formrepeater1">
                                                    <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                      <label class="form-label" for="form-repeater-1-1">Full Name</label>
                                                      <input type="text" id="full_name_form"  name="full_name" class="form-control" placeholder="john doe" />
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                      <label class="form-label" for="form-repeater-1-2">Age</label>
                                                      <input type="text" id="member_age" name="m_age" class="form-control" placeholder="your age" />
                                                    </div>
                                                    
                                                    
                                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">
                                                    
                                                        <label class="d-block form-label">Gender</label>
                                                      
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender_${i}" id="inlineRadio1_${i}" value="MALE" />
                                                            <label class="form-check-label" for="inlineRadio1_${i}">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender_${i}" id="inlineRadio2_${i}" value="FEMALE" />
                                                            <label class="form-check-label" for="inlineRadio2_${i}">Female</label>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-4">
                                                      <label class="form-label" for="basic-default-country">Relation</label>
                                                      <select class="form-select" name="relation" id="member_relation" required>
                                                        <option value="SELF" selected>SELF</option>
                                                        <option value="MOTHER">MOTHER</option>
                                                        <option value="FATHER">FATHER</option>
                                                        <option value="BROTHER">BROTHER</option>
                                                        <option value="SISTER">SISTER</option>
                                                        <option value="UNCLE">UNCLE</option>
                                                        <option value="AUNTY">AUNTY</option>
                                                        <option value="GRAND MOTHER">GRAND MOTHER</option>
                                                        <option value="GRAND FATHER">GRAND FATHER</option>
                                                        <option value="FRIEND">FRIEND</option>
                                                      </select>
                                                    </div>
                                                    <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                                      <button class="btn btn-label-danger mt-4" data-repeater-delete>
                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                        <span class="align-middle">Delete</span>
                                                      </button>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row rep-form">
                                                </div> 
                                                  <hr />
                                                </div>
                                                </div>
                                                </div>
                                              </div>
                                              <div id="dynamicFormsContainer">
                                              </div>
                                              <div class="mb-0">
                                                <button class="btn btn-primary" data-repeater-create>
                                                  <i class="ti ti-plus me-1"></i>
                                                  <span class="align-middle">Add Members</span>
                                                </button>
                                              </div>
                                              
                                              <!-- /Form Repeater -->
                                              <div class="col-12 d-flex justify-content-between">
                                                <button class="btn btn-label-secondary btn-prev">
                                                  <i class="ti ti-arrow-left me-sm-1"></i>
                                                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                {{-- <div>
                                                  <input type="button"  class="btn btn-primary btn-next">
                                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                  <i class="ti ti-arrow-right"></i>
                                                </div> --}}
                                                <button type="button" class="btn btn-primary btn-next">
                                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                  <i class="ti ti-arrow-right"></i>
                                                </button>
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <!-- Review -->
                                          <div id="review-submit" class="content">

                                            <!-- Invoice -->
                                            <div class="col-xl-12 col-md-12 col-12 mb-md-0 mb-4">
                                              <div class="invoice-preview-card">
                                                
                                                <div class="card-body">
                                                  <div class="row p-sm-3 p-0 mb-3">
                                                  
                                                    <div class="col-xl-12 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                                      <h6 class="mb-4">Details:</h6>
                                                      <table>
                                                        <tbody>
                                                          
                                                          {{-- <tr>
                                                            <td class="pe-4">Room Facility</td>
                                                            <td id="room_faci"></td>
                                                          </tr> --}}
                                                          <tr>
                                                            <td class="pe-4">Room Name:</td>
                                                            <td id="room_lst"></td>
                                                          </tr>
                                                          <tr>
                                                            <td class="pe-4">Check-In Date:</td>
                                                            <td id="check_date"></td>
                                                          </tr>
                                                          <tr>
                                                            <td class="pe-4">Amount:</td>
                                                            <td id="room_amount"></td>
                                                          </tr>
                                                          
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="table-responsive border-top">
                                                  <table class="table mb-3">
                                                    <thead>
                                                      <tr>
                                                        <th>No.</th>
                                                        <th>Full Name</th>
                                                        <th>Age </th>
                                                        <th>Gender</th>
                                                        <th>Relations</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                      <tr>
                                                        <td></td>
                                                        <td id="member_full_name"></td>
                                                        <td id="members_age"></td>
                                                        <td id="member_gen"></td>
                                                        <td id="member_rel"></td>
                                                      
                                                      </tr>
                                                    
                                                                                        
                                                      <!-- <tr>
                                                        <td colspan="3" class="align-top px-4 py-4">
                                                          
                                                        </td>
                                                        <td class="text-end pe-3 py-4">
                                                          <p class="mb-2 pt-3">Subtotal:</p>
                                                          <p class="mb-2">Tax:</p>
                                                          <p class="mb-0 pb-3">Total:</p>
                                                        </td>
                                                        <td class="ps-2 py-4">
                                                          <p class="fw-semibold mb-2 pt-3">$154.25</p>
                                                          <p class="fw-semibold mb-2">$50.00</p>
                                                          <p class="fw-semibold mb-0 pb-3">$204.25</p>
                                                        </td>
                                                      </tr> -->
                                                    </tbody>
                                                  </table>
                                                </div>

                                                
                                              </div>
                                            </div>
                                            <!-- /Invoice -->

                                            <div class="col-12 d-flex justify-content-between">
                                              <button class="btn btn-label-secondary btn-prev">
                                                <i class="ti ti-arrow-left me-sm-1"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                              </button>
                                              <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                              
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /Default Icons Wizard -->

                                  
                                </div>

                                

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

    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>

    
    <script src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>

        <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

        <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>

     

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