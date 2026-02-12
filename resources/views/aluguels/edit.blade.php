@extends('layouts.app')

@section('content')
<h2>Editar Aluguel</h2>
<form method="POST" action="{{ route('aluguels.update', $aluguel) }}">
@csrf @method('PUT')
<div class="mb-3">
<label>Cliente</label>
<select name="cliente_id" class="form-select" required>
@foreach ($clientes as $cliente)
<option value="{{ $cliente->id }}" {{ old('cliente_id', $aluguel->cliente_id) == $cliente->id ? 'selected' : '' }}>
{{ $cliente->nome }}
</option>
@endforeach
</select>
</div>
<div class="mb-3">
<label>Carro</label>
<select name="carro_id" class="form-select" required>
@foreach ($carros as $carro)
<option value="{{ $carro->id }}" {{ old('carro_id', $aluguel->carro_id) == $carro->id ? 'selected' : '' }}>
{{ $carro->modelo }} ({{ $carro->status }})
</option>
@endforeach
</select>
</div>
<div class="mb-3">
<label>Data Início</label>
<input type="date" name="data_inicio" class="form-control" value="{{ old('data_inicio', $aluguel->data_inicio) }}" required>
</div>
<div class="mb-3">
<label>Data Final Prevista</label>
<input type="date" name="data_final_prevista" class="form-control" value="{{ old('data_final_prevista', $aluguel->data_final_prevista) }}" required>
</div>
<div class="mb-3">
<label>Status</label>
<select name="status" class="form-select" required>
<option value="aberto" {{ old('status', $aluguel->status)=='aberto'?'selected':'' }}>Aberto</option>
<option value="finalizado" {{ old('status', $aluguel->status)=='finalizado'?'selected':'' }}>Finalizado</option>
<option value="cancelado" {{ old('status', $aluguel->status)=='cancelado'?'selected':'' }}>Cancelado</option>
</select>
</div>
<button class="btn btn-success">Atualizar</button>
<a href="{{ route('aluguels.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
