@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('class list') }}
                <a href="{{route('class.create')}}" class="btn btn-sm btn-primary" style="float:right;">ADD Class</a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead class="table table-primary">
                            <tr>
                                <th >ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($std as $key=>$data)
                            <tr>

                                <td>{{++$key}}</td>
                                <td>{{$data->name}}</td>
                                <td>
                                    <a href="{{route('class.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('class.delete',$data->id)}}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
