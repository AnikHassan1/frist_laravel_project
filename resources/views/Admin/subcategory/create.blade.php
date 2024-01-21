@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Sub Category') }}
                </div>
            <div class="card-body">

                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{session()->get('success')}}
                </div>

                @endif
                <form action="{{route('subcategory.store')}}" method="POST" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Choose Category </label>
                       <select name="category_id" class="form-control">
                        @foreach($category as $row)
                        <option value="{{$row->id}}">{{$row->Category_name}}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control @error('subcategory_name')is-invalid @enderror" name="subcategory_name" placeholder="Enter Your sub Category Name" value="{{old('subcategory_name')}}" required>
                        @error('subcategory_name')
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

