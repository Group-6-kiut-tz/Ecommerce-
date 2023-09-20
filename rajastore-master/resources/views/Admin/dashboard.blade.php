<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color: #f8f9fa;">
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><i class="fas fa-user-shield"></i> Welcome Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
     
      </div>
    </nav>
    <div class="row">
      <div class="col-lg-2 bg-dark sidebar" style="height: 100vh;">
        <ul class="nav flex-column pt-4">
            <li class="nav-item mb-3">
                <a class="nav-link text-white" href="{{ route('home') }}"><i class="fas fa-sign-in-alt"></i> Home</a>
              </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-white" href="#"><i class="fas fa-phone"></i> Contact</a>
          </li>
    
          <li class="nav-item mb-3">
            <a class="nav-link text-white" href="{{ route('UploadProduct') }}"><i class="fas fa-plus"></i> Add Product</a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-white" href="{{ route('viewProduct') }}"><i class="fas fa-plus"></i> View Product</a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-white" href="{{ route('Orderlist') }}" ><i class="fas fa-sign-out-alt"></i> ViewOrder</a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-white" href="{{ route('logout') }}" ><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-10 p-4">
     Content Area
        <h2>Dashboard Content</h2>
        <p>Welcome to your admin dashboard!</p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->