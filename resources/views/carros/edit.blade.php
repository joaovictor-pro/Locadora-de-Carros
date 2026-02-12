@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Carro</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('carros.update', $carro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo', $carro->modelo) }}" required>
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $carro->marca) }}" required>
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa', $carro->placa) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="disponivel" {{ old('status', $carro->status) == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                <option value="alugado" {{ old('status', $carro->status) == 'alugado' ? 'selected' : '' }}>Alugado</option>
                <option value="manutencao" {{ old('status', $carro->status) == 'manutencao' ? 'selected' : '' }}>Manutenção</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('carros.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
