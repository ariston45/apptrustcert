<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    {{-- css files --}}
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-flags.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-payments.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/remixicon/remixicon.css') }}">
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
        --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      .custom-icon{
        font-size: 1.5rem;
      }
    </style>
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/trustcrm.png') }}" height="60" alt=""></a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">Sign In to Your Account</h2>
                  <form action="{{url('proses_login')}}" method="POST" autocomplete="off" novalidate>
                    {{ csrf_field() }}
                    <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input type="email" name="username" id="inp-usr" class="form-control" placeholder="your@email.com" autocomplete="off">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">
                        Password
                      </label>
                      <div class="input-group input-group-flat">
                        <input type="password" name="password" id="inp-psw" class="form-control"  placeholder="Your password"  autocomplete="off">
                        <button type="button" id="btn-show-psw" class="btn"  data-bs-toggle="tooltip">
                          <i class="ri-eye-off-line"></i>
                        </button>
                      </div>
                    </div>
                    @if ($errors->has('login_gagal'))
                      <div class="mb-2 mt-3">
                        <div class="alert alert-danger alert-dismissible m-0" role="alert">
                          <div class="d-flex">
                            <div>
                              <i class="ri-error-warning-line icon alert-icon" style="font-size: 24px;"></i>
                            </div>
                            <div>
                              Invalid username or password. <br> Please try again.
                            </div>
                          </div>
                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                      </div>
                    @endif
                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="text-center text-muted mt-3">
              </div>
            </div>
          </div>
          <div class="col-lg d-none d-lg-block">
            <img src="./static/illustrations/undraw_secure_login_pdn4.svg" height="300" class="d-block mx-auto" alt="">
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
      $(document).ready(function(){
        $('#btn-show-psw').click(function () {
          const passwordField = $('#inp-psw');
          const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
          passwordField.attr('type', type);
          if (type === 'password') {
            $('#btn-show-psw').html('<i class="ri-eye-off-line"></i>');
          }else{
            $('#btn-show-psw').html('<i class="ri-eye-line"></i>');
          }
        });
      });
    </script>
  </body>
</html>