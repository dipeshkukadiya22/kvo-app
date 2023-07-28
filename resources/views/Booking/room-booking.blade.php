
@extends('layouts.app')

@section('title', 'Room Booking')

@section('pagecss')

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/tagify/tagify.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/dropzone/dropzone.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/select2/select2.css') }}" />

<style>
  @media (min-width: 768px){
    .content-header > .text-md-right {
        text-align: right !important;
    }
  }
  .all-members > div:first-child button.btn.btn-label-danger.mt-4.waves-effect {
      display: none !important;
  }
  .bs-stepper .step.active .bs-stepper-icon svg {
    color: var(--bs-primary) !important;
  }
  .bs-stepper .step.crossed .step-trigger .bs-stepper-icon svg {
    color: var(--bs-primary) !important;
  }

  .form-control[readonly] {
      background-color: #efefef;
      opacity: 1;
  }

  /* drop down css */
  /* Style for the dropdown */
.btn-dropdown {
  display: block;
    width: 100%;
    padding: 0.422rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6f6b7d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #dbdade;
    appearance: none;
    border-radius: 0.375rem;
    text-align: left;
  
}

/* Style for the dropdown items (checkboxes) */
.checkboxes {
  display: none;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 5px;
}

.checkboxes label {
  display: block;
  padding: 0px;
}

/* Show the checkboxes when the dropdown is active */
.dropdown-checkboxes.active .checkboxes {
  display: block;
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
                          <h4 class="fw-bold py-3"><span class="text-muted fw-light">Forms /</span> Validation</h4>
                        </div>
                    </div>
                </div>
                <div class="content-header-right d-flex justify-content-end col-md-3 col-12">
                    <div class="form-group breadcrumb-right py-3">
                      
                      <!-- Enable backdrop (default) Offcanvas -->
                      <div class="mt-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop">
                          <span class="ti-xs ti ti-plus me-1"></span>Add Member
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
                          <div class="offcanvas-header border-bottom">
                            <h5 id="offcanvasBackdropLabel" class="offcanvas-title">New Member</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body mx-0 flex-grow-0">

                            <!-- Browser Default -->
                            <form class="browser-default-validation" method="POST" action="{{route('room-booking')}}">
                              @csrf
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-name">Name</label>
                                <input type="text" name="m_name" class="form-control" id="basic-default-name"  style="text-transform:uppercase"  placeholder="John Doe" />
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <input type="email" name="email" id="basic-default-email" class="form-control" placeholder="john.doe"/>
                              </div>
                              
  
                              <div class="mb-3">
                                <label class="form-label" for="multicol-phone">Phone Number</label>
                                <input type="number" name="phone_no" id="multicol-phone" class="form-control phone-mask" placeholder="658 799 8941" required />

                              
  
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Bhuj" />
                              </div>
    
                              <div class="col-4">
                                <label class="form-label" for="collapsible-address">Address</label>
                                <textarea name="collapsible_address"  class="form-control" id="collapsible_address" rows="1" placeholder="1456, Mall Road" ></textarea>
                              </div>
                             
                              
                              <div class="row">
                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary mb-2 d-grid w-100" >Submit</button>
                                  <button type="button" class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas"> Cancel</button>
                                </div>
                              </div>
                            </form>
                            <!-- /Browser Default -->

                            
                          </div>
                        </div>
                      </div>
                    
                    </div>
                </div>
            </div>
              
              <div class="row mb-4">
                
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
                     <form action="{{route('RoomBooking')}}" method="POST">
                        @csrf
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
                                  <option value=""></option>
                                  @foreach ($m_data as $row)  
                                      <option value="{{$row->p_id}}" {{(!empty($member) && $member->m_name == $row->m_name) ? "selected" : ""}}>{{$row->m_name}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$row->phone_no}}</option>
                                  @endforeach
                                </select>
                                
                                <input type="hidden" id="email_user" value="{{!empty($m_data)  ? $m_data:''}}">
                              </div>
    
                              <div class="col-md-4">
                            
                                  <label class="form-label" for="basic-default-email">Email</label>
                                  <input type="email" id="member_email" name="email" class="form-control" placeholder="john.doe" value="{{ (!empty($member) )? $member->email : '' }}" />

                              </div>                                                                                                            

    
                              <div class="col-md-4">
                                
                                <label class="form-label" for="multicol-phone">Phone Number</label>
                                <input type="number" id="member-phone" name="phone_no" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" value="{{ (!empty($member)) ? $member->phone_no : '' }}"  maxlength="10" minlength="10" required/>
                              </div>

                              <div class="col-md-4">
                                <label class="form-label" for="basic-default-name">Age</label>
                                <input type="text" class="form-control" name="age" id="basic-default-age" placeholder="Age" />
                              </div>
    
                              <div class="col-4">
                                <label class="form-label" for="collapsible-address">Address</label>
                               
                                
                                
                                <textarea name="collapsibleaddress"  class="form-control" id="member-address" rows="1" placeholder="1456, Mall Road">{{ (!empty($member) ) ? $member->address : '' }}</textarea>
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
                                <input type="text" class="form-control" name="city" id="member_city" placeholder="John Doe" aria-describedby="defaultFormControlHelp" value="{{ (!empty($member)) ? $member->city : '' }}" />
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

                            
                            <div class="row g-3 mb-3">

                              <!-- Custom Suggestions: List -->
                                <div class="col-md-2">
                                  <label for="TagifyCustomListSuggestion" class="form-label">A.C. Room.</label>
                                  <input id="TagifyCustomListSuggestion" name="TagifyCustomListSuggestion" class="form-control" placeholder="Select Roomlist" />
                                </div>

                                <div class="col-md-2">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control"  name="ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="ac-amount" value="800" />
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
                                    <input type="number" class="form-control"  name="non_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="non-ac-amount" value="800" />
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <label for="TagifyCustomListSuggestion2" class="form-label">Door Metri. A.C. / Non. A.C. Room </label>
                                  <input id="TagifyCustomListSuggestion2" name="TagifyCustomListSuggestion2" class="form-control" placeholder="Select Roomlist" />
                                </div>

                                <div class="col-md-2">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control"  name="door_mt_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="door-mt-amount" value="800" />
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
                              <label for="formFileMultiple" class="form-label">Identity Proof</label>
                              <input class="form-control" type="file" name="id_proof" id="formFileMultiple" multiple />
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
                              <button type="button"class="btn btn-primary btn-next"  id="repeat-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- All No of Person -->
                        <div id="address" class="content">
                          <div class="content-header mb-3">
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
                                    <input type="text" id="full_name_form"  name="full_name[]" class="form-control" placeholder="john doe" value="{{ (!empty($member) )? $member->m_name : '' }}"/>
                                  </div>
                                  <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-2">Age</label>
                                    <input type="text" id="member_age" name="m_age[]" class="form-control" placeholder="your age" />
                                  </div>
                                  
                                  
                                  <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">
                                  
                                      <label class="d-block form-label">Gender</label>
                                    
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender[]" id="inlineRadio1_${i}" value="MALE" />
                                          <label class="form-check-label" for="inlineRadio1_${i}">Male</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender[]" id="inlineRadio2_${i}" value="FEMALE" />
                                          <label class="form-check-label" for="inlineRadio2_${i}">Female</label>
                                      </div>


                                  </div>
                                  <div class="col-md-4">
                                    <label class="form-label" for="basic-default-country">Relation</label>
                                    <select class="form-select" name="relation[]" id="member_relation" required>
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
            <!--/ Content -->

            


@section('pagejs')

    
    
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/bloodhound/bloodhound.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>



    
    <!-- Page JS -->
    
    <script src="{{ asset ('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>

    <script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>

    <script src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>

    <script src="{{ asset ('assets/js/forms-extras.js') }}"></script>


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
<script>
$(document).ready(function() {
  $(".btn-dropdown").click(function() {
    $(this).parent().toggleClass("active");
  });

  // Hide the dropdown when clicking outside of it
  $(document).click(function(event) {
    if (!$(event.target).closest(".dropdown-checkboxes").length) {
      $(".dropdown-checkboxes").removeClass("active");
    }
  });
});

$(document).ready(function () {   
    $('body').on('change','#select', function() {
         $('#show_selected').val(this.value);
    });
});



</script>


<script>

  /**
 * Tagify
 */

'use strict';

(function () {
  // Basic
  //------------------------------------------------------
  const tagifyBasicEl = document.querySelector('#TagifyBasic');
  const TagifyBasic = new Tagify(tagifyBasicEl);

  // Read only
  //------------------------------------------------------
  const tagifyReadonlyEl = document.querySelector('#TagifyReadonly');
  const TagifyReadonly = new Tagify(tagifyReadonlyEl);

  // Custom list & inline suggestion
  //------------------------------------------------------
  const TagifyCustomInlineSuggestionEl = document.querySelector('#TagifyCustomInlineSuggestion');
  const TagifyCustomListSuggestionEl = document.querySelector('#TagifyCustomListSuggestion');

  const whitelist = [
    '301 2BAC',
    '302 2BAC',
    '303 2BAC',
    '304 2BAC'
    
  ];
  // Inline
  let TagifyCustomInlineSuggestion = new Tagify(TagifyCustomInlineSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: 'tags-inline',
      enabled: 0,
      closeOnSelect: false
    }
  });
  // List
  let TagifyCustomListSuggestion = new Tagify(TagifyCustomListSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: '',
      enabled: 0,
      closeOnSelect: false
    }
  });


})();


(function () {
  // Basic
  //------------------------------------------------------
  const tagifyBasicEl = document.querySelector('#TagifyBasic');
  const TagifyBasic = new Tagify(tagifyBasicEl);

  // Read only
  //------------------------------------------------------
  const tagifyReadonlyEl = document.querySelector('#TagifyReadonly');
  const TagifyReadonly = new Tagify(tagifyReadonlyEl);

  // Custom list & inline suggestion
  //------------------------------------------------------
  const TagifyCustomInlineSuggestionEl = document.querySelector('#TagifyCustomInlineSuggestion1');
  const TagifyCustomListSuggestionEl = document.querySelector('#TagifyCustomListSuggestion1');

  const whitelist = [
    '201 2BNAC',
    '202 2BNAC',
    '203 3BNAC',
    '204 4BNAC'
    
  ];
  // Inline
  let TagifyCustomInlineSuggestion = new Tagify(TagifyCustomInlineSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: 'tags-inline',
      enabled: 0,
      closeOnSelect: false
    }
  });
  // List
  let TagifyCustomListSuggestion1 = new Tagify(TagifyCustomListSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: '',
      enabled: 0,
      closeOnSelect: false
    }
  });


})();


(function () {
  // Basic
  //------------------------------------------------------
  const tagifyBasicEl = document.querySelector('#TagifyBasic');
  const TagifyBasic = new Tagify(tagifyBasicEl);

  // Read only
  //------------------------------------------------------
  const tagifyReadonlyEl = document.querySelector('#TagifyReadonly');
  const TagifyReadonly = new Tagify(tagifyReadonlyEl);

  // Custom list & inline suggestion
  //------------------------------------------------------
  const TagifyCustomInlineSuggestionEl = document.querySelector('#TagifyCustomInlineSuggestion2');
  const TagifyCustomListSuggestionEl = document.querySelector('#TagifyCustomListSuggestion2');

  const whitelist = [
    '1 DMNAC',
    '2 DMNAC',
    '3 DMNAC',
    '4 DMAC',
    '5 DMAC',
    '6 DMAC'
  ];
  // Inline
  let TagifyCustomInlineSuggestion = new Tagify(TagifyCustomInlineSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: 'tags-inline',
      enabled: 0,
      closeOnSelect: false
    }
  });
  // List
  let TagifyCustomListSuggestion2 = new Tagify(TagifyCustomListSuggestionEl, {
    whitelist: whitelist,
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      classname: '',
      enabled: 0,
      closeOnSelect: false
    }
  });


})();
</script>

<script>
        $(document).ready(function () {
            $("#select2Basic").click(function () {
                var data = $.parseJSON($("#email_user").val());
                 
                $.each(data,function(key,value){
                  console.log('id::'+$('#select2Basic').val());
                  if($('#select2Basic').val()==value['p_id']){
                   console.log(value['email']);
                   $('#member_email').val(value['email']);
                   $('#member-phone').val(value['phone_no']);
                   $('#member-address').val(value['address']);
                   $('#member_city').val(value['city']);
                   $('#full_name_form').val(value['m_name']);
                   }
                });
            
            });
        });
    </script>
   
<script>
  $(document).ready(function() {
    let currentStep = 1;

    $(".btn-next").on("click", function() {
     
     $('#member_age').val($('#basic-default-age').val());
    
    });
  });
</script>


<script>
  $(document).ready(function() {
    let currentStep = 1;

    $(".btn-next").on("click", function() {
      const selectedList1 = $('#TagifyCustomListSuggestion').val();
      const selectedList2 = $('#TagifyCustomListSuggestion1').val();
      const selectedList3 = $('#TagifyCustomListSuggestion2').val();
      const selectedDate = $('#flatpickr-datetime').val();
      const acAmount = parseFloat($('#ac-amount').val()) || 0; 
      const nonAcAmount = parseFloat($('#non-ac-amount').val()) || 0;
      const doorMtAmount = parseFloat($('#door-mt-amount').val()) || 0;

      const totalAmount = acAmount + nonAcAmount + doorMtAmount;
      const selectedRooms = 'A.C. Room: ' + selectedList1 + ', Non A.C. Room: ' + selectedList2 + ', Door Metri A.C. / Non A.C. Room: ' + selectedList3;

      $('#room_lst').text(selectedRooms);

      if (selectedDate && selectedDate.length > 0) {
        $('#check_date').text( selectedDate);
        currentStep++;
      }
      $('#room_amount').text('Total Amount: ' + totalAmount);
    });
  });
</script>






<script>
  $(document).ready(function() {
    let currentStep = 1;

    $(".btn-next").on("click", function() {
      const fullName = $('#full_name_form').val();
      const age = $('#member_age').val();
      const gender = $('input[name="inlineRadioOptions"]:checked').val();
      const relation = $('#member_relation').val();

      $('#member_full_name').text(fullName);
      $('#members_age').text(age);
      $('#member_gen').text(gender);
      $('#member_rel').text(relation);
    });
  });
  </script>

 
<script>
  $(document).ready(function() {
    $("#repeat-next").click(function() {
      console.log("click");
      let numForms = parseInt($("#no_of_person_id").val());
      if (isNaN(numForms) || numForms <= 0) {
        alert("Please enter a valid number greater than zero.");
        return;
      }

      // Clear previous forms if any
      $(".rep-form").empty();

      // Clone and show the form templates
      //console.log('form:'.$('.reo-form').children());
      for (let i = 0; i < numForms; i++) {
        let formTemplate = $(".rep-form .formrepeater").clone();
        $(".rep-form").append(
        
          '<div class="row formrepeater">'+
                                 ' <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">'+
                                   ' <label class="form-label" for="form-repeater-1-1">Full Name</label>'+
                                   ' <input type="text" id="full_name_form"  name="full_name[]" class="form-control" placeholder="john doe" value="{{ (!empty($member) )? $member->m_name : '' }}"/>'+
                                 ' </div>'+
                                 ' <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">'+
                                  '  <label class="form-label" for="form-repeater-1-2">Age</label>'+
                                  '  <input type="text" id="member_age" name="m_age[]" class="form-control" placeholder="your age" />'+
                                '  </div>'+
                                  
                                  
                                '  <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">'+
                                  
                                     ' <label class="d-block form-label">Gender</label>'+
                                     ' <div class="form-check form-check-inline">'+
                                       ' <input class="form-check-input" type="radio" name="gender[]' + i + '" id="inlineRadio1_' + i + '" value="MALE" />'+
                                       ' <label class="form-check-label" for="inlineRadio1_' + i + '">Male</label>'+
                                     ' </div>'+
                                     ' <div class="form-check form-check-inline">'+
                                      '  <input class="form-check-input" type="radio" name="gender[]' + i + '" id="inlineRadio2_' + i + '" value="FEMALE" />'+
                                      '  <label class="form-check-label" for="inlineRadio2_' + i + '">Female</label>'+
                                    '  </div>'+
                                '  </div>'+
                                 ' <div class="col-md-4">'+
                                  '  <label class="form-label" for="basic-default-country">Relation</label>'+
                                  '  <select class="form-select" name="relation[]" id="member_relation" required>'+
                                   '   <option value="SELF" selected>SELF</option>'+
                                    '  <option value="MOTHER">MOTHER</option>'+
                                    '  <option value="FATHER">FATHER</option>'+
                                    '  <option value="BROTHER">BROTHER</option>'+
                                    '  <option value="SISTER">SISTER</option>'+
                                    '  <option value="UNCLE">UNCLE</option>'+
                                    '  <option value="AUNTY">AUNTY</option>'+
                                    '  <option value="GRAND MOTHER">GRAND MOTHER</option>'+
                                    '  <option value="GRAND FATHER">GRAND FATHER</option>'+
                                    '  <option value="FRIEND">FRIEND</option>'+
                                  '  </select>'+
                                 ' </div>'+
                                 ' <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">'+
                                  '  <button class="btn btn-label-danger mt-4" data-repeater-delete>'+
                                   '   <i class="ti ti-x ti-xs me-1"></i>'+
                                   '   <span class="align-middle">Delete</span>'+
                                  '  </button>'+
                                  '</div>'+
                               ' </div>'
        );
      }

      // Display the forms container
      $(".rep-form").show();
    });
  });
</script>

<script>
$(document).ready(function() {
    $(".btn-submit").click(function() {
      //console.log("click");
      
        alert("submited............");
      
      
    });
  });
</script>


















@endsection

@endsection

