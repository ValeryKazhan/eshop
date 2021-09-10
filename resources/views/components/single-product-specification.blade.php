@props(['specification'])

<div class="table-responsive">
    <table class="table">
        <tbody>
        @foreach($specification as $key=>$value)
        <tr>
            <td>
                <h5>{{$key}}</h5>
            </td>
            <td>
                <h5>{{$value}}</h5>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
