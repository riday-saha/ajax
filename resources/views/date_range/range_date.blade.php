@foreach ($get_data as $dates)
    <tr>
        <td>{{ $dates->id }}</td>
        <td>{{ $dates->name }}</td>
        <td>{{ $dates->city }}</td>
        <td>{{ $dates->DOB }}</td>
    </tr>
@endforeach
