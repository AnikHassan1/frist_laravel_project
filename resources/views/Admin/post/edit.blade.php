@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Edit Post') }}
                </div>
                <div class="card-body">

                    @if(session()->has('success'))
                    <div class="alert alert-primary" role="alert">
                        {{session()->get('success')}}
                    </div>

                    @endif
                    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select name="subcategory_id" class="form-control">
                                    <option disabled selected>choose Category</option>
                                    @foreach($category as $cat)
                                    @php
                                    $subcat=DB::table('subcategories')->where('category_id',$cat->id)->get();
                                    @endphp
                                    <option value="" class="text-info">{{$cat->Category_name}}</option>
                                    @foreach($subcat as $sub)
                                    <option value="{{$sub->id}}" @if($sub->id==$post->subcategory_id) selected @endif>---{{$sub->subcategory_name}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Post Date</label>
                                <input type="date" class="form-control" name="Date" value="{{$post->post_date}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tags</label>
                                <input type="text" class="form-control" name="Tags" value="{{$post->tags}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea id="summernote" name="Description" class="form-control" rows="4"value="">{{$post->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <input type="hidden" name="old_image" value="{{$post->image}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" @if($post->status==1)checked @endif name="status" value="1">
                                <label class="form-check-label" for="exampleCheck1">Publish Now</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
