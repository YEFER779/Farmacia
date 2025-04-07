@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Medicamentos</h1>
    
    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary mb-3">Crear Medicamento</a>

    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Stock</td>
                <td>Precio</td>
                <td>Fecha Vencimiento</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->id }}</td>
                    <td>{{ $medicamento->nombre }}</td>
                    <td>{{ $medicamento->stock }}</td>
                    <td>{{ $medicamento->precio }}</td>
                    <td>{{ $medicamento->fecha_vencimiento }}</td>
                    <td>
                        <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este medicamento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

   <br>
   <div class="mt-3">
        <a href="{{ url('/ventas') }}" class="btn btn-secondary">Ir a Ventas</a>
    </div>

</div>
@endsection
