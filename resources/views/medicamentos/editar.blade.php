<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    
    <form action="/medicamentos/{{$medicamento->id}}" method="POST">
        @csrf
        @method('PUT')

        <label>Codigo</label>
        <input type="text" name="codigo" id="codigo" value="{{$medicamento->id}}">
        

        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{$medicamento->nombre}}">

        <label>Stock</label>
        <input type="text" name="stock" id="stock" value="{{$medicamento->stock}}">
        
        <label>Precio</label>
        <input type="text" name="precio" id="precio" value="{{$medicamento->precio}}">

        <label>Fecha Vencimineto</label>
        <input type="text" name="fecha_vencimiento" id="fecha_vencimiento" value="{{$medicamento->fecha_vencimiento}}">


        <button type="submit">Guardar Cambio</button>
    </form>
</body>
</html>