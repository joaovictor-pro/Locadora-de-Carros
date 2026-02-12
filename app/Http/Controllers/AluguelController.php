<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Cliente;
use App\Models\Carro;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AluguelController extends Controller
{
    public function index() {
        $aluguels = Aluguel::with(['cliente', 'carro'])->get();
        return view('aluguels.index', compact('aluguels'));
    }

    public function create() {
        $carros = Carro::where('status', 'disponivel')->get();
        $clientes = Cliente::all();
        return view('aluguels.create', compact('carros', 'clientes'));
    }

    public function store(Request $request) {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'carro_id' => 'required|exists:carros,id',
            'data_inicio' => 'required|date',
            'data_final_prevista' => 'required|date|after_or_equal:data_inicio'
        ]);

        $carro = Carro::findOrFail($request->carro_id);
        if ($carro->status != 'disponivel') return back()->withErrors(['carro_id'=>'Carro não disponível']);

        $aluguel = Aluguel::create([
            'cliente_id' => $request->cliente_id,
            'carro_id' => $request->carro_id,
            'data_inicio' => $request->data_inicio,
            'data_final_prevista' => $request->data_final_prevista,
            'status' => 'aberto'
        ]);

        $carro->update(['status' => 'alugado']);
        return redirect()->route('aluguels.index');
    }

    public function edit(Aluguel $aluguel) {
        $clientes = Cliente::all();
        $carros = Carro::all();
        return view('aluguels.edit', compact('aluguel', 'clientes', 'carros'));
    }

    public function update(Request $request, Aluguel $aluguel) {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'carro_id' => 'required|exists:carros,id',
            'data_inicio' => 'required|date',
            'data_final_prevista' => 'required|date|after_or_equal:data_inicio',
            'status' => 'required|in:aberto,finalizado,cancelado'
        ]);

        $aluguel->update([
            'cliente_id' => $request->cliente_id,
            'carro_id' => $request->carro_id,
            'data_inicio' => $request->data_inicio,
            'data_final_prevista' => $request->data_final_prevista,
            'data_final_entregue' => $request->status == 'finalizado' ? Carbon::now()->format('Y-m-d') : null,
            'status' => $request->status
        ]);

        $carro = Carro::find($request->carro_id);
        $carro->update(['status' => ($request->status=='aberto')?'alugado':'disponivel']);

        return redirect()->route('aluguels.index');
    }

    public function destroy(Aluguel $aluguel) {
        $carro = $aluguel->carro;
        $carro->update(['status'=>'disponivel']);
        $aluguel->delete();
        return redirect()->route('aluguels.index');
    }
}
