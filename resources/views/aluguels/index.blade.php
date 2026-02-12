@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Aluguéis</h2>
    <a href="{{ route('aluguels.create') }}" class="btn btn-primary">Novo Aluguel</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Carro</th>
            <th>Data Início</th>
            <th>Data Final Prevista</th>
            <th>Data Final Entregue</th>
            <th>Status</th>
            <th width="160">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aluguels as $aluguel)
        <tr>
            <td>{{ $aluguel->cliente->nome }}</td>
            <td>{{ $aluguel->carro->modelo }}</td>
            <td>{{ $aluguel->data_inicio }}</td>
            <td>{{ $aluguel->data_final_prevista }}</td>
            <td>{{ $aluguel->data_final_entregue ?? '-' }}</td>
            <td>
                <span class="badge bg-{{ $aluguel->status=='aberto'?'success':($aluguel->status=='finalizado'?'secondary':'warning') }}">
                    {{ $aluguel->status }}
                </span>
            </td>
            <td>
                <a href="{{ route('aluguels.edit', $aluguel) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('aluguels.destroy', $aluguel) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

