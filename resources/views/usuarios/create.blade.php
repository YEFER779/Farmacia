<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">

        <label for="rol">Rol</label>
        <select name="rol" id="rol">
            <option value="basico">Básico</option>
            <option value="root">Root</option>
        </select>

        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>
