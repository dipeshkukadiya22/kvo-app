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
                            @include('layouts.adduser')
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
                      <form class="browser-default-validation" method="POST" action="{{route('add_general_donation')}}">
                        <div class="row g-3">
                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Details</h6>
                            <hr class="mt-0" />
                          </div>
                          @csrf
                          <div class="col-md-4">
                            <label for="select2Basic" class="form-label">નામ</label>
                            <select id="name" name="name" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                            <option value=""></option>
                                @foreach($member as $row)
                                    <option value="{{$row->p_id}}">{{$row->m_name}} - {{$row->phone_no}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-dob">તારીખ</label>
                            <input
                              type="text"
                              class="form-control flatpickr-validation"
                              id="basic-default-dob"
                              name="date"
                              required />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">પહોંચ નંબર</label>
                            <input
                              type="text"
                              class="form-control"
                              id="depo_id"
                              name="depo_id"
                              value={{$depo_id + 1 }}
                              required readonly/>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">હસ્તે</label>
                            <input
                              type="text"
                              class="form-control"
                              id="haste"
                              name="haste"
                              style="text-transform:uppercase"
                              placeholder="John Doe"
                              required />
                         
                        	</div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">મોબાઈલ નંબર</label>
                            <input
                              type="number"
                              id="phone"
                              name="phone"
                              class="form-control phone-mask"
                              placeholder="658 799 8941"
                              aria-label="658 799 8941"
                              minlength="10"
                              maxlength="10"
                              required
                              oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);"/>
                          </div>
                       
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">ગામ</label>
                            <input
                              type="text"
                              class="form-control"
                              id="city1"
                              name="city"
                              placeholder="John Doe"
                              required />
                         
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-country">સંસ્થા</label>
                            <select class="form-select" name="community" id="basic-default-country" required>
                              <option value="VIJAYNAGAR">વિજયનગર</option>
                              <option value="NAVNEETNAGAR">નવનીતનગર</option>
                            </select>
                          </div>
                          
                          <div class="col-md-8">
                            <label class="form-label" for="multicol-phone">મળેલ દાન</label>
                            <input
                              type="text"
                              class="form-control"
                              id="details"
                              name="details"
                              style="text-transform:uppercase"
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
        dateFormat: "d-m-Y",
        defaultDate: currentDate
    })
    });

    $("#name").change(function(){
      const id=document.getElementById("name").value;
      $.ajax({
        
                url:"{{url('get')}}" +"/"+ id,
                type:'GET',
                  success:function(response){   
                        $("#city1").val(response['city']); 
                        $("#phone").val(response['phone_no']); 
                        $("#haste").val(response['m_name']);
                    
                  }
                });
            });
    </script>

@endsection

@endsection


