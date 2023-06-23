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
                          <h4 class="fw-bold py-3">ખર્ચ વાઉચર</h4>
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
                      <form class="browser-default-validation">
                        <div class="row g-3">
                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-4">
                            <label for="select2Basic" class="form-label">નામ</label>
                            <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                            </select>
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


