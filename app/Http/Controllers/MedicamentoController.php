<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use App\Models\Medicamento;
use Illuminate\Http\Request;


class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::all();
        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        $unidades = UnidadMedida::all();
        return view('medicamentos.create', compact('unidades'));
    }

    public function store(Request $request)
    {
        $medicamento = new Medicamento();

        $medicamento->nombre = $request->get('nombre');
        $medicamento->stock = $request->get('stock');
        $medicamento->unidad_medida_id = $request->get('unidad_medida_id');
        $medicamento->precio = $request->get('precio');
        $medicamento->fecha_vencimiento = $request->get('fecha_vencimiento');
        
        $medicamento->save();
        
        return redirect('/medicamentos');
        
    }

   
    public function edit(string $id)
    {
       $medicamento=Medicamento::find($id);

       return view('medicamentos.editar')->with('medicamento',$medicamento);

    }

    public function update(Request $request, string $id)
    {

         
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'stock' => 'required|integer|min:0', 
        'precio' => 'required|numeric|min:0', 
        'fecha_vencimiento' => 'required|date|after:today', 
    ]);

    $medicamento = Medicamento::findOrFail($id);

    $medicamento->update($validated);

    return redirect('medicamentos');
   
    }

    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamentos.index')->with('success', 'Medicamento eliminado correctamente.');
    }
}
