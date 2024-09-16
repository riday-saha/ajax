<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
        //code for insert
        $('.add_student').click(function(e){
            e.preventDefault();
            let formData = new FormData();

            formData.append('pro_name', $('#name').val());
            formData.append('pro_price', $('#price').val());
            formData.append('pro_image', $('#image')[0].files[0]);
            formData.append('_token',$('input[name=_token]').val());

            $.ajax({
                url:"{{route('create.product')}}",
                method:"post",
                data:formData,
                contentType:false,
                processData:false,
                success:function(res){
                    if(res.status == 'success'){
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table-responsive').load(location.href+' .table-responsive');
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $('.errMsg').html('');
                    $.each(error.errors, function(index,value){
                        $('.errMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
               
            });
        });

        //show data in update form
        $(document).on('click','.update_button',function(e){
            e.preventDefault();
            let show_id= $(this).data('id');
            let show_name = $(this).data('name');
            let show_price = $(this).data('price');
            let show_image = $(this).data('image');

            $('#up_id').val(show_id);
            $('#up_name').val(show_name);
            $('#up_price').val(show_price);
            $('#current_image').attr('src', '/file/' + show_image);
        });

        //code for update
        $('.up_product').click(function(e){
            e.preventDefault();
            let formData = new FormData();
            formData.append('update_id', $('#up_id').val());
            formData.append('update_name', $('#up_name').val());
            formData.append('update_price', $('#up_price').val());

            let image = $('#up_image')[0].files[0];
            if(image){
                formData.append('update_image',image);
            }

            $.ajax({
                url:"{{route('update.products')}}",
                method:"POST",
                data:formData,
                contentType:false,
                processData:false,
                success:function(res){
                    if(res.status == 'success'){
                        $('#updateModal').modal('hide');
                        $('#updateProduct')[0].reset();
                        $('.table-responsive').load(location.href +' .table-responsive');
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index,value){
                        $('.errMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    })
                }
                
            });
        });

        //code for delete
        $(document).on('click','.delete_btn',function(e){
            e.preventDefault();
            let delete_id = $(this).data('id');
            //console.log(delete_id);

            if(confirm('are u sure?')){
                $.ajax({
                url:"{{route('delete.product')}}",
                method:"post",
                data:{
                    delete_id:delete_id
                },
                
                success:function(res){
                    if(res.status == 'success'){
                        $('.table-responsive').load(location.href +' .table-responsive');
                    }
                }
            });

            }
            
        });

        //code for pagination

        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            let pageNo = $(this).attr('href').split('page=')[1];
            
            $.ajax({
                url:"/pagination/paginate?page="+pageNo,
                success:function(res){
                    $('.table-responsive').html(res);
                }
            });
        });

        //code for search
        $(document).on('keyup','.search_student',function(e){
            e.preventDefault();
           let search = $(this).val();
            //console.log(search);
            $.ajax({
                url:"{{route('product.search')}}",
                data:{
                    search:search
                },
                success:function(res){
                    if (res.status === 'Nothing Is Found') {
                        $('.table-responsive').html('Nothing Is Found');
                    } else {
                        $('.table-responsive').html(res); // Insert search results into the table
                    }
                }
            });
            
        });

       

















    });
</script>