@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Lista de Carros</h2>

    <a href="{{ route('carros.create') }}" class="btn btn-success mb-3">Cadastrar Novo Carro</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($carros->isEmpty())
        <div class="alert alert-info">Nenhum carro cadastrado.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Placa</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carros as $carro)
                    <tr>
                        <td>{{ $carro->id }}</td>
                        <td>{{ $carro->modelo }}</td>
                        <td>{{ $carro->marca }}</td>
                        <td>{{ $carro->placa }}</td>
                        <td>
                            @if($carro->status == 'disponivel')
                                <span class="badge bg-success">Disponível</span>
                            @elseif($carro->status == 'alugado')
                                <span class="badge bg-warning text-dark">Alugado</span>
                            @else
                                <span class="badge bg-danger">Manutenção</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir este carro?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
