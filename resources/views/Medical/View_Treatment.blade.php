@extends('layouts.app')

@section('title', 'View all Medical Treatment')

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

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset ('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    

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

button.swal2-cancel.btn.btn-label-danger {
    display: none !important;
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
                    {{-- <div class="row breadcrumbs-top">
                      <div class="col-12">
                        <h4 class="fw-bold py-3">View all Medical Treatment</h4>
                      </div>
                    </div> --}}
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
                                    <div class="card-datatable table-responsive pt-0">
                                        <table id="DataTables_Table_0" class="datatables-basic table">
                                          <thead>
                                              <tr>
                                                  <th>પહોંચ નંબર</th>
                                                  <th>નામ</th>
                                                  <th>તારીખ</th>
                                                  <th>મોબાઈલ નંબર</th>
                                                  <th>ગામ</th>
                                                  <th>ડૉક્ટરનું નામ</th>
                                                  <th>ટોટલ</th>
                                                  <td>નાણા મળેલ</td>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          @foreach($member as $row)
                                          <tr>
                                              <input type="hidden" class="id" value="{{$row->sr_no}}">
                                              <td>{{$row->sr_no}}</td>
                                              <td>{{$row->m_name}}</td>
                                              <td>{{Date("d-m-Y",strtotime($row->date))}}</td>
                                              <td>{{$row->phone_no}}</td>
                                              <td>{{$row->city}}</td>
                                              <td>{{$row->doctor_name}}</td>
                                              <td>{{"₹ ". $row->amount}}</td>
                                              <td>{{$row->payment_mode}}</td>
                                              <td>
                                                  <div class="d-inline-block">
                                                    <a href="{{route('pdf_Medical_Treatment',$row->sr_no)}}" class="text-primary" ><i class="ti ti-eye"></i></a>

                                                    <a href="{{route('edit_treatment',$row->sr_no)}}" class="btn btn-sm btn-icon item-edit" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop"><i class="text-primary ti ti-edit"></i></a>

                                                    @php
                                                    if(session('role')=="ADMIN"){ @endphp
                                                        <a class="text-danger delete-record"><i class="ti ti-trash"></i></a>
                                                    @php } @endphp
                                                    
                                                    
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                          
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Enable backdrop (default) Offcanvas -->
                        <div class="mt-0">
                          
                          <div
                            class="offcanvas offcanvas-end"
                            tabindex="-1"
                            id="offcanvasBackdrop"
                            aria-labelledby="offcanvasBackdropLabel">
                            <div class="offcanvas-header border-bottom">
                              <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Edit Treatment Details</h5>
                              <button
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-0 flex-grow-0">

                              <!-- Browser Default -->
                              <form id="kvo_update_treatmet" class="browser-default-validation" method="POST" action="{{route('update_treatment')}}">
                                <div class="row g-3">

                                @csrf
                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">રશીદ નં </label>
                                        <input type="number" id="sr_no" name="sr_no" class="form-control" readonly/>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-username">દર્દીનું નામ </label>
                                          <select id="name" name="name" class="select2 form-select form-select-lg" data-allow-clear="true" >
                                          @foreach($member_data as $row)
                                                <option value="{{$row->p_id}}">{{$row->m_name}}</option>
                                          @endforeach
                                        </select>   
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">દર્દીના મોબાઇલ નં </label>
                                        <input type="number" id="phone" name="phone" class="form-control" readonly/>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="flatpickr-date" class="form-label">તારીખ </label>
                                        <input type="date" class="form-control" placeholder="DD-MM-YYYY" id="date" name="date" />    
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-username">ડોક્ટરનું નામ </label>
                                        <input type="text" id="doctor_name" name="doctor_name" class="form-control" placeholder="Dr. Shah" required>  
                                        </div>
                                    

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-username">ગામનું નામ </label>
                                        <input type="text" id="city" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="collapsible-address">વિશેષ નોંધ </label>
                                        <textarea name="remark" class="form-control" id="remark" rows="1" placeholder="Hello,"></textarea>
                                      
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">રૂપિયા </label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" aria-label="Amount (to the nearest dollar)"
                                        onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'ankers');" maxlength="9" required>
                                        </div>
                                    </div>
                                    {{-- <div id="divDisplayWords"> --}}
                                    <div class="col-md-12">
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
                                    <div class="col-md-12">
                                        <label class="d-block form-label">નાણા મળેલ</label>
                                        <div class="form-check form-check-inline mb-2">
                                        <input
                                            type="radio"
                                            id="cheque"
                                            name="basic_default_radio"
                                            class="form-check-input"
                                            />
                                        <label class="form-check-label" for="basic_default_radio">ચેક</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            id="draft"
                                            name="basic_default_radio"
                                            class="form-check-input"
                                            />
                                        <label class="form-check-label" for="basic_default_radio">ડ્રાફ્ટ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            id="cash"
                                            name="basic_default_radio"
                                            class="form-check-input"
                                            checked/>
                                        <label class="form-check-label" for="basic_default_radio">રોકડા</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            id="upi"
                                            name="basic_default_radio"
                                            class="form-check-input"
                                            />
                                        <label class="form-check-label" for="basic_default_radio">UPI</label>
                                        </div>
                                        <div class="form-check form-check-inline" hidden>
                                            <input type="text" id="payment" name="payment" class="form-control" />
                                            <label class="form-check-label" for="basic-default-radio">payment</label>
                                        </div>
                                        </div>
                                    
                                        <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Update</button>
                                            <button
                                            type="button"
                                            class="btn btn-label-secondary d-grid w-100"
                                            data-bs-dismiss="offcanvas">
                                            Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                              </form>
                              <!-- /Browser Default -->

                              
                            </div>
                          </div>
                        </div>
                        
                    </section>
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
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset ('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>

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
      displayLength: 7,
      order: [0,'desc'],
      lengthMenu: [7, 10, 25, 50, 75, 100],
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
                columns: [0,1 ,2, 3, 4, 5, 6],
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
              title: 'Medical Treatment',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6],
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
              title: 'Medical Treatment',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6],
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
              title: 'Medical Treatment',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6],
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
              extend: 'copy',
              text: '<i class="ti ti-copy me-1" ></i>Copy',
              className: 'dropdown-item',
              title: 'Medical Treatment',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6],
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
      
      
    });
    $('div.head-label').html('<h5 class="card-title mb-0">View Medical Treatment</h5>');

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
  
  <script>
    // Get all elements with class "item-edit"
    const editLinks = document.querySelectorAll(".item-edit");
    // Loop through each delete link and attach a click event listener
    editLinks.forEach(link => {
        link.addEventListener("click", function() {
            // Show a confirmation dialog using SweetAlert2
            var id=$(this).closest("tr").find(".id").val();
            var member_id=[];
            var temp=document.getElementById('name');
             for(i=0;i<temp.options.length;i++)
                  {
                    member_id[i]=temp.options[i].value;
                  }
            $.ajax({
                url:"{{url('get_member')}}" +"/"+ id,
                type:'GET',
                  success:function(response){ 
                    var sr_no=response[0]['p_id'];
                    var payment=response[0]['payment_mode'];
                        $("#sr_no").val(response[0]['sr_no']); 
                        $("#date").val(response[0]['date']);
                        $("#phone").val(response[0]['phone_no']);
                        $("#amount").val(response[0]['amount']);
                        $("#doctor_name").val(response[0]['doctor_name']);
                        $("#city").val(response[0]['city']);
                        $("#ankers").val(response[0]['amount_in_words']);
                        $("#remark").val(response[0]['remark']);
                        $("#payment").val(response[0]['payment_mode']);
                        if(payment=="CASH"){$("#cash").attr('checked',true);}
                        if(payment=="UPI"){$("#upi").attr('checked',true);}
                        if(payment=="DRAFT"){$("#draft").attr('checked',true);}
                        if(payment=="CHEQUE"){$("#cheque").attr('checked',true);}
                        member_id.forEach(myFunction)
                        function myFunction(item, index, arr) {
                            if((member_id[index])==sr_no)
                            {
                              $("#name option[value=" + sr_no + "]").attr('selected', 'selected'); 
                            }
                        }
                      }   
                });    
        });
         
    });
</script>
<script>
$("#name").change(function(){
      const id=document.getElementById("name").value;
      $.ajax({
        
                url:"{{url('get')}}" +"/"+ id,
                type:'GET',
                  success:function(response){   
                        $("#city").val(response['city']); 
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
      $("#draft").change(function(){
        document.getElementById("payment").value="DRAFT";
      });
      $("#upi").change(function(){
        document.getElementById("payment").value="UPI";
      });
      
</script>
<script>
    // Get all elements with class "delete-record"
    const deleteLinks = document.querySelectorAll(".delete-record");
    // Loop through each delete link and attach a click event listener
    deleteLinks.forEach(link => {
        link.addEventListener("click", function() {
            // Show a confirmation dialog using SweetAlert2
            var id=$(this).closest("tr").find(".id").val();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                // If the user confirms the deletion, proceed with the deletion logic
                if (result.isConfirmed) {
                  $.ajax({
                    url:"{{url('delete_treatment')}}" +"/"+ id,
                    type:'GET',
                    success:function(response){
                        Swal.fire(
                            'Deleted!',
                            'Your Record has been deleted.',
                            'success',
                            );
                            location.reload();
                            }
                        });
                }
            });
        });
    });


    $("#kvo_update_treatmet").submit(function(){
        var doctor_name=document.getElementById("doctor_name").value;
        var amount=document.getElementById("amount").value;
        if(doctor_name ==='' && amount === '')
        {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
            });
            return false; // Prevent form submission
        } else {
            Swal.fire({
                position: 'middle-center',
                icon: 'success',
                title: 'Medical Treatment data has been successfully updated!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("#kvo_update_treatment").submit();
           });
        }
    });
</script>

@endsection

@endsection