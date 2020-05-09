<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Storage;
use Http;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/pages/trang-chu', [
        ]); 
    }
    public function saveImages(){
        $time = request('name');
        $file = request('file');
        $image = str_replace('\\','',$file);
        $imageName = $time. '.tif';
        Storage::disk('public')->put($imageName, base64_decode($image));
        return response()->json([
            'data' => 'OK',
        ],200);
    }
    public function getImages(){
        $time = request('name').'.tif';
        $path = public_path('storage\\'.$time);
        if (File::exists($path)) {
            return response()->json([
                'filename' => $time,
            ],200);
        }
    }

    public function checkVanTay(Request $request){
        $urlVanTay = $request->url;
        $ngonTay = $request->ngon_tay;
        $benTay = $request->ben_tay;
        if($benTay == 0){
            return response()->json([
                "code" => 200,
                "id_nguoi_dung" => 34516,
                "message" => "Vân tay đã tồn tại trong hệ thống"
            ]);
        }else{
            return response()->json([
                "code" => 404,
                "id_nguoi_dung" => '',
                "message" => "Vân tay không tồn tại trong hệ thống"
            ]);
        }
    }
    public function checkVanTay_KhongNgon(Request $request){
        $urlVanTay = $request->url;
        return response()->json([
            "code" => 404,
            "message" => "Không tìm thấy thông tin vân tay trong hệ thống!"
        ]);
        // return response()->json([
        //     "code" => 200,
        //     "id_nguoi_dung" => 34516,
        //     "message" => "Load dữ liệu thành công!"
        // ]);
    }
    public function thongTinNguoiDung(Request $request){
        $data = json_decode($request->data_kh);
        $fieldsCaNhan = Array('ho-duong-su','ten-duong-su','gioi-tinh','nam-sinh','giay-to-tuy-than','so-giay-tuy-than','hinh-giay-tuy-than-mt','hinh-giay-tuy-than-ms','hinh-anh-khac','ngay-cap-giay-tuy-than','co-quan-cap','dia-chi-lien-he','dien-thoai');
        $arrCaNhan = Array();
        $arrChung = Array();
        foreach($data->data as $value){
            if(in_array($value->tm_keywords,$fieldsCaNhan)){
                $arrCaNhan[] = $value;
            }else{
                $arrChung[] = $value;
            }
        }
        return view('/pages/thong-tin-nguoi-dung', [
            'arrCaNhan' => $arrCaNhan,
            'arrChung' => $arrChung
        ]); 
    }

    public function timVanTay(Request $request){
        return response()->json([
            "code" => 404,
            "message" => "Không tìm thấy thông tin vân tay trong hệ thống!"
        ]);
        // return response()->json([
        //     "code" => 200,
        //     "id_nguoi_dung" => 34516,
        //     "message" => "Load dữ liệu thành công!"
        // ]);
    }
}
