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
    <div class="container">
        <table class="table table-striped table-hover table-bordered border-primary mt-5" style="width: 80%"; > 
                <thead class="bg-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"> Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->id }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->title }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->current_price }}</p>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img
                                    src="/storage/images/{{ $product->image }}"
                                    alt=""
                                    style="width: 35px; height: 35px"
                                    class="rounded-circle"
                                />
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('editProduct', $product->id) }}" class="btn btn-link btn-sm btn-rounded"><button class="btn btn-dark rounded" type="submit">Edit</button></a>
                        </td>
                        <td>
                        <form action="{{ route('deleteProduct', ['id' => $product->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-dark rounded" type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
</body>
</html>
