@extends('layouts.masters')


@section('content')
<div class="col-md-8">
    <h1>Sign In</h1>

    <form method="POST" action="/Login">

        {{csrf_field()}}
        <div class="col-md-12">
            <label for="txtEmail" class="form-label">Email</label>
            <input type="text" class="form-control" id="txtEmail" name="txtEmail">
        </div>

        <div class="col-md-12">
            <label for="txtPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="txtPassword" name="txtPassword">
        </div>

        <br>
        <div class="col-12">
            <input type="submit" class="btn btn-sm btn-primary" value="Login">
            <a href="/Register" class="btn btn-sm btn-warning">Register</a>
        </div>

    </form>

    @include('layouts.error')

   
</div>
    
@endsection