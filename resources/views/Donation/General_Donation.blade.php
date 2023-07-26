@extends('layouts.app')

@section('title', 'Donation Receipt')

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

<!-- Page CSS -->
<style>

.form-label {
    font-weight: bold;
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
                          <h4 class="fw-bold py-3">ડોનેશન પહોંચ</h4>
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
                            <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Registration</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body mx-0 flex-grow-0">
                            <!-- Browser Default -->
                            <form class="browser-default-validation" method="POST" action="{{route('General_Donation')}}">
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
                <!-- Browser Default -->
                <div class="col-md mb-4 mb-md-0">
                  <div class="card">
                    <div class="card-body">
                      <form action="{{route('GeneralDonation')}}" method="POST" class="browser-default-validation">
                       @csrf
                        <div class="row g-3">
                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-4">
                            <label for="select2Basic" class="form-label">નામ</label>
                          
                            <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="name" placeholder="select name" required>
                              <option value=""></option>
                              @foreach ($m_data as $row)  
                                  <option value="{{$row->depo_id}}" {{(!empty($member) && $member->m_name == $row->m_name) ? "selected" : ""}}>{{$row->m_name}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$row->phone_no}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="email_user" value="{{!empty($m_data)  ? $m_data:''}}">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-dob">તારીખ</label>
                            <input
                              type="text"
                              name="date"
                              class="form-control flatpickr-validation"
                              id="basic-default-dob"
                              required />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">પહોંચ નંબર</label>
                            <input
                              type="text"
                              name="depo_id"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="15"
                              value="{{$depo_id}}"
                              required />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">હસ્તે</label>
                            <input
                              type="text"
                              name="haste"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="John Doe"
                              required />
                         
                        	</div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">મોબાઈલ નંબર</label>
                            <input
                              type="number"
                              name="phone_no"
                              id="member_phone"
                              class="form-control phone-mask"
                              placeholder="658 799 8941"
                              aria-label="658 799 8941" 
                              value="{{ (!empty($member)) ? $member->phone_no : '' }}"/>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">ગામ</label>
                            <input
                              type="text"
                              name="city"
                              class="form-control"
                              id="member_city"
                              placeholder="John Doe"
                              value="{{(!empty($member)) ? $member->city : '' }}"
                              required />
                         
                          </div>
                          <div class="col-12">
                            <h6 class="mt-2 fw-semibold">2. Donation Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-12">
                            <label class="form-label" for="multicol-phone">મળેલ દાન</label>
                            <input
                              type="text"
                              name="details"
                              class="form-control"
                              id="basic-default-name"
                              {{-- placeholder="John Doe" --}}
                              required />
                          </div>
                          <div class="row mt-3">
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

    <!-- Vendors JS -->
    <script src="{{ asset ('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset ('assets/js/main.js') }}"></script>

    <script src="{{ asset ('assets/js/forms-selects.js') }}"></script>
    
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

    <!-- Make sure to include jQuery library before this script -->
<script>
  $(document).ready(function () {
      $("#select2Basic").change(function () {
          var data = JSON.parse($("#email_user").val());
          var selectedId = $(this).val();
          
          $.each(data, function (key, value) {
              if (value['m_name'] == selectedId) {
                  $('#member_phone').val(value['phone_no']);
                  $('#member_city').val(value['city']);
                  return false; // Exit the loop once a match is found
              }
          });
      });
  });
</script>

@endsection

@endsection


