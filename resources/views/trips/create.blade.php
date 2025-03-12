@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Adicionar Viagem</h1>
    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="driver_id">Motorista</label>
            <select class="form-control" id="driver_id" name="driver_id" required>
                @foreach($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vehicle_id">Veículo</label>
            <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="km_start">KM Inicial</label>
            <input type="number" class="form-control" id="km_start" name="km_start" required>
        </div>
        <div class="form-group">
            <label for="km_end">KM Final</label>
            <input type="number" class="form-control" id="km_end" name="km_end" required>
        </div>
        <div class="form-group">
            <label for="start_time">Data e Hora de Início</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_time">Data e Hora de Chegada</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection