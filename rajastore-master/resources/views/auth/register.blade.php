@extends('app')

@section('title')

Login

@endsection

@section('content')

<div class="container ">
   <div class="row justify-content-center" style="margin-top:20%">
    <div class="card mt-5" style="width: 30%">
        <div class="card-header">
            GET YOUR NEW ACCOUNT
        </div>
        <div class="card-body">
           <center>
            <img src="{{asset('logo.webp')}}" class="img img-fluid" style="height: 250px" alt="">
           </center>
            <form action="{{route('register')}}" method="POST">
                @csrf
            <div class="form-group">
                 <label for="">Full Name</label>
                 <input type="text" class="form-control" name="name" placeholder="eg Neema Zepson">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone" placeholder="0XXXXXXXX">
           </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password"  >
           </div>
           <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation"  >
       </div>

           <button  class="btn btn-success mt-3 form-control">
             Register
           </button>
           <a href="{{route('login')}}">have account? Login.</a>
            </form>
        </div>
    </div>
   </div>
</div>


@endsection
