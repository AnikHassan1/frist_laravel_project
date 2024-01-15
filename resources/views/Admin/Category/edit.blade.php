@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Category') }}
                <a href="{{route('Category.index')}}" class="btn btn-sm btn-primary" style="float:right;"> Category List</a>
                </div>
            <div class="card-body">

                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{session()->get('success')}}
                </div>

                @endif
                <form action="{{route('Category.update',$etd->id)}}" method="POST" class="mt-3">
                   
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('category_name')is-invalid @enderror" name="category_name" placeholder="Enter Your student Name" value="{{$etd->Category_name}}" required>
                        @error('category_name')
                        <span class="invalid-feedback" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
