@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit class ') }}
                <a href="{{route('class.index')}}" class="btn btn-sm btn-primary" style="float:right;"> Class List</a>
                </div>
            <div class="card-body">

                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{session()->get('success')}}
                </div>

                @endif
                <form action="{{route('class.update',$etd->id)}}" method="POST" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Class Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="Enter Your Class Name" required value="{{$etd->name}}">
                        @error('name')
                        <span class="invalid-feedback" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
