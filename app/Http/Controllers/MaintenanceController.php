<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MaintenanceController extends Controller
{
    public function index(){
        // return view ('settings');
        $query = DB::table('configurations')
        ->where('name', 'maintenance');
        $maintenance = $query->first();
        $mode = $maintenance->value;
        return view ('/settings', [
            'mode' => $mode
        ]);
    }

    public function maintenance(){
        return view ('/maintenance');
    }

    public function toggleSettings(Request $request){
        $input = $request->all();
        $mode = $request->input('mode');

        if ($mode){
            DB::table('configurations')
              ->where('name', 'maintenance')
              ->update(['value'=>'on']);

          }else{
            DB::table('configurations')
              ->where('name', 'maintenance')
              ->update(['value'=>'off']);

          }
          return redirect('/settings');
    }
}
