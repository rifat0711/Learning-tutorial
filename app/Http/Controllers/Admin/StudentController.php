<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use App\Models\Student;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=DB::table('students')->orderBy('roll','ASC')->paginate(4);
        return view('admin.students.index', compact('students'));


        // $students= DB::table('students')->rightJoin('classes','students.class_id','classes.id')
        // ->get();
        // $data=DB::table('students')
        // ->crossJoin('classes')
        // ->get();


        //____Use Models_____//
        // $students=Student::all();
        // return response()->json($students);

        // $first=DB::table('students')
        // ->whereNull('name');

        // $users=DB::table('students')
        // ->whereNull('phone')
        // ->union($first)
        // ->get();
        // return response()->json($users);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes=DB::table('classes')->get();
        return view('admin.students.create',compact('classes'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo"Hello";
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','successfully deleted');
    }
}
