
@extends('layouts.app')

@section('title', 'Advance Room Booking')

@section('pagecss')

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/tagify/tagify.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/dropzone/dropzone.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

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
                          <h4 class="fw-bold py-3"><span class="text-muted fw-light"></span>Advance Room Booking</h4>
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
                             
                            @include('layouts.adduser')
                           
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
                    <div class="bs-stepper-content">
                    <form class="browser-default-validation" action="{{ route('AdvanceRoomBooking') }}" method="POST" id="room_booking">
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
                                <input type="text" class="form-control" name="deposit_no" id="deposit_no" placeholder="Deposit No" value="{{$p_id+1}}" readonly/>
                            </div>
                             <div class="col-md-4">
                                <label for="select2Basic" class="form-label"><span class="required">Name</span></label>
                                <select id="select2Basic" class="select2 form-select" data-allow-clear="true" name="name" placeholder="select name" required>
                                  <option value=""></option>
                                  @foreach ($m_data as $row)  
                                      <option value="{{$row->p_id}}" {{!empty($member) && $member->m_name == $row->m_name ? "selected" : ""}}>{{$row->m_name}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$row->phone_no}}</option>
                                  @endforeach
                                </select>
                                   
                                <input type="hidden" id="email_user" value="{{!empty($m_data)  ? $m_data:''}}">
                            </div>

                            
                              <div class="col-md-4">
                                  <label class="form-label" for="basic-default-email"><span class="required">Email</span></label>
                                  <input type="email" id="member_email" name="email" class="form-control" placeholder="john.doe" value="{{ (!empty($member) )? $member->email : '' }}" required readonly/>
                              
                              </div>

                              <div class="col-md-4">
                                <label class="form-label" for="multicol-phone"><span class="required">Phone Number</span></label>
                                <input type="number" id="member-phone" name="phone_no" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" value="{{ (!empty($member)) ? $row->phone_no : '' }}"    maxlength="10"
                              required
                              oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" readonly/>
                              </div> 
                              
                              <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" id="member_city" style="text-transform:uppercase" placeholder="John Doe" aria-describedby="defaultFormControlHelp" value="{{ (!empty($member)) ? $member->city : '' }}" readonly/>
                              </div>
                 
                            <div class="col-md-4">
                              <label for="flatpickr-range" class="form-label"><span class="required">Advance Date</span></label>
                              <input type="text" class="form-control" name="advance_date" placeholder="DD-MM-YYYY HH:MM" id="daterange" required/>
                            </div>

                          </div>
                          
                        <!-- Personal Info -->
                     
                        
                          <div class="row g-3">
                            
                           
                            <!-- /Datetime Picker-->

                            <!-- Primary -->

                            <div class="row mt-5">
                             
                                <div class="col-12">
                                    <h6 class="fw-semibold">2. Booking Details</h6>
                                     <hr class="mt-0 mb-0" />
                                </div>
                                <div class="col-md-2 mt-3">
                                <label for="select2Multiple4" class="form-label"> Deluxe Room</label> 
                              
                                <select id="select2Multiple44" name="select2Multiple4[]" class="select2 form-select" multiple>
                                    @foreach($dlx_list as $list)
                                        <option value="{{$list}}">{{$list}}</option>
                                    @endforeach
                              </select>
                            </div>
                            <div class="col-md-2 mt-3">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="text" class="form-control"  name="dlx_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="dlx_amount" maxlength="4" onkeypress="return onlyNumbers(this.value);"/>
                                  </div>
                              </div>
                            
                            <div class="col-md-2 mt-3">
                                <label for="select2Multiple1" class="form-label">Ac Room</label> 
                              
                                <select id="select2Multiple11" name="select2Multiple1[]" class="select2 form-select room-input" multiple>
                                     @foreach($ac_list as $list)
                                        <option value="{{$list}}" >{{$list}}</option>
                                    @endforeach
                              </select>
                            </div>

                                <div class="col-md-2 mt-3">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control "  name="ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="ac-amount" />
                                  </div>
                                </div>

                                <div class="col-md-2 mt-3">
                                <label for="select2Multiple2" class="form-label">Non Ac Room</label>
                                <select id="select2Multiple22" name="select2Multiple2[]" class="select2 form-select room-input" multiple>
                                    @foreach($non_ac_list as $list)
                                        <option value="{{$list}}" >{{$list}}</option>
                                    @endforeach

                                </select>
                              </div>

                                <div class="col-md-2 mt-3">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control"  name="non_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)" id="non-ac-amount" />
                                  </div>
                                </div>
                                <div class="col-md-2 mt-3">
                                <label for="select2Multiple5" class="form-label">Door Mt AC Room</label>
                                <select id="select2Multiple55" name="select2Multiple5[]" class="select2 form-select" multiple>
                                    @foreach($dmt_ac_list as $list)
                                        <option value="{{$list}}" >{{$list}}</option>
                                    @endforeach
                                </select>
                              </div>
                                <div class="col-md-2 mt-3">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="text" class="form-control"  name="door_mt_ac_amount" id="door_mt_ac_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)"  maxlength="4" onkeypress="return onlyNumbers(this.value);" />
                                  </div>
                                </div>

                                <div class="col-md-2 mt-3">
                                <label for="select2Multiple3" class="form-label">Door Mt Non AC Room</label>
                                <select id="select2Multiple33" name="select2Multiple3[]" class="select2 form-select room-input" multiple>
                                    @foreach($dmt_list as $list)
                                        <option value="{{$list}}" >{{$list}}</option>
                                    @endforeach
                                </select>
                              </div>

                                <div class="col-md-2 mt-3">
                                  <label class="form-label" for="basic-default-name">Amount</label>
                                  <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control"  name="door_mt_amount" id="door_mt_amount" placeholder="Amount" aria-label="Amount (to the nearest indian)"   />
                                  </div>
                                </div>
                            
                            </div>
                         
                      
                            
                            <div class="col-md-4">
                              <label class="form-label" for="basic-default-name"><span class="required">No. of Person</span></label>
                              <input type="number" class="form-control"  name="no_of_person" id="no_of_person_id" placeholder="No of Person" value="1" required/>
                            </div>
                            <!-- Datetime Picker-->
                            

                            <div class="col-md-4">
                              <label class="form-label" for="deposit-amount"><span class="required">Deposit Rs</span></label>
                              <input type="number" class="form-control" name="deposite_rs" id="deposit-amount" placeholder="Deposit Rs" required>
                              <div id="deposite" class="error-message" ></div>
                            </div>
                            
                            <div class="col-md-4">
                              <label class="form-label" for="rupees-in-words">Deposit Rs (rupees in words)</label>
                              <input type="text" class="form-control" name="rs_word" id="rupees-in-words" placeholder="Rupees in words" readonly>
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="deposit-amount"><span class="required">No of Days</span></label>
                              <input type="number" class="form-control" name="no_of_days" id="no_of_days" placeholder="no_of_days" value="1" required readonly>
                              <input type="hidden" name="start_date" id="start_date" value="">
                              <input type="hidden" name="end_date" id="end_date" value="">
                            </div>
                            
                            <div class="col-md-4">
                              <label class="form-label" for="rupees-in-words">Occupation</label>
                              <input type="text" class="form-control" style="text-transform:uppercase" name="occupation" id="occupation" placeholder="Occupation" required>
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="rupees-in-words">Reason</label>
                              <input type="text" class="form-control" style="text-transform:uppercase" name="reason" id="reason" placeholder="Reason to stay" required>
                            </div>
  
                            <div class="col-12 flex justify-content">
                            <button type="submit" id="submitbtn1" class="btn btn-success btn-submit">Submit</button>
                          </div>
                          </div>
                       
                        <!-- All No of Person -->
                       
                          
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
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>



    
    <!-- Page JS -->
    
    <script src="{{ asset ('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>

    <script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>

    <script src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>

    <script src="{{ asset ('assets/js/forms-extras.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
    jQuery(function ($) {
        var startDate = moment();
        var endDate = moment();
        
        
        $('input[name="advance_date"]').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD-MM-YYYY'
            },
            startDate: startDate,
            endDate: endDate
        }, function(start, end, label) {
          
            $('#daterange').val(start.format('DD-MM-YYYY') + ' To ' + end.format('DD-MM-YYYY'));
        });
    });


</script> 
<script>
    let list1=document.getElementById("select2Multiple11");
    let list2=document.getElementById("select2Multiple22");
    let list3=document.getElementById("select2Multiple33");
    $("#room_booking").submit(function(){
      

      var check=0;
      if(list1.value !="" || list2.value !="" || list3.value !="")
      {
        check=1;
      }
      if(check==0)
      {
        Swal.fire(
                'Required!',
                'Please Select One Room',
                'warning'
                )
        event.preventDefault();
       
      }
      if($("#deposit-amount").val()>9000){ 
         $("#deposite").html("Deposite Amount Should Be Below 9000"); 
         event.preventDefault();}
    });
</script>


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
      $("#deposit-amount").keydown(function(e){
        if(e.key === "-" || e.key === "+"){e.preventDefault();}
      });
      $("#multicol-phone").focusout(function(){
        var contact=document.getElementById("multicol-phone").value;
        $.ajax({
                
                url:"{{url('check_num')}}"+"/"+ contact,
                type:'GET',
                success:function(response){
                    if(response==1)
                      { $("#submitbtn1").prop('disabled',true);
                        $("#error").html("Phone no alraedy exit");
                      }
                    else{ $("#submitbtn1").prop('disabled',false);
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
   $('#daterange').change(function() {
   
      var date=$("#daterange").val();
      alert(date);
      var index=date.indexOf('-');
      var startdate=date.substr(0,index-1);
      var enddate=date.substr(index+1);
      let n;
      $.ajax({
                
                url:"{{url('checkRoom')}}"+"/"+ date,
                type:'GET',
                success:function(response){
                  alert("success");
                  $("#select2Multiple11 option").remove();
                  $("#select2Multiple22 option").remove();
                  $("#select2Multiple33 option").remove();
                  $("#select2Multiple44 option").remove();
                  $("#select2Multiple55 option").remove();
                  n=response[0].length;
                  for(i=0;i<n;i++)
                  {
                    var dlx_list=response[0][i];
                    $('#select2Multiple44').append(`<option value="${dlx_list}"> ${dlx_list} </option>`); 
                  }
                  n=response[1].length;
                  for(i=0;i<n;i++)
                  {
                    var ac_list=response[1][i];
                    $('#select2Multiple11').append(`<option value="${ac_list}"> ${ac_list} </option>`); 
                  }
                  n=response[2].length;
                  for(i=0;i<n;i++)
                  {
                    var non_ac_list=response[2][i];
                    $('#select2Multiple22').append(`<option value="${non_ac_list}"> ${non_ac_list} </option>`); 
                  }
                  n=response[3].length;
                  for(i=0;i<n;i++)
                  {
                    var dmt_list=response[3][i];
                    $('#select2Multiple33').append(`<option value="${dmt_list}"> ${dmt_list} </option>`); 
                  }
                  n=response[4].length;
                  for(i=0;i<n;i++)
                  {
                    var dmt_ac_list=response[4][i];
                    $('#select2Multiple55').append(`<option value="${dmt_ac_list}"> ${dmt_ac_list} </option>`); 
                  }
                 
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

</script>

<!-- <script>
        $(document).ready(function () {
            $("#select2Basic").change(function () {
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
</script> -->

<script>
 
  $(document).ready(function() {
    $("#select2Basic").change(function(){
      const id=document.getElementById("select2Basic").value;
      $.ajax({
        
                url:"{{url('get')}}" +"/"+ id,
                type:'GET',
                  success:function(response){   
                        $("#member_city").val(response['city']); 
                        $("#member-phone").val(response['phone_no']); 
                        $("#member_email").val(response['email']);

                  }
                });
            }); 
    $("#repeat-next").on("click", function() {

      $('#member_age').val($('#basic-default-age').val());

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
 
    $("#btn-step3").on("click", function() {
      $(".rep-table").empty();
      const fullName = $('#full_name_form').val();
      const age = $('#member_age').val();
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
      }
      for (let i = 1; i < numForms; i++) {
        let j=2;
     
        $(".rep-table").append(
          '<tr>' +
          '<td>'+ j +'</td>' +
          '<td class="member_full_name' + i + '">' + $('#full_name_form' + i).val() + '</td>' +
          '<td class="members_age' + i + '">' + $('#member_age' + i).val() + '</td>' +
          '<td class="member_gen'+ i +'">' + $('input[name="gender'+i+'[]"]:checked').val() + '</td>' +
          '<td class="member_rel' + i + '">' + $('#member_relation' + i).val() + '</td>' +
          '</tr>'
         );

        j++;
      }

      $(".rep-table").show();
    });
  });
</script>


 
<script>
  $(document).ready(function() {
    $("#repeat-next").click(function() {
      console.log("click");
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
                                   ' <input type="text" id="full_name_form'+i+'" style="text-transform:uppercase" name="full_name[]" class="form-control" placeholder="john doe" value="{{ (!empty($member) )? $member->m_name : '' }}"/>'+
                                 ' </div>'+
                                 ' <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">'+
                                  '  <label class="form-label" for="form-repeater-1-2">Age</label>'+
                                  '  <input type="number" id="member_age'+i+'" name="m_age[]" class="form-control" placeholder="your age" />'+
                                '  </div>'+
                                  
                                  
                                '  <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0 ">'+
                                  
                                     ' <label class="d-block form-label">Gender</label>'+
                                     ' <div class="form-check form-check-inline">'+
                                       ' <input class="form-check-input" type="radio" name="gender'+i+'[]" id="inlineRadio1_' + i + '" value="MALE" checked/>'+
                                       ' <label class="form-check-label" for="inlineRadio1' + i + '">Male</label>'+
                                     ' </div>'+
                                     ' <div class="form-check form-check-inline">'+
                                      '  <input class="form-check-input" type="radio" name="gender'+i+'[]" id="inlineRadio2_' + i + '" value="FEMALE" />'+
                                      '  <label class="form-check-label" for="inlineRadio2' + i + '" selected>Female</label>'+
                                    '  </div>'+
                                '  </div>'+
                                ' <div class="col-md-4">'+
                                    '  <label class="form-label" for="basic-default-country">Relation</label>'+
                                    '  <select class="form-select" name="relation[]" id="member_relation'+i+'" required>'+
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
  </script>
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

<script>
$(document).ready(function() {

  $("#repeat-next").click(function() {
    const no_of_personErrorMessage = document.getElementById('no_of_person_id'); 

    const no_of_personField = document.getElementById('no_of_person_id'); // Get the email input field
    
   // Get the error message container

    if (no_of_personField.value.trim() === '') {
      no_of_personField.classList.add('required-input'); // Apply red border style
      no_of_personErrorMessage.textContent = 'Please fill in this field.'; // Display error message
      no_of_personField.focus(); // Focus on the empty field
     
     //$("#btn-step1").prop('disabled',true);
    }
  });

  $("#btn-step1").click(function() {
    const emailErrorMessage = document.getElementById('email-error-message'); 
    const ageErrorMessage = document.getElementById('basic-default-age'); 
    const phoneErrorMessage = document.getElementById(' multicol-phone');
    const subcommunityErrorMessage = document.getElementById('defaultFormControlInput'); 
    const addressErrorMessage = document.getElementById('member-address'); 
    const emailField = document.getElementById('member_email'); // Get the email input field
    const ageField = document.getElementById('basic-default-age'); // Get the email input field
    const phoneField = document.getElementById('multicol-phone'); // Get the email input field
    const subcommunityField = document.getElementById('defaultFormControlInput'); // Get the email input field
    const addressField = document.getElementById('member-address'); // Get the email input field
   // Get the error message container

    if (emailField.value.trim() === '') {
      emailField.classList.add('required-input'); // Apply red border style
      emailErrorMessage.textContent = 'Please fill email in this field.'; // Display error message
      emailField.focus(); // Focus on the empty field
     
     //$("#btn-step1").prop('disabled',true);
    }
    if (ageField.value.trim() === '') {
      ageField.classList.add('required-input'); // Apply red border style
      ageErrorMessage.textContent = 'Please fill age in this field.'; // Display error message
      ageField.focus(); // Focus on the empty field
    
    }
    if (phoneField.value.trim() === '') {
      phoneField.classList.add('required-input'); // Apply red border style
      phoneErrorMessage.textContent = 'Please fill phone in this field.'; // Display error message
      phoneField.focus(); // Focus on the empty field
      //event.preventDefault(); // Prevent form submission
    }
    if (subcommunityField.value.trim() === '') {
      subcommunityField.classList.add('required-input'); // Apply red border style
      subcommunityErrorMessage.textContent = 'Please fill subcommunity in this field.'; // Display error message
      subcommunityField.focus(); // Focus on the empty field
    
    }
    if (addressField.value.trim() === '') {
      addressField.classList.add('required-input'); // Apply red border style
      addressErrorMessage.textContent = 'Please fill address in this field.'; // Display error message
      addressField.focus(); // Focus on the empty field
    
    }
    
  });
});
</script>


@endsection

@endsection

