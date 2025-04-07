<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Devolución</title>
</head>
<body>
    <h1>Crear Devolución</h1>

    <form action="{{ route('devoluciones.store') }}" method="POST">
        @csrf

        <label for="detalle_venta_id">Detalle Venta</label>
        <select name="detalle_venta_id" id="detalle_venta_id">
            @foreach ($detallesVentas as $detalle)
                <option value="{{ $detalle->id }}">{{ $detalle->medicamento->nombre }}</option>
            @endforeach
        </select>

        <label for="cantidad_devuelta">Cantidad Devuelta</label>
        <input type="number" name="cantidad_devuelta" id="cantidad_devuelta" min="1">

        <label for="motivo">Motivo</label>
        <input type="text" name="motivo" id="motivo">

        <button type="submit">Crear Devolución</button>
    </form>
</body>
</html>
