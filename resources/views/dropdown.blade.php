<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel AJAX Dependent Country State City Dropdown Example - ItSolutionStuff.com</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-primary mb-4 text-center">
                   <h4 >Laravel AJAX Dependent Country State City Dropdown Example  ItSolutionStuff.com</h4>
                </div> 
                <form>
                    <div class="form-group mb-3">
                        <select  id="country-dropdown" class="form-control">
                            <option value="">-- Select Country --</option>
                            @foreach ($all_country as $countries )
                                <option value="{{$countries->id}}">{{$countries->name}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select id="state-dropdown" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="city-dropdown" class="form-control">
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('change','#country-dropdown',function(){
                let country_code = $(this).val();
                console.log(country_code);
                
                $("#state-dropdown").html('');
                $.ajax({
                    url:"{{route('fatch.state')}}",
                    method:"post",
                    data:{
                        country_code:country_code,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function(key, value) {
                            $('#state-dropdown').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }

                });
            });

            $(document).on('change','#state-dropdown',function(){
                let state_no = $(this).val();
                console.log(state_no);

                $.ajax({
                    url:"{{route('fatch.city')}}",
                    method:"post",
                    data:{
                        state_no:state_no,
                         _token: '{{csrf_token()}}'
                    },
                    success:function(res){
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');

                        $.each(res.cities,function(index,value){
                            $('#city-dropdown').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            });














        });
    </script>
</body>
</html>