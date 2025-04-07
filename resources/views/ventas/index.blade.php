<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
</head>
<body>
    <h1>Lista de Ventas</h1>

    <a href="/ventas/create">Crear Venta</a>

    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Usuario</td>
                <td>Total</td>
                <td>Fecha</td>
                <td>Detalles</td>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->usuario ? $venta->usuario->nombre : 'Admin'}}</td>
                <td>{{ $venta->total }}</td>
                <td>{{ $venta->created_at }}</td>
                <td><a href="/ventas/{{ $venta->id }}">Ver detalles</a></td>
               
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
   <div class="mt-3">
        <a href="{{ url('/devoluciones') }}" class="btn btn-secondary">Ir a Devoluciones</a>
    </div>

</body>
</html>
