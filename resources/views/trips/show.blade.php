@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Detalhes da Viagem</h1>
        </div>
        <div class="card-body">
            <p><strong>Motorista:</strong> {{ $trip->driver->name }}</p>
            <p><strong>Veículo:</strong> {{ $trip->vehicle->model }}</p>
            <p><strong>KM_Inicial:</strong> {{ $trip->km_start }}</p>
            <p><strong>KM_Final:</strong> {{ $trip->km_end }}</p>
            <p><strong>Data/hora_inicio:</strong> {{ $trip->start_time }}</p>
            <p><strong>Data/hora_fim:</strong> {{ $trip->end_time }}</p>
            <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
            <a href="{{ route('trips.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
