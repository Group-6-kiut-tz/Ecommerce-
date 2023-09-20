@extends('app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
 

    <h2>Your Cart</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Title</th>
                <th>ProductTotal</th>
                <th>Quantity</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart', []) as $productID => $productInfo)
                <tr>
                    <td>{{ $productID }}</td>
                    <td>{{ $productInfo['productTitle'] }}</td>
                    <td>{{ $productInfo['productTotal'] }}</td>
                    <td>{{ $productInfo['productQuantity'] }}</td>
                   
                    <td>  
                        <form action="{{ route('removeFromCart') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Remove
                            </button>
                        </form>
                    </td>
               
                </tr>
            @endforeach
            <tr>
                <td colspan="2">Total Price:</td>
                <td><strong>{{ $totalPrice }}</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <div class="text-center">
            <a href="{{ route('checkout',['id'=>$productID]) }}">
                <button type="submit" class="btn btn-danger btn-sm">
                    Checkout
                </button>
            </a>
        </div>
        <div class="mx-2"></div> 
        <div class="text-center">
            <a href="{{ route('ShopNow') }}">
                <button class="btn btn-primary btn-sm">Add Order</button>
            </a>
        </div>
    </div>
    
</body>
</html>