<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocomplete Textbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            margin-top: 50px;
        }
        .autocomplete-box {
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            background: white;
            width: 100%;
            position: absolute;
            z-index: 999;
        }
        .autocomplete-item {
            padding: 10px;
            cursor: pointer;
        }
        .autocomplete-item:hover {
            background-color: #f0f0f0;
        }
        .autocomplete-box ul {
            list-style: none;
            padding-left: 0;
        }
        .autocomplete-box ul li {
            border-bottom: 1px solid #eee;
        }
        .table {
            margin-top: 20px;
            display: none;
        }
        .table table {
            background-color: white;
            border-collapse: collapse;
            width: 100%;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table-visible {
            display: block !important;
        }
        .no-data {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Autocomplete Textbox with jQuery</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group position-relative">
                <input type="text" id="search-box" class="form-control" placeholder="Type city">
                <div id="autocomplete" class="autocomplete-box"></div>
                
                <!-- Data table -->
                <div class="table">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- AJAX content will be injected here -->
                        </tbody>
                    </table>
                </div>

                <!-- No data message -->
                <div class="no-data d-none">No data found for the selected city.</div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $(document).on('keyup','#search-box',function(){
        let ser_val = $(this).val();
        $.ajax({
            url: "{{ route('auto.compleate') }}",
            data: {
                ser_val: ser_val,
            },
            success: function(res) {
                $('#autocomplete').html(res);
            }
        });
    });

    $(document).on('click', 'li', function(){
        let value = $(this).text();
        
        // Clear the autocomplete suggestions when a city is selected
        $('#autocomplete').html(''); 
        
        $.ajax({
            url: "{{ route('auto.data') }}",
            method: "POST",
            data: {
                value: value,
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                if(res.status === 'success'){
                    $('table tbody').html(res.html);  // Update the table
                    $('.table').addClass('table-visible');  // Show the table
                    $('.no-data').addClass('d-none');  // Hide no data message
                } else {
                    $('.table').removeClass('table-visible');  // Hide the table
                    $('.no-data').removeClass('d-none');  // Show no data message
                }
            }
        });
    });
});

</script>

</body>
</html>
