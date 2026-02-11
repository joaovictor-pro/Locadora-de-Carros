@extends('layouts.app')

@section('conteudo')
<h2>Editar Carro</h2>

<form method="POST" action="{{ route('carros.update', $carro) }}" class="card card-body">
    @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input type="text" name="modelo" value="{{ $carro->modelo }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input type="text" name="marca" value="{{ $carro->marca }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Placa</label>
        <input type="text" name="placa" value="{{ $carro->placa }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Ano</label>
        <input type="number" name="ano" value="{{ $carro->ano }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Preço Diária</label>
        <input type="text" name="preco_diaria" value="{{ $carro->preco_diaria }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="disponivel" @selected($carro->status=='disponivel')>Disponível</option>
            <option value="alugado" @selected($carro->status=='alugado')>Alugado</option>
            <option value="manutencao" @selected($carro->status=='manutencao')>Manutenção</option>
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
