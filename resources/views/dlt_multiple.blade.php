<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Multiple Records</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mt-5 ">
    <h3 class="mb-4 text-center">Laravel Checkbox Multiple Rows Delete Example</h3>
    <div class="page">
        <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th><input type="checkbox" id="checkboxesMain"> Select All</th>
                            <th>Student Name</th>
                            <th>Roll</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $alldata)
                         <tr>
                            <td>
                                <input type="checkbox" 
                                class="checkbox" 
                                data-id= "{{$alldata->id}}">
                            </td>
                            <td>{{$alldata->name}}</td>
                            <td>{{$alldata->price}}</td>
                            <td>
                                <img src="file/{{$alldata->image}}" alt="" style="height: 120px;width:150px">
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
                <button class="btn btn-primary btn-xs removeAll mb-3">Remove Data</button>
        </div>
    </div>

    
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        //when click select all,it will check all 
        $('#checkboxesMain').on('click',function(e){
            if($(this).is(':checked','true')){
                $('.checkbox').prop('checked',true);
            }else{
                $('.checkbox').prop('checked',false);
            }
        });

        //if check all ,select_all will be checked automatically
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#checkboxesMain').prop('checked',true);
            }else{
                $('#checkboxesMain').prop('checked',false);
            }
        });

        $('.removeAll').on('click',function(e){
            var productIdArr = [];
            $('.checkbox:checked').each(function(){
                productIdArr.push($(this).attr('data-id'));
            });

            if(productIdArr.length <= 0){
                alert('Choose minimum one item to remove');
            }else{
                if(confirm("Are You Sure?")){
                    var proId = productIdArr.join(",");
                    $.ajax({
                        url:"{{route('delete.multi')}}",
                        type:'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + proId,
                        success:function(data){
                            if(data['status'] == true){
                                $('.checkbox:checked').each(function(){
                                    $(this).parents('tr').remove();
                                });
                                alert(data['message']);
                            }else {
                                alert('Error occured.');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>
