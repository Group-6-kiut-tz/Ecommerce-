<h2>Shared Order Data</h2>
    @if ($sharedOrderData)
        <pre>{{ json_encode($sharedOrderData, JSON_PRETTY_PRINT) }}</pre>
    @else
        <p>No shared order data available.</p>
    @endif</p>
    @section('content')
@if (auth()->check() == false)
<nav class="navbar navbar-expand-sm bg-success navbar-light">
    <div class="container-fluid">
      <ul class="navbar-nav">
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
<div class="container d-flex flex-wrap flex-row">
    @foreach ($products as $product)
    <div class="card m-3" style="width: 18rem;" style="width:60px; height:70px;">
        <img src="/storage/images/{{ $product->image }}" alt="{{ $product->title }}" class="card-img-top img-fluid"  >
        <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <h5 class="card-title"><s>{{ $product->original_price }}</s> | {{ $product->current_price }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text" style="color:red"><b><i>LOGIN OR REGISTER YOURSELF TO ADD TO CART</i></b></p>
            
        </div>
    </div>
    @endforeach
</div>
         
    <div class="row justify-content-center my-3">
        @if (auth()->check() && auth()->user()->user_type == 'admin')
        <div class="row justify-content-center my-3">
            <a href="{{ route('UploadProduct') }}" class="mx-3 btn btn-info">Add Product</a>
            <a href="{{ route('viewProduct') }}" class="btn btn-primary">View Products</a>      
        </div>
        @else
</div>
 </div>
</div>
    @endif
</div>
@endsection