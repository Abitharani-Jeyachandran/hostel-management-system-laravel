<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_hostel_details;
use Illuminate\Support\Facades\DB;

class StudentHostelDetailsController extends Controller
{
    // view
    public function studentHostels(){
        $data = DB::table('student_hostel_details')
        ->join('users','users.id','=','student_hostel_details.student_id')
        ->join('hostels','hostels.id','=','student_hostel_details.hostel_id')
        ->select('student_hostel_details.*','hostels.hostel_name','users.firstname')
        ->get();

    }

    public function studentHostelsAdd(Request $request){

        $request->validate([
            "hostel_id" => 'required',
            "room_id" => 'required',
            "bed_id" => 'required',
        ]);

        $check=student_hostel_details::where('hostel_id',$request ->hostel_id)
            ->where('room_id',$request ->room_id)
            ->where('bed_id', $request ->bed_id)
            ->first();

        if($check){
            return back()->with('error', 'it is not avilable');
        }

        else{

              // store
            $data = new student_hostel_details();
            $data -> student_id = $request ->student_id;
            $data -> hostel_id = $request ->hostel_id;
            $data -> room_id = $request ->room_id;
            $data -> bed_id = $request ->bed_id;
            $data -> save();

        }

    }

    public function studentHostelsUpdate(Request $request){

        $request->validate([
            "hostel_id" => 'required',
            "room_id" => 'required',
            "bed_id" => 'required',
        ]);

        $check=student_hostel_details::where('hostel_id',$request ->hostel_id)
        ->where('room_id',$request ->room_id)
        ->where('bed_id', $request ->bed_id)
        ->first();

        if($check->id==$request->id){
            // update
            $data = new student_hostel_details($request->id);
            $data -> student_id = $request ->student_id;
            $data -> hostel_id = $request ->hostel_id;
            $data -> room_id = $request ->room_id;
            $data -> bed_id = $request ->bed_id;
            $data -> save();
        }

        else{
            return back()->with('error', 'it is not avilable');
        }
    }
}
