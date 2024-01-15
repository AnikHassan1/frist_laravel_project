@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add student') }}
                <a href="{{route('students.index')}}" class="btn btn-sm btn-primary" style="float:right;"> student List</a>
                </div>
            <div class="card-body">

                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{session()->get('success')}}
                </div>

                @endif
                <form action="{{route('students.store')}}" method="POST" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="Enter Your student Name" value="{{old('name')}}" required>
                        @error('name')
                        <span class="invalid-feedback" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student class</label>
                        <select name="class_name" class="form-control @error('name')is-invalid @enderror"value="{{old('class_name')}}" required>
                            @foreach($class as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach

                        </select>

                        @error('name')
                        <span class="invalid-feedback" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Roll</label>
                        <input type="text" class="form-control @error('Roll')is-invalid @enderror" name="Roll" placeholder="Enter Your student Roll" value="{{old('Roll')}}" required>
                        @error('Roll')
                        <span class="invalid-feedback" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Email</label>
                        <input type="text" class="form-control @error('email')is-invalid @enderror" name="email" placeholder="Enter Your student email" value="{{old('email')}}" required>
                        @error('email')
                        <span class="invalid-feedback" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Phone</label>
                        <input type="text" class="form-control @error('phone')is-invalid @enderror" name="phone" placeholder="Enter Your student phone" value="{{old('phone')}}" required>
                        @error('phone')
                        <span class="invalid-feedback" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Address</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="Address" placeholder="Enter Your student Address" value="{{old('Address')}}" required>
                        @error('Address')
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
