<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th {
        border: 1px solid #ddd;
        text-align: left;
        }

        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        padding: 15px;
        }
    </style>

</head>
<body>

    <h1>Lista de ordens em aberto</h1>



    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Criada em</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->client}}</td>
                <td>aberto</td>
                <td>{{$order->value}}</td>
                <td>{{$order->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</body>
</html>
