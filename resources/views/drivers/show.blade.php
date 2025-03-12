@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Detalhes do Motorista</h1>
        </div>
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $driver->name }}</p>
            <p><strong>Data de Nascimento:</strong> {{ $driver->birth_date }}</p>
            <p><strong>CNH:</strong> {{ $driver->cnh_number }}</p>
            <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
            <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection