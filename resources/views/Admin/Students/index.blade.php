@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Student list') }}
                    <a href="{{route('students.create')}}" class="btn btn-sm btn-primary" style="float:right;">ADD Student</a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead class="table table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>class</th>
                                <th>Roll</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($std2 as $key=>$datas)
                            <tr>

                                <td>{{++$key}}</td>
                                <td>{{$datas->name}}</td>
                                <td>{{$datas->classes_name}}</td>
                                <td>{{$datas->Roll}}</td>
                                <td>{{$datas->email}}</td>
                                <td>{{$datas->phone}}</td>
                                <td>{{$datas->address}}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{route('students.edit',$datas->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('students.show',$datas->id)}}" class="btn btn-primary">Show</a>
                                    <form action="{{route('students.destroy',$datas->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$std2->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
