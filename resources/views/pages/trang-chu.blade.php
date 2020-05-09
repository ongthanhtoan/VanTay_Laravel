
@extends('layouts/contentLayoutMaster')

@section('title', 'Trang chủ')

@section('vendor-style')
        {{-- vendor files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/app-user.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/validation/form-validation.css')) }}">
        
@endsection
@section('page-style')
        {{-- Page css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/toastr.css')) }}">
@endsection

@section('content')
<iframe id="iframe" src="" style="display:none;"></iframe>
{{-- Data list view starts --}}
<section id="data-list-view" class="data-list-view-header">
  <section class="page-users-view">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            {{-- <div class="card-title">Ảnh vân tay</div> --}}
            <div class="row">
              <div class="col-sm-3">
                <img class="card-img-top img-fluid img-van-tay" src="../storage/admin_1587795077314.png" alt="" height="50%">
              </div>
              <div class="col-sm-9" id="info">
                
              </div>
              <div class="col-sm-9" id="addNew" style="display:none;">
                <form id="frmAddNew" action="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtCMND">Nhập CMND:</label>
                        <input id="txtCMND" name="txtCMND" type="text" class="form-control" placeholder="Nhập số chứng minh nhân dân">
                      </div>
                    </div>
                    {{-- <div class="col-md-12">
                      <div class="form-group">
                        <label for="txtIDKhachHang">ID Khách hàng:</label>
                        <input id="txtIDKhachHang" name="txtIDKhachHang" type="text" class="form-control" disabled>
                      </div>
                    </div> --}}
                    <div class="col-md-12 text-right">
                      <input onclick="timVanTay()" id="btnTim" type="button" class="btn btn-primary btnTim" value="Tìm">
                      {{-- <input id="btnReset" type="button" class="btn btn-danger" value="Reset" onclick="reloadVanTay()"> --}}
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- add new sidebar starts --}}
    <div class="add-new-data-sidebar">
      <div class="overlay-bg btnHuy"></div>
      <div class="add-new-data">
        <form id="frmMain" action="/nguoi-dung/thong-tin-nguoi-dung" method="POST" target="_blank">
          @csrf
          <input type="hidden" name="data_kh" id="data_kh" value="">
          <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
              <h4 class="text-uppercase">Thông tin vân tay</h4>
            </div>
            <div class="hide-data-sidebar">
              <i class="feather icon-x btnHuy"></i>
            </div>
          </div>
          <div class="data-items pb-3">
            <div class="data-fields px-2 mt-1">
              <div class="row">
                  <div class="col-sm-12 data-field-col text-center">
                      <input type="hidden" name="img" id="input-url" value="">
                      <img class="img-fluid img-van-tay" src="" alt="" style="height: 400px;">
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
              <input id="btnHuy" type="button" class="btn btn-outline-danger btnHuy" value="Hủy">
            </div>
          </div>
        </form>
      </div>
    </div>
    {{-- add new sidebar ends --}}
  </section>
  {{-- Data list view end --}}
@endsection
@section('vendor-script')
{{-- vendor js files --}}
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
        <script src="{{ asset(mix('js/scripts/extensions/toastr.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/pages/app-user.js')) }}"></script>
        <script>
            var key = "";
            $(document).ready(function(){
              $("#addNew").hide();
                const today = new Date();
                const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
                const arr = userInfo.email.split("@");
                const email = arr[0];
                key = email+'_'+today.getTime();
                $("#iframe").attr('src',"AB:,"+key+"");
                getImage();
                $(".btnHuy").click(function(){
                  setTimeout(function(){
                      const today = new Date();
                      const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
                      const arr = userInfo.email.split("@");
                      const email = arr[0];
                      key = email+'_'+today.getTime();
                      $("#iframe").attr('src',"AB:,"+key+"");
                      getImage();
                  }.bind(this),1000);
                });
            });
            function timVanTay(){
              const token = sessionStorage.getItem('token');
              const cmnd = $("#txtCMND").val();
              $.ajax({
                  url:"http://dotary.miennam24h.vn/api/chi-tiet-duong-su",
                  method:"POST",
                  dataType: "json",
                  data:{
                    cmnd: cmnd,
                    token: token
                  },
                  success:function(response){
                      if(response.data != ""){
                        createFormThongTin(response.data,true);
                        const today = new Date();
                        const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
                        const arr = userInfo.email.split("@");
                        const email = arr[0];
                        key = email+'_'+today.getTime();
                        $("#iframe").attr('src',"AB:,"+key+"");
                        getImage();
                      }else{
                        toastr.warning(response.message);
                        setTimeout(function(){
                          document.frmMain.submit();
                        },1000);
                      }
                  },
                  error:function(response){
                    toastr.warning(response.message);
                  },
              });
            }
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
                                clearInterval(countDown);
                                showPopup(response.filename);
                                
                            }
                        }
                    });
                }.bind(this), 3000);
            }
            function showPopup(url){
              const ok = false;
              $.ajax({
                  url:"/nguoi-dung/check-van-tay-khong-ngon",
                  method:"POST",
                  dataType: "json",
                  data:{
                    url: url
                  },
                  success:function(response){
                      if(response.code == 200){
                        getThongTinNguoiDung(response.id_nguoi_dung);
                        const today = new Date();
                        const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
                        const arr = userInfo.email.split("@");
                        const email = arr[0];
                        key = email+'_'+today.getTime();
                        $("#iframe").attr('src',"AB:,"+key+"");
                        getImage();
                        ok = true;
                      }else if(response.code == 404){
                        toastr.warning(response.message);
                        $(".add-new-data").addClass("show");
                        $(".overlay-bg").addClass("show");
                      }
                  },
                  error:function(response){
                    toastr.warning(response.message);
                  },
              });
              $(".img-van-tay").attr('src',"../storage/"+url);
              $("#input-url").val(url);
              if(ok){
                $(".add-new-data").addClass("show");
                $(".overlay-bg").addClass("show");
                $("#slNgonTay").prop("selectedIndex", 0);
              }
            }
            function reloadVanTay(){
              location.reload();
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
                      if(response.code == 200){
                        getThongTinNguoiDung(response.id_nguoi_dung);
                      }else if(response.code == 404){
                        $(".add-new-data").removeClass("show")
                        $(".overlay-bg").removeClass("show")
                        $("#info").html($("#addNew").html());
                      }
                  },
                  error:function(response){
                    toastr.warning(response.message);
                  },
              });
              const today = new Date();
              const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
              const arr = userInfo.email.split("@");
              const email = arr[0];
              key = email+'_'+today.getTime();
              $("#iframe").attr('src',"AB:,"+key+"");
              getImage();
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
                      createFormThongTin(response.data);
                      $(".add-new-data").removeClass("show")
                      $(".overlay-bg").removeClass("show")
                  },
                  error:function(response){
                    toastr.warning(response.message);
                  },
              });
            }
            function createFormThongTin(data,save = false){
              var html = '';
              html = '<div class="card"><div class="card-body"><div class="card-title">Thông tin cá nhân</div><div class="row">';
              $.each(data,function(index,value){
                html += '<div class="col-sm-6 col-12">';
                html += '<table>';
                if(value.tm_loai == "file" && (value.tm_keywords == 'hinh-giay-tuy-than-mt' || value.tm_keywords == 'hinh-giay-tuy-than-ms')){
                  html += '<tr>';
                  html += '<td class="font-weight-bold">'+value.tm_nhan+':</td>';
                  html += '</tr>';
                  html += '<tr>';
                  html += '<td class="product-img"><img class="w-50 h-50" src="../storage/mongquynh_1589028821492.tif" alt=""></td>';
                  html += '</tr>';
                }else if(value.tm_keywords != 'van-tay-phai' && value.tm_keywords != 'van-tay-trai'){
                  html += '<td class="font-weight-bold">'+value.tm_nhan+':</td>';
                  html += '<td>'+value.kh_giatri+'</td>';
                }
                html += '</tr>';
                html += '</table>';
                html += '</div>';
              });
              html += '</div></div>';
              if(save){
                html += "<div class='row'>";
                html += '<div class="col-md-12 text-right"><input onclick="save()" id="btnSave" type="button" class="btn btn-primary btnTim" value="Lưu"></div>';
                html += "<div>";
              }
              html += '</div>';
              // console.log(html)
              $("#info").html(html);
            }
            function save(){
              alert(1);
            }
        </script>
@endsection
