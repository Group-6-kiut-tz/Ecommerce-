
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  @extends('app')

@section('content')



@if (auth()->check() == false)
<nav class="navbar navbar-expand-sm bg-success navbar-light">
    <div class="container">
      <ul class="navbar-nav" >
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('home') }}">Home</a>
        </li>
       <li class="nav-item">
          <a class="nav-link active"  href="{{ route('ShopNow') }}">Shop Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a  href="{{ route('login') }}" class="nav-link active">Login</a>
        </li>
        <li class="nav-item">
            <a  href="{{ route('register') }}" class="nav-link active" >Register</a>
          </li>
      </ul>
    </div>
  </nav>
@else

<nav class="navbar navbar-expand-sm bg-success navbar-light" >
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('home') }}">Home</a>
        </li>
       <li class="nav-item">
          <a class="nav-link active"  href="{{ route('ShopNow') }}">Shop Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a  href="{{ route('logout') }}" class="nav-link active">Logout</a>
        </li>
        <li class="nav-item">
            <a href="" class="btn btn-success">
                Hellow ............{{ auth()->user()->name }}
            </a>
          </li>
      </ul>
    </div>
  </nav>
</div>
@endif


    <div  class="container-fluid d-flex" style="background-color: rgb(226, 211, 211); height: 90vh; padding-left:60px;">
      <div style="padding-top: 13em; width: 50vw; ">
        <h2><b> Jesrey Collection</b></h2>
        <h1 style="font-size: 3.8em"><b> NEW SEASON</b></h1>
        <h3><b> New Arivals</b></h3>
        <button class="btn btn-dark  " style="border-radius:30px; width:13vw"> Shop Now</button>
      </div>
      <div  style="width: 50vw;">
        <img src="images/img1.jpg" class="float-right" style="width:350px; height:450px;margin-top: 5em;">
      </div>
    </div>



@if(auth()->check() && auth()->user()->user_type != 'admin')
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            YOUR ORDERS
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

        <div class="alert alert-warning">You dont have any order for now 😛</div>
    </div>
</div>
@endif    
</div>
<div class="container mt-5  pl-5 justify-content-center align-item-center">
  <h3 style="text-align: :center">ALL PRODUCTS</h3>
</div>
<div class="container mt-5">
  <div class="row">
      @foreach ($products as $product)
      <div class="col-lg-3 col-md-4 mb-4"> <!-- Adjusted column classes here -->
          <div class="card card-smaller">
              <div class="aspect-ratio-box">
                  <img src="/storage/images/{{ $product->image }}" alt="{{ $product->title }}" class="card-img-top img-fluid aspect-ratio-box-content">
               </div>
              <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  <h5 class="card-title"><s>{{ $product->original_price }}</s> | {{ $product->current_price }}</h5>
                  <p class="card-text">{{ $product->description }}</p>
                  <p class="card-text" style="color:red"><b><i>LOGIN OR REGISTER YOURSELF TO ADD TO CART</i></b></p>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</div>
 </div>
</div>
@endsection
{{-- <footer class="bg-dark text-white py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Connect with Us</h4>
        <p>Follow us on social media for the latest updates:</p>
        <!-- Add your social media icons and links here -->
        <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i></a>
        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
      </div>
      <div class="col-md-6">
        <h4>Contact Information</h4>
        <p>Email: info@example.com</p>
        <p>Phone: +1 123-456-7890</p>
      </div>
    </div>
  </div>
</footer> --}}

</body>
</html>

