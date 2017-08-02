@extends('layout.master')
  @section('content')
   <div class="row">
    <div class="col-md-4 col-md-offset-4 ">
        <h1>Sign Up</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
           @foreach($errors->all() as $error)
            <p>{{$error}}</p>
           @endforeach
        </div>
        @endif
        <form action="{{route('user.signup')}}" method="post">
           <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control" value="{!! old('username') !!}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{!! old('email') !!}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control ">
            </div>
            <button type="submit" class="btn btn-primary">Sing Up</button>
             {{csrf_field()}}
        </form>
    </div>
</div>
  @endsection