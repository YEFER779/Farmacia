<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Medicamento</title>
</head>
<body>
    <h1>Crear Medicamento</h1>

    <form action="/medicamentos" method="POST">
        @csrf

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" min="0">

        <label for="unidad_medida_id">Unidad de Medida</label>
        <select name="unidad_medida_id" id="unidad_medida_id">
            @foreach ($unidades as $unidad)
                <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
            @endforeach
        </select>

        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" step="0.01">

        <label for="fecha_vencimiento">Fecha de Vencimiento</label>
        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento">

        <button type="submit">Crear Medicamento</button>
    </form>
</body>
</html>
