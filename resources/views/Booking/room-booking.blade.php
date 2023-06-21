@extends('layouts.app')

@section('title', 'Room Booking')

@section('pagecss')

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/tagify/tagify.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

@endsection

@section ('content')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">
        
        
            @include('layouts.header')

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Validation</h4>
              <div class="row mb-4">
                <!-- Browser Default -->
                <div class="col-md mb-4 mb-md-0">
                  <div class="card">
                    <div class="card-body">
                      <form class="browser-default-validation">
                        <div class="row g-3">
                          <div class="col-md-4">
                              <label class="form-label" for="basic-default-name">Name</label>
                              <input
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                placeholder="John Doe"
                                required />
                           
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
                          <div class="mb-3">
                            <label class="d-block form-label">Gender</label>
                            <div class="form-check mb-2">
                              <input
                                type="radio"
                                id="basic-default-radio-male"
                                name="basic-default-radio"
                                class="form-check-input"
                                required />
                              <label class="form-check-label" for="basic-default-radio-male">Male</label>
                            </div>
                            <div class="form-check">
                              <input
                                type="radio"
                                id="basic-default-radio-female"
                                name="basic-default-radio"
                                class="form-check-input"
                                required />
                              <label class="form-check-label" for="basic-default-radio-female">Female</label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-country">Country</label>
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
                            <label class="form-label" for="basic-default-dob">DOB</label>
                            <input
                              type="text"
                              class="form-control flatpickr-validation"
                              id="basic-default-dob"
                              required />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-upload-file">Profile pic</label>
                            <input type="file" class="form-control" id="basic-default-upload-file" required />
                          </div>
                          <div class="mb-3">
                            <label class="d-block form-label">Gender</label>
                            <div class="form-check mb-2">
                              <input
                                type="radio"
                                id="basic-default-radio-male"
                                name="basic-default-radio"
                                class="form-check-input"
                                required />
                              <label class="form-check-label" for="basic-default-radio-male">Male</label>
                            </div>
                            <div class="form-check">
                              <input
                                type="radio"
                                id="basic-default-radio-female"
                                name="basic-default-radio"
                                class="form-check-input"
                                required />
                              <label class="form-check-label" for="basic-default-radio-female">Female</label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-bio">Bio</label>
                            <textarea
                              class="form-control"
                              id="basic-default-bio"
                              name="basic-default-bio"
                              rows="3"
                              required></textarea>
                          </div>
                          <div class="mb-3">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required />
                              <label class="form-check-label" for="basic-default-checkbox"
                                >Agree to our terms and conditions</label
                              >
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="switch switch-primary">
                              <input type="checkbox" class="switch-input" required />
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">Send me related emails</span>
                            </label>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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

    <script src="{{ ('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ ('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset ('assets/js/form-validation.js') }}"></script>

@endsection

@endsection


