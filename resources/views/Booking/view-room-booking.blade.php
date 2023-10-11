@extends('layouts.app')

@section('title', 'View Room Booking')

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
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/dropzone/dropzone.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    

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

/* button.swal2-cancel.btn.btn-label-danger {
    display: none !important;
} */


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
  input[type="radio"].readonly {
    pointer-events: none;
}

label.readonly {
    pointer-events: none;
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
                  
                </div>
                <div class="content-header-right d-flex justify-content-end col-md-12 col-12">
                      
                      <div class="form-group breadcrumb-right py-3  d-flex justify-content-end ">

                        <ul class="nav nav-pills mb-3 me-2" role="tablist">
                        <li class="nav-item">
                        <button class="btn btn-transparent darkbtn" type="button" >
                        <a href="{{route('room-booking')}}"><span class="ti-xs ti ti-plus me-1"></span>Add New Room booking</a>
                        </button>
                        </li>
                          <li class="nav-item">
                            <button
                              type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-bookedroom" aria-controls="navs-pills-top-allroom" aria-selected="true">
                              View Room Booking(<span id="bookedRoomsCount">0</span>)
                            </button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-checkoutroom"  aria-controls="navs-pills-top-available" aria-selected="false"> 
                              View Advance Room Booking(<span id="availableRoomsCount">0</span>) </button>
                          </li>
                          
                        </ul>
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
                                  <div class="tab-content p-0">
                                      <div class="tab-pane fade show active" id="navs-pills-top-bookedroom" role="tabpanel">
                                          <div class="card-datatable table-responsive pt-0">
                                        <table id="DataTables_Table_0" class="datatables-basic table">
                                          <thead>
                                              <tr>
                                              <th style="font-size:15px"><b>Booking No</b></th>
                                                <th style="font-size:15px"><b>Name</b></th>
                                                <th style=" font-size:15px"><b>Room No</b></th>
                                                <th style="font-size:15px"><b>Check In Date</b></th>
                                                <th style="font-size:15px"><b>Check Out Date</b></th>
                                                <th style="font-size:15px"><b>Rent</b></th>
                                                <th style="font-size:15px"><b>Days Of Stay</b></th>                       
                                                <th style="font-size:15px"><b>Deposite(₹) </b></th>
                                                <th style="font-size:15px"><b>Action</b></th>
                                              </tr>
                                          </thead>
                                          @foreach($checkout as $row)
                                          <tr>
                                             <input type="hidden" class="id" value="{{$row->r_id}}">
                                             <td>{{$row->r_id}}</td>
                                              <td>{{$row->m_name}}</td>
                                              <td>{{$row->room_list}}</td>
                                              <td>{{date("d-m-Y",strtotime($row->check_in_date))}}</td>
                                              <td>{{date("d-m-Y",strtotime($row->check_in_date . '+' .$row->no_of_days . 'days'))}}</td>
                                              <td>{{$row->dlx_amount + $row->ac_amount + $row->non_ac_amount + $row->door_mt_amount + $row->door_mt_ac_amount}}</td>
                                              <td>{{$row->no_of_days}}</td>
                                              <td>{{$row->deposite_rs}}</td>
                                              <td>
                                                  <div class="d-inline-block">
                                                    <a href="{{route('pdf_CheckIn',$row->r_id)}}" target ="_blank"><img src="./assets/icon/orange-eye.png" width="20px"></a>

                                                    <!--<a onclick="pdf({{$row->r_id}})" class="btn btn-sm btn-icon item-edit"><img src="./assets/icon/orange-eye.png" width="20px"></a>-->
                                                    
                                                    <a onclick="edit({{$row->r_id}})" class="btn btn-sm btn-icon item-edit"><img src="./assets/icon/orange-edit.png" width="20px"></a>

                                                    <a href="{{route('cancel_booking',$row->r_id)}}" class="text-danger delete-record"><img src="./assets/icon/orange-trash.png" width="20px"></a> 
                                                    
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                          
                                        </table>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                         <!--START checkedout room TAB-->
                                          <div class="tab-pane fade" id="navs-pills-top-checkoutroom" role="tabpanel">
                                          <div class="card-datatable pt-0">
                                          <table id="DataTables_Table_0" class="datatables-basic table" >
                                          <thead>
                                              <tr >
                                                  <th style="font-size:15px"><b>Booking No</b></th>
                                                  <th style="font-size:15px"><b>Name</b></th>
                                                  <th style="font-size:15px"><b>Room No</b></th>
                                                  <th style="font-size:15px"><b>From Date</b></th>
                                                  <th style="font-size:15px"><b>To Date</b></th>
                                                  <th style="font-size:15px"><b>Day of Stay</b></th>
                                                  <th style="font-size:15px"><b>Deposite Rs</b></th>
                                                
                                                  <th style="font-size:15px"><b>Actions</b></th>
                                              </tr>
                                          </thead>
                                          @foreach($advancebooking as $row)
                                          <tr>
                                             <input type="hidden" class="id" value="{{$row->r_id}}">
                                             <td>{{$row->r_id}}</td>
                                              <td>{{$row->m_name}}</td>
                                              <td>{{$row->room_list}}</td>
                                              <td>{{$row->advance_date_from }}</td>
                                              <td>{{$row->advance_date_to}}</td>
                                              <td>{{$row->no_of_days}}</td>
                                              <td>{{$row->deposite_rs}}</td>
                                              <td>
                                                  <div class="d-inline-block">
                                                    <a href="{{route('pdf_Advance_Deposit',$row->r_id)}}" target="_blank"><img src="./assets/icon/orange-eye.png" width="20px"></a>

                                                    <a onclick="editadvanceroom({{$row->r_id}})"  class="btn btn-sm btn-icon item-edit"><img src="./assets/icon/orange-edit.png" width="20px"></a>

                                                    <a href="{{route('cancel_booking',$row->r_id)}}" class="text-danger delete-record"><img src="./assets/icon/orange-trash.png" width="20px"></a> 
                                                    
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                        </table>
                                          </div>
                                        </div>
                                      
                                        <!--END TAB-->
                        <!--modal pdf-->
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                  <div class="modal-body">
                                          <embed src="~/Content/Article List.pdf" frameborder="0" width="100%" height="400px">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        <!--End pdf modal-->
                        <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                      <form id="kvo_update_room_booking" class="browser-default-validation" method="POST" action="{{ route('update_room_booking') }}">
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
                                                  <input type="text" id="select2Basic" name="name" class="form-control" placeholder="" readonly/>
                                                 <!-- <select id="select2Basic" class="select2 form-select" data-allow-clear="true" name="name" placeholder="select name" readonly>
                                                      @foreach ($member as $row)
                                                          <option value="{{$row->p_id}}">{{$row->m_name}}</option>
                                                      @endforeach
                                                  </select>-->
                                                </div>
                                                <div class="col-md-4">
                                                  
                                                  <label class="form-label" for="multicol-phone">Phone Number</label>
                                                  <input type="number" id="member_phone" name="member_phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" maxlength="10" minlength="10" readonly/>
                                                </div>
                      
                                                <div class="col-md-4">
                                              
                                                    <label class="form-label" for="basic-default-email">Email</label>
                                                    <input type="email" id="member_email" name="member_email" class="form-control" placeholder="john.doe" readonly />

                                                </div>                                                                                                            

                      
                                               

                                                <div class="col-md-4">
                                                  <label class="form-label" for="basic-default-name">Age</label>
                                                  <input type="text" class="form-control check" name="age" id="age" placeholder="Age"  maxlength="2" required oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);" />
                                                </div>
                      
                                                <div class="col-4">
                                                  <label class="form-label" for="collapsible-address" >Address</label>  
                                                  <textarea name="member_address"  class="form-control check" id="member_address"  style="text-transform:uppercase" rows="1" placeholder="1456, Mall Road" required></textarea>
                                                </div>
                                                                          
                                                
                                                <!-- Basic -->
                                                <div class="col-md-4">
                                                  <label for="select2Basic" class="form-label">Community</label>
                                                  <select id="select2Basic1" class="select2 form-select form-select-lg" name="community" data-allow-clear="true">
                                                  <option value="Hindu" selected>Hindu</option>
                                                  <option value="Jain">Jain</option>
                                                  <option value="Isalam">Isalam</option>
                                                  <option value="Sikh">Sikh</option>
                                                  <option value="Budda">Budda</option>
                                                  <option value="Other Religions">Other Religions</option>

                                                      
                                                  </select>
                                                </div>
                                                <div class="col-md-4">
                                                  <label for="defaultFormControlInput" class="form-label">Sub Community</label>
                                                  <input type="text" class="form-control" name="subcommunity"  style="text-transform:uppercase" id="subcommunity" placeholder="John Doe" aria-describedby="defaultFormControlHelp" />
                                                </div>

                                                <div class="col-md-4">
                                                <label class="form-label" for="basic-default-name">No. of Person</label>
                                                <input type="text" class="form-control"  name="no_of_person_id" id="no_of_person_id" placeholder="No of Person" min="1" max="10"/>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="form-label" for="basic-default-name">No. of days</label>
                                                <input type="text" class="form-control"  name="no_of_days" id="no_of_days" placeholder="No of Person" min="1" max="10"/>
                                              </div>
                        
                                                <div class="col-md-4">
                                                <label class="form-label" for="rupees-in-words">Occupation</label>
                                                <input type="text" class="form-control" name="occupation" id="occupation"  style="text-transform:uppercase" placeholder="Occupation" required>
                                              </div>

                                              <div class="col-md-4">
                                                <label class="form-label" for="rupees-in-words">Reason</label>
                                                <input type="text" class="form-control" name="reason" id="reason"  style="text-transform:uppercase" placeholder="Reason to stay" required>
                                              </div>
                                              <div class="col-md-4">
                                                  <label for="defaultFormControlInput" class="form-label">City</label>
                                                  <input type="text" class="form-control" name="member_city" id="member_city" placeholder="John Doe" aria-describedby="defaultFormControlHelp" readonly/>
                                                </div>

                                                <div class="col-md-4">
                                                  <label class="d-block form-label">Gender</label>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MALE" value="MALE" checked/>
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="FEMALE" value="FEMALE" />
                                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                                  </div>
                                                  
                                                </div>
                      
                                              <div class="col-12 d-flex justify-content-end">
                                                
                                                
                                                <button type="button" class="btn btn-primary btn-next" id="repeat-next">
                                                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                  <i class="ti ti-arrow-right"></i>
                                                </button>
                                                
                                              
                                              </div>
                                            </div>
                                          </div>
                                          <!--start  member details -->
                                          <div id="address" class="content">
                                              <div class="content-header">
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
                                                  <div class="row formrepeater1" data-repeater-list="group-a">
                                                    <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                                      <label class="form-label" for="form-repeater-1-1">Full Name</label>
                                                      <input type="text" id="full_name_form"  name="full_name0" class="form-control" placeholder="john doe" readonly />
                                                    </div>
                                                    <div class="mb-3 col-lg-4 col-xl-3 col-12 mb-0">
                                                      <label class="form-label" for="form-repeater-1-2">Age</label>
                                                      <input type="text" id="member_age" name="m_age0" class="form-control" placeholder="your age" readonly />
                                                    </div>
                                                    <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">
                                                        <label class="d-block form-label">Gender</label>
                                                        <div class="form-check form-check-inline">
                                                      <input class="form-check-input readonly" type="radio" name="gender0" id="inlineRadio1" value="MALE" checked/>
                                                      <label class="form-check-label" for="gender">Male</label>

                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <input class="form-check-input readonly" type="radio" name="gender0" id="inlineRadio2" value="FEMALE"/>
                                                          <label class="form-check-label" for="gender">Female</label>
                                                        </div>

                                                        <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" hidden>
                                                          <label class="form-label" for="form-repeater-1-2">gender</label>
                                                          <input type="text" id="gender_data" name="gender_data0" class="form-control " placeholder="your age" value="MALE"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <label class="form-label" for="basic-default-country">Relation</label>
                                                      <select class="form-select" name="relation0" id="member_relation" required>
                                                      <option value="SELF" selected>SELF</option>
                                                      <option value="AUNTY">AUNTY</option>
                                                      <option value="BROTHER">BROTHER</option>
                                                      <option value="BROTHER">COUSIN</option>
                                                      <option value="FATHER">FATHER</option>
                                                      <option value="FRIEND">FRIEND</option>
                                                      <option value="GRAND FATHER">GRAND FATHER</option>
                                                      <option value="GRAND MOTHER">GRAND MOTHER</option>
                                                      <option value="MOTHER">MOTHER</option>
                                                      <option value="NEPHEW">NEPHEW</option>
                                                      <option value="SISTER">SISTER</option>
                                                      <option value="SON">SON</option>
                                                      <option value="UNCLE">UNCLE</option>
                                                      <option value="WIFE">WIFE</option>
                                                      </select>
                                                    </div>
                                                    <!-- <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                                  <button class="btn btn-label-danger mt-4" data-repeater-delete >
                                                    <i class="ti ti-x ti-xs me-1"></i>
                                                    <span class="align-middle">Delete</span>
                                                  </button>
                                                </div> -->
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
                                              <div class="mb-0" hidden>
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
                                          
                                          <!-- end member details -->
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
                                                      <label for="select2Multiple4" class="form-label">AC Deluxe Room</label> 
                                                      <select id="select2Multiple44" name="select2Multiple4[]" class="select2 form-select" multiple>
                                                          @foreach($a_list as $list)
                                                            @if ($list->room_facility == 'Deluxe Room')
                                                                <option value="{{$list->room_no}}">
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
                                                          <input type="text" class="form-control"  name="dlx_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="dlx_amount" maxlength="4" onkeypress="return onlyNumbers(this.value);"/>
                                                        </div>
                                                  </div>
                                                <div class="col-md-2">
                                                    <label for="select2Multiple1" class="form-label">Ac Room</label> 
                                                    <select id="select2Multiple11" name="select2Multiple1[]" class="select2 form-select" multiple>
                                                    @foreach($a_list as $list)
                                                        @if ($list->room_facility == 'A.C. Room')
                                                            <option value="{{$list->room_no}}">
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
                                                      <input type="number" class="form-control"  name="ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="ac_amount" value="" />
                                                    </div>
                                                  </div>


                                                  <div class="col-md-2">
                                                      <label for="select2Multiple2" class="form-label">Non Ac Room</label>
                                                      <select id="select2Multiple22" name="select2Multiple2[]" class="select2 form-select" multiple>
                                                      @foreach ($a_list as $list)
                                                                      @if ($list->room_facility == 'NON A.C ROOM')
                                                                          <option value="{{$list->room_no}}">
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
                                                      <input type="number" class="form-control"  name="non_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="non_ac_amount" value="" />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <label for="select2Multiple5" class="form-label">Door Mt AC Room</label> 
                                                    
                                                      <select id="select2Multiple55" name="select2Multiple5[]" class="select2 form-select" multiple>
                                                      @foreach($a_list as $list)
                                                        @if ($list->room_facility == 'DOOR MATRY  A.C ROOM')
                                                            <option value="{{$list->room_no}}">
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
                                                          <input type="text" class="form-control"  name="dmt_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="dmt_ac_amount" maxlength="4" onkeypress="return onlyNumbers(this.value);"/>
                                                        </div>
                                                    </div>
                                                  <div class="col-md-2">
                                                      <label for="select2Multiple3" class="form-label">Door Mt Room</label>
                                                      <select id="select2Multiple33" name="select2Multiple3[]" class="select2 form-select" multiple>
                                                      
                                                      @foreach ($a_list as $list)
                                                      @if ($list->room_facility == 'DOOR MATRY NON A.C ROOM' || $list->room_facility == 'DOOR MATRY  A.C ROOM')
                                                          <option value="{{$list->room_no}}">
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
                                                      <input type="number" class="form-control"  name="dmt_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="dmt_amount" value="" />
                                                    </div>
                                                  </div>
                    
                                              </div>

                                              
                                          
                                              <hr>
                                              
                                              <div class="col-md-4">
                                                <label class="form-label" for="basic-default-name">Booking No</label>
                                                <input type="text" class="form-control" name="booking_id" id="booking_id" placeholder="Deposit No"  readonly/>
                                              </div>
                                              <!-- Datetime Picker-->
                                              <div class="col-md-4">
                                                <label for="flatpickr-datetime" class="form-label">Check-In Date</label>
                                                <input type="text" class="form-control" name="check_in_date" placeholder="DD-MM-YYYY HH:MM" id="flatpickr-datetime" value=""/>
                                              </div>

                                              
                                              <div class="col-md-4" hidden>
                                                <label class="form-label" for="basic-default-name">Personal Details Id</label>
                                                <input type="text" class="form-control" name="person_id" id="person_id" placeholder="Deposit No"  readonly/>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="form-label" for="deposit-amount">Deposit Rs</label>
                                                <input type="number" class="form-control" name="deposite_rs" id="deposit-amount" placeholder="Deposit Rs">
                                                <div id="deposite" class="error-message" ></div></div>
                                              
                                              <div class="col-md-4">
                                                <label class="form-label" for="rupees-in-words">Deposit Rs (rupees in words)</label>
                                                <input type="text" class="form-control" name="rs_word" id="rupees-in-words" placeholder="Rupees in words" readonly>
                                              </div>
                                              <div class="col-md-4">
                                                <label class="d-block form-label">Payment Mode</label>
                                                <div class="form-check form-check-inline">
                                                  <input
                                                    type="radio"
                                                    id="CASH"
                                                    name="basic_default_radio"
                                                    class="form-check-input"
                                                    value="CASH"
                                                    required checked/>
                                                  <label class="form-check-label" for="basic_default_radio">Cash</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-2">
                                                  <input
                                                    type="radio"
                                                    id="CHEQUE"
                                                    name="basic_default_radio"
                                                    class="form-check-input"
                                                    value="CHEQUE"
                                                    required />
                                                  <label class="form-check-label" for="basic_default_radio">Cheque</label>
                                                </div>
                                                
                                                <div class="form-check form-check-inline">
                                                  <input
                                                    type="radio"
                                                    id="UPI"
                                                    name="basic_default_radio"
                                                    class="form-check-input"
                                                    value="UPI"
                                                    required />
                                                  <label class="form-check-label" for="basic_default_radio">UPI</label>
                                                </div>
                                              </div>
                                              <div class="col-12">
                                                <div action="/upload" class="dropzone needsclick" id="dropzone-multi" >
                                                  <div class="dz-message needsclick" id="dz-img">
                                                    Drop files here or click to upload
                                                    <span class="note needsclick"
                                                      >(This is just a demo dropzone. Selected files are <strong>not</strong> actually
                                                      uploaded.)</span
                                                    ><img id="id_proof1" width="250px" style="padding: 10px">
                                                      <img id="id_proof2" width="250px" style="padding: 10px">
                                                      
                                                  </div>
                                                  <div class="fallback">
                                                  <input class="form-control" type="file" name="id_proof" id="id_proof" multiple required />
                                                  </div>
                                                </div>
                                              </div>
                                          

                                              
                                              <div class="col-12 d-flex justify-content-between">
                                                <button class="btn btn-label-secondary btn-prev">
                                                  <i class="ti ti-arrow-left me-sm-1"></i>
                                                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                            
                                                <button type="button" class="btn btn-primary btn-next repeat-next"  >
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
                                                        <th>test</th>
                                                        </tr>
                                                    </thead>
                                                 
                                                    <tbody class="rep-table">
                                                      <tr>
                                                        <td></td>
                                                        <td id="member_full_name"></td>
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
                                              <button type="submit"  class="btn btn-success btn-submit">Submit</button>
                                              
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
                          <!-- end roon booking view -->
                          
                          
                      </section>
                      </div>
                      <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                  <div class="modal-body">
                                          <embed src="~/Content/Article List.pdf" frameborder="0" width="100%" height="400px">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        <!--End pdf modal-->
                        <div class="modal fade" id="advance" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                              <div class="modal-body">
                                <div class="row">
                                  <!-- Default Icons Wizard -->
                                  <div class="col-12 mb-4">
                                    <div class="bs-stepper-content">
                                    <form class="browser-default-validation" action="{{ route('update_advance_room_booking') }}" method="POST" id="room_booking">
                                          @csrf
                                          <!-- Account Details -->
                                          <div class="row g-3">
                                            <div class="col-12">
                                              <h6 class="fw-semibold">1. Personal Details</h6>
                                              <hr class="mt-0 mb-0" />
                                            </div>
                                            <!-- Basic -->
                                              <div class="col-md-4">
                                                <label class="form-label" for="basic-default-name">Booking No</label>
                                                <input type="text" class="form-control" name="deposit_no" id="deposit_no" placeholder="Deposit No" value="" readonly/>
                                               </div>
                                                <div class="col-md-4">
                                                    <label for="select2Basic" class="form-label"><span class="required">Name</span></label>
                                                    <input type="text" id="m_name" name="name" class="form-control" placeholder="" readonly/> 
                                                  
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <label class="form-label" for="basic-default-email"><span class="required">Email</span></label>
                                                    <input type="email" id="m_email" name="email" class="form-control" placeholder="john.doe" readonly required/>
                                                </div>
                                                <div class="col-md-4">
                                                  <label class="form-label" for="multicol-phone"><span class="required">Phone Number</span></label>
                                                  <input type="number" id="m_phone" name="phone_no" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" maxlength="10"
                                                required
                                                oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" readonly/>
                                                </div> 
                                                <div class="col-md-4">
                                                  <label for="defaultFormControlInput" class="form-label">City</label>
                                                  <input type="text" class="form-control" name="city" id="m_city" style="text-transform:uppercase" placeholder="John Doe" aria-describedby="defaultFormControlHelp" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                  <label for="flatpickr-range" class="form-label"><span class="required">Advance Date</span></label>
                                                  <input type="text" class="form-control" name="advance_date" placeholder="DD-MM-YYYY HH:MM" id="advance_daterange" required/>
                                                </div>
                                              </div>
                                              <!-- Personal Info -->
                                              <div class="row g-3">
                                              <!-- Primary -->
                                              <div class="row mt-5">
                                              <div class="col-12">
                                                  <h6 class="fw-semibold">2. Booking Details</h6>
                                                  <hr class="mt-0 mb-0" />
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                  <label for="select2Multiple4" class="form-label">Deluxe Room</label> 
                                                  <select id="advance_select2Multiple44" name="select2Multiple4[]" class="select2 form-select room-input" multiple>
                                              
                                                  </select> 
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                <label class="form-label" for="basic-default-name">Amount</label>
                                                <div class="input-group">
                                                  <span class="input-group-text">₹</span>
                                                  <input type="number" class="form-control "  name="dlx_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="dlx_amount" />
                                                </div>
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                  <label for="select2Multiple1" class="form-label">Ac Room</label> 
                                                  <select id="advance_select2Multiple11" name="select2Multiple1[]" class="select2 form-select room-input" multiple>
                                                 
                                                 
                                                </select> 
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                <label class="form-label" for="basic-default-name">Amount</label>
                                                <div class="input-group">
                                                  <span class="input-group-text">₹</span>
                                                  <input type="number" class="form-control "  name="ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="advance_ac-amount" />
                                                </div>
                                              </div>

                                              <div class="col-md-2 mt-3">
                                                <label for="select2Multiple2" class="form-label">Non Ac Room</label> 
                                                <select id="advance_select2Multiple22" name="select2Multiple2[]"    class="select2 form-select room-input" multiple>
                                               </select>
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                <label class="form-label" for="basic-default-name">Amount</label>
                                                <div class="input-group">
                                                  <span class="input-group-text">₹</span>
                                                  <input type="number" class="form-control"  name="non_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="advance_non-ac-amount" />
                                                </div>
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                  <label for="select2Multiple5" class="form-label">Door Mt Ac Room</label> 
                                                  <select id="advance_select2Multiple55" name="select2Multiple5[]" class="select2 form-select room-input" multiple>
                                              
                                                  </select> 
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                <label class="form-label" for="basic-default-name">Amount</label>
                                                <div class="input-group">
                                                  <span class="input-group-text">₹</span>
                                                  <input type="number" class="form-control "  name="dmt_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="dmt_ac_amount" />
                                                </div>
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                <label for="select2Multiple3" class="form-label">Door Mt Non Room</label>   
                                                <select id="advance_select2Multiple33" name="select2Multiple3[]" class="select2 form-select room-input" multiple>
                                              </select>                            
                                              </div>
                                              <div class="col-md-2 mt-3">
                                                <label class="form-label" for="basic-default-name">Amount</label>
                                                <div class="input-group">
                                                  <span class="input-group-text">₹</span>
                                                  <input type="number" class="form-control"  name="door_mt_amount" id="advance_door_mt_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)"   />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-label" for="basic-default-name"><span class="required">No. of Person</span></label>
                                              <input type="number" class="form-control"  name="no_of_person" id="advance_no_of_person_id" placeholder="No of Person"  required/>
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-label" for="deposit-amount"><span class="required">Deposit Rs</span></label>
                                              <input type="number" class="form-control" name="deposite_rs" id="advance_deposit-amount" placeholder="Deposit Rs" required>
                                              <div id="deposite" class="error-message" ></div>
                                            </div>                           
                                            <div class="col-md-4">
                                              <label class="form-label" for="rupees-in-words">Deposit Rs (rupees in words)</label>
                                              <input type="text" class="form-control" name="rs_word" id="advance_rupees-in-words" placeholder="Rupees in words" readonly>
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-label" for="deposit-amount"><span class="required">No of Days</span></label>
                                              <input type="number" class="form-control" name="no_of_days" id="advance_no_of_days" placeholder="no_of_days" value="1" required readonly>
                                              <input type="hidden" name="start_date" id="start_date" value="">
                                              <input type="hidden" name="end_date" id="end_date" value="">
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-label" for="rupees-in-words">Occupation</label>
                                              <input type="text" class="form-control" style="text-transform:uppercase" name="occupation" id="advance_occupation" placeholder="Occupation" required>
                                            </div>
                                            <div class="col-md-4">
                                              <label class="form-label" for="rupees-in-words">Reason</label>
                                              <input type="text" class="form-control" style="text-transform:uppercase" name="reason" id="advance_reason" placeholder="Reason to stay" required>
                                            </div>
                                            <div class="col-12 flex justify-content">
                                                <button type="submit" id="submitbtn1" class="btn btn-success btn-submit">Submit</button>
                                            </div>
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
    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
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
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/js/ui-toasts.js') }}"></script>
    <script>
    jQuery(function ($) {
     
        $('#advance_daterange').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY'
            },
          
           }, function(start, end, label) {
            var startDate = start.format('YYYY-MM-DD'); 
            var endDate = end.format('YYYY-MM-DD');
            var numberOfDays = moment(endDate).diff(startDate, 'days');
            $('#advance_no_of_days').val(numberOfDays + 1);
            $('#start_date').val(startDate);
            $('#end_date').val(endDate);
             $('#advance_daterange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
          
            
        });
    
    });
</script> 

<script>
     
   function pdf(id)
      {
        alert("start");
          const myOffcanvas = document.getElementById(' myModal');
          let a=new bootstrap.Modal(myOffcanvas);
          a.show();
     
      }
function editadvanceroom(id)
{
    
      const myOffcanvas = document.getElementById('advance');
      let b=new bootstrap.Modal(myOffcanvas);
     
      b.show();

      $.ajax({
          url:"{{url('get_advance_data')}}" +"/"+ id,
          type:'GET',
            success:function(response){
              
              // var dateRange = response[0]['advance_date'];
              // var dateParts = dateRange.split(" - ");
              // var startDate = new Date(dateParts[0]);
              // var endDate = new Date(dateParts[1]);
              // var advancedate =  (startDate.getMonth() + 1)  + "-" +startDate.getDate() + "-" + startDate.getFullYear();
              // var advancedate1 =  (endDate.getMonth() + 1) + "-" +endDate.getDate() + "-" + endDate.getFullYear();

              $("#m_name").val(response[0]['m_name']);
             
              $("#m_city").val(response[0]['city']);
              $('#m_email').val(response[0]['email']);
              $('#m_phone').val(response[0]['phone_no']);
              $("#advance_no_of_person_id").val(response[0]['no_of_person']);
              $("#deposit_no").val(response[0]['r_id']);
              $("#person_id").val(response[0]['person_id']);
              $("#advance_deposit-amount").val(response[0]['deposite_rs']);
              $("#advance_rupees-in-words").val(response[0]['rs_word']);
              $("#advance_no_of_days").val(response[0]['no_of_days']);
              $("#advance_occupation").val(response[0]['occupation']);
              $("#advance_reason").val(response[0]['reason']);
              $("#advance_daterange").val(dateRange);
              $("#dlx_amount").val(response[0]['dlx_amount']);
              $("#advance_ac-amount").val(response[0]['ac_amount']);
              $("#advance_non-ac-amount").val(response[0]['non_ac_amount']);
              $("#dmt_ac_amount").val(response[0]['door_mt_ac_amount']);
              $("#advance_dmt-amount").val(response[0]['door_mt_amount']);
              
              
              var room=response[0]['room_list'];
              var ArrNames =room .split(",");
            
                  ArrNames.forEach(myFunction1);
                  function myFunction1(room, index) {
                    if(room==301 || room==302 || room==401 || room==402 )
                    {
                      $("#advance_select2Multiple44").append('<option value=' + room +'>'+ room+'-AC DELUXE ROOM' +'</option');
                      $("#advance_select2Multiple44 option[value=" + room + "]").attr('selected', 'selected');
                    }
                    if(room==303 || room==304 ||room==305 || room==306 || room==403)
                    {
                      $("#advance_select2Multiple11").append('<option value=' + room +'>'+ room +'-AC RE. ROOM' +'</option');
                      $("#advance_select2Multiple11 option[value=" + room + "]").attr('selected', 'selected');
                    }
                    if(room==203 || room==204 ||room==205 || room==206 || room==404 || room==405 || room==406)
                    {
                      $("#advance_select2Multiple22").append('<option value=' + room +'>'+ room +'-2BNAC'+'</option');
                      $("#advance_select2Multiple22 option[value=" + room + "]").attr('selected', 'selected');
                    }
                    if(room==201)
                    {
                      $("#advance_select2Multiple22").append('<option value=' + room +'>'+ room +'-4BNAC' +'</option');
                      $("#advance_select2Multiple22 option[value=" + room + "]").attr('selected', 'selected');
                    }
                    if(room==202)
                    {
                      $("#advance_select2Multiple22").append('<option value=' + room +'>'+ room +'-3BNAC' +'</option');
                      $("#advance_select2Multiple22 option[value=" + room + "]").attr('selected', 'selected');
                    }
                    if(room==1 || room==2 ||room==3 || room==4 ||room==5 || room==6 ||room==7 || room==8 ||room==9 || room==10 )
                    {
                      $("#advance_select2Multiple33").append('<option value=' + room +'>'+ room +'-DMNAC'+'</option');
                      $("#advance_select2Multiple33 option[value=" + room + "]").attr('selected', 'selected');
                    }
                    if( room==11 || room==12 ||room==13 || room==14 ||room==15 || room==16 ||room==17 || room==18 ||room==19 || room==20)
                    {
                      $("#advance_select2Multiple55").append('<option value=' + room +'>'+ room +'-DMAC'+'</option');
                      $("#advance_select2Multiple55 option[value=" + room + "]").attr('selected', 'selected');
                    }
                  }   
                  member_id.forEach(myFunction)
            }
        });

        }

  </script>
  <script>
 $(".browser-default-validation").change(function(){
    let age=document.getElementById("age");
    let address=document.getElementById("member_address");
    let occupation=document.getElementById("occupation");
    let reason=document.getElementById("reason");
    let sub=document.getElementById("subcommunity");
    let no_of_person=document.getElementById("no_of_person_id");
    let no_of_days=document.getElementById("no_of_days");
    if(age.value != "" && sub.value != "" && address.value != "" && occupation.value != "" && reason.value != "" && no_of_person.value != "" && no_of_days.value != "")
    {
      $("#repeat-next").prop('disabled',false);
    }
    else{
      $("#repeat-next").prop('disabled',true);
    }
 
 });
</script>
    <script>
  $(document).ready(function() {
    $("#repeat-next").prop('disabled',false);
       let currentStep = 1;

    $(".btn-next").on("click", function() {
      $('#member_age').val($('#age').val());
    });
  });

</script>

<script>
      function pdf(id)
      {
        alert("start");
          const myOffcanvas = document.getElementById(' myModal');
          let a=new bootstrap.Modal(myOffcanvas);
          a.show();
       alert(id);
      }
function edit(id)
{
          const myOffcanvas = document.getElementById('exLargeModal');
          let a=new bootstrap.Modal(myOffcanvas);
          a.show();
          $.ajax({
              url:"{{url('get_data')}}" +"/"+ id,
              type:'GET',
                success:function(response){
                  var gender=response[0]['gender'];
                  var community=response[0]['community'];
                  var date=new Date(response[0]['check_in_date']);
                  var checkindate=date.getDate()+"-"+(date.getMonth()+1)+"-"+date.getFullYear();
                  document.getElementById("id_proof1").src="assets/img/avatars/"+response[0]['id_proof'];
                  if(response[0]['id_proof1'] != null){
                  document.getElementById("id_proof2").src="assets/img/avatars/"+response[0]['id_proof1'];}
                  $("#select2Basic").val(response[0]['m_name']);
                  $("#full_name_form").val(response[0]['m_name']);
                  $("#age").val(response[0]['age']);
                  $("#member_address").val(response[0]['address']);
                  $("#subcommunity").val(response[0]['subcommunity']);
                  $("#member_city").val(response[0]['city']);
                  $('#member_email').val(response[0]['email']);
                  $('#member_phone').val(response[0]['phone_no']);
                  if(gender=="MALE"){
                    $("#MALE").attr('checked',true);
                    $("#inlineRadio1").attr('checked',true);
                  }
                  if(gender=="FEMALE"){
                    $("#FEMALE").attr('checked',true);
                    $("#inlineRadio2").attr('checked',true);}
                  $("#no_of_person_id").val(response[0]['no_of_person']);
                  $("#booking_id").val(response[0]['r_id']);
                  $("#person_id").val(response[0]['person_id']);
                  $("#deposit-amount").val(response[0]['deposite_rs']);
                  $("#rupees-in-words").val(response[0]['rs_word']);
                  $("#no_of_days").val(response[0]['no_of_days']);
                  $("#occupation").val(response[0]['occupation']);
                  $("#reason").val(response[0]['reason']);
                  
                  $("#flatpickr-datetime").val(checkindate);
                  $("#dlx_amount").val(response[0]['dlx_amount']);
                  $("#ac_amount").val(response[0]['ac_amount']);
                  $("#non_ac_amount").val(response[0]['non_ac_amount']);
                  $("#dmt_ac_amount").val(response[0]['door_mt_ac_amount']);
                  $("#dmt_amount").val(response[0]['door_mt_amount']);
                  
                  var room=response[0]['room_list'];
                  var ArrNames =room .split(",");
                 
                      ArrNames.forEach(myFunction1);
                      function myFunction1(room, index) {
                        if(room==301 || room==302 || room==401 || room==402 )
                        {
                          $("#select2Multiple44").append('<option value=' + room +'>'+ room+'-AC DELUXE ROOM' +'</option');
                          $("#select2Multiple44 option[value=" + room + "]").attr('selected', 'selected');
                        }
                        if(room==303 || room==304 ||room==305 || room==306 || room==403)
                        {
                          $("#select2Multiple11").append('<option value=' + room +'>'+ room +'-AC RE. ROOM' +'</option');
                          $("#select2Multiple11 option[value=" + room + "]").attr('selected', 'selected');
                        }
                        if(room==203 || room==204 ||room==205 || room==206 || room==404 || room==405 || room==406)
                        {
                          $("#select2Multiple22").append('<option value=' + room +'>'+ room +'-2BNAC'+'</option');
                          $("#select2Multiple22 option[value=" + room + "]").attr('selected', 'selected');
                        }
                        if(room==201)
                        {
                          $("#select2Multiple22").append('<option value=' + room +'>'+ room +'-4BNAC' +'</option');
                          $("#select2Multiple22 option[value=" + room + "]").attr('selected', 'selected');
                        }
                        if(room==202)
                        {
                          $("#select2Multiple22").append('<option value=' + room +'>'+ room +'-3BNAC' +'</option');
                          $("#select2Multiple22 option[value=" + room + "]").attr('selected', 'selected');
                        }
                        if(room==1 || room==2 ||room==3 || room==4 ||room==5 || room==6 ||room==7 || room==8 ||room==9 || room==10 )
                        {
                          $("#select2Multiple33").append('<option value=' + room +'>'+ room +'-DMNAC'+'</option');
                          $("#select2Multiple33 option[value=" + room + "]").attr('selected', 'selected');
                        }
                        if( room==11 || room==12 ||room==13 || room==14 ||room==15 || room==16 ||room==17 || room==18 ||room==19 || room==20)
                        {
                          $("#select2Multiple55").append('<option value=' + room +'>'+ room +'-DMAC'+'</option');
                          $("#select2Multiple55 option[value=" + room + "]").attr('selected', 'selected');
                        }
                      }   
                    member_id.forEach(myFunction)
                    function myFunction(item, index, arr) {
                        if((member_id[index])==community)
                        {
                          $("#select2Basic1 option[value=" + community + "]").attr('selected', 'selected');
                        }

                    }

                }
            });

            }
  
      </script>
</script>

<script>
 
  $(document).ready(function() {
   
    $(".repeat-next").on("click", function() {
      const selectedList4 = $('#select2Multiple44').val();
      const selectedList1 = $('#select2Multiple11').val();
      const selectedList2 = $('#select2Multiple22').val();
      const selectedList3 = $('#select2Multiple33').val();
      const selectedList5 = $('#select2Multiple55').val();
      const selectedDate = $('#flatpickr-datetime').val();
      const dlxacAmount = parseFloat($('#dlx_amount').val()) || 0; 
      const acAmount = parseFloat($('#ac_amount').val()) || 0; 
      const nonAcAmount = parseFloat($('#non_ac_amount').val()) || 0;
      const doorMtAmount = parseFloat($('#dmt_amount').val()) || 0;
      const doorMtAcAmount = parseFloat($('#dmt_ac_amount').val()) || 0;

    const totalAmount =dlxacAmount + acAmount + nonAcAmount + doorMtAmount + doorMtAcAmount;

    $('#room_amount').text( totalAmount);
    var selectedRooms = '';

            if (dlxacAmount !== 0) {
              selectedRooms = 'Deluxe Room:= ' + selectedList4;

              if (acAmount !== 0) {
                selectedRooms += ', A.C. Room:= ' + selectedList1;

                if (nonAcAmount !== 0) {
                  selectedRooms += ', Non A.C. Room:= ' + selectedList2;

                  if (doorMtAcAmount !== 0) {
                    selectedRooms += ', Door Mt AC Room:= ' + selectedList5;

                    if (doorMtAmount !== 0) {
                      selectedRooms += ', Door Mt Non AC Room:= ' + selectedList3;
                    }
                  }
                }
              }
            } else if (nonAcAmount !== 0) {
              selectedRooms = 'Non A.C. Room:= ' + selectedList2;

              if (doorMtAcAmount !== 0) {
                selectedRooms += ', Door Mt AC Room:= ' + selectedList5;

                if (doorMtAmount !== 0) {
                  selectedRooms += ', Door Mt Non AC Room:= ' + selectedList3;
                }
              }
            } else if (doorMtAcAmount !== 0) {
              selectedRooms = 'Door Mt AC Room:= ' + selectedList5;
            } else if (doorMtAmount !== 0) {
              selectedRooms = 'Door Mt Non AC Room:= ' + selectedList3;
            } else {
              selectedRooms = '';
            }

     // const selectedRooms = 'A.C. Room:= ' + selectedList1 + ', Non A.C. Room:= ' + selectedList2 + ', Door Metri A.C. / Non A.C. Room:= ' + selectedList3;
      $('#room_lst').text(selectedRooms);

      if (selectedDate && selectedDate.length > 0) {
        $('#check_date').text( selectedDate);
        // currentStep++;
      }
     
    });
  });
</script>
<script>
$(document).ready(function () {  
    $('#FEMALE').change(function(){
      $("#inlineRadio1").attr('checked',true);
      $("#gender_data").val("FEMALE");
      alert("check");
    });
    $('#MALE').change(function(){
      $("#inlineRadio2").attr('checked',true);
      $("#gender_data").val("MALE");
      alert("male");
    });
});
</script>

<script>
  let check=0;
  $(document).ready(function() {
    let currentStep = 1;
 
    $(".btn-next").on("click", function() {
      $(".rep-table").empty();
      const fullName = $('#full_name_form').val();
      const age = $('#members_age').val();
      const selectedGender = $('input[name="gender"]').val();
      const relation = $('#member_relation').val();
      const member = "Member";
      let i=1;
      $('#member_full_name').text(fullName);
      $('#members_age').text(age);
      $('#member_gen').text(selectedGender);
      $('#member_rel').text(relation);
      $('#member').text(member);
      if(check==1)
      {
      $(".rep-table").append(
        '<tr>' +
        '<td>'+ '1' +'</td>' +
        '<td id="member_full_name">' + $('#full_name_form').val() + '</td>' +
        '<td id="members_age">' + $('#member_age').val() + '</td>' +
        '<td id="member_gen">' +  $('#gender_data').val() + '</td>' +
        '<td id="member_rel">' + $('#member_relation').val() + '</td>' +
        '<td id="member">' + '<input type=checkbox class=member value='+$('#full_name_form').val()+' name=member[0]>' + '</td>' +
        '</tr>'
      );}else{
        $(".rep-table").append(
        '<tr>' +
        '<td>'+ i +'</td>' +
        '<td id="member_full_name">' + $('#full_name_form').val() + '</td>' +
        '<td id="members_age">' + $('#member_age').val() + '</td>' +
        '<td id="member_gen">' + $('#gender_data').val() + '</td>' +
        '<td id="member_rel">' + $('#member_relation').val() + '</td>' +
        '<td id="member">' + '<input type=checkbox class=member value='+$('#full_name_form').val()+' name=member[0] checked >' + '</td>' +
        '</tr>'
      );}
      
      let numForms = parseInt($("#no_of_person_id").val());
      if (isNaN(numForms) || numForms <= 0) {
       
        return false;
      }  let j=2;
      for (let i = 1; i < numForms; i++) {
      
        if(check==1)
        {$(".rep-table").append(
          '<tr>' +
          '<td>'+ j +'</td>' +
          '<td class="member_full_name' + i + '">' + $('#full_name_form' + i).val()+ '</td>' +
          '<td class="members_age' + i + '">' + $('#member_age' + i).val() + '</td>' +
          '<td class="member_gen'+ i +'">' + $('input[name="gender'+i+'"]:checked').val() + '</td>' +
          '<td class="member_rel' + i + '">' + $('#member_relation' + i).val() + '</td>' +
          '</tr>'
        );
        j++;
        }else{
        $(".rep-table").append(
        '<tr>' +
        '<td>'+ j +'</td>' +
        '<td class="member_full_name' + i + '">' + $('#full_name_form' + i).val() + '</td>' +
        '<td class="members_age' + i + '">' + $('#member_age' + i).val() + '</td>' +
        '<td class="member_gen'+ i +'">' + $('input[name="gender'+i+'"]:checked').val() + '</td>' +
        '<td class="member_rel' + i + '">' + $('#member_relation' + i).val() + '</td>' +
        '<td class="member' + i + '">' + '' + '</td>' +
        '</tr>'
         );
        j++;
      }
    }
      $(".rep-table").show();
    });
  });

  $("#deposit-amount").keydown(function(e){
        if(e.key === "-" || e.key === "+"){e.preventDefault();}
  });

  $("#deposit-amount").focusout(function(){
    if($("#deposit-amount").val()>9000){  
      Swal.fire({
          title: "Are you sure?",
          text: "You want to deposite in Cash!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes,do It!",
      }).then((result) => {
          // If the user confirms the deletion, proceed with the deletion logic
          if (result.isConfirmed) {
            check=1;
          }else{
            $("#deposite").html("Deposite Amount Should Be Below 9000");
            $("#repeat-next").prop('disabled',true);
          }
          });
        }else{check=0;$("#deposite").html("");}
        });
</script>
<script>
   $(document).ready(function() {
    $("#repeat-next").click(function() {
      alert("hii");
      console.log("click");
      let numForms = parseInt($("#no_of_person_id").val());
      $(".rep-form").empty();
      for (let i = 1; i < numForms; i++) {
        let formTemplate = $(".rep-form .formrepeater").clone();
        $(".rep-form").append(

          '<div class="row formrepeater">'+
                                  '<div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0" hidden>'+
                                      '<label class="form-label" for="form-repeater-1-1">member_id</label>'+
                                      '<input type="text" id="m_id'+i+'" name="m_id'+i+'" class="form-control" placeholder="john doe" value="" readonly/>'+
                                    '</div>'+

                                 ' <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">'+
                                   ' <label class="form-label" for="form-repeater-1-1">Full Name</label>'+
                                   ' <input type="text" id="full_name_form'+i+'" style="text-transform:uppercase" name="full_name'+i+'" class="form-control" placeholder="john doe" required />'+
                                 ' </div>'+
                                 ' <div class="mb-3 col-lg-4 col-xl-3 col-12 mb-0">'+
                                  '  <label class="form-label" for="form-repeater-1-2">Age</label>'+
                                  '  <input type="number" id="member_age'+i+'" name="m_age'+i+'" class="form-control" placeholder="your age"  maxlength="2" required oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);"  />'+
                                '  </div>'+
                                  
                                  
                                '  <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">'+
                                  
                                     ' <label class="d-block form-label">Gender</label>'+
                                     ' <div class="form-check form-check-inline">'+
                                       ' <input class="form-check-input" type="radio" name="gender'+i+'" id="inlineRadio1' + i + '" value="MALE" checked />'+
                                       ' <label class="form-check-label" for="inlineRadio1' + i + '">Male</label>'+
                                     ' </div>'+
                                     ' <div class="form-check form-check-inline">'+
                                      '  <input class="form-check-input" type="radio" name="gender'+i+'" id="inlineRadio2' + i + '" value="FEMALE" />'+
                                      '  <label class="form-check-label" for="inlineRadio2' + i + '" selected>Female</label>'+
                                    '  </div>'+
                                '  </div>'+
                                '    <div class="col-md-3">'+
                                    '  <label class="form-label" for="basic-default-country">Relation</label>'+
                                    '  <select class="form-select "name="relation'+i+'" id="member_relation'+i+'" required>'+
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
                                    '  <option value="SON">SON</option>'+
                                    '  <option value="UNCLE">UNCLE</option>'+
                                    '  <option value="WIFE">WIFE</option>'+
                        
                                  '  </select>'+
                                 ' </div>'+
                                //  ' <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">'+
                                //   '  <button class="btn btn-label-danger mt-4" data-repeater-delete>'+
                                //    '   <i class="ti ti-x ti-xs me-1"></i>'+
                                //    '   <span class="align-middle">Delete</span>'+
                                //   '  </button>'+
                                //   '</div>'+
                               ' </div>'
                              ); 
                             }

                              var id=document.getElementById("person_id").value;
        var relation=[];
        var temp=document.getElementById('member_relation');
             for(i=0;i<temp.options.length;i++)
                  {
                    relation[i]=temp.options[i].value;
                  }
        $.ajax({
            url:"{{url('get_memberdata')}}" +"/"+ id,
            type:'GET',
              success:function(response){
                var len=response.length;
                
               for(i=0;i<=len;i++)
                {     
                $('#m_id' + i).val(response[i]['p_id']);
                $('#full_name_form' + i).val(response[i]['full_name']);
                $('#member_age' + i).val(response[i]['age']);
                var gender=response[i]['gender'];
                var rel=response[i]['relation'];
                $("#member_relation"+ i +" option[value=" + rel + "]").attr('selected', 'selected');
                if(gender=="MALE"){$("#inlineRadio1"+i).attr('checked',true);}
                if(gender=="FEMALE"){$("#inlineRadio2"+i).attr('checked',true);}
                }
              }
            });   
    

      // Display the forms container
      $(".rep-form").show();
    });
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
      displayLength: 10,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      order:[0,'desc'],
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
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
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
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
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
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
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
                columns: [0,1 ,2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
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

    
    $('div.head-label').html('<h5 class="card-title mb-0">View Room Booking</h5>');

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
<script>
  function convertToWords() {
  var depositAmount = parseFloat(document.getElementById("advance_deposit-amount").value);
  var inWords = numberToWords(depositAmount);
  document.getElementById("advance_rupees-in-words").value = inWords;
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
document.getElementById("advance_deposit-amount").addEventListener("input", convertToWords);

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  let flag=0;
  $("#kvo_update_room_booking :input").change(function() {
    flag=1;
    });
    $("#kvo_update_room_booking").submit(function(){
        var age=document.getElementById("age").value;
        var address=document.getElementById("member_address").value;
        var no_of_days=document.getElementById("no_of_days").value;
        var occupation=document.getElementById("occupation").value;
        var reason=document.getElementById("reason").value;
        var subcommunity=document.getElementById("subcommunity").value;
        if(age ==='' && subcommunity === '' && address ==='' && no_of_days ==='' && occupation ==='' && reason ==='')
        {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
            });
            return false; // Prevent form submission
        } else {
          toastr['success']("{{ Session::get('message') }}", 'Updated!', {
            closeButton: true,
            tapToDismiss: false,
        });
      }
    });
</script>

<script src="{{ asset ('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>

@endsection

@endsection
