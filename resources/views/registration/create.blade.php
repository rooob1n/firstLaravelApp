@extends('layouts.masters')


@section('content')
<div class="col-md-8">
    <h1>Create User</h1>

    <form method="POST" action="/Register">
        {{csrf_field()}}
        <div class="col-md-12">
            <label for="txtUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="txtUsername" name="txtUsername">
        </div>

        <div class="col-md-12">
            <label for="txtEmail" class="form-label">Email</label>
            <textarea class="form-control" id="txtEmail" name="txtEmail"></textarea>
        </div>

        <div class="col-md-12">
            <label for="txtPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="txtPassword" name="txtPassword">
        </div>

        <div class="col-md-12">
            <label for="txtPassword_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="txtPassword_confirmation" name="txtPassword_confirmation">
        </div>

        <br>
        <div class="col-12">
            <input type="submit" class="btn btn-sm btn-primary" value="Register">
        </div>

    </form>

    @include('layouts.error')

   
</div>
    
@endsection