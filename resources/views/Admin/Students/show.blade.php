@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student information') }}</div>

                <div class="card-body">
                    <li class="list-item">Name : {{$show->name}}</li>
                    <li class="list-item">Class name :{{$show->class_id}}</li>
                    <li class="list-item">Roll : {{$show->Roll}}</li>
                    <li class="list-item">Email:{{$show->email}}</li>
                    <li class="list-item">Phone:{{$show->phone}}</li>
                    <li class="list-item">Address : {{$show->address}}</li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
