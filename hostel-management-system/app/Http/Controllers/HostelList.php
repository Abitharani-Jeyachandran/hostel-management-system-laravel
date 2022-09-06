<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HostelList extends Controller
{
    public function warden()
    {
      
        $data = DB::table('warden')
        ->join('hostels','hostels.id',"=",'warden.hostel_id')
        ->select('warden.*','warden.name','hostels.name')
        ->get();

//return dd($data);
return view('listwarden',['clas'=>$data]);
    
    }

     public function subwarden()
     {
        
        $data = DB::table('hostels')
        ->join('sub_warden','sub_warden.id',"=",'hostels.id')
        ->select('sub_warden.*','hostels.name','sub_warden.email')
        ->get();

//return dd($data);
return view ('listsubwarden',['clas'=>$data]);
    
     }
}
