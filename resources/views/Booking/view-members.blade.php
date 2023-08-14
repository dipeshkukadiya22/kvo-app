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
                        <h4 class="fw-bold py-3">જનરલ ડોનેશન રિપોર્ટ</h4>
                      </div>
                    </div>
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
                                                    <th>No</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>City</th>
                                                  
                                                    <th>Action</th>
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
                                                <a class="btn btn-sm btn-icon item-edit" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop"><i class="text-primary ti ti-edit"></i></a>
                                                <a  class="text-danger delete-record"><i class="ti ti-trash"></i></a>
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
                            
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
                              <div class="offcanvas-header border-bottom">
                                <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Edit Member</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                              </div>
                              <div class="offcanvas-body mx-0 flex-grow-0">

                                <!-- Browser Default -->
                                
                                <form id="kvo_update_member" class="browser-default-validation" method="POST" action="{{route('update_members')}}">
                                  @csrf
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">Name</label>
                                    <input type="text" class="form-control" style="text-transform:uppercase" name="p_id" id="p_id" placeholder="John Doe" value="" />
                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-name">Name</label>
                                    <input type="text" class="form-control"  name="m_name1" id="m_name1" placeholder="John Doe" value="" />
                                  </div>
                                 
                                
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-email">Email</label>
                                    <input type="email" id="email1" name="email1" class="form-control" placeholder="john.doe"  />
                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label" for="multicol-phone">Phone Number</label>
                                    <input type="number" id="phone_no1" name="phone_no1" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" value="" />
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
                                      <button type="submit" id="update_submit" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
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
                columns: [3, 4, 5, 6, 7],
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
                columns: [3, 4, 5, 6, 7],
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
                columns: [3, 4, 5, 6, 7],
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
                columns: [3, 4, 5, 6, 7],
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
    $('div.head-label').html('<h5 class="card-title mb-0">DataTable with Buttons</h5>');

    </script>

<script>
  
const editLinks = document.querySelectorAll(".item-edit");
    // Loop through each delete link and attach a click event listener
    editLinks.forEach(link => {
        link.addEventListener("click", function() {
            // Show a confirmation dialog using SweetAlert2
            var id=$(this).closest("tr").find(".id").val();
            $.ajax({
                url:"{{url('edit_members')}}" +"/"+ id,
                type:'GET',
                  success:function(response){
                        $("#p_id").val(response['p_id']);
                        $("#m_name1").val(response['m_name']);
                        $("#email1").val(response['email']);
                        $("#phone_no1").val(response['phone_no']);
                        $("#city1").val(response['city']);  
                      }
                    });
            });
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
        });
    });

    $("#update_submit").click(function(){
        var email=document.getElementById("email1").value;
        var phone=document.getElementById("phone_no1").value;
        var city=document.getElementById("city1").value;
        if(email ==='' && phone === '' && city==='')
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
                title: 'KVO Member Details has been successfully updated!',
                showConfirmButton: false,
                timer: 1500
                }).then(function() {
                $("kvo_update_member").submit();
           });
        }
    });
</script>

@endsection

@endsection


