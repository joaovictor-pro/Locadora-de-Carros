<?php

namespace App\Http\Controllers;
use App\Models\Carro; 
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index() {
        return view('carros.index', [
            'carros' => Carro::all()
        ]);
    }

    public function create() {
        return view('carros.create');
    }

    public function store(Request $request) {
        Carro::create($request->all());
        return redirect()->route('carros.index');
    }

    public function edit(Carro $carro) {
        return view('carros.edit', compact('carro'));
    }

    public function update(Request $request, Carro $carro) {
        $carro->update($request->all());
        return redirect()->route('carros.index');
    }

    public function destroy(Carro $carro) {
        $carro->delete();
        return redirect()->route('carros.index');
    }
}
