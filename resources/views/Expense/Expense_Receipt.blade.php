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
              <h4 class="fw-bold py-3 mb-4">ખર્ચ વાઉચર</h4>
              <div class="row mb-4">
                <!-- Browser Default -->
                <div class="col-md mb-4 mb-md-0">
                  <div class="card">
                    <div class="card-body">
                      <form class="browser-default-validation">
                        <div class="row g-3">
                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-4">
                              <label class="form-label" for="basic-default-name">નામ</label>
                              <input
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                placeholder="John Doe"
                                required />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-dob">તારીખ</label>
                            <input
                              type="text"
                              class="form-control flatpickr-validation"
                              id="basic-default-dob"
                              required />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">વાઉચર નંબર</label>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-name"
                              placeholder="15"
                              required readonly/>
                          </div>
                          <div class="col-12">
                            <h6 class="mt-2 fw-semibold">2. Expence Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-address">બાબત</label>
                            <textarea
                              name="collapsible-address"
                              class="form-control"
                              id="collapsible-address"
                              rows="1"></textarea>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">રૂપિયા</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="text" id="Text1" class="form-control" placeholder="Amount" aria-label="Amount (to the nearest dollar)"
                              onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'ankers');" maxlength="9">
                            </div>
                          </div>
                          {{-- <div id="divDisplayWords"> --}}
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">અંકે રૂપિયા</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ankers"
                              value=""
                              {{-- placeholder="John Doe" --}}
                              required readonly/>
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

@endsection

@endsection


