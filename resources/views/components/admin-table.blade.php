@props(['name', 'columns'])

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>{{$name}}</h2>

<table>
    <tr>
        @foreach($columns as $column)
            <th>{{$column}}</th>
        @endforeach
    </tr>

    {{$slot}}

</table>

</body>
