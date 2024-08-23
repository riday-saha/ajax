<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>




<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
$(document).ready(function(){
    $(document).on('click','.add_product',function(e){ //we have gotten value
        e.preventDefault();
        let name = $('#name').val();
        let price = $('#price').val();
        //console.log(name + price);

        $.ajax({
            url: "{{route('form.create')}}",
            method: 'POST',
            data:{name:name , price:price},
            success:function(res){
                
                if(res.status =='success'){
                $('#exampleModal').modal('hide');
                $('#addProduct')[0].reset();
                $('.table').load(location.href+' .table');
            }

            },
            error:function(err){
                 $('.errMsg').empty(); 
                let error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                });
            }
        });

    });

    //show products in update form
    $(document).on('click','.update-product-form',function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
        let price = $(this).data('price');

        $('#up_id').val(id);
        $('#up_name').val(name);  
        $('#up_price').val(price); 

    });

    //Update Product

    $(document).on('click', '.up_product', function(e) {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_name = $('#up_name').val();
        let up_price = $('#up_price').val();

        $.ajax({
            url: "{{ route('update.product') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                up_id: up_id,
                up_name: up_name,
                up_price: up_price
            },
            success: function(res) {
                if (res.status == 'success') {
                    $('#updateModal').modal('hide');
                    $('#updateProduct')[0].reset();
                    $('.table').load(location.href + ' .table');
                }
            },
            error: function(err) {
                $('.errMsg').html(''); // Clear previous errors
                let errors = err.responseJSON.errors;
                $.each(errors, function(index, value) {
                    $('.errMsg').append('<span class="text-danger">' + value + '</span><br>');
                });
            }
        });

    });

    //Delete Product
    $(document).on('click','.delete_product',function(){
        let product_id = $(this).data('id');

       
        if(confirm('Are you sure to delete this product?')){
            $.ajax({
                url: "{{route('delete.product')}}",
                method: "POST",
                data: {pro_id:product_id},
                success:function(res){
                    if(res.status == 'success'){
                        $('.table').load(location.href + ' .table');
                    }
                }
            });
        }
    });

    //pagination
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let pageNo = $(this).attr('href').split('page=')[1];
        product(pageNo);
    });

    function product(pageNo){
        $.ajax({
            url:"/pagination/paginate-data?page="+pageNo,
            success:function(res){
                $('.table-data').html(res);
            }
        });
    }

    //search product
    $(document).on('keyup',function(event){
        event.preventDefault();
        let search_input = $('#search').val();
        //console.log(search_input);

        $.ajax({
            url:"{{route('search.product')}}",
            data:{search_string:search_input},
            success:function(res){
                $('.table-data').html(res);
                if(res.status == 'nothing_found'){
                    $('.table-data').html('<span class="text-danger">' + 'Nothing Is Found' + '</span>');
                }
            }
        });
    });





































});
</script>
