<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $std2 = DB::table('students')->orderBy("Roll", 'ASC')->get();
        $std2=DB::table('students')->join('classes','students.id','classes.id')->paginate(1);
        // dd($std2);
        return view('Admin.students.index', compact('std2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $class = DB::table('classes')->get();
        return view('Admin.students.create', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class_name' => 'required',
            'Roll' => 'required|max:10',
            'email' => 'required|max:25',
            'phone' => 'required',
            'Address' => 'required',
        ]);
        $data = array(
            'class_id' => $request->class_name,
            'name' => $request->name,
            'Roll' => $request->Roll,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->Address,
        );
        DB::table('students')->insert($data);
        return redirect()->back()->with("success", "Successfully Insert Data!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show=DB::table('students')->where('id',$id )->first();
        return view('Admin.students.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clg = DB::table('classes')->get();
        $STD = DB::table('students')->where('id', $id)->first();
        return view('Admin.students.edit', compact('clg', "STD"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required',
            'class_name' => 'required',
            'Roll' => 'required|max:10',
            'email' => 'required|max:25',
            'phone' => 'required',
            'Address' => 'required',
        ]);

        $data = array(
            'class_id' => $request->class_name,
            'name' => $request->name,
            'Roll' => $request->Roll,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->Address,
        );
       DB::table('students')->where('id',$id)->update($data);
       return redirect()->route('students.index')->with("success", "Successfully update Data!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        DB::table("students")->where('id', $id)->delete();
        return redirect()->Back();
    }
}
