<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('warden.pages.hostel_detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $hos = new Hostel;
        $data=Hostel::find($request->input('hostelName'));
        $data->no_of_rooms=$request->input('totalRoom');
        $data->save();
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        //
        $hos = new Hostel;
        $data=Hostel::find($request->input('hostelName'));
        $data->no_of_rooms=$request->input('no_of_rooms');
        $data->save();
        return redirect()->route('hostel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    
    function show()
    {
        $data=Hostel::all();
        return view('warden.pages.hostel_detail',['hostel'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
 

    public function editHostel($name,$total)
    {
        //
        $data=Hostel::find($name);
        $data->no_of_rooms=5;
        $data->save();
        return redirect()->back();        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostel $hostel)
    {
        //
        $hos = new Hostel;
        $hos->no_of_rooms = $request->input('no_of_rooms');
        $hos->save();
        return redirect('warden/hostel_detail')->wih('succes', 'Data Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        //
    }

    
}
