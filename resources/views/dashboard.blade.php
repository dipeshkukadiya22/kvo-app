@extends('layouts.app')

@section('title', 'Dashboard')

@section('pagecss')

<!-- Vendors CSS -->

<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}" />

<style>
table#DataTables_Table_0 tr:last-child td {
    border-bottom: 0 !important;
}
</style>

@endsection

@section('content')

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">

            @include('layouts.header')

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    
                    <!-- Cards with few info -->
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">24</h5>
                            <small>New Room Booking</small>
                            </div>
                            <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-checklist ti-sm"></i>
                            </span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">9</h5>
                            <small>Available Rooms</small>
                            </div>
                            <div class="card-icon">
                            <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-bed ti-sm"></i>
                            </span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">2</h5>
                            <small>Check-in</small>
                            </div>
                            <div class="card-icon">
                            <span class="badge bg-label-info rounded-pill p-2">
                                <i class="ti ti-login ti-sm"></i>
                            </span>
                            </div>
                        </div>
                        </div>
                    </div>

                            <!-- Basic table -->
                            <section id="basic-datatable">

                                 <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-datatable table-responsive pt-0">

                                                <div class="card-header flex-column flex-md-row">
                                                    <div class="head-label">
                                                        <h5 class="card-title mb-0">Checkout List</h5> 
                                                    </div>
                                                </div>

                                                <table id="DataTables_Table_0" class="datatables-basic table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>No</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td>Dipesh K</td>
                                                    <td>dipesh@teque7.com</td>
                                                    <td>814124655</td>
                                                    <td>Bhuj</td>
                                                    <td>Jubilee Colony</td>
                                                    <td>
                                                        <div class="d-inline-block">
                                                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td>Jay</td>
                                                    <td>jay@teque7.com</td>
                                                    <td>814124655</td>
                                                    <td>Bhuj</td>
                                                    <td>Jubilee Colony</td>
                                                    <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td>Karan </td>
                                                    <td>karan@teque7.com</td>
                                                    <td>814124655</td>
                                                    <td>Bhuj</td>
                                                    <td>Jubilee Colony</td>
                                                    <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>4</td>
                                                    <td>Sahal</td>
                                                    <td>sahal@teque7.com</td>
                                                    <td>814124655</td>
                                                    <td>Bhuj</td>
                                                    <td>Jubilee Colony</td>
                                                    <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td>Junaid</td>
                                                    <td>junaid@teque7.com</td>
                                                    <td>814124655</td>
                                                    <td>Bhuj</td>
                                                    <td>Jubilee Colony</td>
                                                    <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </section>
                        <!--/ Basic table -->

                        

                        <!-- Basic table -->
                        <section id="basic-datatable">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-datatable table-responsive pt-0">
                                            <table id="DataTables_Table_0" class="datatables-basic table">

                                                <div class="card-header flex-column flex-md-row">
                                                    <div class="head-label">
                                                        <h5 class="card-title mb-0">Recent Booking</h5> 
                                                    </div>
                                                </div>

                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>No</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>City</th>
                                                    <th>Address</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td></td>
                                                <td>1</td>
                                                <td>Dipesh K</td>
                                                <td>dipesh@teque7.com</td>
                                                <td>814124655</td>
                                                <td>Bhuj</td>
                                                <td>Jubilee Colony</td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>2</td>
                                                <td>Jay</td>
                                                <td>jay@teque7.com</td>
                                                <td>814124655</td>
                                                <td>Bhuj</td>
                                                <td>Jubilee Colony</td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>3</td>
                                                <td>Karan </td>
                                                <td>karan@teque7.com</td>
                                                <td>814124655</td>
                                                <td>Bhuj</td>
                                                <td>Jubilee Colony</td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4</td>
                                                <td>Sahal</td>
                                                <td>sahal@teque7.com</td>
                                                <td>814124655</td>
                                                <td>Bhuj</td>
                                                <td>Jubilee Colony</td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5</td>
                                                <td>Junaid</td>
                                                <td>junaid@teque7.com</td>
                                                <td>814124655</td>
                                                <td>Bhuj</td>
                                                <td>Jubilee Colony</td>
                                                <td>
                                                    <div class="d-inline-block">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-arrow-narrow-right"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <!--/ Basic table -->

                    
                    
                    
            
                </div>
            </div>
            <!--/ Content -->

        </div>
    </div>

    @section('pagejs')

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

   
    @endsection

@endsection


