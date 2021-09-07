@props(['columns' => array()])

<tr>
    @foreach($columns as $column)
        <td>{{$column}}</td>
    @endforeach
    {{$slot}}
</tr>

