@extends('layouts.app')

@section('title', 'Religious Donation')

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

<!-- Page CSS -->
<style>

.form-label {
    font-weight: bold;
}

.form-control[readonly] {
      background-color: #efefef;
      opacity: 1;
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
                          <h4 class="fw-bold py-3">ધાર્મિક દાન</h4>
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
                      <form id="KVO_religious_donation" class="browser-default-validation" method="POST" action="{{route('ReligiousDonation')}}">
                        @csrf
                        <div class="row g-3">
                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="basic-default-name">પહોંચ નંબર</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              name="religious_donation_id"
                              value="{{ $religious_donation_id + 1 }}" readonly>
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

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">હસ્તે</label>
                            <input
                              type="text"
                              class="form-control"
                              id="haste"
                              name="haste"
                              style="text-transform:uppercase"
                              placeholder="John Doe"
                              value="SELF"
                              required />
                         
                        	</div>
                          <div class="col-md-2">
                            <label class="form-label"  for="basic-default-dob">તારીખ</label>
                            <input
                              type="text"
                              class="form-control flatpickr-validation"
                              name="r_date"
                              id="basic-default-dob"
                              required />
                          </div>
                          
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">મોબાઈલ નંબર</label>
                            <input
                              type="number"
                              id="member-phone"
                              name="phone_no" 
                              class="form-control phone-mask"
                              placeholder=""
                              value="{{ (!empty($member)) ? $member->phone_no : '' }}"
                              required
                              oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);" readonly/>
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">ગામ</label>
                            <input
                              type="text"
                              class="form-control"
                              name="city"
                              id="member_city"
                              placeholder=""
                              style="text-transform:uppercase"
                              value="{{ (!empty($member)) ? $member->donation : '' }}"
                              readonly />
                         
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-country">સંસ્થા</label>
                            <select class="form-select" name="community" id="basic-default-country" required>
                              <option value="VIJAYNAGAR">વિજયનગર</option>
                              <option value="NAVNEETNAGAR">નવનીતનગર</option>
                            </select>
                          </div>
                          <div class="col-12">
                            <h6 class="mt-2 fw-semibold">2. Donation Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી સર્વ સાધારણ ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="sarv_sadharan" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી જીવદયા ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="jiv_daya" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી સાધુ સાધ્વી વૈયાવચ્છ ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="shadhu_shdhvi" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી સાધર્મિક ખરડા ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="sadharmik" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી ચાતુર્માસ ખરડા ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="chaturmas" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી કાયમી તિથી ફંડ ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="kayami_tithi" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી દેવદ્રવ્ય ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="devdravya" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી કેસર સુખડ ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="kesar_sukhad" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી ધુપ-દીપ ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="dhoop_deep" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી સ્નાત્ર પૂજા ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="snatra_puja" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી આંગી પૂજા ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="agani_pooja" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી મોટી પૂજા ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="moti_pooja" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી ધૃતની બોલી ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="drut_boli" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                       
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી અન્ય ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control amount-input" name="other_account_amount" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">અન્ય વિગત</label>
                            <input
                              type="text"
                              class="form-control"
                              name="remarks"
                              style="text-transform:capitalize"
                              id="basic-default-name"
                              {{-- placeholder="John Doe" --}}
                               />
                        	</div>
                          {{-- <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">શ્રી અન્ય ખાતે</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="number" class="form-control" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                              
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
                              name="total_in_word"
                              id="ankers"
                              value=""
                              {{-- placeholder="John Doe" --}}
                              required readonly />
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

    <script>
      jQuery(document).ready(function($){
      var currentDate = new Date();
      $('#basic-default-dob').flatpickr({
      dateFormat: "d-m-Y",
      defaultDate: currentDate
    })
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
                  $('#member-phone').val(response['phone_no']);
                  $('#member_city').val(response['city']);
               
                  
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
    $("#KVO_religious_donation").submit(function(){
      var flag=0;
      $(".amount-input").each(function(){
        // Test if the div element is empty
       if($(this).val() != "")
       {flag=1;}
      });
      if(flag === 0)
      {
        Swal.fire(
                  'Amount Required!',
                  '',
                  'warning'
                )
        event.preventDefault();
      } else{
              Swal.fire(
                  'Insert Successfully!',
                  '',
                  'success'
                )
            }
      });
</script>

<script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>

<script src="{{ asset('assets/js/ui-toasts.js') }}"></script>

@if (Session::get('message'))
    <script>
        toastr['success']("{{ Session::get('message') }}", 'Good Job!', {
            closeButton: true,
            tapToDismiss: false,
        });
    </script>
@endif

@endsection

@endsection


