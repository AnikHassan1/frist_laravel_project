@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Password change') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif
                    @if(session()->has('error'))
                        <strong class="text-danger">{{session()->get('error')}}</strong>
                    @endif
                    <form action="{{route('Update.Password')}}" method="POST">
                        @csrf
                        <div>
                            <label for="current passwort">current password</label>
                            <input type="password" name="current_password" class="form-control @error('current_password')is-invalid @enderror" required value="{{old('current_password')}}"><br>
                            @error("current_password")
                            <span class="invalud-feedback"role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="new passwort">new password</label>
                            <input type="password" name="new_password" class="form-control @error('new_password')is-invalid @enderror" required><br>
                            @error("new_password")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation">confirm password</label>
                            <input type="password" name="confirm_password" class="form-control @error('password_confirmation')is-invalid @enderror" required><br>
                            @error("password_confirmation")
                            <span class="invalid-feedback"role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
