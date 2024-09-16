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
        <h2 class="form-title">Insert Checkbox Values in Database</h2>
        <form id="languageForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <label>Languages</label>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="PHP" id="php">
                <label class="form-check-label checkbox-label" for="php">PHP</label>
            </div>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="Python" id="python">
                <label class="form-check-label checkbox-label" for="python">Python</label>
            </div>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="C++" id="cpp">
                <label class="form-check-label checkbox-label" for="cpp">C++</label>
            </div>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="Java" id="java">
                <label class="form-check-label checkbox-label" for="java">Java</label>
            </div>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="C#" id="csharp">
                <label class="form-check-label checkbox-label" for="csharp">C#</label>
            </div>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="Ruby" id="ruby">
                <label class="form-check-label checkbox-label" for="ruby">Ruby</label>
            </div>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="JavaScript" id="javascript">
                <label class="form-check-label checkbox-label" for="javascript">JavaScript</label>
            </div>
            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" name="languages[]" value="Swift" id="swift">
                <label class="form-check-label checkbox-label" for="swift">Swift</label>
            </div>

            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.submit-btn').on('click',function(e){
                e.preventDefault();
                let fname = $('#name').val();
                let lenguages = [];

                $('.checkbox').each(function(){
                    if($(this).is(':checked','true')){
                        lenguages.push($(this).val());
                    }
                })

                let select_len = lenguages.join(',');
                //console.log(select_len);

                if(fname != '' && select_len.length !== 0){
                    $.ajax({
                        url:"{{route('insert.data')}}",
                        method:"POST",
                        data:{
                            name:fname,
                            select_len:select_len,
                            _token: '{{ csrf_token() }}'
                        },
                        success:function(res){
                            if(res.status == 'success'){
                                $('#languageForm')[0].reset();
                            
                            }
                            alert(res.message);
                        }
                    });
                }else{
                    alert("please fill first");
                }

                
                
                
            });
        });
    </script>
</body>
</html>

