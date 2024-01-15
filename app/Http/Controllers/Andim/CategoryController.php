<?php

namespace App\Http\Controllers\Andim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class CategoryController extends Controller
{
    public function index()
    {
        $std = DB::table('classes')->get();
        return view('Admin.class.index', compact('std'));
    }
    public function create()
    {
        return view('Admin.class.store');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'Required|unique:classes',
        ]);
        $data = array(
            'name' => $request->name,
        );
        DB::table('classes')->insert($data);
        return redirect()->back()->with('success','succesfully insert Data!');
    }
    public function delete($id)
    {
        DB::table('classes')->where('id',$id)->delete();
      return redirect()->back();
    }
    public function edit($id)
    {
      $etd=DB::table('classes')->where('id',$id)->first();
      return view('Admin.class.edit',compact('etd'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|unique:classes',
        ]);
        $data=array(
            'name'=>$request->name,
        );
     DB::table('classes')->where('id',$id)->update($data);
     return redirect()->back()->with('success','succesfully update Data!');
    }
}
