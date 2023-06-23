<!-- Navbar -->
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="index.html" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                fill="#7367F0" />
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
                fill="#7367F0" />
            </svg>
          </span>
          <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
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
          <!-- Language -->
          <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class="fi fi-us fis rounded-circle me-1 fs-3"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                  <i class="fi fi-us fis rounded-circle me-1 fs-3"></i>
                  <span class="align-middle">English</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                  <i class="fi fi-fr fis rounded-circle me-1 fs-3"></i>
                  <span class="align-middle">French</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                  <i class="fi fi-de fis rounded-circle me-1 fs-3"></i>
                  <span class="align-middle">German</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                  <i class="fi fi-pt fis rounded-circle me-1 fs-3"></i>
                  <span class="align-middle">Portuguese</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ Language -->

          <!-- Search -->
          <li class="nav-item navbar-search-wrapper me-2 me-xl-0">
            <a class="nav-link search-toggler" href="javascript:void(0);">
              <i class="ti ti-search ti-md"></i>
            </a>
          </li>
          <!-- /Search -->

          <!-- Style Switcher -->
          <li class="nav-item me-2 me-xl-0">
            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
              <i class="ti ti-md"></i>
            </a>
          </li>
          <!--/ Style Switcher -->

          <!-- Quick links  -->
          <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a
              class="nav-link dropdown-toggle hide-arrow"
              href="javascript:void(0);"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false">
              <i class="ti ti-layout-grid-add ti-md"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                  <a
                    href="javascript:void(0)"
                    class="dropdown-shortcuts-add text-body"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Add shortcuts"
                    ><i class="ti ti-sm ti-apps"></i
                  ></a>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-calendar fs-4"></i>
                    </span>
                    <a href="app-calendar.html" class="stretched-link">Calendar</a>
                    <small class="text-muted mb-0">Appointments</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-file-invoice fs-4"></i>
                    </span>
                    <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                    <small class="text-muted mb-0">Manage Accounts</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-users fs-4"></i>
                    </span>
                    <a href="app-user-list.html" class="stretched-link">User App</a>
                    <small class="text-muted mb-0">Manage Users</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-lock fs-4"></i>
                    </span>
                    <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                    <small class="text-muted mb-0">Permission</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-chart-bar fs-4"></i>
                    </span>
                    <a href="index.html" class="stretched-link">Dashboard</a>
                    <small class="text-muted mb-0">User Profile</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-settings fs-4"></i>
                    </span>
                    <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                    <small class="text-muted mb-0">Account Settings</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-help fs-4"></i>
                    </span>
                    <a href="pages-help-center-landing.html" class="stretched-link">Help Center</a>
                    <small class="text-muted mb-0">FAQs & Articles</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ti ti-square fs-4"></i>
                    </span>
                    <a href="modal-examples.html" class="stretched-link">Modals</a>
                    <small class="text-muted mb-0">Useful Popups</small>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- Quick links -->

          <!-- Notification -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a
              class="nav-link dropdown-toggle hide-arrow"
              href="javascript:void(0);"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false">
              <i class="ti ti-bell ti-md"></i>
              <span class="badge bg-danger rounded-pill badge-notifications">5</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">Notification</h5>
                  <a
                    href="javascript:void(0)"
                    class="dropdown-notifications-all text-body"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Mark all as read"
                    ><i class="ti ti-mail-opened fs-4"></i
                  ></a>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                        <p class="mb-0">Won the monthly best seller gold badge</p>
                        <small class="text-muted">1h ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">Charles Franklin</h6>
                        <p class="mb-0">Accepted your connection</p>
                        <small class="text-muted">12hr ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="../../assets/img/avatars/2.png" alt class="h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">New Message ✉️</h6>
                        <p class="mb-0">You have new message from Natalie</p>
                        <small class="text-muted">1h ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-success"
                            ><i class="ti ti-shopping-cart"></i
                          ></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                        <p class="mb-0">ACME Inc. made new order $1,154</p>
                        <small class="text-muted">1 day ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="../../assets/img/avatars/9.png" alt class="h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">Application has been approved 🚀</h6>
                        <p class="mb-0">Your ABC project application has been approved.</p>
                        <small class="text-muted">2 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-success"
                            ><i class="ti ti-chart-pie"></i
                          ></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">Monthly report is generated</h6>
                        <p class="mb-0">July monthly financial report is generated</p>
                        <small class="text-muted">3 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="../../assets/img/avatars/5.png" alt class="h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">Send connection request</h6>
                        <p class="mb-0">Peter sent you connection request</p>
                        <small class="text-muted">4 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="../../assets/img/avatars/6.png" alt class="h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">New message from Jane</h6>
                        <p class="mb-0">Your have new message from Jane</p>
                        <small class="text-muted">5 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-warning"
                            ><i class="ti ti-alert-triangle"></i
                          ></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1">CPU is running high</h6>
                        <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                        <small class="text-muted">5 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                          ><span class="badge badge-dot"></span
                        ></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                          ><span class="ti ti-x"></span
                        ></a>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown-menu-footer border-top">
                <a
                  href="javascript:void(0);"
                  class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                  View all notifications
                </a>
              </li>
            </ul>
          </li>
          <!--/ Notification -->

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">John Doe</span>
                      <small class="text-muted">Admin</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="pages-profile-user.html">
                  <i class="ti ti-user-check me-2 ti-sm"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <i class="ti ti-settings me-2 ti-sm"></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="pages-account-settings-billing.html">
                  <span class="d-flex align-items-center align-middle">
                    <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                    <span class="flex-grow-1 align-middle">Billing</span>
                    <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20"
                      >2</span
                    >
                  </span>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="pages-help-center-landing.html">
                  <i class="ti ti-lifebuoy me-2 ti-sm"></i>
                  <span class="align-middle">Help</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="pages-faq.html">
                  <i class="ti ti-help me-2 ti-sm"></i>
                  <span class="align-middle">FAQ</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="pages-pricing.html">
                  <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                  <span class="align-middle">Pricing</span>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
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
              <ul class="menu-sub">
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
              </ul>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Layouts">Layouts</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-menu-2"></i>
                    <div data-i18n="Without menu">Without menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="../vertical-menu-template/" class="menu-link" target="_blank">
                    <i class="menu-icon tf-icons ti ti-layout-distribute-vertical"></i>
                    <div data-i18n="Vertical">Vertical</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-maximize"></i>
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-arrows-maximize"></i>
                    <div data-i18n="Container">Container</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-square"></i>
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Apps -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>
                <div data-i18n="Apps">Apps</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="app-email.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div data-i18n="Email">Email</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-chat.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-messages"></i>
                    <div data-i18n="Chat">Chat</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-calendar.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-calendar"></i>
                    <div data-i18n="Calendar">Calendar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-kanban.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                    <div data-i18n="Kanban">Kanban</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                    <div data-i18n="Invoice">Invoice</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="app-invoice-list.html" class="menu-link">
                        <div data-i18n="List">List</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-invoice-preview.html" class="menu-link">
                        <div data-i18n="Preview">Preview</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-invoice-edit.html" class="menu-link">
                        <div data-i18n="Edit">Edit</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-invoice-add.html" class="menu-link">
                        <div data-i18n="Add">Add</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Users">Users</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="app-user-list.html" class="menu-link">
                        <div data-i18n="List">List</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="View">View</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="app-user-view-account.html" class="menu-link">
                            <div data-i18n="Account">Account</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="app-user-view-security.html" class="menu-link">
                            <div data-i18n="Security">Security</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="app-user-view-billing.html" class="menu-link">
                            <div data-i18n="Billing & Plans">Billing & Plans</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="app-user-view-notifications.html" class="menu-link">
                            <div data-i18n="Notifications">Notifications</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="app-user-view-connections.html" class="menu-link">
                            <div data-i18n="Connections">Connections</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Roles & Permissions">Roles & Permission</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="app-access-roles.html" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-access-permission.html" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <!-- Pages -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file"></i>

                <div data-i18n="Pages">Pages</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-user-circle"></i>
                    <div data-i18n="User Profile">User Profile</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="pages-profile-user.html" class="menu-link">
                        <div data-i18n="Profile">Profile</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-profile-teams.html" class="menu-link">
                        <div data-i18n="Teams">Teams</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-profile-projects.html" class="menu-link">
                        <div data-i18n="Projects">Projects</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-profile-connections.html" class="menu-link">
                        <div data-i18n="Connections">Connections</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Account Settings">Account Settings</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="pages-account-settings-account.html" class="menu-link">
                        <div data-i18n="Account">Account</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-account-settings-security.html" class="menu-link">
                        <div data-i18n="Security">Security</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-account-settings-billing.html" class="menu-link">
                        <div data-i18n="Billing & Plans">Billing & Plans</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-account-settings-notifications.html" class="menu-link">
                        <div data-i18n="Notifications">Notifications</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-account-settings-connections.html" class="menu-link">
                        <div data-i18n="Connections">Connections</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="pages-faq.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-help"></i>
                    <div data-i18n="FAQ">FAQ</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                    <div data-i18n="Help Center">Help Center</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="pages-help-center-landing.html" class="menu-link">
                        <div data-i18n="Landing">Landing</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-help-center-categories.html" class="menu-link">
                        <div data-i18n="Categories">Categories</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-help-center-article.html" class="menu-link">
                        <div data-i18n="Article">Article</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="pages-pricing.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-diamond"></i>
                    <div data-i18n="Pricing">Pricing</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                    <div data-i18n="Misc">Misc</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="pages-misc-error.html" class="menu-link" target="_blank">
                        <div data-i18n="Error">Error</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-misc-under-maintenance.html" class="menu-link" target="_blank">
                        <div data-i18n="Under Maintenance">Under Maintenance</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-misc-comingsoon.html" class="menu-link" target="_blank">
                        <div data-i18n="Coming Soon">Coming Soon</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-misc-not-authorized.html" class="menu-link" target="_blank">
                        <div data-i18n="Not Authorized">Not Authorized</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-lock"></i>
                    <div data-i18n="Authentications">Authentications</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Login">Login</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="auth-login-basic.html" class="menu-link" target="_blank">
                            <div data-i18n="Basic">Basic</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="auth-login-cover.html" class="menu-link" target="_blank">
                            <div data-i18n="Cover">Cover</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Register">Register</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="auth-register-basic.html" class="menu-link" target="_blank">
                            <div data-i18n="Basic">Basic</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="auth-register-cover.html" class="menu-link" target="_blank">
                            <div data-i18n="Cover">Cover</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="auth-register-multisteps.html" class="menu-link" target="_blank">
                            <div data-i18n="Multi-steps">Multi-steps</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Verify Email">Verify Email</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="auth-verify-email-basic.html" class="menu-link" target="_blank">
                            <div data-i18n="Basic">Basic</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="auth-verify-email-cover.html" class="menu-link" target="_blank">
                            <div data-i18n="Cover">Cover</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Reset Password">Reset Password</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="auth-reset-password-basic.html" class="menu-link" target="_blank">
                            <div data-i18n="Basic">Basic</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="auth-reset-password-cover.html" class="menu-link" target="_blank">
                            <div data-i18n="Cover">Cover</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Forgot Password">Forgot Password</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                            <div data-i18n="Basic">Basic</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="auth-forgot-password-cover.html" class="menu-link" target="_blank">
                            <div data-i18n="Cover">Cover</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Two Steps">Two Steps</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="auth-two-steps-basic.html" class="menu-link" target="_blank">
                            <div data-i18n="Basic">Basic</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="auth-two-steps-cover.html" class="menu-link" target="_blank">
                            <div data-i18n="Cover">Cover</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-forms"></i>
                    <div data-i18n="Wizard Examples">Wizard Examples</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="wizard-ex-checkout.html" class="menu-link">
                        <div data-i18n="Checkout">Checkout</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="wizard-ex-property-listing.html" class="menu-link">
                        <div data-i18n="Property Listing">Property Listing</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="wizard-ex-create-deal.html" class="menu-link">
                        <div data-i18n="Create Deal">Create Deal</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="modal-examples.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-square"></i>
                    <div data-i18n="Modal Examples">Modal Examples</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Components -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-toggle-left"></i>
                <div data-i18n="Components">Components</div>
              </a>
              <ul class="menu-sub">
                <!-- Cards -->
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-id"></i>
                    <div data-i18n="Cards">Cards</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="cards-basic.html" class="menu-link">
                        <div data-i18n="Basic">Basic</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="cards-advance.html" class="menu-link">
                        <div data-i18n="Advance">Advance</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="cards-statistics.html" class="menu-link">
                        <div data-i18n="Statistics">Statistics</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="cards-analytics.html" class="menu-link">
                        <div data-i18n="Analytics">Analytics</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="cards-actions.html" class="menu-link">
                        <div data-i18n="Actions">Actions</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- User interface -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-color-swatch"></i>
                    <div data-i18n="User interface">User interface</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="ui-accordion.html" class="menu-link">
                        <div data-i18n="Accordion">Accordion</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-alerts.html" class="menu-link">
                        <div data-i18n="Alerts">Alerts</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-badges.html" class="menu-link">
                        <div data-i18n="Badges">Badges</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-buttons.html" class="menu-link">
                        <div data-i18n="Buttons">Buttons</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-carousel.html" class="menu-link">
                        <div data-i18n="Carousel">Carousel</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-collapse.html" class="menu-link">
                        <div data-i18n="Collapse">Collapse</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-dropdowns.html" class="menu-link">
                        <div data-i18n="Dropdowns">Dropdowns</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-footer.html" class="menu-link">
                        <div data-i18n="Footer">Footer</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-list-groups.html" class="menu-link">
                        <div data-i18n="List groups">List groups</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-modals.html" class="menu-link">
                        <div data-i18n="Modals">Modals</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-navbar.html" class="menu-link">
                        <div data-i18n="Navbar">Navbar</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-offcanvas.html" class="menu-link">
                        <div data-i18n="Offcanvas">Offcanvas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                        <div data-i18n="Pagination & Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-progress.html" class="menu-link">
                        <div data-i18n="Progress">Progress</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-spinners.html" class="menu-link">
                        <div data-i18n="Spinners">Spinners</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-tabs-pills.html" class="menu-link">
                        <div data-i18n="Tabs & Pills">Tabs &amp; Pills</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-toasts.html" class="menu-link">
                        <div data-i18n="Toasts">Toasts</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-tooltips-popovers.html" class="menu-link">
                        <div data-i18n="Tooltips & popovers">Tooltips &amp; popovers</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="ui-typography.html" class="menu-link">
                        <div data-i18n="Typography">Typography</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- Extended components -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-components"></i>
                    <div data-i18n="Extended UI">Extended UI</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="extended-ui-avatar.html" class="menu-link">
                        <div data-i18n="Avatar">Avatar</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-blockui.html" class="menu-link">
                        <div data-i18n="BlockUI">BlockUI</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-drag-and-drop.html" class="menu-link">
                        <div data-i18n="Drag & Drop">Drag &amp; Drop</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-media-player.html" class="menu-link">
                        <div data-i18n="Media Player">Media Player</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                        <div data-i18n="Perfect scrollbar">Perfect scrollbar</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-star-ratings.html" class="menu-link">
                        <div data-i18n="Star Ratings">Star Ratings</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-sweetalert2.html" class="menu-link">
                        <div data-i18n="SweetAlert2">SweetAlert2</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-text-divider.html" class="menu-link">
                        <div data-i18n="Text Divider">Text Divider</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Timeline">Timeline</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="extended-ui-timeline-basic.html" class="menu-link">
                            <div data-i18n="Basic">Basic</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="extended-ui-timeline-fullscreen.html" class="menu-link">
                            <div data-i18n="Fullscreen">Fullscreen</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-tour.html" class="menu-link">
                        <div data-i18n="Tour">Tour</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-treeview.html" class="menu-link">
                        <div data-i18n="Treeview">Treeview</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="extended-ui-misc.html" class="menu-link">
                        <div data-i18n="Miscellaneous">Miscellaneous</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- Icons -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-brand-tabler"></i>
                    <div data-i18n="Icons">Icons</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="icons-tabler.html" class="menu-link">
                        <div data-i18n="Tabler">Tabler</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="icons-font-awesome.html" class="menu-link">
                        <div data-i18n="Fontawesome">Fontawesome</div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <!-- Forms -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-forms"></i>
                <div data-i18n="Forms">Forms</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-toggle-left"></i>
                    <div data-i18n="Form Elements">Form Elements</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="forms-basic-inputs.html" class="menu-link">
                        <div data-i18n="Basic Inputs">Basic Inputs</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-input-groups.html" class="menu-link">
                        <div data-i18n="Input groups">Input groups</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-custom-options.html" class="menu-link">
                        <div data-i18n="Custom Options">Custom Options</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-editors.html" class="menu-link">
                        <div data-i18n="Editors">Editors</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-file-upload.html" class="menu-link">
                        <div data-i18n="File Upload">File Upload</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-pickers.html" class="menu-link">
                        <div data-i18n="Pickers">Pickers</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-selects.html" class="menu-link">
                        <div data-i18n="Select & Tags">Select &amp; Tags</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-sliders.html" class="menu-link">
                        <div data-i18n="Sliders">Sliders</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-switches.html" class="menu-link">
                        <div data-i18n="Switches">Switches</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="forms-extras.html" class="menu-link">
                        <div data-i18n="Extras">Extras</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-navbar"></i>
                    <div data-i18n="Form Layouts">Form Layouts</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="form-layouts-vertical.html" class="menu-link">
                        <div data-i18n="Vertical Form">Vertical Form</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="form-layouts-horizontal.html" class="menu-link">
                        <div data-i18n="Horizontal Form">Horizontal Form</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="form-layouts-sticky.html" class="menu-link">
                        <div data-i18n="Sticky Actions">Sticky Actions</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                    <div data-i18n="Form Wizard">Form Wizard</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="form-wizard-numbered.html" class="menu-link">
                        <div data-i18n="Numbered">Numbered</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="form-wizard-icons.html" class="menu-link">
                        <div data-i18n="Icons">Icons</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="form-validation.html" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checkbox"></i>
                    <div data-i18n="Form Validation">Form Validation</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Tables -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
              <ul class="menu-sub">
                <!-- Tables -->
                <li class="menu-item">
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
            </li>

            <!-- Charts & Maps -->
            <li class="menu-item">
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
            </li>

            
          </ul>

          

        </div>
       
        
       
      </aside>
      <!-- / Menu -->

   