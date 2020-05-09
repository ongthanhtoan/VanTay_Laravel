@extends('layouts/contentLayoutMaster')

@section('title', 'Thông tin vân tay')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/app-user.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/validation/form-validation.css')) }}">
@endsection
@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/toastr.css')) }}">
@endsection

@section('content')
<!-- page users view start -->
<section class="page-users-view">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          {{-- <div class="card-title">Ảnh vân tay</div> --}}
          <div class="row">
            <div class="col-sm-3">
              <img class="card-img-top img-fluid" id="img-van-tay" src="../storage/admin_1587795077314.png" alt="" height="50%">
            </div>
            <div class="col-sm-9" id="info">
              <h2 class="text-center text-muted">Không có dữ liệu vân tay</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="data-list-view" class="data-list-view-header">

  {{-- add new sidebar starts --}}
  <div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
      <form id="frmMain" action="/nguoi-dung/thong-tin-nguoi-dung" method="POST" target="_blank">
        @csrf
        <input type="hidden" name="data_kh" id="data_kh" value="">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
          <div>
            <h4 class="text-uppercase">Thông tin vân tay</h4>
          </div>
          <div class="hide-data-sidebar">
            <i class="feather icon-x"></i>
          </div>
        </div>
        <div class="data-items pb-3">
          <div class="data-fields px-2 mt-1">
            <div class="row">
                <div class="col-sm-12 data-field-col">
                    <input type="hidden" name="img" id="input-url" value="">
                    <img class="card-img-top img-fluid" id="img-van-tay" src="" alt="" height="50%">
                </div>
              <div class="col-sm-12 data-field-col">
                <label for="data-name">Chứng minh nhân dân</label>
                <input type="text" class="form-control" name="cmnd" id="cmnd" required data-validation-required-message="Vui lòng nhập chứng minh nhân dân!">
              </div>
              <div class="col-sm-12 data-field-col">
                <label for="data-category"> Ngón tay </label>
                <select class="form-control" name="slNgonTay" id="slNgonTay">
                  <option value="0">Ngón cái</option>
                  <option value="1">Ngón trỏ</option>
                  <option value="2">Ngón giữa</option>
                  <option value="3">Ngón áp út</option>
                  <option value="4">Ngón út</option>
                </select>
              </div>
              <div class="col-sm-12 data-field-col">
                  <label for="data-category"> Bên tay </label>
                  <ul class="list-unstyled mb-0">
                  <li class="d-inline-block mr-2">
                      <fieldset>
                       <div class="vs-radio-con">
                          <input type="radio" name="rdBenTay" checked value="0">
                          <span class="vs-radio">
                            <span class="vs-radio--border"></span>
                            <span class="vs-radio--circle"></span>
                          </span>
                          <span class="">Trái</span>
                        </div>
                      </fieldset>
                    </li>
                    <li class="d-inline-block mr-2">
                      <fieldset>
                        <div class="vs-radio-con">
                          <input type="radio" name="rdBenTay" value="1">
                          <span class="vs-radio">
                            <span class="vs-radio--border"></span>
                            <span class="vs-radio--circle"></span>
                          </span>
                          <span class="">Phải</span>
                        </div>
                      </fieldset>
                    </li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
          <div class="add-data-btn">
            <input id="btnKiemTra" onclick="checkVanTay()" type="button" class="btn btn-primary" value="Kiểm tra">
          </div>
          <div class="cancel-data-btn">
            <input id="btnHuy" type="button" class="btn btn-outline-danger" value="Hủy">
          </div>
        </div>
      </form>
    </div>
  </div>
  {{-- add new sidebar ends --}}
</section>
<!-- page users view end -->
@endsection
@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.select.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user.js')) }}"></script>
  {{-- <script src="{{ asset(mix('js/scripts/extensions/swiper.js')) }}"></script> --}}
  <script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/extensions/toastr.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
  <script>
    var key = "";
    $(document).ready(function(){
      $("#cmnd").parent().hide();
        const today = new Date();
        const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
        const arr = userInfo.email.split("@");
        const email = arr[0];
        key = email+'_'+today.getTime();
        window.open("AB:,"+key,'_self');
        getImage();
        $("#btnHuy").click(function(){
          setTimeout(function(){
              const today = new Date();
              const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
              const arr = userInfo.email.split("@");
              const email = arr[0];
              key = email+'_'+today.getTime();
              window.open("AB:,"+key,'_self');
              getImage();
          }.bind(this),1000);
        }); 
    });
    function getImage(){
        const name = key;
        const countDown = setInterval(function(){
            $.ajax({
                url:"/nguoi-dung/get-images",
                method:"POST",
                dataType: "json",
                data:{name: name},
                success:function(response){
                    if(response.filename){
                        showPopup(response.filename);
                        clearInterval(countDown);
                    }
                }
            });
        }.bind(this), 3000);
    }
    function showPopup(url){
        $("#img-van-tay").attr('src',"../storage/"+url);
        $("#input-url").val(url);
        $(".add-new-data").addClass("show")
        $(".overlay-bg").addClass("show")
        $("#slNgonTay").prop("selectedIndex", 0)
    }
    function reloadVanTay(){
      location.reload();
        // setTimeout(function(){
        //     const today = new Date();
        //     const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
        //     const arr = userInfo.email.split("@");
        //     const email = arr[0];
        //     key = email+'_'+today.getTime();
        //     window.open("ABC:,"+key,'_self');
        //     getImage();
        // }.bind(this),1000);
    }
    function checkVanTay(){
      const URLVanTay = $("#input-url").val();
      const ngonTay = $("#slNgonTay").val();
      const benTay = $("input[name='rdBenTay']:checked").val();
      $.ajax({
          url:"/nguoi-dung/check-van-tay",
          method:"POST",
          dataType: "json",
          data:{
            url: URLVanTay,
            ngon_tay: ngonTay,
            ben_tay: benTay
          },
          success:function(response){
              if(response.id_nguoi_dung != ""){
                getThongTinNguoiDung(response.id_nguoi_dung);
              }else{
                toastr.warning(response.message);
                $("#cmnd").parent().show();
              }
          },
          error:function(response){
              // toastr.warning(response.message);
          },
      });
    }
    function getThongTinNguoiDung(id){
      const token = sessionStorage.getItem('token');
      $.ajax({
          url:"http://dotary.miennam24h.vn/api/chi-tiet-duong-su",
          method:"POST",
          dataType: "json",
          data:{
            kh_id: id,
            token: token
          },
          success:function(response){
              $("#data_kh").val(JSON.stringify(response));
              $("#frmMain").submit();
          },
          error:function(response){
              // toastr.warning(response.message);
          },
      });
    }
</script>
@endsection
