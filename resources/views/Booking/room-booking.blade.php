
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
                             
                              <div class="mb-3">
                            <form class="browser-default-validation" method="POST" tabindex="1" action="{{route('room-booking')}}">
                            @csrf
                                <label class="form-label required" for="basic-default-name"  >Name</label>
                                <input type="text" name="m_name" class="form-control" style="text-transform:uppercase" id="basic-default-name"  style="text-transform:uppercase"  placeholder="Name" required />
                              </div>
                              
                              <div class="mb-3">
                                <label class="form-label" for="multicol-phone"><span class="required">Phone Number</span></label>
                                <input type="text" name="phone_no" id="multicol-phone" class="form-control phone-mask" placeholder="658 799 8941"pattern="[1-9]{1}[0-9]{9}" maxlength="10" required/>
                                                          <div id="error" class="error-message" ></div>
                              </div>

                              <div class="mb-3">
                                        <label class="form-label" for="basic-default-email">Email</label>
                                        <input type="email" name="email" id="basic-default-email" class="form-control" placeholder="Email" required/>
                                    </div>
                              <div class="mb-3">
                                <label class="form-label" for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city" style="text-transform:uppercase" placeholder="Bhuj" required/>
                              </div>
    
                              <div class="row">
                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary mb-2 d-grid w-100" id="submitbtn" >Submit</button>
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
                <div class="col-12 mb-4" id="wizard-validation">
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
                    <form class="browser-default-validation"  action="{{ route('RoomBooking') }}" method="POST" id="room_booking">

                        @csrf
                        <!-- Account Details -->
                        <div id="account-details" class="content">
                          <div class="content-header mb-3">
                            <small>Enter Your Personal Details.</small>
                          </div>
                          <div class="row g-3">
                            
                              <!-- Basic -->
                             <div class="col-md-4">
                                <label for="select2Basic" class="form-label"><span class="required">Name</span></label>
                                <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="name" placeholder="select name" required>
                                  <option value=""></option>
                                  @foreach ($m_data as $row)  
                                      <option value="{{$row->p_id}}">{{$row->m_name}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$row->phone_no}}</option>
                                  @endforeach
                                </select>
                               
                                
                                <input type="hidden" id="email_user" value="{{!empty($m_data)  ? $m_data:''}}">
                              </div>
                              
                              <div class="col-md-4">
                                
                                <label class="form-label" for="multicol-phone"><span class="required">Phone Number</span></label>
                                <input type="number" id="member-phone" name="phone_no" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" value="{{ (!empty($member)) ? $row->phone_no : '' }}"    maxlength="10"
                                  required
                                  oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);"/>
                                  </div>
    
                              <div class="col-md-4">
                                  <label class="form-label" for="basic-default-email"><span class="required">Email</span></label>
                                  <input type="email" id="member_email" name="email" class="form-control" placeholder="john@gmail.com" value="{{ (!empty($member) )? $member->email : '' }}" required/>
                              
                              </div>
                              <div class="col-md-4">
                                <label class="form-label" for="basic-default-name"><span class="required">Age</span></label>
                                <input type="number" class="form-control" name="age" id="basic-default-age" placeholder="Age" oninput="format(this)" required/>
                              </div>

    
                              <div class="col-4">
                                <label class="form-label" for="collapsible-address"><span class="required">Address</span></label>
                                <textarea name="collapsibleaddress" style="text-transform:uppercase" class="form-control" style="text-transform:uppercase" id="member-address" rows="1" placeholder="1456, Mall Road" required>{{ (!empty($member) ) ? $member->address : '' }}</textarea>
                                <div id="addres" class="error-message" ></div></div>
                                                        
                              
                              <!-- Basic -->
                              <div class="col-md-4">
                                <label for="select2Basic" class="form-label"><span class="required">Community</span></label>
                                <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="community" required>
                                  <option value="Hindu" selected>Hindu</option>
                                  <option value="Jain">Jain</option>
                                  <option value="Isalam">Muslim</option>
                                  <option value="Sikh">Sikh</option>
                                  <option value="Budda">Buddhist</option>
                                  <option value="Other Religions">Other Religions</option>


                                </select>
                              </div>

                              

                              
                              <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label"><span class="required">Sub Community</span></label>
                                <input type="text" class="form-control" name="subcommunity" id="defaultFormControlInput" style="text-transform:uppercase" aria-describedby="defaultFormControlHelp" required/>
                              </div>


                              <div class="col-md-4">
                                <label for="formFileMultiple" class="form-label"><span class="required">Identity Proof</span></label>
                                <input class="form-control" type="file" name="id_proof[]" id="formFileMultiple" multiple required />
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-name"><span class="required">No. of Person</span></label>
                              <input type="text"  class="form-control check-field"  name="no_of_person" id="no_of_person_id" placeholder="No of Person" value="1" maxlength="1"  oninput="this.value=this.value.replace(/[^1-9]/g,'');"  required/>
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="deposit-amount"><span class="required">No of Days</span></label>
                              <input type="number" class="form-control" name="no_of_days" id="no_of_days" placeholder="No Of Days" required>
                            </div>
                            
                            <div class="col-md-4">
                              <label class="form-label" for="rupees-in-words"><span class="required">Occupation</span></label>
                              <input type="text" class="form-control" style="text-transform:uppercase" name="occupation" id="occupation" placeholder="Occupation" required/>
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="rupees-in-words"><span class="required">Reason</span></label>
                              <input type="text" class="form-control" style="text-transform:uppercase" name="reason" id="reason" placeholder="Reason to stay" required/>
                            </div>

                              
                              
                              <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label"><span class="required">City</span></label>
                                <input type="text" class="form-control" name="city" id="member_city" style="text-transform:uppercase" placeholder="city" aria-describedby="defaultFormControlHelp" value="{{ (!empty($member)) ? $member->city : '' }}" required/>
                              </div>


                              <div class="col-md-4">
                                <label class="d-block form-label"><span class="required">Gender</span></label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="personalRadio1" value="MALE" checked/>
                                  <label class="form-check-label" for="inlineRadio1" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="personalRadio2" value="FEMALE" />
                                  <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                
                              </div>
    
                              <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-next" id="btn-step1">
                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                  <i class="ti ti-arrow-right"></i>
                                </button>
                              </div>
                          </div>
                        </div>
                        <!--member details-->
                        <div id="address" class="content">
                            <div class="content-header mb-3">
                              <small>Enter Member Details.</small>
                            </div>
                          <div class="row g-3">
                              <!-- Form Repeater -->
                            <div class="form-repeater">
                              <div id="step2FormsContainer "class="col-12">
                                <div class="dynamic-form">
                                  <div class="all-members" >
                                    <div data-repeater-item>
                                      <div class="rep-form1">
                                        <div class="row formrepeater1">
                                          <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-1-1">Full Name</label>
                                            <input type="text" id="full_name_form"  name="full_name0" class="form-control" placeholder="john doe" value="{{ (!empty($member) )? $member->m_name : '' }}" onkeydown="return /[a-z]/i.test(event.key)" />
                                          </div>
                                          <div class="mb-3 col-lg-4 col-xl-3 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-1-2">Age</label>
                                            <input type="text" id="member_age" name="m_age0" class="form-control" placeholder="your age" oninput="format(this)" />
                                          </div>
                                          <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">
                                              <label class="d-block form-label">Gender</label>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender0" id="gendermale" value="MALE" checked/>
                                                <label class="form-check-label" for="gender">Male</label>

                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender0" id="genderfemale" value="FEMALE" />
                                                    <label class="form-check-label" for="gender">Female</label>
                                                  </div>
                                                  <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" hidden>
                                                  <label class="form-label" for="form-repeater-1-2">gender</label>
                                                  <input type="text" id="gender_data" name="gender_data0" class="form-control" placeholder="your age" value="MALE"/>
                                                </div>
                                          </div>
                                          <div class="col-md-3">
                                            <label class="form-label" for="basic-default-country">Relation</label>
                                            <select class="form-select" name="relation0" id="member_relation" required>
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
                                          <div class="mb-3 col-lg-12 col-xl-1 col-12 d-flex align-items-center mb-0">
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
                            </div>
                            
                            <!-- /Form Repeater -->
                                    <div class="col-12 d-flex justify-content-between">
                                      <button class="btn btn-label-secondary btn-prev">
                                        <i class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                      </button>
                                      <button type="button" class="btn btn-primary btn-next" id="btn-step3">
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
                           
                            <div class="row">
                            <div class="col-md-2">
                                <label for="select2Multiple1" class="form-label">Ac Room</label> 
                              
                                <select id="select2Multiple11" name="select2Multiple1[]" class="select2 form-select" multiple>
                                  @foreach($a_list as $list)
                                      @if ($list->room_facility == 'A.C. Room')
                                          <option value="{{$list->room_no}}"{{(!empty($member) && $member->room_name == $list->room_name) ? "selected" : ""}}>
                                              {{$list->room_no}}-{{$list->room_name}}
                                          </option>
                                      @endif
                                  @endforeach
                              </select>
                            </div>

                                <div class="col-md-2">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control"  name="ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="ac-amount" />
                                  </div>
                                </div>


                                <!-- <div class="col-md-2">
                                  <label for="TagifyCustomListSuggestion1" class="form-label">Non. A.C. Room</label>
                                  <input id="TagifyCustomListSuggestion1" name="TagifyCustomListSuggestion1" class="form-control" placeholder="Select Roomlist" />
                                </div> -->
                                <div class="col-md-2">
                                <label for="select2Multiple2" class="form-label">Non Ac Room</label>
                                <select id="select2Multiple22" name="select2Multiple2[]" class="select2 form-select" multiple>
                                 
                                @foreach ($a_list as $list)
                                                @if ($list->room_facility == 'NON A.C ROOM')
                                                    <option value="{{$list->room_no}}"{{(!empty($member) && $member->room_name == $list->room_name) ? "selected" : ""}}>
                                                        {{$list->room_no}}-{{$list->room_name}}
                                                    </option>
                                                @endif
                                  @endforeach
                                 
                                </select>
                              </div>

                                <div class="col-md-2">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control"  name="non_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="non-ac-amount" />
                                  </div>
                                </div>

                                <!-- <div class="col-md-2">
                                  <label for="TagifyCustomListSuggestion2" class="form-label">Door Metri. A.C. / Non. A.C. Room </label>
                                  <input id="TagifyCustomListSuggestion2" name="TagifyCustomListSuggestion2" class="form-control" placeholder="Select Roomlist" />
                                </div> -->
                                <div class="col-md-2">
                                <label for="select2Multiple3" class="form-label">Door Mt Room</label>
                                <select id="select2Multiple33" name="select2Multiple3[]" class="select2 form-select" multiple>
                                
                                @foreach ($a_list as $list)
                                @if ($list->room_facility == 'DOOR MATRY NON A.C ROOM' || $list->room_facility == 'DOOR MATRY  A.C ROOM')
                                    <option value="{{$list->room_no}}"{{(!empty($member) && $member->room_name == $list->room_name) ? "selected" : ""}}>
                                        {{$list->room_no}}-{{$list->room_name}}
                                    </option>
                                @endif
                                  @endforeach
                                 
                                </select>
                              </div>

                                <div class="col-md-2">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control"  name="door_mt_amount" id="door_mt_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)"   />
                                  </div>
                                </div>
  
                            </div>
                         
                            <hr>
                            <div class="col-md-4">

                              <label class="form-label" for="basic-default-name">Booking No</label>
                              <input type="text" class="form-control" name="deposit_no" id="deposit_no" placeholder="Deposit No" value="{{$p_id+1}}" readonly/>
                            </div>
                            

                            <!-- Datetime Picker-->
                            <div class="col-md-4">
                              <label for="flatpickr-datetime" class="form-label"><span class="required">Check-In Date</span></label>
                              <input type="text" class="form-control" name="check_in_date" placeholder="DD-MM-YYYY HH:MM" id="flatpickr-datetime" required/>
                            </div>
  
                            <div class="col-md-4">
                              <label class="form-label" for="deposit-amount"><span class="required">Deposit Rs</span></label>
                              <input type="number" class="form-control check-field" name="deposite_rs" id="deposit-amount" placeholder="Deposit Rs" required/>
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
                            
                              <button type="button"class="btn btn-primary btn-next"  id="repeat-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- All No of Person -->
                    
                       
                        
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
                                        
                                        
                                        <tr>
                                          <td class="pe-4">Room Name:</td>
                                          <td id="room_lst"></td>
                                        </tr>
                                        <tr>
                                          <td class="pe-4">Check-In Date:</td>
                                          <td id="check_date"></td>
                                        </tr>
                                        <tr>
                                          <td class="pe-4">Amount:-</td>
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
                                  <tbody class="rep-table">
                                   
                                 
                                      <tr>
                                        <td></td>
                                        <td id="member_full_name" ></td>
                                        <td id="members_age"></td>
                                        <td id="member_gen"></td>
                                        <td id="member_rel"></td>
                                      
                                      </tr>
                                      
                                                                       
                                 
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
                          
                            <button type="submit" id="submit-button" class="btn btn-success btn-submit">Submit</button>


                            
                            
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

     @if(session('new_member') === 1)
        <script>
             var member_id=[];
          var temp=document.getElementById('select2Basic');
          var value;
          for(i=0;i<temp.options.length;i++)
            {
              member_id[i]=temp.options[i].value;
              value=member_id[i];
            }
            $("#select2Basic option[value=" + value + "]").attr('selected', 'selected');
            $.ajax({
                url:"{{url('get_member')}}",
                type:'GET',
                success:function(response){
                  $('#member_email').val(response['email']);
                  $('#member-phone').val(response['phone_no']);
                  $('#member_city').val(response['city']);
                  $('#full_name_form').val(response['m_name']);
                }
              });
        </script>
    @endif
    <script>
      $("#multicol-phone").focusout(function(){
        var contact=document.getElementById("multicol-phone").value;
        $.ajax({
                url:"{{url('check_num')}}"+"/"+ contact,
                type:'GET',
                success:function(response){
                    if(response==1)
                      { $("#submitbtn").prop('disabled',true);
                        $("#error").html("Phone no alraedy exit");
                      }
                    else{ $("#submitbtn").prop('disabled',false);
                    $("#error").html("");}
                    }
                });
      });
      $("#submitbtn").click(function(){
    var name = document.getElementById("basic-default-name").value;
    var phone = document.getElementById("multicol-phone").value;
    var email = document.getElementById("basic-default-email").value;
    var city = document.getElementById("city").value;
    $.ajax({
        method: "POST",
        url: "{{ url('add_member') }}",
        data: {
            _token: $("#csrf").val(),
            name: name,
            email: email,
            phone: phone,
            city: city
        },
        success: function(response){
          
          $("#member_email").val(response[0]['email']); // Assuming the server returns a JSON object with a “name” property
        }
    });
});
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
<script>
//      $("#btn-step1").hover(function(){
//       var age=document.getElementById("basic-default-age").value;
//         var address=document.getElementById("member-address").value;
//         var subcommunity=document.getElementById("defaultFormControlInput").value;
//         var city=document.getElementById("member_city").value;
//         if(age === ""){ $("#age").html("Enter Age");} else{ $("#age").html("");}
//         if(address === ""){ $("#addres").html("Enter Address");} else{ $("#addres").html("");}
//         if(subcommunity === ""){ $("#scommunity").html("Enter Subcommunity");} else{ $("#scommunity").html("");}
//         if(city === ""){ $("#city1").html("Enter City");} else{ $("#city1").html("");}
//       });
//       $("#repeat-next").hover(function(e){
//         var noofperson=document.getElementById("no_of_person_id").value;
//         var idproof=document.getElementById("formFileMultiple").value;
//         var deposite=document.getElementById("deposit-amount").value;
//         var noofdays=document.getElementById("no_of_days").value;
//         var occupation1=document.getElementById("occupation").value;
//         var reason1=document.getElementById("reason").value;
//         if(noofperson === ""){ $("#noofperson").html("Enter No of Person");} else{ $("#noofperson").html("");}
//         if(idproof === ""){ $("#idproof").html("Upload Idproof");} else{ $("#idproof").html("");}
//         if(deposite === ""){ $("#deposite").html("Enter Deposite Amount");} else{ $("#deposite").html("");}
//         if(noofdays === ""){ $("#noofdays").html("Enter No of Days");} else{ $("#noofdays").html("");}
//         if(occupation1 === ""){ $("#occupation1").html("Enter Occupation");} else{ $("#occupation1").html("");}
//         if(reason1 === ""){ $("#reason1").html("Enter Reason");} else{ $("#reason1").html("");}
//       });
//     $(document).ready(function() {
//       $(".btn-dropdown").click(function() {
//       $(this).parent().toggleClass("active");
//     });

//   // Hide the dropdown when clicking outside of it
//   $(document).click(function(event) {
//     if (!$(event.target).closest(".dropdown-checkboxes").length) {
//       $(".dropdown-checkboxes").removeClass("active");
//     }
//   });
// });

$(document).ready(function () {   
    $('#personalRadio2').change(function(){
      $("#genderfemale").attr('checked',true);
      $("#gender_data").val("FEMALE");
    });
    $('#personalRadio1').change(function(){
      $("#gendermale").attr('checked',true);
      $("#gender_data").val("MALE");
    });
});



</script>
<script>
  $(document).ready(function() {
    $('#select2Multiple1').select2();
  });
</script>


<!-- <script>

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
</script> -->

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



  <!-- <script>
     $(document).ready(function () {
            $("#TagifyCustomListSuggestion").click(function () {
                var data = $.parseJSON($("#roomlist").val());
                 
                $.each(data,function(key,value){
                  console.log('id::'+$('#TagifyCustomListSuggestion').val());
                  if($('#TagifyCustomListSuggestion').val()==value['room_no']){
                   $('#TagifyCustomListSuggestion').val(value['TagifyCustomListSuggestion']);
                   
                   }
                });
            
            });
        });
  </script> -->
  <script>
 
</script>
 



   
<script>
 
  $(document).ready(function() {
    // let currentStep = 1;
    // var currentDateTime = new Date();

    // $('#flatpickr-datetime').flatpickr({
    //   enableTime: true,
    //   dateFormat: "d-m-Y H:i",
    //   defaultDate: currentDateTime
    // });
    $("#repeat-next").on("click", function() {

      const selectedList1 = $('#select2Multiple11').val();
      const selectedList2 = $('#select2Multiple22').val();
      const selectedList3 = $('#select2Multiple33').val();
      const selectedDate = $('#flatpickr-datetime').val();
      const acAmount = parseFloat($('#ac-amount').val()) || 0; 
      const nonAcAmount = parseFloat($('#non-ac-amount').val()) || 0;
      const doorMtAmount = parseFloat($('#door_mt_amount').val()) || 0;

      const totalAmount = acAmount + nonAcAmount + doorMtAmount;

      $('#room_amount').text( totalAmount);
      const selectedRooms = 'A.C. Room:= ' + selectedList1 + ', Non A.C. Room:= ' + selectedList2 + ', Door Metri A.C. / Non A.C. Room:= ' + selectedList3;
      $('#room_lst').text(selectedRooms);

      if (selectedDate && selectedDate.length > 0) {
        $('#check_date').text( selectedDate);
      }
     
    });
  });
</script>

<script>
  $(document).ready(function() {
    let currentStep = 1;
 
    $("#repeat-next").on("click", function() {
      $(".rep-table").empty();
      const fullName = $('#full_name_form').val();
      const age = $('#members_age').val();
      const selectedGender = $('input[name="gender"]').val();
      const relation = $('#member_relation').val();

      $('#member_full_name').text(fullName);
      $('#members_age').text(age);
      $('#member_gen').text(selectedGender);
      $('#member_rel').text(relation);

      $(".rep-table").append(
        '<tr>' +
        '<td>'+ '1' +'</td>' +
        '<td id="member_full_name">' + $('#full_name_form').val() + '</td>' +
        '<td id="members_age">' + $('#member_age').val() + '</td>' +
        '<td id="member_gen">' + $('#gender_data').val() + '</td>' +
        '<td id="member_rel">' + $('#member_relation').val() + '</td>' +
        '</tr>'
      );

      let numForms = parseInt($("#no_of_person_id").val());
     
      if (isNaN(numForms) || numForms <= 0) {
       
        return false;
      } let j=2;
      for (let i = 1; i < numForms; i++) {
       
     
        $(".rep-table").append(
        '<tr>' +
        '<td>'+ j +'</td>' +
        '<td class="member_full_name' + i + '">' + $('#full_name_form' + i).val().toUpperCase() + '</td>' +
        '<td class="members_age' + i + '">' + $('#member_age' + i).val() + '</td>' +
        '<td class="member_gen'+ i +'">' + $('input[name="gender'+i+'"]:checked').val() + '</td>' +
        '<td class="member_rel' + i + '">' + $('#member_relation' + i).val() + '</td>' +
        '</tr>'
         );

       
        j++;

        // Setting text for elements in the loop using jQuery
        // $('.member_full_name' + i).text($('#full_name_form' + i).val());
        // $('.members_age' + i).text($('#member_age' + i).val());
        // $('.member_gen' + i).text($('#gender'+i).val());
        // $('.member_rel' + i).text($('#member_relation' + i).val());
        // j++;
      }

      $(".rep-table").show();
    });
  });
</script>


 
<script>
  $(document).ready(function() {
    $("#btn-step1").click(function() {
      console.log("click");
      $('#member_age').val($('#basic-default-age').val());
      let numForms = parseInt($("#no_of_person_id").val());


      // Clear previous forms if any
      $(".rep-form").empty();

      // Clone and show the form templates
      //console.log('form:'.$('.reo-form').children());
      for (let i = 1; i < numForms; i++) {
        let formTemplate = $(".rep-form .formrepeater").clone();
        $(".rep-form").append(

          '<div class="row formrepeater">'+
                                 ' <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">'+
                                   ' <label class="form-label" for="form-repeater-1-1">Full Name</label>'+
                                   ' <input type="text" id="full_name_form'+i+'" style="text-transform:uppercase" name="full_name'+i+'" class="form-control" placeholder="john doe" value="{{ (!empty($member) )? $member->m_name : '' }}"/>'+
                                 ' </div>'+
                                 ' <div class="mb-3 col-lg-4 col-xl-3 col-12 mb-0">'+
                                  '  <label class="form-label" for="form-repeater-1-2">Age</label>'+
                                  '  <input type="number" id="member_age'+i+'" name="m_age'+i+'" class="form-control" placeholder="your age" />'+
                                '  </div>'+
                                  
                                  
                                '  <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">'+
                                  
                                     ' <label class="d-block form-label">Gender</label>'+
                                     ' <div class="form-check form-check-inline">'+
                                       ' <input class="form-check-input" type="radio" name="gender'+i+'" id="gendermale' + i + '" value="MALE" checked/>'+
                                       ' <label class="form-check-label" for="inlineRadio1' + i + '">Male</label>'+
                                     ' </div>'+
                                     ' <div class="form-check form-check-inline">'+
                                      '  <input class="form-check-input" type="radio" name="gender'+i+'" id="genderfemale' + i + '" value="FEMALE" />'+
                                      '  <label class="form-check-label" for="inlineRadio2' + i + '" selected>Female</label>'+
                                    '  </div>'+
                                '  </div>'+
                                '    <div class="col-md-3">'+
                                    '  <label class="form-label" for="basic-default-country">Relation</label>'+
                                    '  <select class="form-select" name="relation'+i+'" id="member_relation'+i+'" required>'+
                                    '   <option value="" disabled selected>Select relation</option>'+
                                    '  <option value="AUNTY">AUNTY</option>'+
                                    '  <option value="BROTHER">BROTHER</option>'+
                                    '  <option value="COUSIN">COUSIN</option>'+
                                    '  <option value="DAUGHTER">DAUGHTER</option>'+
                                    '  <option value="FATHER">FATHER</option>'+
                                    '  <option value="FRIEND">FRIEND</option>'+
                                    '  <option value="GRAND FATHER">GRAND FATHER</option>'+
                                    '  <option value="GRAND MOTHER">GRAND MOTHER</option>'+
                                    '  <option value="HUSBAND">HUSBAND</option>'+
                                    '  <option value="MOTHER">MOTHER</option>'+
                                    '  <option value="NEPHEW">NEPHEW</option>'+
                                    '  <option value="SISTER">SISTER</option>'+
                                    '  <option value="UNCLE">UNCLE</option>'+
                                    '  <option value="WIFE">WIFE</option>'+
                        
                                  '  </select>'+
                                 ' </div>'+
                               ' </div>'
        );
      }

      // Display the forms container
      $(".rep-form").show();
    });
  });
</script>
<!-- 
<script>
 $("#room_booking").submit(function(){

      var address = document.getElementById('member-address').value;
      var city = document.getElementById('member_city').value;
    
  
      if (address  === '' && city === '' ) {
  
          Swal.fire({
              text: "Sorry, looks like there are some errors detected, please try again.",
              icon: "error",
              buttonsStyling: false,
              confirmButtonText: "Ok, got it!",
              customClass: {
                  confirmButton: "btn btn-primary"
              }
          });
          return false; // Prevent form submission
      } else {
          Swal.fire({
              text: "Form has been successfully submitted!",
              icon: "success",
              buttonsStyling: false,
              confirmButtonText: "Ok, got it!",
              customClass: {
                  confirmButton: "btn btn-primary"
              }
          }).then(function(t) {
              if (t.isConfirmed) {
                  location.reload();
              }
          });
      }
  });
  </script> -->
</script>
<script>
  function format(input){
    if(input.value < 0) input.value=Math.abs(input.value);
    if(input.value.length > 2) input.value = input.value.slice(0, 2);
    
}
</script>
<script>
const contactInput = document.getElementById('phone_no');

contactInput.addEventListener('input', function () {
  const desiredLength = 10;
  const inputValue = this.value.trim();
  
  if (inputValue.length !== desiredLength) {
    this.setCustomValidity(`Contact number should be exactly ${desiredLength} digits.`);
  } else {
    this.setCustomValidity('');
  }
});

</script>





<script src="{{ asset ('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>

@endsection

@endsection

