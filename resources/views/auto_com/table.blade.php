@foreach ($auto_data as $data)
    <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->city }}</td>
    </tr>
@endforeach
