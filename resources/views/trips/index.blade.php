@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Viagens</h1>
    <a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">Adicionar Viagem</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Motorista</th>
                <th>Veículo</th>
                <th>KM Inicial</th>
                <th>KM Final</th>
                <th>Data e Hora de Início</th>
                <th>Data e Hora de Chegada</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
            <tr>
                <td>{{ $trip->driver->name }}</td>
                <td>{{ $trip->vehicle->model }}</td>
                <td>{{ $trip->km_start }}</td>
                <td>{{ $trip->km_end }}</td>
                <td>{{ $trip->start_time }}</td>
                <td>{{ $trip->end_time }}</td>
                <td>
                    <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection