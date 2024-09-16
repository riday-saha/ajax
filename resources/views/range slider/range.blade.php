@foreach ($all_age as $records)
    <tr>
        <td>{{ $records->id }}</td>
        <td>{{ $records->name }}</td>
        <td>{{ $records->age }}</td>
        <td>{{ $records->city }}</td>
    </tr>
@endforeach