<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;

class AppealController extends Controller
{
    //
    function show()
    {
        $data=Appeal::all();
        return view('warden.pages.appeal_list',['appeal'=>$data]);
    }

    public function approved($id)
    {
        $data=Appeal::find($id);
        $data->status="Approved"; 
        $data->save();
        return redirect()->back();
    }

    public function reject($id)
    {
        $data=Appeal::find($id);
        $data->status="Reject"; 
        $data->save();
        return redirect()->back();
    }
}
