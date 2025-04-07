<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devoluciones</title>
</head>
<body>
    <h1>Lista de Devoluciones</h1>
    
    <a href="{{ route('devoluciones.create') }}">Crear Devolución</a>
    
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Detalle Venta</td>
                <td>Cantidad Devuelta</td>
                <td>Motivo</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($devoluciones as $devolucion)
                <tr>
                    <td>{{ $devolucion->id }}</td>
                    <td>{{ $devolucion->detalleVenta->medicamento->nombre }}</td>
                    <td>{{ $devolucion->cantidad_devuelta }}</td>
                    <td>{{ $devolucion->motivo }}</td>
                    <td>
                        <form action="{{ route('devoluciones.destroy', $devolucion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <a href="{{ url('/medicamentos') }}" class="btn btn-secondary">Regresar a medicamentos</a>
    </div>
</body>
</html>
