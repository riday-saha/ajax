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