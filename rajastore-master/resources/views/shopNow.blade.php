@extends('app');
@section('content')
    <div class="row d-flex justify-content-center my-3">
        @if (auth()->check() == false)
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
            </div>
            
            <div class="container mt-5  pl-5 justify-content-center align-item-center" >
              <h3 style="text-align: :center">ALL PRODUCTS</h3>
            </div>
            <div class="container mt-5"> 
              <div class="row">
                  @foreach ($myproducts as $product)
                  <div class="col-lg-3 col-md-4 mb-4"> <!-- Adjusted column classes here -->
                      <div class="card card-smaller">
                          <div class="aspect-ratio-box">
                              <img src="/storage/images/{{ $product->image }}" alt="{{ $product->title }}" class="card-img-top img-fluid aspect-ratio-box-content">
                           </div>
                          <div class="card-body">
                              <h5 class="card-title">{{ $product->title }}</h5>
                              <h5 class="card-title"><s>{{ $product->original_price }}</s> | {{ $product->current_price }}</h5>
                              <p class="card-text">{{ $product->description }}</p>
  
                              <div>
                                <form action="{{ route('vieworder') }}" method="POST">
                                  @csrf
                               
                                  <label class="form-label" for="typeNumber">Quantity</label>
                                  <div class="input-group text-center mb-3" style="width:130px;">
                                      
                                      <input type="text"  name="quantity"  id="quantity" placeholder="5" class="form-control qty-input text-center" required />
                                      <input type="text"  value="{{ $product->id }}" name="productid" hidden>
                                         @if (auth()->guest())
                              <span class="btn btn-danger btn-sm form-control" disabled>Add to Cart</span>
                             
                          
                                  @else
                                    <button type="submit" class="btn btn-danger btn-sm form-control">add to cart</button>
                                    @endif
                                  </div>
                                  
                               </form>
                             
                              </div>
                           
                            </div>
                      </div>
                  </div>
                  @endforeach
              </div>
            </div>
            <style>
            
              </style>
              
            </div>
            @endsection


