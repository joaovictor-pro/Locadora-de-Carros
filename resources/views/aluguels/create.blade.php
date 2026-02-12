@extends('layouts.app')

@section('content')
<h2>Novo Aluguel</h2>
<form method="POST" action="{{ route('aluguels.store') }}">
@csrf
<div class="mb-3">
<label>Cliente</label>
<select name="cliente_id" class="form-select" required>
<option value="">Selecione</option>
@foreach ($clientes as $cliente)
<option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
@endforeach
</select>
</div>
<div class="mb-3">
<label>Carro</label>
<select name="carro_id" class="form-select" required>
<option value="">Selecione</option>
@foreach ($carros as $carro)
<option value="{{ $carro->id }}">{{ $carro->modelo }} ({{ $carro->status }})</option>
@endforeach
</select>
</div>
<div class="mb-3">
<label>Data Início</label>
<input type="date" name="data_inicio" class="form-control" required>
</div>
<div class="mb-3">
<label>Data Final Prevista</label>
<input type="date" name="data_final_prevista" class="form-control" required>
</div>
<button class="btn btn-success">Salvar</button>
<a href="{{ route('aluguels.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
