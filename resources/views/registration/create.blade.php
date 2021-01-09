@extends('layouts.masters')


@section('content')
<div class="col-md-8">
    <h1>Create User</h1>

    <form method="POST" action="/Register">
        {{csrf_field()}}
        <div class="col-md-12">
            <label for="Username" class="form-label">Username</label>
            <input type="text" class="form-control" id="Username" name="Username">
        </div>

        <div class="col-md-12">
            <label for="Email" class="form-label">Email</label>
            <textarea class="form-control" id="Email" name="Email"></textarea>
        </div>

        <div class="col-md-12">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password">
        </div>

        <div class="col-md-12">
            <label for="Password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="Password_confirmation" name="Password_confirmation">
        </div>

        <br>
        <div class="col-12">
            <input type="submit" class="btn btn-sm btn-primary" value="Register">
        </div>

    </form>

    @include('layouts.error')

   
</div>
    
@endsection