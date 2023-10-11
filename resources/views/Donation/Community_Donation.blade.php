@extends('layouts.app')

@section('title', 'Community Donation')

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
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Page CSS -->
<style>

.form-label {
    font-weight: bold;
}

.form-control[readonly] {
      background-color: #efefef;
      opacity: 1;
  }
  .validate {
    border-color: green !important;
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
                          <h4 class="fw-bold py-3">સામાજિક દાન</h4>
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
                      <form id="kvo_community_donation" class="browser-default-validation"  method="POST" action="{{route ('CommunityDonation')}}"  target="_blank">
                        @csrf
                        <div class="row g-3">
                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Details</h6>
                            <hr class="mt-0 mb-0" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" name="p_number" for="basic-default-name">પહોંચ નંબર</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              name="donation_id"
                              value="{{ $donation_id + 1 }}"  readonly
                               />
                          </div>

                          <div class="col-md-4">
                            <label for="select2Basic" class="form-label">નામ</label>
                            <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="name" placeholder="select name" required>
                              <option value=""></option>
                              @foreach ($m_data as $row)  
                              <option value="{{$row->p_id}}"> {{$row->m_name}} - {{$row->phone_no}} </option>
                              @endforeach
                            </select>
                  
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="multicol-phone">મોબાઈલ નંબર</label>
                            <input
                              type="number"
                              id="member-phone"
                              name="phone_no" 
                              class="form-control phone-mask"
                              placeholder=""
                              value="{{ (!empty($member)) ? $member->phone_no : '' }}"
                              oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" readonly/>

                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="basic-default-name">ગામ</label>
                            <input
                              type="text"
                              class="form-control"
                              name="city"
                              id="member_city"
                              placeholder=""
                              value="{{ (!empty($member)) ? $member->donation : '' }}"
                              readonly/>
                         
                          </div>
                          <div class="col-md-2">
                            <label class="form-label"  for="basic-default-dob">તારીખ</label>
                            <input
                              type="text"
                              class="form-control flatpickr-validation"
                              name="d_date"
                              id="basic-default-dob"
                              required />
                          </div>

                          
                          <div class="col-12">
                            <h6 class="mt-4 fw-semibold">2. Donation Details</h6>
                            <hr class="mt-0 mb-0" />
                            </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શેઠશ્રી રતનશી ટોકરશી વોરા મેડિકલ ચેકઅપ સેન્ટર</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" id="medical_checkup" name="medical_checkup" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                              
                            </div>
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">મહાજનનું મામેરું</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="mahajan" id="mahajan" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">માતુશ્રી લાખણીબાઈ રામજી તેજશી ગાલા નવનીત ભોજનશાળા</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="bhojanshala" id="bhojanshala" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">લવાજમ</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="lavajam" id="lavajam" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">એમ્બ્યુલન્સ ડોનેશન</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="ambulance" id="ambulance" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">ઈતર</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="other" id="other" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">અન્ય વિગત</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              name="remarks" 
                              style="text-transform:capitalize"
                              />
                        	</div>
                          {{-- <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">ટોટલ</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input  type="text" id="Text1" class="form-control" name="total" placeholder="Amount" aria-label="Amount (to the nearest dollar)"
                              onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'ankers');" maxlength="9" required>
                            </div>
                          </div> --}}

                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">ટોટલ</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="text" id="total" class="form-control" name="total" placeholder="Amount" aria-label="Amount (to the nearest dollar)" onkeypress="return onlyNumbers(event);" maxlength="9" required readonly>
                            </div>
                          </div>
                          {{-- <div id="divDisplayWords"> --}}
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">અંકે રૂપિયા</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ankers"
                              name="total_in_word" 
                              value=""
                              {{-- placeholder="John Doe" --}}
                              required readonly/>
                        	</div>
                          <div class="col-md-4">
                            <label class="d-block form-label">નાણા મળેલ</label>
                            <div class="form-check form-check-inline">
                              <input
                                type="radio"
                                id="basic_default_radio-female"
                                name="basic_default_radio"
                                class="form-check-input"
                                value="CASH"
                                required checked/>
                              <label class="form-check-label" for="basic_default_radio">રોકડા</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                              <input
                                type="radio"
                                id="basic_default_radio-male"
                                name="basic_default_radio"
                                class="form-check-input"
                                value="CHEQUE"
                                required />
                              <label class="form-check-label" for="basic_default_radio">ચેક</label>
                            </div>
                           
                            <div class="form-check form-check-inline">
                              <input
                                type="radio"
                                id="basic_default_radio-female"
                                name="basic_default_radio"
                                class="form-check-input"
                                value="UPI"
                                required />
                              <label class="form-check-label" for="basic_default_radio">UPI</label>
                            </div>
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
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset ('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset ('assets/js/forms-selects.js') }}"></script>
    
    <!-- Page JS -->
    <script src="{{ asset ('assets/js/form-validation.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/ui-toasts.js') }}"></script>

    <script>
        jQuery(document).ready(function($){
        var currentDate = new Date();
        $('#basic-default-dob').flatpickr({
        dateFormat: "d-m-Y",
        defaultDate: currentDate
    })
    });
    </script>

    
<script>
  $(document).ready(function () {
      // Select all input fields with class 'amount-input'
      $('.amount-input').on('input', function () {
          var total = 0;

          // Loop through each input field and calculate the total
          $('.amount-input').each(function () {
              var amount = parseFloat($(this).val());
              if (!isNaN(amount)) {
                  total += amount;
              }
          });

          // Update the 'ટોટલ' input field with the calculated total
          $('#total').val(total);

          // Convert the total to words and update the 'અંકે રૂપિયા' input field
          NumToWord(total, 'ankers');
      });
  });

  function onlyNumbers(evt) {
      var e = event || evt; // For trans-browser compatibility
      var charCode = e.which || e.keyCode;

      if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
      return true;
  }

  function NumToWord(inputNumber, outputControl) {
      // Your NumToWord function implementation
      // Make sure it works correctly separately
  }
</script>

    <!-- start num to word -->

    <script  type="text/javascript">
      function onlyNumbers(evt) {
  var e = event || evt; // For trans-browser compatibility
  var charCode = e.which || e.keyCode;

  if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
  return true;
}

function NumToWord(inputNumber, outputControl) {
  var str = new String(inputNumber)
  var splt = str.split("");
  var rev = splt.reverse();
  var once = ['Zero', ' One', ' Two', ' Three', ' Four', ' Five', ' Six', ' Seven', ' Eight', ' Nine'];
  var twos = ['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
  var tens = ['', 'Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety'];

  numLength = rev.length;
  var word = new Array();
  var j = 0;

  for (i = 0; i < numLength; i++) {
      switch (i) {

          case 0:
              if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                  word[j] = '';
              }
              else {
                  word[j] = '' + once[rev[i]];
              }
              word[j] = word[j];
              break;

          case 1:
              aboveTens();
              break;

          case 2:
              if (rev[i] == 0) {
                  word[j] = '';
              }
              else if ((rev[i - 1] == 0) || (rev[i - 2] == 0)) {
                  word[j] = once[rev[i]] + " Hundred ";
              }
              else {
                  word[j] = once[rev[i]] + " Hundred and";
              }
              break;

          case 3:
              if (rev[i] == 0 || rev[i + 1] == 1) {
                  word[j] = '';
              }
              else {
                  word[j] = once[rev[i]];
              }
              if ((rev[i + 1] != 0) || (rev[i] > 0)) {
                  word[j] = word[j] + " Thousand";
              }
              break;

              
          case 4:
              aboveTens();
              break;

          case 5:
              if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                  word[j] = '';
              }
              else {
                  word[j] = once[rev[i]];
              }
              if (rev[i + 1] !== '0' || rev[i] > '0') {
                  word[j] = word[j] + " Lakh";
              }
              
              break;

          case 6:
              aboveTens();
              break;

          case 7:
              if ((rev[i] == 0) || (rev[i + 1] == 1)) {
                  word[j] = '';
              }
              else {
                  word[j] = once[rev[i]];
              }
              if (rev[i + 1] !== '0' || rev[i] > '0') {
                  word[j] = word[j] + " Crore";
              }                
              break;

          case 8:
              aboveTens();
              break;

          //            This is optional. 

          //            case 9:
          //                if ((rev[i] == 0) || (rev[i + 1] == 1)) {
          //                    word[j] = '';
          //                }
          //                else {
          //                    word[j] = once[rev[i]];
          //                }
          //                if (rev[i + 1] !== '0' || rev[i] > '0') {
          //                    word[j] = word[j] + " Arab";
          //                }
          //                break;

          //            case 10:
          //                aboveTens();
          //                break;

          default: break;
      }
      j++;
  }

  function aboveTens() {
      if (rev[i] == 0) { word[j] = ''; }
      else if (rev[i] == 1) { word[j] = twos[rev[i - 1]]; }
      else { word[j] = tens[rev[i]]; }
  }

  word.reverse();
  var finalOutput = '';
  for (i = 0; i < numLength; i++) {
      finalOutput = finalOutput + word[i];
  }
  document.getElementById(outputControl).value = finalOutput;
}
</script>
<!-- end num to word -->
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
                  $('#member-phone').val(response['phone_no']);
                  $('#member_city').val(response['city']);
              

                }
              });
        </script>
    @endif

<!-- Make sure to include jQuery library before this script -->
<script>
  $("#select2Basic").change(function(){
      const id=document.getElementById("select2Basic").value;
      $.ajax({
  
                url:"{{url('get')}}" +"/"+ id,
                type:'GET',
                  success:function(response){   
                        $("#member_city").val(response['city']); 
                        $("#member-phone").val(response['phone_no']); 
                  }
                });
            });
</script>
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
      </script>

<script>
       $("#kvo_community_donation").submit(function (event) {
            var flag = 0;
            $(".amount-input").each(function () {
              if ($(this).val() !== "") {
                flag = 1;
              }
            });

            if (flag === 0) {
             
              Swal.fire(
                'Required!',
                'Please Enter One Amount ',
                'warning'
             
              );
              event.preventDefault();
            } else {
              window.location.href = "View_Community_Donation";
            }
          });
    </script>
<script>
$(document).ready(function () {
 
});
</script>


@endsection

@endsection


