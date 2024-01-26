<?php

namespace App\Http\Controllers\Admin;

use App\Events\PostProcessed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\post;
use App\Models\subcategory;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;

class postController extends Controller
{
    //__create__//
    public function create()
    {
        $category = Category::all();
        return view('Admin.post.create', compact('category'));
    }
    //__Post Store__//
    public function store(Request $request)
    {

        $cat = DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;
        $slug = str::of($request->title)->slug('-');
        $data = array();
        $data['category_id'] = $cat;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->title;
        $data['slug'] = $slug;
        $data['post_date'] = $request->Date;
        $data['description'] = $request->Description;
        $data['tags'] = $request->Tags;
        $data['status'] = $request->status;
        $data['user_id'] = Auth::id();
        $photo = $request->image;
        //__Event Calling Listener__//
        $evdata=['title'=>$request->title,'post_date'=>date('d F Y',strtotime($request->Date))];
        event(new PostProcessed($evdata));
        if ($photo) {
            $manager = new ImageManager(new Driver());
            $photoname = $slug . '-' . $photo->getClientOriginalExtension(); //slugname
            $image = $manager->read($photo);
            $image = $image->resize(600, 400);
            $image->toJpeg(80)->save(base_path('public/media/' . $photoname));
            $data['image'] = 'media/' . $photoname;
            DB::table('post')->insert($data);
            return redirect()->back();
        } else {
            DB::table('post')->insert($data);
            return redirect()->back();
        }
    }
    //__post index__//
    public function index()
    {
        $ptd = post::all();
        return view('Admin.post.index',compact('ptd'));
    }
    //__Post Destroy__//
    public function destoy($id)
    {
        $ptd = post::find($id);
        $im_path=public_path('public/media/'.$ptd->image);
        if($ptd->image==null){
            echo "ok";
        }else{
            echo "no";
        }

    }
    public function edit($id){
        $category=Category::all();
        $post=post::find($id);
        return view('Admin.post.edit',compact('category','post'));
    }
    //__update__//
    public function update(Request $request,$id)
    {
        $cat = DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;
        $slug = str::of($request->title)->slug('-');
        $data = array();
        $data['category_id'] = $cat;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->title;
        $data['slug'] = $slug;
        $data['post_date'] = $request->Date;
        $data['description'] = $request->Description;
        $data['tags'] = $request->Tags;
        $data['status'] = $request->status;
        $data['user_id'] = Auth::id();
        $photo = $request->image;
        if ($photo) {
            $manager = new ImageManager(new Driver());
            $photoname = $slug . '-' . $photo->getClientOriginalExtension(); //slugname
            $image = $manager->read($photo);
            $image = $image->resize(600, 400);
            $image->toJpeg(80)->save(base_path('public/media/' . $photoname));
            $data['image'] = 'media/' . $photoname;
            DB::table('post')->where('id',$id)->insert($data);
            return redirect()->back();
        } else {
            DB::table('post')->where('id',$id)->insert($data);
            return redirect()->back();
        }
    }
}
