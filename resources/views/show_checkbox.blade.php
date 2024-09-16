<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Checkbox Values in Database</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #17a2b8;
            padding: 20px;
            border-radius: 10px;
            color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .checkbox-label {
            display: block;
            color: white;
            margin-left: 10px;
        }
        .submit-btn {
            display: block;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container form-container">
        <h2 class="form-title">Inserted Checkbox Values in Database</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Selected Languages</th>
                <th>Edit</th>
            </tr>
           
            @foreach ($show_all as $show)
                <tr>
                    <td>{{$show->name}}</td>
                    <td>
                        @php
                            $langu = json_decode($show->language);
                        @endphp 
                       {{implode(', ', $langu)}}
                    </td>
                    <td>
                        <a href="{{route('update.box',$show->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>


