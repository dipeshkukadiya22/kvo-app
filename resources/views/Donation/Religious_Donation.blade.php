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
                      <form class="browser-default-validation" method="POST" action="{{route('ReligiousDonation')}}">
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
                                  <option value="{{$row->m_name}}" {{(!empty($member) && $member->m_name == $row->m_name) ? "selected" : ""}}>{{$row->m_name}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$row->phone_no}}</option>
                              @endforeach
                            </select>
                            <input type="hidden" id="email_user" value="{{!empty($m_data)  ? $m_data:''}}">
                          </div>

                           {{-- <div class="col-md-4">
                            <label for="select2Basic" class="form-label">નામ</label>
                            <select name="name" id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true"  required>
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                            </select>
                          </div> --}}

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">હસ્તે</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              name="haste"
                              placeholder="John Doe"
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
                              placeholder="658 799 8941"
                              value="{{ (!empty($member)) ? $member->phone_no : '' }}"
                              aria-label="658 799 8941" required/>
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">ગામ</label>
                            <input
                              type="text"
                              class="form-control"
                              name="city"
                              id="member_city"
                              placeholder="John Doe"
                              value="{{ (!empty($member)) ? $member->donation : '' }}"
                              required />
                         
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-country">સંસ્થા</label>
                            <select class="form-select" name="community" id="basic-default-country" required>
                              <option value="vijaynagar">વિજયનગર</option>
                              <option value="navneetnagar">નવનીતનગર</option>
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
                            <label class="form-label" for="basic-default-name">શ્રી અન્ય ખાતે</label>
                            <input
                              type="text"
                              class="form-control"
                              name="other_account_name"
                              id="basic-default-name"
                              {{-- placeholder="John Doe" --}}
                              required />
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
                              id="basic-default-name"
                              {{-- placeholder="John Doe" --}}
                              required />
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
                            <div class="form-check form-check-inline mb-2">
                              <input
                                type="radio"
                                id="basic_default_radio-male"
                                name="basic_default_radio"
                                class="form-check-input"
                                value="cheque"
                                required />
                              <label class="form-check-label" for="basic_default_radio">ચેક</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input
                                type="radio"
                                id="basic_default_radio-female"
                                name="basic_default_radio"
                                class="form-check-input"
                                value="Draft"
                                required />
                              <label class="form-check-label" for="basic_default_radio">ડ્રાફ્ટ</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input
                                type="radio"
                                id="basic_default_radio-female"
                                name="basic_default_radio"
                                class="form-check-input"
                                value="Cash"
                                required />
                              <label class="form-check-label" for="basic_default_radio">રોકડા</label>
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
  $(document).ready(function () {
      $("#select2Basic").change(function () {
          var data = JSON.parse($("#email_user").val());
          var selectedId = $(this).val();
          
          $.each(data, function (key, value) {
              if (value['m_name'] == selectedId) {
                  $('#member-phone').val(value['phone_no']);
                  $('#member_city').val(value['city']);
                  return false; // Exit the loop once a match is found
              }
          });
      });
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


