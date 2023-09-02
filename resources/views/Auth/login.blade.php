
@extends('Auth.layouts.app')

@section('Login - KVO')

@section('content')

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
          <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img
              src="../../assets/img/illustrations/login.png"
              alt="auth-login-cover"
              class="img-fluid my-5 auth-illustration"
              data-app-light-img="illustrations/login.png"
              data-app-dark-img="illustrations/login.png" />

            <img
              src="../../assets/img/illustrations/bg-shape-image-light.png"
              alt="auth-login-cover"
              class="platform-bg"
              data-app-light-img="illustrations/bg-shape-image-light.png"
              data-app-dark-img="illustrations/bg-shape-image-dark.png" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
          <div class="w-px-400 mx-auto">
          
            <div class="app-brand mb-4">
              <!-- /Logo -->
            </div>
 

            <form id="formAuthentication" class="mb-3"  method="POST" action="{{route('check_user')}}">
              @csrf
              <div class="mb-3"><h3>Login</h3>
                <label for="email" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Enter your username"
                  autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" value="1" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>>
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100">Sign in</button>
              @if(Session::get("fail"))
                                <div>
                                    {{Session::get("fail")}}
                                </div>
              @endif
            </form>

          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>

    <!-- / Content -->


@endsection

@endsection