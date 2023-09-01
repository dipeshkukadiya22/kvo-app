@extends('layouts.app')

@section('title', 'View all Religious Donation')

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
                <div class="col-12" style= "display: flex; justify-content: flex-end;">
                  <button class="btn btn-transparent darkbtn"    type="button" >
                    <a href="{{route('Religious_Donation')}}"><span class="ti-xs ti ti-plus me-1"></span>Add New Religious donation </a></button>
                  </div>
                  <div class="content-header-left col-md-9 col-12 mb-2">
                    {{-- <div class="row breadcrumbs-top">
                      <div class="col-12">
                        <h4 class="fw-bold py-3">View all Religious Donation</h4>
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
                                                  <th>Rec No</th>
                                                  <th>Name</th>
                                                  <th>Date</th>
                                                  <th>Trust</th>
                                                  <th>Haste</th>
                                                  <th>Total</th>
                                                  <th>Payment Mode</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          @foreach($donation as $row)
                                          <tr>
                                          <input type="hidden" class="id" value="{{$row->religious_donation_id}}">
                                              <td>{{$row->religious_donation_id}}</td>
                                              <td>{{$row->m_name}}</td>
                                              <td>{{Date('d-m-Y',strtotime($row->r_date))}}</td>
                                              <td>{{$row->community}}</td>
                                              <td>{{$row->haste}}</td>
                                              <td>{{$row->total}}</td>
                                              <td>{{$row->payment_mode}}</td>
                                              <td>
                                                  <div class="d-inline-block">
                                                    <a href="{{route('pdf_Religious_Donation',$row->religious_donation_id)}}" target="_blank" class="text-primary"><img src="./assets/icon/orange-eye.png" width="20px"></a>

                                                    <a onclick="edit_religious_donation({{$row->religious_donation_id}})" class="btn btn-sm btn-icon item-edit"
                                                    ><img src="./assets/icon/orange-edit.png" width="20px"></a>

                                                    @php
                                                    if(session('role')=="ADMIN"){ @endphp
                                                    <a onclick="delete_religious_donation({{$row->religious_donation_id}})" class="text-danger delete-record"><img src="./assets/icon/orange-trash.png" width="20px"></a>
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
                              <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Edit Donation Details</h5>
                              <button
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-0 flex-grow-0">

                              <!-- Browser Default -->
                              <form class="browser-default-validation" method="POST" action="{{route('update_religious_donation')}}">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                    @csrf
                                        <label class="form-label" name="p_number" for="basic-default-name">પહોંચ નંબર</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="religious_donation_id"
                                            name="religious_donation_id"
                                            readonly
                                            />
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-username">નામ </label>
                                        <select id="name" name="name" class="select2 form-select form-select-lg" data-allow-clear="false" >
                                       @foreach ($member as $row)
                                          <option value="{{$row->p_id}}">{{$row->m_name}} - {{$row->phone_no}}</option>
                                       @endforeach
                                        </select>    
                                    </div>

                                    <div class="col-md-12">
                                        <label for="flatpickr-date" class="form-label">તારીખ </label>
                                        <input type="date" class="form-control" placeholder="DD-MM-YYYY" id="date" name="date" />    
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-username">સંસ્થા</label>
                                        <select id="community" name="community" class="select2 form-select form-select-lg" data-allow-clear="false" >
                                          <option value="VIJAYNAGAR">વિજયનગર</option>
                                          <option value="NAVNEETNAGAR">નવનીતનગર</option>
                                        </select>    
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">હસ્તે</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="haste"
                                            name="haste"
                                            style="text-transform:uppercase"
                                            />
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી સર્વ સાધારણ ખાતે</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control amount-input" name="sarva_sadharan" id="sarva_sadharan" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી સર્વ જીવદયા ખાતે</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control amount-input" name="jiv_daya" id="jiv_daya" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી સાધુ સાધ્વી વૈયાવચ્છ ખાતે</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control amount-input" name="sadhu_sadhvi" id="sadhu_sadhvi"placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી સાધર્મિક ખરડા ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="sadhrmik" id="sadhrmik" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી ચાતુર્માસ ખરડા ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="chaaturmash" id="chaaturmash" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી કાયમી તિથી ફંડ ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="kayami_tithi" id="kayami_tithi" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી દેવદ્રવ્ય ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="dev_dravya" id="dev_dravya" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી કેસર સુખડ ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="kesar_sukhad" id="kesar_sukhad" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી ધૂપ-દીપ ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="dhoop_deep" id="dhoop_deep" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી સ્નાત્ર પૂજા ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="snatra_pooja" id="snatra_pooja" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી આંગી પૂજા ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="aangi_pooja" id="aangi_pooja" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી મોટી પૂજા ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="moti_pooja" id="moti_pooja" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી ધ્રુતની બોલી ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="dhrut_boli" id="dhrut_boli" placeholder="Amount" aria-label="Amount (to the nearest dollar)" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">શ્રી  ખાતે</label>
                                        <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control amount-input" name="other" id="other" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="basic-default-name">અન્ય વિગત</label>
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="remarks"
                                        name="remarks" 
                                        style="text-transform:capitalize"
                                        {{-- placeholder="John Doe" --}}
                                         />
                                    </div>
        
                                    <div class="col-md-12">
                                        <label class="form-label" for="multicol-phone">ટોટલ</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="text" id="total" class="form-control" name="total" placeholder="Amount" aria-label="Amount (to the nearest dollar)" onkeypress="return onlyNumbers(event);" maxlength="9" required readonly>
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
                                        <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            id="cash"
                                            name="basic_default_radio"
                                            class="form-check-input"
                                            />
                                        <label class="form-check-label" for="basic_default_radio">રોકડા</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                        <input
                                            type="radio"
                                            id="cheque"
                                            name="basic_default_radio"
                                            class="form-check-input" />
                                        <label class="form-check-label" for="basic_default_radio">ચેક</label>
                                        </div>
                                       
                                        
                                        
                                        <div class="form-check form-check-inline">
                                        <input
                                            type="radio"
                                            id="upi"
                                            name="basic_default_radio"
                                            class="form-check-input"
                                            value="UPI" />
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
      lengthMenu: [7, 10, 25, 50, 75, 100],
      order: [0,'desc'],
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
              title: 'Religious Donation',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6,7],
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
              title: 'Religious Donation',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6,7],
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
              title: 'Religious Donation',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6,7],
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
              title: 'Religious Donation',
              customize: function (doc) {
                                // Here's where you can control the cell padding
                                doc.styles.tableHeader.margin =
                                  doc.styles.tableBodyOdd.margin =
                                  doc.styles.tableBodyEven.margin = [3, 3, 3, 3];
                                  doc.pageMargins = [10, 10, 10,10];
                                  doc.defaultStyle.fontSize = 9;
                                  doc.styles.tableHeader.fontSize = 10;
                                  doc.styles.title.fontSize = 20;
                                  doc.content[1].margin = [ 20, 0, 20, 0 ] //left, top, right, bottom
                            },
              exportOptions: {
                columns: [0, 1 ,2, 3, 4, 5, 6],
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
              title: 'Religious Donation',
              exportOptions: {
                columns: [0,1 ,2, 3, 4, 5, 6,7],
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
    $('div.head-label').html('<h5 class="card-title mb-0">View all Religious Donation</h5>');

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
function delete_religious_donation(id)
  {
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
                    url:"{{url('delete_religious_donation')}}" +"/"+ id,
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
  }

  function edit_religious_donation(id)
  {
      const myOffcanvas = document.getElementById('offcanvasBackdrop');
      let a=new bootstrap.Offcanvas(myOffcanvas);
      a.show();
            var member_id=[];
            var temp=document.getElementById('name');
             for(i=0;i<temp.options.length;i++)
                  {
                    member_id[i]=temp.options[i].value;
                  }
            $.ajax({
                url:"{{url('get_religious_donation')}}" +"/"+ id,
                type:'GET',
                  success:function(response){  
                    //console.info(response);
                    var sr_no=response[0]['p_id'];
                    var payment=response[0]['payment_mode'];
                    var community=response[0]['community'];
                    alert
                      $("#religious_donation_id").val(response[0]['religious_donation_id']);
                      $("#date").val(response[0]['r_date']);
                      $("#haste").val(response[0]['haste']);
                      $("#sarva_sadharan").val(response[0]['sarv_sadharan']);
                      $("#jiv_daya").val(response[0]['jiv_daya']);
                      $("#sadhu_sadhvi").val(response[0]['shadhu_shdhvi']);
                      $("#sadhrmik").val(response[0]['sadharmik']);
                      $("#chaaturmash").val(response[0]['chaturmas']);
                      $("#kayami_tithi").val(response[0]['kayami_tithi']);
                      $("#dev_dravya").val(response[0]['devdravya']);
                      $("#kesar_sukhad").val(response[0]['kesar_sukhad']);
                      $("#dhoop_deep").val(response[0]['dhoop_deep']);
                      $("#snatra_pooja").val(response[0]['snatra_puja']);
                      $("#moti_pooja").val(response[0]['moti_pooja']);
                      $("#aangi_pooja").val(response[0]['agani_pooja']);
                      $("#dhrut_boli").val(response[0]['drut_boli']);
                      $("#other").val(response[0]['other_account_amount']);
                      $("#total").val(response[0]['total']);
                      $("#ankers").val(response[0]['total_in_word']);
                      $("#payment").val(response[0]['payment_mode']);
                      $("#remarks").val(response[0]['remarks']);  
                        if(payment=="CASH"){$("#cash").attr('checked',true);}
                        if(payment=="UPI"){$("#upi").attr('checked',true);}
                        if(payment=="CHEQUE"){$("#cheque").attr('checked',true);}
                        if(community=="VIJAYNAGAR"){$("#community option[value='VIJAYNAGAR']").attr('selected', 'selected'); }
                        if(community=="NAVNEETNAGAR"){$("#community option[value='NAVNEETNAGAR']").attr('selected', 'selected'); }
                        member_id.forEach(myFunction)
                        function myFunction(item, index, arr) {
                            if((member_id[index])==sr_no)
                            {
                              $("#name option[value=" + sr_no + "]").attr('selected', 'selected'); 
                            }
                        }
                  }
                });
  }
</script>
<script>
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
@endsection

@endsection