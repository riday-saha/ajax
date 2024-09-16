
    @foreach ($slc_city as $user)
       <tr>
           <td>{{ $user->id }}</td>
           <td>{{ $user->name }}</td>
           <td>{{ $user->age }}</td>
           <td>{{ $user->city }}</td>
       </tr>
    @endforeach