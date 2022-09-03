<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('is_user','=','student')->orderBy('created_at','DESC')->paginate(10);
        return view('warden.pages.students.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warden.pages.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        try {
            DB::beginTransaction();
            $upload = $request->file('csv_file');
            $filePath = $upload->getRealPath();
            $file = fopen($filePath, 'r');
            $header = fgetcsv($file);

            $escapedHeaders = [];
            foreach ($header as $key => $value) {
                $lheader = strtolower($value);
                $excapedItem = preg_replace('/[^a-z_]/','',$lheader);
                array_push($escapedHeaders,$excapedItem);
            }

            while($columns = fgetcsv($file)){
                if($columns[0] == ""){
                    continue;
                }

                $data = array_combine($escapedHeaders,$columns);

                $student = new User();
                $student->enrollment_number = $data['enrollment_number'];
                $student->firstname = $data['firstname'];
                $student->lastname = $data['lastname'];
                $student->email = $data['email'];
                $student->email_verified_at = now();
                $student->password = bcrypt($data['enrollment_number']);
                $student->is_user = "student";
                $student->save();
            }

            DB::commit();
            Flasher::addSuccess('Students added successfully');
            return redirect()->route('warden.students.index');
        }  catch (\Exception $e) {
            DB::rollback();
            Flasher::addError('Students could not be added');
            return redirect()->route('warden.students.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
