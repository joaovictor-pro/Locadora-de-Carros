@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between mb-3">
    <h2>Carros</h2>
    <a href="{{ route('carros.create') }}" class="btn btn-primary">Novo Carro</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Placa</th>
            <th>Status</th>
            <th width="160">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carros as $carro)
        <tr>
            <td>{{ $carro->modelo }}</td>
            <td>{{ $carro->marca }}</td>
            <td>{{ $carro->placa }}</td>
            <td>
                <span class="badge bg-
                    {{ $carro->status == 'disponivel' ? 'success' :
                       ($carro->status == 'alugado' ? 'warning' : 'secondary') }}">
                    {{ $carro->status }}
                </span>
            </td>
            <td>
                <a href="{{ route('carros.edit', $carro) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('carros.destroy', $carro) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
