@extends('app')

@section('title')

Login

@endsection

@section('content')

<div class="container ">
   <div class="row justify-content-center" style="margin-top:10%">
    <div class="card " style="width: 35%">
        <div class="card-header">
            LOGIN TO YOUR ACCOUNT
        </div>
        <div class="card-body">
           <center>
            <img src="{{asset('logo.webp')}}" class="img img-fluid" style="height: 250px" alt="">
           </center>
            <form action="{{route('login')}}" method="POST">
                @csrf
            <div class="form-group">
                 <label for="">Phone</label>
                 <input type="number" class="form-control" name="phone" placeholder="0XXXXXXXX">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password"  >
           </div>

           <button  class="btn btn-success mt-3 form-control">
             Login
           </button>
           <a href="{{route('register')}}">Don't have account? Register.</a>
            </form>
        </div>
    </div>
   </div>
</div>


@endsection
