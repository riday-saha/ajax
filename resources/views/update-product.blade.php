<!--Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="POST" id="updateProduct" enctype="multipart/form-data">

      @csrf
      <input type="hidden" id="up_id" name="up_id">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="errMsg p-2"></div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="up-name">Product Name</label>
                  <input type="text" class="form-control" name="up_name" id="up_name">
              </div>
              <div class="form-group mt-2">
                  <label for="up-price">Price</label>
                  <input type="text" class="form-control" name="up_price" id="up_price">
              </div>
              <div class="form-group mt-2">
                <label for="up-price">Current Image</label>
                <img src="" alt="" id="current_image" style="height: 100px; width:120px" class="form-control">
            </div>
            <div class="form-group mt-2">
              <label for="up-image">Update Image</label>
              <input type="file" class="form-control" name="up_image" id="up_image">
          </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary up_product">Update</button>
            </div>
          </div>
        </div>
  </form>      
</div>
