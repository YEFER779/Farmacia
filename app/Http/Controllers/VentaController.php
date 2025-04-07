<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Medicamento;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('usuario')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $medicamentos = Medicamento::all();
        return view('ventas.create', compact('medicamentos'));
    }
    
    public function show($id)
    {
        // Encuentra la venta por su id
        $venta = Venta::findOrFail($id);

        // Retorna la vista con los detalles de la venta
        return view('ventas.show', compact('venta'));
    }

    public function store(Request $request)
    {
       
    $request->validate([
        'medicamentos' => 'required|array',
        'medicamentos.*.cantidad' => 'required|integer|min:1',
    ]);

    
    $venta = Venta::create([
        'user_id' => Auth::id(),
        'total' => 0,
    ]);

    $total = 0;

    foreach ($request->medicamentos as $medicamentoId => $item) {
        $medicamento = Medicamento::find($medicamentoId);

       
        if ($medicamento->stock < $item['cantidad']) {
            return back()->with('error', 'Stock insuficiente para el medicamento ' . $medicamento->nombre . '.');
        }

        
        $medicamento->stock -= $item['cantidad'];
        $medicamento->save();

        
        DetalleVenta::create([
            'venta_id' => $venta->id,
            'medicamento_id' => $medicamento->id,
            'cantidad' => $item['cantidad'],
            'precio_unitario' => $medicamento->precio,
        ]);

        
        $total += $medicamento->precio * $item['cantidad'];
    }

    $venta->update(['total' => $total]);

    return redirect()->route('ventas.index')->with('success', 'Venta realizada correctamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada.');
    }
}
