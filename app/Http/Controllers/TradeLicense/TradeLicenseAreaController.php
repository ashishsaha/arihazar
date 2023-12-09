<?php

namespace App\Http\Controllers\TradeLicense;

use App\Http\Controllers\Controller;
use App\Models\Holding\HoldingArea;
use App\Models\Holding\WardInfo;
use Illuminate\Http\Request;

class TradeLicenseAreaController extends Controller
{
    public function index() {
        $areas = HoldingArea::get();
        return view('trade_license.setting.area.all', compact('areas'));
    }

    public function add() {
        $wordInfos = WardInfo::get();
        return view('trade_license.setting.area.add',compact('wordInfos'));
    }

    public function addPost(Request $request) {
        $request->validate([
            'road_name' => 'required|string|max:255',
            'ward_id' => 'required',
        ]);

        $area = new HoldingArea();
        $area->road_no = $request->road_no;
        $area->road_name = $request->road_name;
        $area->ward_id = $request->ward_id;
        $area->save();

        return redirect()->route('trade_license_area')->with('message', 'এলাকা যুক্ত সম্পন্ন হয়েছে।');
    }

    public function edit(HoldingArea $area) {
        $wordInfos = WardInfo::get();
        return view('trade_license.setting.area.edit', compact('area','wordInfos'));
    }

    public function editPost(HoldingArea $area, Request $request) {
        $request->validate([
            'road_name' => 'required|string|max:255',
            'ward_id' => 'required',
        ]);

        $area->road_no = $request->road_no;
        $area->road_name = $request->road_name;
        $area->ward_id = $request->ward_id;
        $area->save();

        return redirect()->route('trade_license_area')->with('message', 'এলাকা পরিবর্তন সম্পন্ন হয়েছে।');
    }
    public function delete(Request $request) {
        HoldingArea::where('id', $request->areaId)->delete();
        return response()->json(['success'=>true,'message'=>"সফলভাবে মুছে ফেলা হয়েছে।"]);
    }
}
