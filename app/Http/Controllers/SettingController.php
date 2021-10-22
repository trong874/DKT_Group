<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $configs = Setting::all();
        return view('backend.setting.index',compact('configs'));
    }

    public function update(Request $request)
    {
        $configs = $request->all();
        foreach ($configs as $key => $item){
            if ($key == '_method'||$key == '_token'){
                continue;
            }
           $config = Setting::where('name',$key)->first();
            $config->update(['val'=>$item]);
        }
        return back();
    }
}
