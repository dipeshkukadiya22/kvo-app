@extends('layouts.app')

@section('title', 'Room Booking')

@section('pagecss')

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/tagify/tagify.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/dropzone/dropzone.css') }}" />

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
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasBackdrop"
                          aria-controls="offcanvasBackdrop">
                          <span class="ti-xs ti ti-plus me-1"></span>Add Member
                        </button>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasBackdrop"
                          aria-labelledby="offcanvasBackdropLabel">
                          <div class="offcanvas-header border-bottom">
                            <h5 id="offcanvasBackdropLabel" class="offcanvas-title">New Member</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body mx-0 flex-grow-0">

                            <!-- Browser Default -->
                            <form class="browser-default-validation">
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-name">Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="basic-default-name"
                                  placeholder="John Doe"
                                   />
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <input
                                  type="email"
                                  id="basic-default-email"
                                  class="form-control"
                                  placeholder="john.doe"
                                   />
                              </div>
                              
  
                              <div class="mb-3">
                                <label class="form-label" for="multicol-phone">Phone Number</label>
                                <input
                                  type="number"
                                  id="multicol-phone"
                                  class="form-control phone-mask"
                                  placeholder="658 799 8941"
                                  aria-label="658 799 8941" />
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="city">City</label>
                                <input type="text" class="form-control" id="city" placeholder="Bhuj" />
                              </div>
    
                              <div class="mb-3">
                                <label class="form-label" for="collapsible-address">Address</label>
                                <textarea
                                  name="collapsible-address"
                                  class="form-control"
                                  id="collapsible-address"
                                  rows="2"
                                  placeholder="1456, Mall Road"></textarea>
                              </div>
                              
                              <div class="row">
                                <div class="col-12">
                                  <button type="button" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
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
                      <form class="form-repeater" onSubmit="return false">
                        <!-- Account Details -->
                        <div id="account-details" class="content">
                          <div class="content-header mb-3">
                            <small>Enter Your Personal Details.</small>
                          </div>
                          <div class="row g-3">
                            
                              <!-- Basic -->
                              <div class="col-md-4">
                                <label for="select2Basic" class="form-label">Name</label>
                                <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" required>
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
                                  <option value="NM">New Mexico</option>
                                  <option value="ND">North Dakota</option>
                                  <option value="UT">Utah</option>
                                  <option value="WY">Wyoming</option>
                                  <option value="AL">Alabama</option>
                                  <option value="AR">Arkansas</option>
                                  <option value="IL">Illinois</option>
                                  <option value="IA">Iowa</option>
                                  <option value="KS">Kansas</option>
                                  <option value="KY">Kentucky</option>
                                  <option value="LA">Louisiana</option>
                                  <option value="MN">Minnesota</option>
                                  <option value="MS">Mississippi</option>
                                  <option value="MO">Missouri</option>
                                  <option value="OK">Oklahoma</option>
                                  <option value="SD">South Dakota</option>
                                  <option value="TX">Texas</option>
                                  <option value="TN">Tennessee</option>
                                  <option value="WI">Wisconsin</option>
                                  <option value="CT">Connecticut</option>
                                  <option value="DE">Delaware</option>
                                  <option value="FL">Florida</option>
                                  <option value="GA">Georgia</option>
                                  <option value="IN">Indiana</option>
                                  <option value="ME">Maine</option>
                                  <option value="MD">Maryland</option>
                                  <option value="MA">Massachusetts</option>
                                  <option value="MI">Michigan</option>
                                  <option value="NH">New Hampshire</option>
                                  <option value="NJ">New Jersey</option>
                                  <option value="NY">New York</option>
                                  <option value="NC">North Carolina</option>
                                  <option value="OH">Ohio</option>
                                  <option value="PA">Pennsylvania</option>
                                  <option value="RI">Rhode Island</option>
                                  <option value="SC">South Carolina</option>
                                  <option value="VT">Vermont</option>
                                  <option value="VA">Virginia</option>
                                  <option value="WV">West Virginia</option>
                                </select>
                              </div>
    
                              <div class="col-md-4">
                                  <label class="form-label" for="basic-default-email">Email</label>
                                  <input
                                    type="email"
                                    id="basic-default-email"
                                    class="form-control"
                                    placeholder="john.doe"
                                     />
                                
                              </div>
    
                              <div class="col-md-4">
                                <label class="form-label" for="multicol-phone">Phone Number</label>
                                <input
                                  type="number"
                                  id="multicol-phone"
                                  class="form-control phone-mask"
                                  placeholder="658 799 8941"
                                  aria-label="658 799 8941" />
                              </div>

                              <div class="col-md-4">
                              <label class="form-label" for="basic-default-name">Age</label>
                              <input
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                placeholder="Age"
                                 />
                            </div>
    
                              <div class="col-4">
                                <label class="form-label" for="collapsible-address">Address</label>
                                <textarea
                                  name="collapsible-address"
                                  class="form-control"
                                  id="collapsible-address"
                                  rows="1"
                                  placeholder="1456, Mall Road"></textarea>
                              </div>
                                                        
                              <div class="col-md-4">
                                <label class="form-label" for="basic-default-dob">DOB</label>
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                              </div>

                              <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Community</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="defaultFormControlInput"
                                  placeholder="John Doe"
                                  aria-describedby="defaultFormControlHelp" />
                              </div>
                              
                              <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">City</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="defaultFormControlInput"
                                  placeholder="John Doe"
                                  aria-describedby="defaultFormControlHelp" />
                              </div>
                              <div class="col-md-4">
                                <label class="d-block form-label">Gender</label>
                                <div class="form-check form-check-inline">
                                  <input
                                    class="form-check-input"
                                    type="radio"
                                    name="inlineRadioOptions"
                                    id="inlineRadio1"
                                    value="option1" />
                                  <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input
                                    class="form-check-input"
                                    type="radio"
                                    name="inlineRadioOptions"
                                    id="inlineRadio2"
                                    value="option2" />
                                  <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                
                              </div>
    
                            <div class="col-12 d-flex justify-content-end">
                              {{-- <button class="btn btn-label-secondary btn-prev" disabled>
                                <i class="ti ti-arrow-left me-sm-1"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button> --}}
                              <button class="btn btn-primary btn-next">
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
                            
                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-name">No. of Person</label>
                              <input
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                placeholder="No of Person"
                                 />
                            </div>

                            
  
                            <!-- Datetime Picker-->
                            <div class="col-md-4">
                              <label for="flatpickr-datetime" class="form-label">Check-In Date</label>
                              <input
                                type="text"
                                class="form-control"
                                placeholder="DD-MM-YYYY HH:MM"
                                id="flatpickr-datetime" />
                            </div>
                            <!-- /Datetime Picker-->
  
                            
                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-country">Room List</label>
                              <select class="form-select" id="basic-default-country" required>
                                <option value="">Select Room</option>
                                <option value="room-1">Room 1</option>
                                <option value="room-2">Room 2</option>
                                <option value="room-3">Room 3</option>
                              </select>
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-country">Room Facility</label>
                              <select class="form-select" id="basic-default-country" required>
                                <option value="">Select Room</option>
                                <option value="room-1">A.C. Room No.</option>
                                <option value="room-2">Non. A.C. Room No.</option>
                                
                              </select>
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-name">Amount</label>
                              <div class="input-group">
                                
                                <span class="input-group-text">₹</span>
                                <input
                                  type="number"
                                  class="form-control"
                                  placeholder="Amount"
                                  aria-label="Amount (to the nearest indian)" />
                              </div>
                            </div>
  
                           
  
                            <div class="col-md-4">
                              <label for="formFileMultiple" class="form-label">Identity Proof</label>
                              <input class="form-control" type="file" id="formFileMultiple" multiple />
                            </div>
  
                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-name">Deposit No</label>
                              <input
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                placeholder="Deposit No"
                                 />
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-name">Door Metri No: </label>
                              <input
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                placeholder="Door Metri No"
                                 />
                            </div>
  
                            <div class="col-md-4">
                              <label class="form-label" for="deposit-amount">Deposit Rs</label>
                              <input type="text" class="form-control" id="deposit-amount" placeholder="Deposit Rs">
                            </div>
                            
                            <div class="col-md-4">
                              <label class="form-label" for="rupees-in-words">Deposit Rs (rupees in words)</label>
                              <input type="text" class="form-control" id="rupees-in-words" placeholder="Rupees in words">
                            </div>
                            
  
                            
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
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
                            <div class="col-12">
                              <div class="all-members" data-repeater-list="group-a">
                              <div data-repeater-item>
                                <div class="row">
                                  <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-1">Full Name</label>
                                    <input type="text" id="form-repeater-1-1" class="form-control" placeholder="john doe" />
                                  </div>
                                  <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-2">Age</label>
                                    <input
                                      type="text"
                                      id="form-repeater-1-2"
                                      class="form-control"
                                      placeholder="your age" />
                                  </div>
                                  
                                  
                                  <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-3">Gender</label>
                                    <select id="form-repeater-1-3" class="form-select">
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                  </div>
                                  <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-4">Relations</label>
                                    <input
                                      type="text"
                                      id="form-repeater-1-4"
                                      class="form-control"
                                      placeholder="Add Relation" />
                                  </div>
                                  <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                    <button class="btn btn-label-danger mt-4" data-repeater-delete>
                                      <i class="ti ti-x ti-xs me-1"></i>
                                      <span class="align-middle">Delete</span>
                                    </button>
                                  </div>
                                </div>
                                <hr />
                              </div>
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
                              <button class="btn btn-primary btn-next">
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
                                        <tr>
                                          <td class="pe-4">Room Name:</td>
                                          <td><strong>Room 2</strong></td>
                                        </tr>
                                        <tr>
                                          <td class="pe-4">Room Facility</td>
                                          <td>A.C. Room No</td>
                                        </tr>
                                        <tr>
                                          <td class="pe-4">Check-In Date:</td>
                                          <td>12-08-2023 11:00 am</td>
                                        </tr>
                                        <tr>
                                          <td class="pe-4">Amount:</td>
                                          <td>7500</td>
                                        </tr>
                                        <tr>
                                          <td class="pe-4">SWIFT code:</td>
                                          <td>BR91905</td>
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
                                      <td>1</td>
                                      <td class="text-nowrap">Dipesh K</td>
                                      <td class="text-nowrap">27</td>
                                      <td>Male</td>
                                      <td>Self</td>
                                     
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td class="text-nowrap">Junaid K</td>
                                      <td class="text-nowrap">27</td>
                                      <td>Male</td>
                                      <td>Brother</td>
                                     
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td class="text-nowrap">Karan M</td>
                                      <td class="text-nowrap">20</td>
                                      <td>Male</td>
                                      <td>Brother</td>
                                     
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td class="text-nowrap">Sahil</td>
                                      <td class="text-nowrap">20</td>
                                      <td>Male</td>
                                      <td>Brother</td>
                                     
                                    </tr>
                                    <tr>
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
                            <button class="btn btn-success btn-submit">Submit</button>
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

    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>


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


@endsection

@endsection


