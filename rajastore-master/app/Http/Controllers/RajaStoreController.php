<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Selcom\ApigwClient\Client;
use App\Payment\client\client;


class RajaStoreController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index',compact('products'));
    }

    public function saveProduct(Request $req){
        //validation
        $validatedData = $req->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'current_price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,jpg|max:2048', 
        ],
        //error message
        [
            'image.required' => 'An image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only JPEG and JPG images are allowed.',
            'image.max' => 'The image size must not exceed 2048 KB.',
        ]);
        //save into Product Model
        $prod = new Product();
        $prod->title = $validatedData['title'];
        $prod->description = $validatedData['description'];
        $prod->original_price = $validatedData['original_price'];
        $prod->current_price = $validatedData['current_price'];
        $fileName = time() . '.' . $req->image->extension();
        $req->image->storeAs('public/images', $fileName);
        $prod->image = $fileName;
        $prod->save();
        return back()->with('success', 'Product saved successfully 😂');

    }


    
   
    public function viewOrder(Request $req)
     {
        //validation
    $validatedData = $req->validate([
        'quantity' => 'required|integer|min:1',
        'productid' => 'required|exists:products,id',
    ]);

    $quantity = $validatedData['quantity'];
    $productID = $validatedData['productid'];
    $product = Product::find($productID);
    $cart = session()->get('cart', []);
    $cart[$productID] = [
        'productTitle' => $product->title,
        'productTotal' => $product->current_price * $quantity,
        'productQuantity' => $quantity,
        
    ];
    // Update total price for all products in the cart
    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['productTotal'];
    }
    //start cart session
    session()->put('cart', $cart);
    session()->put('totalprice',$totalPrice);

    return view('viewOrder', [
        'selectedProduct' => $cart[$productID],
        'products' => Product::all(), 
        'totalPrice' => $totalPrice,
    ]);
}


public function checkout(Request $req)
{
   $product = Product::findOrFail($req->id);
  $cartItems = session('cart', []);
  $totalPrice = session()->get('totalprice');

return view('checkout')->with('totalprice',$totalPrice);
}



public function removeFromCart(Request $request)
{
    $productID = $request->input('productid');
    $cart = session()->get('cart', []);
    unset($cart[$productID]);
    session()->put('cart', $cart);
    return redirect()->back();
    
}


public function ShopNow()
{
    $myproducts = Product::all();
    return view('shopNow',compact('myproducts'));
}


public function completePayment(Request $request)
{
    // fetch data from user table
    $user = auth()->user(); 
    $userid = $user->id;
    $userphonenumber = $user->phone;

    // call a session so as to fetch data from product table

    $cart = session('cart', []);
    $productId = $request->input('product_id');
     $product = Product::find($productId);
     $productQuantity = $cart[ $productId ]['productQuantity'];
    $order = new Order();
    $order->user_name = $user->name;
    $order->user_id = $userid;
    $order->quantity =  $productQuantity;
    $order->phone_no = $userphonenumber; 
    $order->product_title = $product->title;
    $order->product_id = $product->id;
    $order->total_Price = $product->total_Price;
    $order->save(); 
    return redirect()->back()->with('success', 'Payment completed and order placed successfully!');
}


public function UploadProduct()
{
    return view('ProductForm');
}



public function ViewProduct()
{
    $products = Product::all();
    return view('ViewProduct',compact('products'));
    
}


public function editProduct($id)
{
    $product = Product::find($id);
    return view('editProduct', compact('product'));
}


public function updateProduct(Request $req, $id)
{
    $req->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'original_price' => 'required|numeric',
        'current_price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,jpg|max:2048',
    ]);

    $product = Product::findOrFail($id);
    $product->title = $req->input('title');
    $product->description = $req->input('description');
    $product->original_price = $req->input('original_price');
    $product->current_price = $req->input('current_price');
    if ($req->hasFile('image')) {
       
        Storage::delete('public/images/' . $product->image);
        $fileName = time() . '.' . $req->image->extension();
        $req->image->storeAs('public/images', $fileName);
        $product->image = $fileName;
    }

    $product->save();
    
    return redirect()->route('viewProduct')->with('success', 'Product updated successfully');
}



public function deleteProduct($id)
{
    $product = Product::find($id);
    if (!$product) {
        return redirect()->route('viewProduct')->with('error', 'Product not found');
    }
    Storage::delete('public/images/' . $product->image);
    $product->delete();
    
    return redirect()->route('viewProduct')->with('success', 'Product deleted successfully');
}


public function OrderList   ()
{
    $orderList = Order::all();
    return view('orderList',compact('orderList'));
}

public function finalPay(Request $request)
{  
    $paymentMethod = $request->input('paymentMethod');
    $phoneNumber = $request->input('phoneNo');
    $modifiedPhoneNumber = '255' . substr($phoneNumber, 1);
    $totalPrice = $request->input('TotalPrice');

    // require_once __DIR__ .'/vendor/autoload.php';


$apiKey = '202cb962ac59075b964b07152d234b70';
$apiSecret = '81dc9bdb52d04dc20036dbd8313ed055';
$baseUrl = "http://zepson.com";
$orderId = time();
$redirect = "https://127.0.0.8000/success";


$client = new Client($baseUrl, $apiKey, $apiSecret);

// data
$orderMinArray = array(
    "vendor"=>"VENDORTILL",
    "order_id"=>$orderId,
    "buyer_email"=> "neyfredykam@gmail.com",
    "buyer_name"=> "neema",
    "buyer_phone"=>  $modifiedPhoneNumber,
    "amount"=>  $totalPrice ,
    "currency"=>"TZS",
    "redirect_url"=>"$redirect",
    "cancel_url"=>"aHR0cHM6Ly9leGFtcGxlLmNvbS8=",
    "webhook"=>"aHR0cHM6Ly9leGFtcGxlLmNvbS8=",
    "buyer_remarks"=>"None", 
    "merchant_remarks"=>"None",
    
    );

// path relatiive to base url
$orderMinPath = "/v1/checkout/create-order-minimal";

// create order minimal
$response = $client->postFunc($orderMinPath,$orderMinArray);
echo json_encode($response);
return view('paymentProcessing');

}




}

  
   
      

