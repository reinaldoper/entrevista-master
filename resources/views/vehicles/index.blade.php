@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Veículos</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Adicionar Veículo</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Data_Aquisição</th>
                <th>KMs_Rodados</th>
                <th>Renavam</th>
                <th>Placa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->year }}</td>
                <td>{{ $vehicle->acquisition_date }}</td>
                <td>{{ $vehicle->km_acquisition }}</td>
                <td>{{ $vehicle->renavam }}</td>
                <td>{{ $vehicle->plate }}</td>
                <td>
                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
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
