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
    <div class="row justify-content-center">
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
                <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Og Price</label>
                        <input type="text" class="form-control" name="original_price" value="{{ $product->original_price }}"">
                        @error('original_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Current Price</label>
                        <input type="text" class="form-control" name="current_price" value="{{ $product->current_price }}">
                        @error('current_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                        <img src="/storage/images/{{ $product->image }}" style="width:65px; height:85px">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    
            </div>

            <button class="btn btn-success mt-3 form-control" >
                Update
            </button>

            </form>
        </div>
   </div>
</body>
</html>