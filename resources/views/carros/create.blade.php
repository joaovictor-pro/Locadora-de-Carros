@extends('layouts.app')

@section('content')
<h2>Novo Carro</h2>
<form method="POST" action="{{ route('carros.store') }}">
@csrf
<div class="mb-3"><label>Modelo</label><input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}" required></div>
<div class="mb-3"><label>Placa</label><input type="text" name="placa" class="form-control" value="{{ old('placa') }}" required></div>
<div class="mb-3"><label>Marca</label><input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required></div>
<div class="mb-3"><label>Ano</label><input type="number" name="ano" class="form-control" value="{{ old('ano') }}" required></div>
<div class="mb-3"><label>Preço diária</label><input type="number" step="0.01" name="preco_diaria" class="form-control" value="{{ old('preco_diaria') }}" required></div>
<div class="mb-3"><label>Descrição</label><textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea></div>
<div class="mb-3">
<label>Status</label>
<select name="status" class="form-select" required>
<option value="disponivel">Disponível</option>
<option value="alugado">Alugado</option>
<option value="manutencao">Manutenção</option>
</select>
</div>
<button class="btn btn-success">Salvar</button>
<a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
