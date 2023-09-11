@extends('layouts.app')

@section('title', 'All Members')

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
                          <h4 class="fw-bold py-3">All Members</h4>
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

                <!-- End add members -->
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
                                                    <th style="font-size:15px"><b>No</b></th>
                                                    <th style="font-size:15px"><b>Full Name</b></th>
                                                    <th style="font-size:15px"><b>Email</b></th>
                                                    <th style="font-size:15px"><b>Phone Number</b></th>
                                                    <th style="font-size:15px"><b>City</b></th>
                                                    <th style="font-size:15px"><b>Action</b></th>
                                                </tr>
                                            </thead>
                                           @foreach($data as $row)
                                            <tr>
                                            <input type="hidden" class="id" value="{{$row->p_id}}">
                                              <td>{{$row->p_id}}</td>
                                              <td>{{$row->m_name}}</td>
                                              <td>{{$row->email}}</td>
                                              <td>{{$row->phone_no}}</td>
                                              <td>{{$row->city}}</td>
                                             
                                              
                                              <td>
                                                <div class="d-inline-block">
                                                <a onclick="edit({{$row->p_id}})"  class="btn btn-sm btn-icon item-edit" aria-controls="offcanvasBackdrop1"><img src="./assets/icon/orange-edit.png" width="20px"></a>
                                                
                                               
                                                <a onclick="delete_member({{$row->p_id}})" class="text-danger delete-record"><img src="./assets/icon/orange-trash.png" width="20px"></a>
                                                  
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
                          <div class="mt-0" id="editmembers">
                            
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop1" aria-labelledby="offcanvasBackdropLabel">
                              <div class="offcanvas-header border-bottom">
                                <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Edit Member</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                              </div>
                              <div class="offcanvas-body mx-0 flex-grow-0">

                                <!-- Browser Default -->
                                
                                <form id="kvo_update_member" class="browser-default-validation" method="POST" action="{{route('update_members')}}">
                                  @csrf
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">No.</label>
                                    <input type="text" class="form-control"  name="p_id" id="p_id" placeholder="" value="" readonly/>
                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">Name</label>
                                    <input type="text" class="form-control" style="text-transform:uppercase" name="m_name1" id="m_name1" placeholder="John Doe" value="" />
                                  </div>
                                 
                                
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-email">Email</label>
                                    <input type="email" id="email1" name="email1" class="form-control" placeholder="john@gmail.com"  />
                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label" for="multicol-phone"><span class="required">Phone Number</span></label>
                                    <input type="text" name="phone_no1" id="phone_no1" class="form-control phone-mask" placeholder="658 799 8941" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required/>
                                    <div id="error" class="error-message"></div>
                                </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text" class="form-control" name="city1" style="text-transform:uppercase" id="city1" placeholder="Bhuj"  />
                                  </div>
        
                                  <!-- <div class="mb-3">
                                    <label class="form-label" for="collapsible-address">Address</label>
                                    <textarea name="collapsible-address" name="address1" class="form-control"  id="address1" rows="2" placeholder="1456, Mall Road"></textarea>
                                  </div> -->
                                  
                                  <div class="row">
                                    <div class="col-12">
                                      <button type="submit" id="submitbtn" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
                                      <button type="button" class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas"> Cancel </button>
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
        
      // dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 10,
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
                columns: [1 ,2, 3, 4, 5, 6],
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
              exportOptions: {
                columns: [1 ,2, 3, 4, 5, 6],
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
              exportOptions: {
                columns: [1 ,2, 3, 4, 5, 6],
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
              exportOptions: {
                columns: [1 ,2, 3, 4, 5, 6],
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
              exportOptions: {
                columns: [1 ,2, 3, 4, 5, 6],
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
    $('div.head-label').html('<h5 class="card-title mb-0">View All Members</h5>');

    </script>

<script>
 function edit(id)
{  
     const myOffcanvas = document.getElementById('offcanvasBackdrop1');
      let a=new bootstrap.Offcanvas(myOffcanvas);
      a.show();
                $.ajax({
                    url:"{{url('/edit_members')}}" +"/"+ id,
                    type:'GET',
                      success:function(response){
                            $("#p_id").val(response[0]['p_id']);
                            $("#m_name1").val(response[0]['m_name']);
                            $("#email1").val(response[0]['email']);
                            $("#phone_no1").val(response[0]['phone_no']);
                            $("#city1").val(response[0]['city']);  
                          }
                        });
             
      }
</script>
<script>
function delete_member(id)
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
                    url:"{{url('delete_members')}}" +"/"+ id,
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

</script>

<script>
  let flag=0;
  $("#kvo_update_member :input").change(function() {
    flag=1;
    });
    $("#kvo_update_member").submit(function(){
        var m_name1=document.getElementById("m_name1").value;
        var email1=document.getElementById("email1").value;
        var phone_no1=document.getElementById("phone_no1").value;
        var city1=document.getElementById("city1").value;
        if(m_name1 ==='' && m_name1 === '' && phone_no1 ==='' && city1 ==='')
        {
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
            });
            return false; // Prevent form submission
        } else {
          if(flag ===1){
                Swal.fire(
                  'Updated!',
                  'Member Details!',
                  'success'
                )
          }else{
              Swal.fire(
                  'No change!',
                  'Member Details!',
                  'error'
                )
          }
        }
    });
</script>
<script>
const contactInput = document.getElementById('phone_no1'); // Change 'phone_no' to 'multicol-phone'

contactInput.addEventListener('input', function () {
    const desiredLength = 10;
    const inputValue = this.value.replace(/\D/g, ''); // Remove non-digit characters
    
    if (inputValue.length !== desiredLength) {
        this.setCustomValidity(`Contact number enter ${desiredLength} digits.`);
    } else {
        this.setCustomValidity('');
    }
});
</script>

@endsection

@endsection


