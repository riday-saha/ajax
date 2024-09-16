<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search with Range Slider</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery and jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        body {
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .range-slider {
            margin: 20px 0;
        }
        .table-container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="text-center">Search with Range Slider using jQuery UI</h3>

    <!-- Age Range Section -->
    <div class="range-slider">
        <label for="ageRange" class="form-label">
            Age Between: 
            <span id="ageDisplay">15 - 25</span></label>
        <div id="ageRange"></div>
    </div>

    <!-- Search Results Table -->
    <div class="table-container">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody id="resultTable">
                <!-- Sample Data -->
               @foreach ($record as $records)
                  <tr>
                        <td>{{$records->id}}</td>
                        <td>{{$records->name}}</td>
                        <td>{{$records->age}}</td>
                        <td>{{$records->city}}</td>
                    </tr> 
               @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery Script for Range Slider -->
<script>
    $(function() {

        var v1 = 15;
        var v2 = 25;

        $("#ageRange").slider({
            range: true,
            min: 10,
            max: 40,
            values: [v1, v2],
            slide: function(event, ui) {
                $("#ageDisplay").html(ui.values[0] + " - " + ui.values[1]);
                v1 = ui.values[0];
                v2 = ui.values[1];
                loadTable(v1,v2);
            }
        });
    });

    function loadTable(range1, range2){
        $.ajax({
            url:"{{route('age.range')}}",
            type:"post",
            data:{
                range1:range1,
                range2:range2,
                _token: '{{ csrf_token() }}'
            },
            success:function(res){
                if(res.status === 'success'){
                    $('#resultTable').html(res.age);
                }else{
                    alert(res.message);
                }
            }
        });
    }
</script>
</body>
</html>
