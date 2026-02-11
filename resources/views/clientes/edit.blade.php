@extends('layouts.app')

@section('conteudo')
<h2>Editar Cliente</h2>

<form method="POST" action="{{ route('clientes.update', $cliente) }}" class="card card-body">
    @csrf @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ $cliente->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="ativo" @selected($cliente->status=='ativo')>Ativo</option>
            <option value="inativo" @selected($cliente->status=='inativo')>Inativo</option>
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
