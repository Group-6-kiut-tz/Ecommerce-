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
   <div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Admin Add Product
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <input type="text" class="form-control" name="description">
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Og Price</label>
                        <input type="text" class="form-control" name="original_price">
                        @error('original_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Current Price</label>
                        <input type="text" class="form-control" name="current_price">
                        @error('current_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                 

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    
            </div>

            <button class="btn btn-success mt-3 form-control" >
                Save
            </button>

            </form>
        </div>
    </div>
</div>

</body>
</html>