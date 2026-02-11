@extends('layouts.app')

@section('conteudo')
<h2>Novo Carro</h2>

<form method="POST" action="{{ route('carros.store') }}" class="card card-body">
    @csrf

    <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input type="text" name="modelo" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input type="text" name="marca" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Placa</label>
        <input type="text" name="placa" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Ano</label>
        <input type="number" name="ano" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Preço Diária</label>
        <input type="text" name="preco_diaria" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="disponivel">Disponível</option>
            <option value="manutencao">Manutenção</option>
            <opitiom value="alugado">Alugado</option>
        </select>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
