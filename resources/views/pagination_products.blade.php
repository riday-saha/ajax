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
