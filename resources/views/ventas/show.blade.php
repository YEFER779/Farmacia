<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Venta</title>
</head>
<body>
    <h1>Detalles de la Venta #{{ $venta->id }}</h1>

    <p><strong>Usuario:</strong> {{ $venta->usuario ? $venta->usuario->nombre : 'Admin' }}</p>
    <p><strong>Total:</strong> ${{ $venta->total }}</p>
    <p><strong>Fecha:</strong> {{ $venta->created_at }}</p>

    <h3>Productos vendidos</h3>
    <ul>
        @foreach ($venta->detalles as $detalle)
            <li>{{ $detalle->medicamento->nombre }} - Cantidad: {{ $detalle->cantidad }} - Precio unitario: ${{ $detalle->precio_unitario }}</li>
        @endforeach
    </ul>

    <a href="/ventas">Volver a la lista de ventas</a>
</body>
</html>
