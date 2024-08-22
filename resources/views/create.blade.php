{{-- 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD WITH AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div style="width: 50%" class="mx-auto">
    <h1 class="text-center mt-4">CRUD WITH AJAX</h1>

    <form action="{{route('form.create')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Product Name</label>
          <input type="name" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" id="price">
        </div>
        <button type="submit" class="btn btn-success mt-2">Submit</button>
      </form>
   
    </div>
  </body>
</html> --}}



  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('form.create')}}" method="POST" id="addProduct">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="errMsg p-2">

              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="name" class="form-control" name="name" id="name">
                </div>
                <div class="form-group mt-2">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add_product">Submit</button>
              </div>
            </div>
          </div>
    </form>      
  </div>