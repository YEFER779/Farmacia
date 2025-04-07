<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Venta</title>
</head>
<body>
    <h1>Crear Venta</h1>

    <form action="/ventas" method="POST">
        @csrf

        <h3>Seleccione los productos a vender</h3>

        <div id="medicamentos-container">
            @foreach ($medicamentos as $medicamento)
                <div class="medicamento">
                    <label for="medicamentos[{{ $medicamento->id }}][cantidad]">
                        {{ $medicamento->nombre }} - ${{ $medicamento->precio }} - Stock: {{ $medicamento->stock }}
                    </label>
                    <input type="number" name="medicamentos[{{ $medicamento->id }}][cantidad]" min="1" max="{{ $medicamento->stock }}" value="1">
                </div>
            @endforeach
        </div>

        <button type="submit">Registrar Venta</button>
    </form>
</body>
</html>
