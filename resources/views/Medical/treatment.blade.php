@extends('layouts.app')

@section('title', 'Treatment Form')

@section('pagecss')

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset ('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
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
                          <h4 class="fw-bold py-3">તબીબી સારવાર દાન</h4>
                        </div>
                    </div>
                </div>
                
                
                <div class="content-header-right d-flex justify-content-end col-md-3 col-12">
                    <div class="form-group breadcrumb-right py-3">
                      <!-- Enable backdrop (default) Offcanvas -->
                      
                      <div class="mt-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop">
                          <span class="ti-xs ti ti-plus me-1"></span>Add Member </button>
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
              
              <div class="card mb-4">
                <form class="card-body" id="KVO_add_treatment" method="post" action="{{route('add_treatment')}}">  
                  <div class="row g-3">
                  <div class="col-md-4">
                  @csrf
                      <label class="form-label" for="multicol-phone">રશીદ નં </label>
                      <input type="number" id="sr_no" class="form-control phone-mask" value={{$rec_no+1}} readonly>
                    </div>
                    <div class="col-md-4">
                    <label for="select2Basic" class="form-label">નામ</label>
                            <select id="name" name="name" class="select2 form-select form-select-lg" data-allow-clear="true" placeholder="Select Name" required>
                            <option value=""></option>
                            @foreach($member as $row)
                          <option value="{{$row->p_id}}">{{$row->m_name}} - {{$row->phone_no}}</option>
                        @endforeach
                            </select>
                           
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="multicol-phone">દર્દીના મોબાઇલ નં </label>
                      <input type="number" id="phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" readonly >
                    </div>
                    <div class="col-md-4">
                      <label for="flatpickr-date" class="form-label">તારીખ </label>
                      <input type="date" class="form-control flatpickr-validation" id="date" name="date" value="@php echo date('Y-m-d');@endphp" />
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="multicol-username">ડોક્ટરનું નામ </label>
                      <input type="text" id="doctor_name" list="doctor" name="doctor_name" class="form-control" style="text-transform:uppercase" placeholder="Dr. Shah" required>
                        <datalist id="doctor">
                                  @foreach($treatment as $item)
                                      <option value="{{$item->doctor_name}}">{{$item->doctor_name}}</option>
                                  @endforeach
                         </datalist>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="multicol-username">ગામનું નામ </label>
                      <input type="text" id="city1" class="form-control" placeholder="ex. bhuj" readonly>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="collapsible-address">વિશેષ નોંધ </label>
                      <textarea name="remark" class="form-control" id="remark" rows="1" style="text-transform:capitalize" placeholder="Hello,"></textarea>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="multicol-phone">રૂપિયા </label>
                      <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" aria-label="Amount (to the nearest dollar)"
                          onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'ankers');" maxlength="9" required>
                      </div><div id="amt" class="error-message" ></div>
                    </div>
                          {{-- <div id="divDisplayWords"> --}}
                    <div class="col-md-4">
                      <label class="form-label" for="basic-default-name">શબ્દોમાં </label>
                      <input type="text" class="form-control" id="ankers" name= "ankers" value="" {{-- placeholder="Words" --}} required readonly/>
                    </div>
                    <div class="col-md-4">
                        <label class="d-block form-label">નાણા મળેલ</label>
                        <div class="form-check form-check-inline">
                              <input type="radio" id="cash" name="basic-default-radio" class="form-check-input" checked/>
                              <label class="form-check-label" for="basic-default-radio">રોકડા </label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                              <input type="radio" id="cheque" name="basic-default-radio" class="form-check-input" />
                              <label class="form-check-label" for="basic-default-radio">ચેક </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" id="upi" name="basic-default-radio" class="form-check-input" />
                              <label class="form-check-label" for="basic-default-radio">UPI</label>
                            </div>
                            <div class="form-check form-check-inline" hidden>
                              <input type="text" id="payment" name="payment" class="form-control" value="cash"/>
                              <label class="form-check-label" for="basic-default-radio">payment</label>
                            </div>
                          </div>
                  </div>
                  <div class="pt-4">
                    <button type="submit" id="submitbtn1" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
                    <!-- <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button> -->
                  </div>
                </form>
              </div>
            </div>

      </div>
    </div>
            <!--/ Content -->

@section('pagejs')

<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/forms-pickers.js') }}"></script>
<script src="{{ asset ('assets/js/main.js') }}"></script>

    <script>
    $("#name").change(function(){
      const id=document.getElementById("name").value;
      $.ajax({
        
                url:"{{url('get')}}" +"/"+ id,
                type:'GET',
                  success:function(response){   
                        $("#city1").val(response['city']); 
                        $("#phone").val(response['phone_no']); 
                  }
                });
            });
      $("#cash").change(function(){
        document.getElementById("payment").value="CASH";
      });
      $("#cheque").change(function(){
        document.getElementById("payment").value="CHEQUE";
      });
      $("#upi").change(function(){
        document.getElementById("payment").value="UPI";
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
                  $('#phone').val(response['phone_no']);
                  $('#city1').val(response['city']);
                }
              });
        </script>
    @endif
    <script>
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

  $("#KVO_add_treatment").submit(function(){
                Swal.fire(
                  'Insert Successfully!',
                  '',
                  'success'
                )   
    });
</script>


@endsection

@endsection