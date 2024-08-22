<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD WITH AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container d-flex flex-column justify-content-center align-items-center text-center">
      <h1>CRUD WITH AJAX</h1>

      {{-- <div class="">
        <a href="" class="btn btn-success d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</a>  
         <input type="text" id="search"  class="form-control search" placeholder="Search" aria-label="Search">    
      </div> --}}

      <div class="row justify-content-center w-100 mb-4">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="" class="btn btn-success w-100" id="addProduct" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</a>
        </div>
        <div class="col-md-6">
          <input type="text" id="search" class="form-control search" placeholder="Search" aria-label="Search">
        </div>
      </div>

      <div class="w-75"> 
        <div class="table-data">
          <table class="table table-striped" style="border:1px solid black">
            <thead>
                <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show as $shown )
                <tr>
                <td>{{$shown->name}}</td>
                <td>{{$shown->price}}</td>
                <td>
                    <a href="" class="btn btn-warning update-product-form"
                    data-bs-toggle="modal" 
                    data-bs-target="#updateModal"
                    data-id = "{{$shown->id}}"
                    data-name = "{{$shown->name}}"
                    data-price = "{{$shown->price}}"
                    >Edit</a>
                    <a href="" 
                    class="btn btn-sm btn-danger delete_product"
                    data-id = "{{$shown->id}}"
                    >Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$show->links()}}
        </div>
      </div>
    </div>

    @include('create')
    @include('update-product')
    @include('product_js')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
