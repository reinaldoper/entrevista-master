@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Detalhes do Veículo</h1>
        </div>
        <div class="card-body">
            <p><strong>Modelo:</strong> {{ $vehicle->model }}</p>
            <p><strong>Ano:</strong> {{ $vehicle->year }}</p>
            <p><strong>Data de Aquisição:</strong> {{ $vehicle->acquisition_date }}</p>
            <p><strong>KMs Rodados:</strong> {{ $vehicle->km_acquisition }}</p>
            <p><strong>Renavam:</strong> {{ $vehicle->renavam }}</p>
            <p><strong>Placa:</strong> {{ $vehicle->plate }}</p>
            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
            <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection