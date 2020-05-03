@extends('layouts/contentLayoutMaster')

@section('title', 'Thông tin người dùng')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/app-user.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
@endsection
@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/swiper.css')) }}">
@endsection

@section('content')
<!-- page users view start -->
<section class="page-users-view">
  <div class="row">
    <!-- account start -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Thông tin cá nhân</div>
          <div class="row">
            @foreach ($arrCaNhan as $item)
            <div class="col-sm-6 col-12">
              <table>
                <tr>
                  @if (($item->tm_loai == 'file'))
                  <td class="font-weight-bold">{{$item->tm_nhan}}:</td>
                </tr>
                <tr>
                  <td class="product-img"><img class="w-50 h-50" src="../storage/mongquynh_1588488417611.png" alt="">
                  </td>
                </tr>

                  {{-- <td><img src="" alt=""></td> --}}
                  @else
                  <td class="font-weight-bold">{{$item->tm_nhan}}:</td>
                  <td> {{$item->kh_giatri}}</td>
                  @endif
                
                </tr>
              </table>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- account end -->
    <!-- information start -->
    <div class="col-md-12 col-12 ">
      <div class="card">
        <div class="card-body">
          <div class="card-title mb-2">Thông tin chung</div>
          <div class="row">
            @foreach ($arrChung as $item)
            <div class="col-sm-6 col-12">
              <table>
                <tr>
                  @if (($item->tm_loai == 'file'))
                  {{-- <td class="font-weight-bold">{{$item->tm_nhan}}:</td> --}}
                </tr>
                <tr>
                  {{-- @foreach ($item->kh_giatri as $img)
                      {{$img}}
                  @endforeach --}}
                  <div class="swiper-cube-effect swiper-container">
                    <p class="font-weight-bold">{{$item->tm_nhan}}:</p>
                    <div class="swiper-wrapper">
                      
                      <div class="swiper-slide"> <img class="w-50 h-50" src="../storage/mongquynh_1588488417611.png"
                          alt="banner">
                      </div>
                      <div class="swiper-slide"> <img class="w-50 h-50" src="../storage/mongquynh_1588488417611.png"
                          alt="banner">
                      </div>
                      <div class="swiper-slide"> <img class="w-50 h-50" src="../storage/mongquynh_1588488417611.png"
                          alt="banner">
                      </div>
                      <div class="swiper-slide"> <img class="w-50 h-50" src="../storage/mongquynh_1588488417611.png"
                          alt="banner">
                      </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-white"></div>
                  </div>
                </tr>

                  {{-- <td><img src="" alt=""></td> --}}
                  @else
                  <td class="font-weight-bold">{{$item->tm_nhan}}:</td>
                  <td> {{$item->kh_giatri}}</td>
                  @endif
                
                </tr>
              </table>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- information start -->
  </div>
</section>
<!-- page users view end -->
@endsection
@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/extensions/swiper.js')) }}"></script>
@endsection
