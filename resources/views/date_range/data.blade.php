<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search in Date Range using jQuery UI</title>
    
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
        .date-range-slider {
            margin: 20px 0;
        }
        .table-container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
        .table-primary {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="text-center">Search in Date Range using jQuery UI</h3>

    <!-- Date Range Section -->
    <div class="date-range-slider">
        <label for="dateRange" class="form-label">From: 
            <input type="text" id="fromDate" class="form-control d-inline-block" style="width: 150px;" readonly>
            To: 
            <input type="text" id="toDate" class="form-control d-inline-block" style="width: 150px;" readonly>
        </label>
        <div id="dateRange"></div>
    </div>

    <!-- Search Results Table -->
    <div class="table-container">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>DOB</th>
                </tr>
            </thead>
            <tbody id="resultTable">
                <!-- Sample Data -->
                @foreach ($date as $dates)
                  <tr>
                        <td>{{$dates->id}}</td>
                        <td>{{$dates->name}}</td>
                        <td>{{$dates->city}}</td>
                        <td>{{$dates->DOB}}</td>
                    </tr>  
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery Script for Date Range Slider -->
<script>
  $(function() {
      var minD;
      var maxD;
      var dateFormat = "mm/dd/yy",
        from = $("#fromDate")
          .datepicker({
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            yearRange: "2000:2025"
          })
          .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
            minD = $(this).val();
            if (minD !== '' && maxD !== '') {
              loadTable(minD, maxD);
            }
          }),
        to = $("#toDate").datepicker({
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 1,
          yearRange: "2000:2025"
      })
      .on("change", function() {
          from.datepicker("option", "maxDate", getDate(this));
          maxD = $(this).val();
          if (minD !== '' && maxD !== '') {
              loadTable(minD, maxD);
          }
      });

      function getDate(element) {
          var date;
          try {
              date = $.datepicker.parseDate(dateFormat, element.value);
          } catch (error) {
              date = null;
          }

          return date;
      }

      function loadTable(date1, date2) {
          // Convert the dates to YYYY-MM-DD format
          var formattedDate1 = $.datepicker.formatDate('yy-mm-dd', new Date(date1));
          var formattedDate2 = $.datepicker.formatDate('yy-mm-dd', new Date(date2));

          $.ajax({
              url: "{{ route('date.get') }}",
              type: "POST",
              data: {
                  date1: formattedDate1,
                  date2: formattedDate2,
                  _token: '{{ csrf_token() }}'
              },
              success: function(res) {
                  if (res.status == 'success') {
                      $('#resultTable').html(res.htmls);
                  } else {
                      $('#resultTable').html('<tr><td colspan="4">' + res.message + '</td></tr>');
                  }
              }
          });
      }
  });
</script>


</body>
</html>
