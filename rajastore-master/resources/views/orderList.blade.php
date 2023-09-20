<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
      <table class="table table-striped table-hover table-bordered border-primary mt-5" style="width: 80%"; > 
        <thead>
            <tr>
               <th scope="col">PRODUCT ID</th> 
               <th scope="col">USERNAME</th> 
               <th scope="col">TITLE</th> 
               <th scope="col">QUANTITY</th> 
               

            </tr>
        </thead>
        <tbody>
            @foreach ( $orderList as $myOrder)
              <tr>
                <td>{{ $myOrder->product_id }}</td>
                <td>{{ $myOrder->user_name }}</td>
                <td>{{ $myOrder->product_title}}</td>
                <td>{{ $myOrder->quantity }}</td>
               
              </tr>
                
            @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>