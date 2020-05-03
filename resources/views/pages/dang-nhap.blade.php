@extends('layouts/fullLayoutMaster')

@section('title', 'Đăng nhập')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/validation/form-validation.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/toastr.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
  <div class="col-xl-8 col-11 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                  <img src="{{ asset('images/pages/login.png') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 px-2">
                      <div class="card-header pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Đăng nhập</h4>
                          </div>
                      </div>
                      <p class="px-2">Vui lòng đăng nhập</p>
                      <div class="card-content">
                          <div class="card-body pt-1">
                              <form id="frmMain" action="dashboard-analytics">
                                  <fieldset class="form-label-group form-group position-relative has-icon-left">
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control"
                                        data-validation-email-message="Email không hợp lệ!" placeholder="Email" required>
                                    </div>
                                      <div class="form-control-position">
                                          <i class="feather icon-user"></i>
                                      </div>
                                      <label for="user-name">Email</label>
                                  </fieldset>

                                  <fieldset class="form-label-group position-relative has-icon-left">
                                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                                      <div class="form-control-position">
                                          <i class="feather icon-lock"></i>
                                      </div>
                                      <label for="user-password">Password</label>
                                  </fieldset>
                                  <div class="form-group d-flex justify-content-between align-items-center">
                                      {{-- <div class="text-left">
                                          <fieldset class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                              <input type="checkbox">
                                              <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                  <i class="vs-icon feather icon-check"></i>
                                                </span>
                                              </span>
                                              <span class="">Remember me</span>
                                            </div>
                                          </fieldset>
                                      </div> --}}
                                      {{-- <div class="text-right"><a href="auth-forgot-password" class="card-link">Forgot Password?</a></div> --}}
                                  </div>
                                  {{-- <a href="auth-register" class="btn btn-outline-primary float-left btn-inline">Register</a> --}}
                                  <button id="btnLogin" type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                              </form>
                          </div>
                      </div>
                      <div class="login-footer">
                        <div class="divider">
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/extensions/toastr.js')) }}"></script>
        <script>
            $(document).ready(function(){
                const token = sessionStorage.getItem('token');
                if(token != null){
                    window.location = "/";
                }
                $('#frmMain input').jqBootstrapValidation({
                    preventSubmit: true,
                    submitSuccess: function($form, event){     
                        event.preventDefault();
                        $this = $('#btnLogin');
                        $this.prop('disabled', true);
                        var form_data = $("#frmMain").serialize();
                        $.ajax({
                            url:"http://dotary.miennam24h.vn/api/login-validation",
                            method:"POST",
                            dataType: "json",
                            data:form_data,
                            success:function(response){
                                if(response.code == 500){
                                    toastr.warning(response.message);
                                }else{
                                    toastr.success(response.message);
                                    const userInfo = {
                                        email: response.data.user.email,
                                        first_name: response.data.user.first_name,
                                        last_name: response.data.user.last_name,
                                        pic: response.data.user.pic,
                                    }
                                    sessionStorage.setItem('userInfo',JSON.stringify(userInfo));
                                    sessionStorage.setItem('token',response.data.key);
                                    window.location = "/";
                                }
                                $('#btnLogin').trigger('reset');
                            },
                            error:function(response){
                                toastr.warning(response.message);
                                $('#btnLogin').trigger('reset');
                            },
                            complete:function(){
                                setTimeout(function(){
                                $this.prop("disabled", false);
                                }, 2000);
                            }
                        });
                    },
                });
            });
        </script>
@endsection
