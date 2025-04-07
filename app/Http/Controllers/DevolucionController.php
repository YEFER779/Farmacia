<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use Illuminate\Http\Request;
use App\Models\DetalleVenta;



class DevolucionController extends Controller
{
    public function index()
    {
        $devoluciones = Devolucion::with('detalleVenta')->get();
        return view('devoluciones.index', compact('devoluciones'));
    }

    public function create()
    {
        $detallesVentas = DetalleVenta::all();
        return view('devoluciones.create', compact('detallesVentas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'detalle_venta_id' => 'required|integer|exists:detalle_ventas,id',
            'cantidad_devuelta' => 'required|integer|min:1',
            'motivo' => 'required|string|max:255',
        ]);

        $detalle = DetalleVenta::find($request->detalle_venta_id);
        if ($detalle->cantidad < $request->cantidad_devuelta) {
            return back()->with('error', 'Cantidad devuelta excede la cantidad vendida.');
        }

        Devolucion::create($request->all());

        $medicamento = $detalle->medicamento;
        $medicamento->stock += $request->cantidad_devuelta;
        $medicamento->save();

        return redirect()->route('devoluciones.index')->with('success', 'Devolución registrada correctamente.');
    }

    public function destroy(Devolucion $devolucion)
    {
        $devolucion->delete();
        return redirect()->route('devoluciones.index')->with('success', 'Devolución eliminada.');
    }

}
