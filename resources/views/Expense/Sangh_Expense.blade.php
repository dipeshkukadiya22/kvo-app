@extends('layouts.app')

@section('title', 'Sangh Expense')

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
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

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
                          <h4 class="fw-bold py-3">સંઘ ખર્ચ વાઉચર</h4>
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
                      <form id="kvo_add_sangh_expense" class="browser-default-validation" method="POST" action="{{route('add_sangh_expense')}}"  target="_blank" >
                        <div class="row g-3">
                          <div class="col-12">
                            <h6 class="fw-semibold">1. Personal Details</h6>
                            <hr class="mt-0" />
                          </div>
                          @csrf
                          <div class="col-md-4">
                            <label for="select2Basic" class="form-label">નામ</label>
                            <select id="name" name="name" class="select2 form-select form-select-lg" data-allow-clear="true" placeholder="Select Name" required>
                            <option value=""></option>
                                @foreach($member as $row)
                                    <option value="{{$row->p_id}}">{{$row->m_name." - ".$row->phone_no }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-dob">તારીખ</label>
                            <input
                              type="text"
                              class="form-control flatpickr-validation"
                              id="date"
                              name="date"
                              required />
                              
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">વાઉચર નંબર</label>
                            <input
                              type="text"
                              class="form-control"
                              id="depo_id"
                              name="depo_id"
                              value="{{$depo_id + 1}}"
                              readonly/>
                          </div>
                          <div class="col-12">
                            <h6 class="mt-2 fw-semibold">2. Expense Details</h6>
                            <hr class="mt-0" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-address">બાબત</label>
                            <textarea
                              name="details"
                              class="form-control"
                              id="details"
                              style="text-transform:uppercase"
                              rows="1" required></textarea>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="multicol-phone">રૂપિયા</label>
                            <div class="input-group">
                              <span class="input-group-text">₹</span>
                              <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" aria-label="Amount (to the nearest dollar)"
                              onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'ankers');" maxlength="9" required/>
                              </div><div id="amt" class="error-message" ></div>
                          </div>
                          {{-- <div id="divDisplayWords"> --}}
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-name">અંકે રૂપિયા</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ankers"
                              name="ankers"
                              tabindex=-1
                              value=""
                              readonly/>
                        	</div>
                          <div class="row mt-3">
                            <div class="col-12">
                              <button type="submit" id="submitbtn1" class="btn btn-primary">Submit</button>
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
      $('#date').flatpickr({
      dateFormat: "d-m-Y",
      defaultDate: currentDate
    });
    $("#amount").focusout(function(){
      var amt=parseInt(document.getElementById("amount").value);
      if(amt === 0){
          $("#submitbtn1").prop('disabled',true);
          $("#amount").focus();
          $("#amt").html("Enter Valid Amount ");
      }else{
        $("#submitbtn1").prop('disabled',false);
        $("#amt").html("");
      }
    });
    });
    </script>
     @if(session('new_member') === 1)
        <script>
             var member_id=[];
          var temp=document.getElementById('name');
          var value;
          for(i=0;i<temp.options.length;i++)
            {
              member_id[i]=temp.options[i].value;
              value=member_id[i];
            }
            $("#name option[value=" + value + "]").attr('selected', 'selected');
            $.ajax({
                url:"{{url('get_member')}}",
                type:'GET',
                success:function(response){
                  
                  
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
        
  $("#kvo_add_sangh_expense").submit(function(){
                Swal.fire(
                  'Insert Successfully!',
                  '',
                  'success'
                  ).then(function() {
                window.location.href = 'View_Sangh_Expense';
                 });   
    });
    </script>

    <!-- end num to word -->

@endsection

@endsection


