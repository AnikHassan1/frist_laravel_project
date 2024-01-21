<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Facade\Auth;
use Illuminate\Support\Facades\DB;

class subcategoryController extends Controller
{
    //sub create__//
    public function create()
    {
        $category = Category::all();
        return view('Admin.subcategory.create', compact('category'));
    }
    //__store__//
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories',
        ]);
        $scategory = new subcategory;

        $scategory->category_id = $request->category_id;
        $scategory->subcategory_name = $request->subcategory_name;
        $scategory->subcategory_slug = str::of($request->subcategory_name)->slug('-');

        if ($scategory->save()) {
            toastr()->success('Successfully data Update!');
        } else {
            toastr()->error('An error has occurred please try again later.');
        }
        return redirect()->back();
    }
    //__subcategory Index__//
    public function index()
    {
        //   $users =DB::table('subcategories')
        //   ->leftJoin('categories','subcategories.category_id','categories.id')
        //   ->select('categories.Category_name','subcategories.*')
        //   ->get();
        $users = subcategory::all();

        return view('Admin.subcategory.index', compact('users'));
    }
    public function destoy($id)
    {
        $etd = subcategory::find($id);
        if ($etd->delete()) {
            toastr()->success('Successfully data Update!');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $category = Category::all();
        $data=subcategory::find($id);
        return view('Admin.subcategory.edit',compact('category','data'));
    }
    //__Sub Category Update__//
    public function update(Request $request, $id)
    {
        $scategory = subcategory::find($id);
        $scategory->category_id = $request->category_id;
        $scategory->subcategory_name = $request->subcategory_name;
        $scategory->subcategory_slug = str::of($request->subcategory_name)->slug('-');

        if ($scategory->save()) {
            toastr()->success('Successfully data Update!');
        } else {
            toastr()->error('An error has occurred please try again later.');
        }
        return redirect()->back();
    }
}
