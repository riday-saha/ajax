<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >

    <title>Ajax Crud 2</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="my-3 text-center">Laravel Ajax Crud</h2>
                <div class="mb-3 ">
                    <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Student</a>
                    <input type="text" placeholder="search" class="form-control search_student" style="display: inline-block; float: right;width:30%">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">Price</th>
                            <th>Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($show as $seen )
                            <tr>
                          <td>{{$seen->name}}</td>
                          <td>{{$seen->price}}</td>
                          <td>
                            <img src="file/{{$seen->image}}" alt="" style="height: 150px;width:200px">
                          </td>
                          <td>
                            <a href="" class="btn btn-primary update_button"
                            data-id = '{{$seen->id}}'
                            data-name = '{{$seen->name}}'
                            data-price ='{{$seen->price}}'  
                            data-image = '{{$seen->image}}'

                            data-bs-toggle="modal" 
                            data-bs-target="#updateModal"
                            ><i class="las la-edit update_btn"></i>
                            </a>
                            <a href="" class="btn btn-danger delete_btn"
                            data-id = '{{$seen->id}}'
                            >
                              <i class="las la-trash"></i>
                            </a>
                          </td>
                         </tr>
                          @endforeach
                         
                        </tbody>
                    </table>
                    <span>{{$show->links()}}</span>
                </div>
            </div>
        </div>
    </div> 
    @include('product_js')
    @include('create')
    @include('update-product')
  </body>
</html>
