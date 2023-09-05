<!-- Navbar -->
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{route('Dashboard')}}" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                fill="#ca5300" />
              <path
                opacity="0.06"
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                fill="#161616" />
              <path
                opacity="0.06"
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                fill="#161616" />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                fill="#ca5300" />
            </svg>
          </span>
          <span class="app-brand-text demo menu-text fw-bold">KVO</span>
        </a>
          
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
          <i class="ti ti-x ti-sm align-middle"></i>
        </a>
      </div>

      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="ti ti-menu-2 ti-sm"></i>
        </a>
      </div>

      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          


         

          

          

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="../../assets/img/avatars/16.png" alt class="h-auto rounded-circle" />
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              
              <li>
                <a class="dropdown-item" href="pages-profile-user.html">
                  <i class="ti ti-user-check me-2 ti-sm"></i>
                  <span class="align-middle">{{session('user')}}</span>
                </a>
              </li>
              <li>
                <a href="{{route('destroy')}}" class="dropdown-item" href="auth-login-cover.html">
                  <i class="ti ti-logout me-2 ti-sm"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>

      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
        <input
          type="text"
          class="form-control search-input border-0"
          placeholder="Search..."
          aria-label="Search..." />
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
      </div>
    </div>
  </nav>

  <!-- / Navbar -->

  <!-- Layout container -->
  <div class="layout-page">
    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
        <div class="container-xxl d-flex h-100">
          <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item active">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
              </a>
              <!-- <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="index.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                    <div data-i18n="Analytics">Analytics</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="dashboards-crm.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                    <div data-i18n="CRM">CRM</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="dashboards-ecommerce.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-atom-2"></i>
                    <div data-i18n="eCommerce">eCommerce</div>
                  </a>
                </li>
              </ul> -->
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="{{route('room-booking')}}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="ROOM-BOOKING">ROOM-BOOKING </div>
              </a>

              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="{{route('room-booking')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-menu-2"></i>
                    <div data-i18n="Add New Room Booking">Add New Room Booking</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('view_room_booking')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-menu-2"></i>
                    <div data-i18n="View Room Booking">View Room Booking</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('get_room_list')}}" class="menu-link" target="_blank">
                    <i class="menu-icon tf-icons ti ti-layout-distribute-vertical"></i>
                    <div data-i18n="Room List">Room List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('checkout')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-maximize"></i>
                    <div data-i18n="Checkout">Checkout</div>
                  </a>
                </li>
              </ul> 
            </li>

            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Members">MEMBERS</div>
              </a>
              <ul class="menu-sub">
                
                
                <li class="menu-item">
                  <a href="{{route('ViewMembers')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-help"></i>
                    <div data-i18n="VIEW MEMBERS">VIEW MEMBERS</div>
                  </a>
                </li>
            
               
              </ul> 
            </li>

            <!-- Apps -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>
                <div data-i18n="DONATION">DONATION</div>
              </a>
               <ul class="menu-sub">
               
                <li class="menu-item">
                  <a href="{{route('view_general_donation')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                    <div data-i18n="General Donation">General Donation</div>
                  </a>
                </li>
                
                <li class="menu-item">
                  <a href="{{route('View_Community_Donation')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                    <div data-i18n="Community Donation">Community Donation</div>
                  </a>
                </li> 
                <li class="menu-item">
                  <a href="{{route('View_Religious_Donation')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                    <div data-i18n="Religious Donation">Religious Donation</div>
                  </a>
                </li>
              
              </ul> 
            </li>

            <!-- Pages -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file"></i>

                <div data-i18n="MEDICAL">MEDICAL</div>
              </a>
              <ul class="menu-sub">
                
                
                <li class="menu-item">
                  <a href="{{route('view_treatment')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-help"></i>
                    <div data-i18n="TREATMENT">TREATMENT</div>
                  </a>
                </li>
                
                
                

                
              
               
              </ul> 
            </li>

            <!-- Components -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-toggle-left"></i>
                <div data-i18n="EXPENSE">EXPENSE</div>
              </a>
              
              <ul class="menu-sub">
                 <li class="menu-item">
                  <a href="{{route('View_Sangh_Expense')}}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-id"></i>
                    <div data-i18n="Sangh Expense">Sangh Expense</div>
                  </a>
                 </li> 
                 <li class="menu-item">
                  <a href="{{route('view_mahajan_expense')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-id"></i>
                    <div data-i18n="Mahajan Expense">Mahajan Expense</div>
                  </a>
                 </li> 
              </ul>
            </li> 

            <!-- Forms -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-forms"></i>
                <div data-i18n="REPORTS">REPORTS</div>
              </a>
              <ul class="menu-sub">
                
                <li class="menu-item">
                  <a href="{{route('general_donation_report')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkbox"></i>
                    <div data-i18n="General Donation">General Donation</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('community_donation_report')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkbox"></i>
                    <div data-i18n="Community Donation">Community Donation</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('religious_category_donation_report')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkbox"></i>
                    <div data-i18n="Religious Category Donation">Religious Category Donation</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('religious_donation_report')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkbox"></i>
                    <div data-i18n="Religious Donation">Religious Donation</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('expense_report')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkbox"></i>
                    <div data-i18n="Expense">Expense</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('medical_report')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkbox"></i>
                    <div data-i18n="Medical">Medical</div>
                  </a>
                </li>
              </ul> 
            </li>

            <!-- Tables -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
              <ul class="menu-sub"> -->
                <!-- Tables -->
                <!-- <li class="menu-item">
                  <a href="tables-basic.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-table"></i>
                    <div data-i18n="Tables">Tables</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Datatables">Datatables</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="tables-datatables-basic.html" class="menu-link">
                        <div data-i18n="Basic">Basic</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="tables-datatables-advanced.html" class="menu-link">
                        <div data-i18n="Advanced">Advanced</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="tables-datatables-extensions.html" class="menu-link">
                        <div data-i18n="Extensions">Extensions</div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li> -->

            <!-- Charts & Maps -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                <div data-i18n="Charts & Maps">Charts & Maps</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                    <div data-i18n="Charts">Charts</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="charts-apex.html" class="menu-link">
                        <div data-i18n="Apex Charts">Apex Charts</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="charts-chartjs.html" class="menu-link">
                        <div data-i18n="ChartJS">ChartJS</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="maps-leaflet.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-map"></i>
                    <div data-i18n="Leaflet Maps">Leaflet Maps</div>
                  </a>
                </li>
              </ul>
            </li> -->

            
          </ul>

          

        </div>
       
        
       
      </aside>
      <!-- / Menu -->

   