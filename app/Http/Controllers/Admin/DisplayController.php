<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function get_display_home(){
        $PATH_LAYOUT_MAIN_SLIDER = 'admin_assets/setting/layout_main_slider.txt';
        $data_slider = readDataText($PATH_LAYOUT_MAIN_SLIDER);
        // dd($data_slider);
        return view('admin.display-setting.home_setting',compact('data_slider'));
    }
    public function post_display_home(Request $request){
        // dd($request);
        $request->validate([
            'Banner.*.title_banner' => 'required',
            // 'image_banner' => 'required',
        ], [
            'Banner.*.title_banner.required' => 'Không được để trống tiêu đề slider',
            // 'image_banner.required' => 'Không được để trống hình ảnh slider',
        ]);
        // dd($request);
        $PATH_LAYOUT_MAIN_SLIDER = 'admin_assets/setting/layout_main_slider.txt';

        writeFileText(json_encode($request->banner), $PATH_LAYOUT_MAIN_SLIDER);
        return redirect()->route('display_setting_home');
    }
}
