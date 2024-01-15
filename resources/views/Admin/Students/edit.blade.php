@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Student Information ') }}
                    <a href="{{route('students.index')}}" class="btn btn-sm btn-primary" style="float:right;"> Student List</a>
                </div>
                <div class="card-body">

                    @if(session()->has('success'))
                    <div class="alert alert-primary" role="alert">
                        {{session()->get('success')}}
                    </div>

                    @endif
                    <form action="{{route('students.update',$STD->id)}}" method="Post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Student Name</label>
                            <input type="text" class="form-control" name="name" value="{{$STD->name}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Student class</label>
                            <select name="class_name" class="form-control" value="{{$STD->name}}" required>
                                @foreach($clg as $row)
                                <option value="{{$row->id}}" @if($row->id==$STD->id) selected @endif>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Student Roll</label>
                            <input type="text" class="form-control " name="Roll" value="{{$STD->Roll}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Student Email</label>
                            <input type="text" class="form-control " name="email" value="{{$STD->email}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Student Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$STD->phone}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Student Address</label>
                            <input type="text" class="form-control" name="Address" value="{{$STD->address}}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
