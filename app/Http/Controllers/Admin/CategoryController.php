<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\str;
class CategoryController extends Controller
{
    public function index()
    {
        $ctd = Category::all();
        return view('Admin.category.index', compact('ctd'));
    }
    public function create()
    {
        return view('Admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        $category=new Category;

          $category->Category_name=$request->category_name;
          $category->Category_slug=str::of($request->category_name)->slug('-');

       $category->save();
        return redirect()->back()->with('success','Successfully data Update!');
    }
    public function edit($id){
        $etd=Category::find($id);
       return view('Admin.category.edit',compact('etd'));
    }
    public function update(Request $request,$id){
        $etd=Category::find($id);
        $etd->update([
           'Category_name'=>$request->category_name,
           'Category_slug'=>str::of($request->category_name)->slug('-'),
        ]);
       return redirect()->route('Category.index');
    }
    public function destoy($id){
        $etd=Category::find($id);
        $etd->delete();
       return redirect()->route('Category.index');
    }
}
