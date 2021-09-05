@props(['columns'])
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr class="text-center">
            @foreach($columns as $column)
            <th scope="col">{{$column}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            {{$slot}}
        </tbody>
    </table>
</div>
