<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load Records using Select Box with PHP & Ajax</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .header {
            background-color: #008cba;
            padding: 10px;
            color: white;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th {
            background-color: #ff6600;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h3>Load Records using Select Box with PHP & Ajax</h3>
        </div>

        <div class="form-group mt-4">
            <label for="selectCity">Select City:</label>
            <select class="form-control w-25" id="selectCity"> 
                <option value="">Select City</option>   
                @foreach ($users as $user)
                    <option value="{{$user->city}}">{{$user->city}}</option>
                @endforeach     
            </select>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody id="dataBody">
                @foreach ($users as $user)
                   <tr>
                       <td>{{ $user->id }}</td>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->age }}</td>
                       <td>{{ $user->city }}</td>
                   </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- CSRF Token for AJAX Requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        $(document).ready(function(){
           $('#selectCity').on('change',function(e){
            e.preventDefault();
            let city = $(this).val();
            console.log(city);
            
            $.ajax({
                url:"{{route('select.city')}}",
                data:{
                    city:city,
                    _token: $('meta[name="csrf-token"]').attr('content')

                },
                success:function(res){
                    if(res.status == 'success'){
                        $('#dataBody').html(res.html);
                    }else{
                        alert(res.message);
                        $('#dataBody').html('');
                    }
                }
            });
            
           });
        });
    </script>
</body>
</html>
