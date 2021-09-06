@props(['columns'])

<tr>
    @foreach($columns as $column)
        <td>{{$column}}</td>
    @endforeach
    {{$slot}}
</tr>

