@extends('layouts.app')

@section('title', 'Room Booking')

@section('pagecss')

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/tagify/tagify.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/dropzone/dropzone.css') }}" />

<style>
  @media (min-width: 768px){
    .content-header > .text-md-right {
        text-align: right !important;
    }
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
                          <span class="ti-xs ti ti-plus me-1"></span>Add New User
                        </button>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasBackdrop"
                          aria-labelledby="offcanvasBackdropLabel">
                          <div class="offcanvas-header border-bottom">
                            <h5 id="offcanvasBackdropLabel" class="offcanvas-title">New User</h5>
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
                                  required />
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <input
                                  type="email"
                                  id="basic-default-email"
                                  class="form-control"
                                  placeholder="john.doe"
                                  required />
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
                                <label class="form-label" for="basic-default-country">City</label>
                                <select class="form-select" id="basic-default-country" required>
                                  <option value="">Select Country</option>
                                  <option value="usa">USA</option>
                                  <option value="uk">UK</option>
                                  <option value="france">France</option>
                                  <option value="australia">Australia</option>
                                  <option value="spain">Spain</option>
                                </select>
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
                <!-- Browser Default -->
                <div class="col-md mb-4 mb-md-0">
                  <div class="card">
                    <div class="card-body">
                      <form class="browser-default-validation">
                        <div class="row g-3">

                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Info</h6>
                            <hr class="mt-0">
                          </div>
                          
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
                                required />
                            
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

                          <div class="col-12">
                            <label class="form-label" for="collapsible-address">Address</label>
                            <textarea
                              name="collapsible-address"
                              class="form-control"
                              id="collapsible-address"
                              rows="2"
                              placeholder="1456, Mall Road"></textarea>
                          </div>

                          
                                                    
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-dob">DOB</label>
                            <input
                              type="text"
                              class="form-control flatpickr-validation"
                              id="basic-default-dob"
                              required />
                          </div>
                          
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-country">City</label>
                            <select class="form-select" id="basic-default-country" required>
                              <option value="">Select Country</option>
                              <option value="usa">USA</option>
                              <option value="uk">UK</option>
                              <option value="france">France</option>
                              <option value="australia">Australia</option>
                              <option value="spain">Spain</option>
                            </select>
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

                          <div class="col-12">
                            <h6 class="mt-2 fw-semibold">2. Booking Details</h6>
                            <hr class="mt-0">
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">No. of Person</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="No of Person"
                              required />
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
                            <label class="form-label" for="basic-default-name">Relation</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="Relation"
                              required />
                          </div>

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
                            <label class="form-label" for="basic-default-name">Age</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="Age"
                              required />
                          </div>

                          <div class="col-md-4">
                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple />
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">Deposit No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="Deposit No"
                              required />
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">Deposit Rs</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="Deposit Rs"
                              required />
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">Door Metri No: </label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="Door Metri No"
                              required />
                          </div>
                          
                        </div>

                        <div class="row  mt-3">
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                       
                      </form>


                      

                      
                    </div>
                  </div>
                </div>
                <!-- /Browser Default -->


                
                
                          
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
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>


    <!-- Page JS -->
    
    <script src="{{ asset ('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>

    <script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>

@endsection

@endsection


