@extends('layouts.app')
@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category list') }}
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary" style="float:right;">ADD Category</a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead class="table table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ctd as $key=>$data)
                            <tr>

                                <td>{{++$key}}</td>
                                <td>{{$data->Category_name}}</td>
                                <td>{{$data->Category_slug}}</td>

                                <td class="d-flex gap-2">
                                    <a href="{{route('Category.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('Category.delete',$data->id)}}" class="btn btn-danger">Delete</a>
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
